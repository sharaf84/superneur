<?php

/**
 * Helpers class.
 */
class Helpers {

    public static $countryPhoneCodes = array(
        93 => "Afghanistan",
        355 => "Albania",
        213 => "Algeria",
        1 => "American Samoa",
        376 => "Andorra",
        244 => "Angola",
        1 => "Anguilla",
        1 => "Antigua and Barbuda",
        54 => "Argentina",
        374 => "Armenia",
        297 => "Aruba",
        247 => "Ascension",
        61 => "Australia",
        43 => "Austria",
        994 => "Azerbaijan",
        1 => "Bahamas",
        973 => "Bahrain",
        880 => "Bangladesh",
        1 => "Barbados",
        375 => "Belarus",
        32 => "Belgium",
        501 => "Belize",
        229 => "Benin",
        1 => "Bermuda",
        975 => "Bhutan",
        591 => "Bolivia",
        387 => "Bosnia and Herzegovina",
        267 => "Botswana",
        55 => "Brazil",
        1 => "British Virgin Islands",
        673 => "Brunei",
        359 => "Bulgaria",
        226 => "Burkina Faso",
        257 => "Burundi",
        855 => "Cambodia",
        237 => "Cameroon",
        1 => "Canada",
        238 => "Cape Verde",
        1 => "Cayman Islands",
        236 => "Central African Republic",
        235 => "Chad",
        56 => "Chile",
        86 => "China",
        57 => "Colombia",
        269 => "Comoros",
        242 => "Congo",
        682 => "Cook Islands",
        506 => "Costa Rica",
        385 => "Croatia",
        53 => "Cuba",
        357 => "Cyprus",
        420 => "Czech Republic",
        243 => "Democratic Republic of Congo",
        45 => "Denmark",
        246 => "Diego Garcia",
        253 => "Djibouti",
        1 => "Dominica",
        1 => "Dominican Republic",
        670 => "East Timor",
        593 => "Ecuador",
        20 => "Egypt",
        503 => "El Salvador",
        240 => "Equatorial Guinea",
        291 => "Eritrea",
        372 => "Estonia",
        251 => "Ethiopia",
        500 => "Falkland (Malvinas) Islands",
        298 => "Faroe Islands",
        679 => "Fiji",
        358 => "Finland",
        33 => "France",
        594 => "French Guiana",
        689 => "French Polynesia",
        241 => "Gabon",
        220 => "Gambia",
        995 => "Georgia",
        49 => "Germany",
        233 => "Ghana",
        350 => "Gibraltar",
        30 => "Greece",
        299 => "Greenland",
        1 => "Grenada",
        590 => "Guadeloupe",
        1 => "Guam",
        502 => "Guatemala",
        224 => "Guinea",
        245 => "Guinea-Bissau",
        592 => "Guyana",
        509 => "Haiti",
        504 => "Honduras",
        852 => "Hong Kong",
        36 => "Hungary",
        354 => "Iceland",
        91 => "India",
        62 => "Indonesia",
        870 => "Inmarsat Satellite",
        98 => "Iran",
        964 => "Iraq",
        353 => "Ireland",
        972 => "Israel",
        39 => "Italy",
        225 => "Ivory Coast",
        1 => "Jamaica",
        81 => "Japan",
        962 => "Jordan",
        7 => "Kazakhstan",
        254 => "Kenya",
        686 => "Kiribati",
        965 => "Kuwait",
        996 => "Kyrgyzstan",
        856 => "Laos",
        371 => "Latvia",
        961 => "Lebanon",
        266 => "Lesotho",
        231 => "Liberia",
        218 => "Libya",
        423 => "Liechtenstein",
        370 => "Lithuania",
        352 => "Luxembourg",
        853 => "Macau",
        389 => "Macedonia",
        261 => "Madagascar",
        265 => "Malawi",
        60 => "Malaysia",
        960 => "Maldives",
        223 => "Mali",
        356 => "Malta",
        692 => "Marshall Islands",
        596 => "Martinique",
        222 => "Mauritania",
        230 => "Mauritius",
        262 => "Mayotte",
        52 => "Mexico",
        691 => "Micronesia",
        373 => "Moldova",
        377 => "Monaco",
        976 => "Mongolia",
        382 => "Montenegro",
        1 => "Montserrat",
        212 => "Morocco",
        258 => "Mozambique",
        95 => "Myanmar",
        264 => "Namibia",
        674 => "Nauru",
        977 => "Nepal",
        31 => "Netherlands",
        599 => "Netherlands Antilles",
        687 => "New Caledonia",
        64 => "New Zealand",
        505 => "Nicaragua",
        227 => "Niger",
        234 => "Nigeria",
        683 => "Niue Island",
        850 => "North Korea",
        1 => "Northern Marianas",
        47 => "Norway",
        968 => "Oman",
        92 => "Pakistan",
        680 => "Palau",
        507 => "Panama",
        675 => "Papua New Guinea",
        595 => "Paraguay",
        51 => "Peru",
        63 => "Philippines",
        48 => "Poland",
        351 => "Portugal",
        1 => "Puerto Rico",
        974 => "Qatar",
        262 => "Reunion",
        40 => "Romania",
        7 => "Russian Federation",
        250 => "Rwanda",
        290 => "Saint Helena",
        1 => "Saint Kitts and Nevis",
        1 => "Saint Lucia",
        508 => "Saint Pierre and Miquelon",
        1 => "Saint Vincent and the Grenadines",
        685 => "Samoa",
        378 => "San Marino",
        239 => "Sao Tome and Principe",
        966 => "Saudi Arabia",
        221 => "Senegal",
        381 => "Serbia",
        248 => "Seychelles",
        232 => "Sierra Leone",
        65 => "Singapore",
        421 => "Slovakia",
        386 => "Slovenia",
        677 => "Solomon Islands",
        252 => "Somalia",
        27 => "South Africa",
        82 => "South Korea",
        34 => "Spain",
        94 => "Sri Lanka",
        249 => "Sudan",
        597 => "Suriname",
        268 => "Swaziland",
        46 => "Sweden",
        41 => "Switzerland",
        963 => "Syria",
        886 => "Taiwan",
        992 => "Tajikistan",
        255 => "Tanzania",
        66 => "Thailand",
        228 => "Togo",
        690 => "Tokelau",
        1 => "Trinidad and Tobago",
        216 => "Tunisia",
        90 => "Turkey",
        993 => "Turkmenistan",
        1 => "Turks and Caicos Islands",
        688 => "Tuvalu",
        256 => "Uganda",
        380 => "Ukraine",
        971 => "United Arab Emirates",
        44 => "United Kingdom",
        1 => "United States of America",
        1 => "U.S. Virgin Islands",
        598 => "Uruguay",
        998 => "Uzbekistan",
        678 => "Vanuatu",
        379 => "Vatican City",
        58 => "Venezuela",
        84 => "Vietnam",
        681 => "Wallis and Futuna",
        967 => "Yemen",
        260 => "Zambia",
        263 => "Zimbabwe"
    );

