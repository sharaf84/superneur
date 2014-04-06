<?php

/**
 * Utilities class.
 */
class Utilities {

    /**
     * Generate a random salt in the crypt(3) standard Blowfish format.
     * @param int $cost Cost parameter from 4 to 31.
     * @throws Exception on invalid cost parameter.
     * @return string A Blowfish hash salt for use in PHP's crypt()
     */
    public static function blowfishSalt($cost = 13) {
        if (!is_numeric($cost) || $cost < 4 || $cost > 31) {
            throw new Exception("cost parameter must be between 4 and 31");
        }
        $rand = array();
        for ($i = 0; $i < 8; $i += 1) {
            $rand[] = pack('S', mt_rand(0, 0xffff));
        }
        $rand[] = substr(microtime(), 2, 6);
        $rand = sha1(implode('', $rand), true);
        $salt = '$2a$' . sprintf('%02d', $cost) . '$';
        $salt .= strtr(substr(base64_encode($rand), 0, 22), array('+' => '.'));
        return $salt;
    }

    /**
     * Get Config 
     * @author Ahmed Sharaf <sharaf.developer@gmail.com>
     * @param type $config
     * @return array of the config file.
     */
    public static function getConfig($config) {
        return require(Yii::app()->basePath . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . $config . '.php');
    }

    /**
     * Hashing $str using CSecurityManager hashData and rtrim $str from the result.
     * @author Ahmed Sharaf <sharaf.developer@gmail.com>
     * @param type string $str
     * @return string.
     */
    public static function hash($str) {
        return substr(Yii::app()->securityManager->hashData($str), 0, -strlen($str));
    }

    /**
     * Delete files in given path (and subdirs)
     * @author Ahmed Sharaf <sharaf.developer@gmail.com>
     * @param string|array $path 'Requeried' Path to the files to delete or array ex: array(array($path, $match, $recursive), ...) (when array other params are ignored) 
     * @param string $match Filename to delete all (use * as wildcard)
     * @param boolean $recursive Delete matching files in subdirs
     * @return integer Returns how many files that were deleted
     */
    public static function deleteFiles($path, $match = null, $recursive = false) {
        static $deleted = 0;
        $deleteFiles = is_array($path) ? $path : array(array($path, $match, $recursive));
        foreach ($deleteFiles as $deleteFile) {
            list($path, $match, $recursive) = $deleteFile;
            // make sure we have a valid path
            $fullPath = Yii::getPathOfAlias('webroot') . rtrim($path, '/') . '/';
            $files = glob($fullPath . $match, GLOB_NOSORT);
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file);
                    $deleted++;
                }
            }
            if ($recursive) {
                $dirs = glob($fullPath . "*", GLOB_NOSORT);  // GLOB_NOSORT to make it quicker
                foreach ($dirs as $dir) {
                    if (is_dir($dir)) {
                        $dir = basename($dir) . DIRECTORY_SEPARATOR;
                        self::deleteFiles($path . $dir, $match, false);
                    }
                }
            }
        }
        return $deleted;
    }

    /**
     * Generate Img Sizes.
     * @author Ahmed Sharaf <sharaf.developer@gmail.com>
     * @param string $imgPath 'Requeried' path of the image ex: '/path/to/img/'
     * @param string $imgName 'Requeried' name of the image ex: 'myimage.jpg'
     * @param array $sizes 'Requeried'
     * array of image config sizes with extra custom sizes ex: 
     * array('micro', 'thumb', 'custom' => array(
     *       'app' => 'simage',
     *       'actions' => array(
     *           array('fit_to_width', 200),
     *       )
     *   ),
     * )
     * @return void
     */
    public static function generateImgSizes($imgPath, $imgName, array $sizes) {
        $fullPath = Yii::getPathOfAlias('webroot') . $imgPath;
        if (is_file($fullPath . $imgName) && !empty($sizes)) {
            $imgConfig = self::getConfig('image');
            //$sizes = array_intersect_key($imgConfig['sizes'], array_flip($sizes));
            foreach ($sizes as $key => $val) {
                if (!is_array($val)) {
                    if (isset($imgConfig['sizes'][$val])) {
                        $key = $val;
                        $val = $imgConfig['sizes'][$key];
                    }
                    else
                        continue;
                }
                $imgObj = Yii::app()->{$val['app']}->load($fullPath . $imgName);
                foreach ($val['actions'] as $action) {
                    $func = $action[0]; //callback function
                    array_shift($action); //params array
                    call_user_func_array(array($imgObj, $func), $action);
                }
                $sizePath = $fullPath . DIRECTORY_SEPARATOR . $key;
                if (!is_dir($sizePath)) {
                    mkdir($sizePath, 0775, true);
                    chmod($sizePath, 0775);
                }
                $imgObj->save($sizePath . DIRECTORY_SEPARATOR . $imgName);
            }
        }
//        else
//            throw new CHttpException(404, $fullPath.$imgName.'does not exists.');
    }

    /**
     * Get Img Url
     * @author Ahmed Sharaf <sharaf.developer@gmail.com>
     * @param string $imgPath 'Requeried' path of the image ex: '/path/to/img/'
     * @param string $imgName 'Requeried' name of the image ex: 'myimage.jpg'
     * @param string $size 'Optional' size from image config sizes ex: 'thumb'
     * @param bool $placeholder 'Optional' whether to return placeholder img ro no
     * @return string :
     * if the img dosen't exists => return a place holder img url
     * if the img size dosen't exists => generate the img size and return url 
     */
    public static function getImgUrl($imgPath, $imgName, $size = null, $placeholder = true) {
        $fullPath = Yii::getPathOfAlias('webroot') . $imgPath;
        $imgConfig = self::getConfig('image');
        if (is_file($fullPath . $imgName)) {
            if ($size) {
                if (!is_file($fullPath . $size . DIRECTORY_SEPARATOR . $imgName) && array_key_exists($size, $imgConfig['sizes']))
                    self::generateImgSizes($imgPath, $imgName, array($size));
                return Yii::app()->getBaseUrl(true) . $imgPath . $size . '/' . $imgName;
            }
            return Yii::app()->getBaseUrl(true) . $imgPath . $imgName;
        }

        if ($placeholder)
            return self::getImgUrl($imgConfig['placeholder']['path'], $imgConfig['placeholder']['img'], $size, false);

        $size and $size .= '/';
        return Yii::app()->getBaseUrl(true) . $imgPath . $size . $imgName;
    }

    /**
     * sends sms to the specific phone using CURL using resalty.net gatway
     * @param string $to phone number
     * @param string $msg messgae to send
     * @param string $prefix message prefix
     * @return bool true if success false if not.
     */
    public static function sendResaltySMS($to, $msg, $prefix = null) {
        $SMS = array_merge(Yii::app()->params['resaltySMS'], array('to' => $to, 'msg' => $prefix . $msg));
        $URL = $SMS['URL'];
        unset($SMS['URL']);
        $URL .= http_build_query($SMS);
        $response = self::CURLPost($URL);
        return (substr($response, 8, 1) == 0);
    }

    /**
     * sends sms to the specific phone using CURL using resalty.net gatway
     * @param string $to phone number
     * @param string $msg messgae to send
     * @param string $prefix message prefix
     * @return bool true if success false if not.
     */
    public static function sendExperttextingSMS($to, $msg, $prefix = null) {
        $SMS = array_merge(Yii::app()->params['experttextingSMS'], array('TO' => $to, 'MSG' => $prefix . $msg));
        $URL = $SMS['URL'];
        unset($SMS['URL']);
        $URL .= http_build_query($SMS);
        $response = self::CURLPost($URL);
        $xmlObj = simplexml_load_string($response);
        return ($xmlObj->Status == 'SUCCESS');
    }
    
    public static function CURLPost($URL){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_REFERER, $URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public static function getDateRange($date) {
        list($day, $month, $year) = explode("-", $date);

        //var_dump($timestamp = strtotime($day.'-'.$month.'-'.$year));
        $daystart = strtotime($year . '-' . $month . '-' . $day . ' 00:00:00 GMT');
        $dayend = strtotime($year . '-' . $month . '-' . $day . ' 23:59:59 GMT');
        $range = array('start' => $daystart, 'end' => $dayend);
        return $range;
    }

    /**
     * Used to get a radnom string
     *
     * @author Ahmed Kamal <a.kamal@nilecode.com>
     * @param int $length of the string
     * @param bool $encrypt the string
     * @return string
     */
    public static function getKey($length = 10, $encrypt = FALSE) {
        $string = '0123456789';

        for ($i = $length; $i > 0; --$i) {
            $string .= chr(rand(65, 122));
        }

        // Shuffling the string
        $string = str_shuffle(str_repeat($string, 5));

        //return $string;


        return (strlen($string) > $length) ? substr($string, 0, $length) : $string;
    }

    /**
     * Generate Download header using file_path and file size.
     * @author hany antar <h.antar@nilecode.com>
     * @param string $file_path 'Requeried' path of the downloaded file ' ex: /path/to/file
     * return readed file
     *    )
     * )
     */
    public static function download($file_path) {
        // get the file request, throw error if nothing supplied
// hide notices
        @ini_set('error_reporting', E_ALL & ~ E_NOTICE);
//- turn off compression on the server
        @apache_setenv('no-gzip', 1);
        @ini_set('zlib.output_compression', 'Off');

        if (!isset($file_path) || empty($file_path)) {
            header("HTTP/1.0 400 Bad Request");
            exit;
        }

// sanitize the file request, keep just the name and extension
// also, replaces the file location with a preset one ('/myfiles/' in this example)
        $path_parts = pathinfo($file_path);
        //var_dump($path_parts);
        $file_name = $path_parts['basename'];
        $file_ext = $path_parts['extension'];
        //$file_path  =$_SERVER['DOCUMENT_ROOT'] . $file_path;
        if (strpos($file_path, Yii::getPathOfAlias('webroot')) === false)
            $file_path = Yii::getPathOfAlias('webroot') . DIRECTORY_SEPARATOR . $file_path;
// allow a file to be streamed instead of sent as an attachment
        //$is_attachment = isset($_REQUEST['stream']) ? false : true;
// make sure the file exists  
        if (is_file($file_path)) {

            $file_size = filesize($file_path);

            $file = @fopen($file_path, "rb");

            if ($file) {
                // set the headers, prevent caching
                header("Pragma: public");
                header("Expires: -1");
                header("Cache-Control: public, must-revalidate, post-check=0, pre-check=0");
                header("Content-Disposition: attachment; filename=\"$file_name\"");

                // set appropriate headers for attachment or streamed file
                //if ($is_attachment)
                header("Content-Disposition: attachment; filename=\"$file_name\"");
                //else
                //  header('Content-Disposition: inline;');
                // set the mime type based on extension, add yours if needed.
                $ctype_default = "application/octet-stream";
                $content_types = array(
                    "exe" => "application/octet-stream",
                    "zip" => "application/zip",
                    "mp3" => "audio/mpeg",
                    "mpg" => "video/mpeg",
                    "avi" => "video/x-msvideo",
                );
                $ctype = isset($content_types[$file_ext]) ? $content_types[$file_ext] : $ctype_default;
                header("Content-Type: " . $ctype);

                //check if http_range is sent by browser (or download manager)
                if (isset($_SERVER['HTTP_RANGE'])) {
                    list($size_unit, $range_orig) = explode('=', $_SERVER['HTTP_RANGE'], 2);
                    if ($size_unit == 'bytes') {
                        //multiple ranges could be specified at the same time, but for simplicity only serve the first range
                        //http://tools.ietf.org/id/draft-ietf-http-range-retrieval-00.txt
                        list($range, $extra_ranges) = explode(',', $range_orig, 2);
                    } else {
                        $range = '';
                        header('HTTP/1.1 416 Requested Range Not Satisfiable');
                        exit;
                    }
                } else {
                    $range = '';
                }

                //figure out download piece from range (if set)
                list($seek_start, $seek_end) = explode('-', $range, 2);

                //set start and end based on range (if set), else set defaults
                //also check for invalid ranges.
                $seek_end = (empty($seek_end)) ? ($file_size - 1) : min(abs(intval($seek_end)), ($file_size - 1));
                $seek_start = (empty($seek_start) || $seek_end < abs(intval($seek_start))) ? 0 : max(abs(intval($seek_start)), 0);

                //Only send partial content header if downloading a piece of the file (IE workaround)
                if ($seek_start > 0 || $seek_end < ($file_size - 1)) {
                    header('HTTP/1.1 206 Partial Content');
                    header('Content-Range: bytes ' . $seek_start . '-' . $seek_end . '/' . $file_size);
                    header('Content-Length: ' . ($seek_end - $seek_start + 1));
                }
                else
                    header("Content-Length: $file_size");

                header('Accept-Ranges: bytes');

                set_time_limit(0);
                fseek($file, $seek_start);

                while (!feof($file)) {
                    print(@fread($file, 1024 * 8));
                    ob_flush();
                    flush();
                    if (connection_status() != 0) {
                        @fclose($file);
                        exit;
                    }
                }

                // file save was a success
                @fclose($file);
                exit;
            } else {
                // file couldn't be opened
                header("HTTP/1.0 500 Internal Server Error");
                exit;
            }
        } else {
            // file does not exist
            header("HTTP/1.0 404 Not Found");
            exit;
        }
    }

    /**
     * Get file size in kilobytes using the filesize() function.
     * @author hany antar <h.antar@nilecode.com>
     * @param string $file_path 'Requeried' path of the downloaded file ' ex: path/to/file
     * return $file_size_kb; the generated file size in kb 
     *    )
     * )
     */
    public static function getFileSizeKb($file_path) {
        $mediaUrl = $file_path->path . $file_path->file_name;
        $file_path = Yii::getPathOfAlias('webroot') . $mediaUrl;

// make sure the file exists

        if (is_file($file_path)) {

            $file_size = filesize($file_path);
            $file_kb = $file_size / (1024);
            $file_Size_kb = ceil($file_kb) . 'Kb';
            return $file_Size_kb;
        }
    }

    /**
     * Get Date form now.
     * @author Ahmed Abdelaziz <a.abdelaziz@nilecode.com>
     * @param int $period , The period in days we want to add or subtract from now
     * @param string $direction The Direction that will be used to calculate the period values "+" or "-", default "+"
     * return timestamp.
     */
    public static function getDateFromNow($period, $direction = "+") {
        return strtotime($direction . $period . " day");
    }

    /**
     * Set upload file Headers.
     * @author Ahmed Abdelaziz <a.abdelaziz@nilecode.com>
     * return void
     */
    public static function sendHeaders() {
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }

    /**
     * Upload file.
     * @author Ahmed Abdelaziz <a.abdelaziz@nilecode.com>
     * @param $path the $path to upload the file in.
     * @param $nameAttribute the value of the name attribute of the file input field, default: file.
     * return the uploaded file name .
     */
    public static function uploadFileWithPlUpload($path, $nameAttribute = 'file') {
        self::sendHeaders();
        $targetDir = $path;

        $cleanupTargetDir = true; // Remove old files

        $maxFileAge = 5 * 3600; // Temp file age in seconds
        // 5 minutes execution time
        @set_time_limit(5 * 60);

        // Uncomment this one to fake upload time
        // usleep(5000);
        // Get parameters
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '';

        // Clean the fileName for security reasons
        $fileName = preg_replace('/[^\w\._]+/', '_', $fileName);

        // Make sure the fileName is unique but only if chunking is disabled
        if ($chunks < 2 && file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName)) {
            $ext = strrpos($fileName, '.');
            $fileName_a = substr($fileName, 0, $ext);
            $fileName_b = substr($fileName, $ext);

            $count = 1;
            while (file_exists($targetDir . DIRECTORY_SEPARATOR . $fileName_a . '_' . $count . $fileName_b))
                $count++;

            $fileName = $fileName_a . '_' . $count . $fileName_b;
        }

        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
        // Create target dir
        if (!file_exists($targetDir))
            @mkdir($targetDir, 0777, true);

        // Remove old temp files	
        if ($cleanupTargetDir) {
            if (is_dir($targetDir) && ($dir = opendir($targetDir))) {
                while (($file = readdir($dir)) !== false) {
                    $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                    // Remove temp file if it is older than the max age and is not the current file
                    if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge) && ($tmpfilePath != "{$filePath}.part")) {
                        @unlink($tmpfilePath);
                    }
                }
                closedir($dir);
            } else {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
//                        return false;
            }
        }

        // Look for the content type header
        if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
            $contentType = $_SERVER["HTTP_CONTENT_TYPE"];

        if (isset($_SERVER["CONTENT_TYPE"]))
            $contentType = $_SERVER["CONTENT_TYPE"];
        var_dump($_FILES, $nameAttribute);
        // Handle non multipart uploads older WebKit versions didn't support multipart in HTML5
        if (strpos($contentType, "multipart") !== false) {
            if (isset($_FILES[$nameAttribute]['tmp_name']) && is_uploaded_file($_FILES[$nameAttribute]['tmp_name'])) {
                // Open temp file
                $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
                if ($out) {
                    // Read binary input stream and append it to temp file
                    $in = @fopen($_FILES[$nameAttribute]['tmp_name'], "rb");

                    if ($in) {
                        while ($buff = fread($in, 4096))
                            fwrite($out, $buff);
                    }
                    else
                        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
//                                        return false;
                    @fclose($in);
                    @fclose($out);
                    @unlink($_FILES[$nameAttribute]['tmp_name']);
                }
                else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
//                                return false;
            }
            else
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
//                        return false;
        } else {
            // Open temp file
            $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
            if ($out) {
                // Read binary input stream and append it to temp file
                $in = @fopen("php://input", "rb");

                if ($in) {
                    while ($buff = fread($in, 4096))
                        fwrite($out, $buff);
                }
                else
                    die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
//                                return false;

                @fclose($in);
                @fclose($out);
            }
            else
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
//                        return false;
        }

        // Check if file has been uploaded
        if (!$chunks || $chunk == $chunks - 1) {
            // Strip the temp .part suffix off 
            rename("{$filePath}.part", $filePath);
        }

        return array('filename' => $fileName, 'type' => mime_content_type($filePath), 'size' => $_FILES[$nameAttribute]['size'], 'path' => $filePath);
//        die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
    }

    public static function dateAfterDays($days, $from) {
        return strtotime('+' . $days . ' days', $from);
    }

    public static function daysBetweenTwoDates($date1, $date2) {
        $datediff = $date1 - $date2;
        return floor(abs($datediff) / (60 * 60 * 24));
    }

    public static function daysToMonths($days) {
        return floor($days / 30);
    }

    public static function monthsBetweenTwoDates($date1, $date2) {
        $diffDays = self::daysBetweenTwoDates($date1, $date2);
        return floor($diffDays / 30);
    }

    public static function dateToTimestamp($date, $format = 'd/m/yy') {
        $datetime = DateTime::createFromFormat($format, $date);
        return ($datetime) ? $datetime->getTimestamp() : false;
    }

}