    /**
     * Get user banned button for grid. 
     * @param obj $data
     * @return string
     */
    public static function userBannedButton($data) {
        if ($data->type == Users::TYPE_MASTER)
            return $data->getBannedList(0);
        return CHtml::button($data->getBannedList($data->banned), array('class' => 'userBannedButton', 'data-record-id' => $data->id));
    }
    /**
     * Displaies media item for grid.
     * @param obj $data of Media
     * @param bool $fancy whether to popup or not
     * @return string
     */
    public static function mediaDisplay($data, $fancy = true) {
        if (strpos($data->mime, 'image') !== false)
            return CHtml::link(CHtml::image(Utilities::getImgUrl($data->path, $data->file_name, 'micro')), Utilities::getImgUrl($data->path, $data->file_name), array('class' => $fancy ? 'fancyImg' : '', 'target' => '_blank'));
        elseif (strpos($data->mime, 'video') !== false || strpos($data->mime, 'audio') !== false)
            return self::mediaPlayLink($data, $fancy) . ' | ' . CHtml::link('Download', Yii::app()->createUrl(Yii::app()->controller->id . '/downloadMedia', array('name' => $data->file_name)));
        else
            return CHtml::link('Download', Yii::app()->createUrl(Yii::app()->controller->id . '/downloadMedia', array('name' => $data->file_name)));
    }
    
    /**
     * mediaView for grid. 
     * @param obj $data
     * @return string
     */
    public static function mediaView($data, $fancy = true) {
        if (strpos($data->mime, 'image') !== false)
            return CHtml::link(CHtml::image(Utilities::getImgUrl($data->path, $data->file_name, 'micro')), Utilities::getImgUrl($data->path, $data->file_name), array('class' => $fancy ? 'fancyImg' : '', 'target' => '_blank'));
        elseif (strpos($data->mime, 'video') !== false || strpos($data->mime, 'audio') !== false)
            return self::playLink($data, $fancy) . ' | ' . CHtml::link('Download', Yii::app()->createUrl(Yii::app()->controller->id . '/downloadMedia', array('name' => $data->file_name)));
        else
            return CHtml::link('Download', Yii::app()->createUrl(Yii::app()->controller->id . '/downloadMedia', array('name' => $data->file_name)));
    }
    
    /**
     * mediaView for grid. 
     * @param obj $data
     * @return string
     */
    public static function documentsView($data, $type = 'attachment', $fancy = true) {
        if (strpos($data->mime, 'image') !== false)
            return CHtml::link(($type == 'attachment') ? '<span class="image"></span><span class="attachment_title">'.$data->title.'</span>' : $data->title, Utilities::getImgUrl($data->path, $data->file_name), array('class' => $fancy ? 'fancyImg' : '', 'target' => '_blank'));
        elseif (strpos($data->mime, 'video') !== false || strpos($data->mime, 'audio') !== false){
            $mimType = (strpos($data->mime, 'video') !== false) ? 'video' : 'audio';
            return self::playLink($data, $fancy, ($type == 'attachment') ? '<span class="' . $mimType . '"></span><span class="attachment_title">'.$data->title.'</span>' : $data->title) . ' ' . CHtml::link('Download', Yii::app()->createUrl(Yii::app()->controller->id . '/downloadMedia', array('name' => $data->file_name)));
        }
        else
            return CHtml::link(($type == 'attachment') ? '<span class="text"></span><span class="attachment_title">'.$data->title.'</span>' : $data->title, Yii::app()->createUrl(Yii::app()->controller->id . '/downloadMedia', array('name' => $data->file_name)));
    }
    
    /**
     * mediaView for grid. 
     * @param obj $data
     * @return string
     */
    public static function logoView($logoName, $logoPath, $fancy = true) {
            return CHtml::link(CHtml::image(Utilities::getImgUrl($logoPath, $logoName, 'micro')), Utilities::getImgUrl($logoPath, $logoName), array('class' => $fancy ? 'fancyImg' : '', 'target' => '_blank'));
    }
    
    /**
     * mediaView for grid. 
     * @param obj $data
     * @return string
     */
    public static function portfolioMediaView($data, $extension, $image, $fancy = true) {
      //CHtml::image(Utilities::getImgUrl($data->path, $data->file_name, 'micro'))   ////////CHtml::image(Yii::app()->getBaseUrl(true) . "/images/front/portfolio/" . $image)
        if (strpos($data->mime, 'image') !== false){
            return CHtml::link(CHtml::image(Utilities::getImgUrl($data->path, $data->file_name, 'portfolio')), Utilities::getImgUrl($data->path, $data->file_name), array('class' => $fancy ? "fancyImg $extension img" : "$extension img", 'target' => '_blank'));
        }
        elseif (strpos($data->mime, 'video') !== false || strpos($data->mime, 'audio') !== false){
            return CHtml::link(CHtml::image(Yii::app()->getBaseUrl(true) . "/images/front/portfolio/" . $image), Yii::app()->createUrl(Yii::app()->controller->id . '/playMedia', array('name' => $data->file_name)), array('class' => $fancy ? "fancyPlay $extension icon" : "$extension icon", 'data-fancybox-type' => 'ajax', 'target' => '_blank'));
        }
        else{
            return CHtml::link(CHtml::image(Yii::app()->getBaseUrl(true) . "/images/front/portfolio/" . $image), Yii::app()->createUrl(Yii::app()->controller->id . '/downloadMedia', array('name' => $data->file_name)), array('class' => "icon"));
        }
    }

    public static function playLink($data,  $fancy = true, $text = 'Play') {
        return CHtml::link($text, Yii::app()->createUrl(Yii::app()->controller->id . '/playMedia', array('name' => $data->file_name)), array('class' => $fancy ? 'fancyPlay' : '', 'data-fancybox-type' => 'ajax', 'target' => '_blank'));
    }

    public static function featuredButton($data) {
        return CHtml::button($data->getFeaturedList($data->featured), array('class' => 'featuredButton', 'data-record-id' => $data->id));
    }
    public static function getPaymentGateway($data, $link = true) {
        if($data->paypal)
            return ($link === true) ? CHtml::link(Yii::t('default', 'Paypal'), Yii::app()->createUrl('admin/paypal/view', array('id' => $data->paypal->id))) : Yii::t('default', 'Paypal');
        else
            return Yii::t('default', 'Superneur');
    }

    /**
     * getCountriesList
     * @param string $key
     * @param string $langId language id
     * @return mixed array of countries key => val based on system.i18n.data language id file
     * or string of country value based on key
     */
    public static function getCountriesList($key = null, $langId = 'en') {
        $locale = require(Yii::getPathOfAlias('system.i18n.data') . DIRECTORY_SEPARATOR . $langId . '.php');
        $countries = array_slice($locale['territories'], 34);
        asort($countries);
        if ($key !== null)
            return array_key_exists($key, $countries) ? $countries[$key] : null;
        return $countries;
    }

    /**
     * Removes key prefix from array
     * @param arry $arr
     * @param string $prefix to be removed
     * @return array
     */
    public static function removeKeyPrefix(array $arr, $prefix) {
        $return = array();
        foreach ($arr as $key => $value) {
            if (strpos($key, $prefix) === 0)
                $key = substr($key, strlen($prefix));
            if (is_array($value))
                $value = removePrefix($value);
            $return[$key] = $value;
        }
        return $return;
    }

}