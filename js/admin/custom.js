/**
 * 
 * Main Class
 *
 * Nilecode(tm) : Rapid Development (http://www.nilecode.com)
 * Copyright 2011, Nilecode Software, Inc. (http://www.nilecode.com)
 *
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2011, Nilecode Software Foundation, Inc. (http://www.nilecode.com)
 * @link          http://nilecode.com
 * @package
 * @subpackage
 * @since         2011-10-31 Happy day :)
 * @license
 * @author        Ahmed Kamal - <a.kamal@nilecode.com>
 * @modified      2013-05-08    Ahmed Abdel Aziz - <a.abdelaziz@nilecode.com>
 */

/**
 * Main Class.
 */
function Main($) {
    /**
     * Used to store refrence to the current object, we need this when context conflict happenes with "this".
     *
     * @access private
     */
    var _self = this,
            /**
             * @access private
             */
            _config = {};

    /**
     * Used to get the current object reference.
     * 
     * @access private
     * @return Object
     */
    function _() {
        return _self;
    }

    /**
     * Used to set or get specific/all configuration(s).
     * 
     * @access public
     * @desc setter/getter of class params.  
     * @param  string the name of the parameter.
     * @param  mixed the value of the parameter.
     * @return mixed
     */
    _().config = function(key, val) {

        if (arguments.length === 0) {
            return _()._config;
        }

        switch (typeof(key)) {
            case 'object':
                for (var index in key) {
                    _config[index] = key[index];
                }

                break;

            case 'string':
                if (arguments.length === 1) {
                    return _config[key];
                }

                _config[key] = val;
                break;

            case 'number':
                if (_config.length > key) {

                    if (arguments.length === 2) {

                        _config[key] = val;
                    } else {

                        var i = 0;
                        for (var index in _config) {
                            if (++i === key) {
                                return _config[index];
                            }
                        }
                    }
                }

                return null;
                break;
        }

        return _();
    };

    /**
     * Used to intilaize the class.
     * 
     * @access public
     * @return bool
     */
    _().init = function() {
        // Removing no-js class
        $(document.documentElement).removeClass('no-js');
        _assignEvents();
        return _();
    };


    /**
     * Used to assign events on model related items.
     *
     * @access private
     * @return bool
     */
    function _assignEvents() {
        _generalEvents();
        _mediaEvents();
        _userEvents();
    }

    /**
     * Used to assign general events
     * @author Ahmed Abdelaziz <a.abdelaziz@nilecode.com>
     * @returns void
     */
    function _generalEvents() {
        //Date Pickers
//        $('.input-append.date input').datepicker({
//            autoclose: true,
//            todayHighlight: true
//        });
    }
    
    /**
     * Used to assign events on media 
     * @author Ahmed Saharf <a.sharaf@nilecode.com>
     * @returns void
     */
    function _mediaEvents() {

        //Call mediaOwners SetFeatured action
        $('body').on('click', _().config('mediaFeaturedButton'), function() {
            var $this = $(this);
            var id = $this.attr('data-record-id');
            $.ajax({
                url: config.fullUrl + '/admin/mediaOwners/SetFeatured/id/' + id,
                beforeSend: function() {
                    $this.val('Loading...');
                },
                success: function(result) {
                    $this.val(result);
                }
            });
            return false;
        });

        //View upload vildation errors on fancybox
        $('body').on('click', _().config('mediaUploadCustomError'), function() {
            var $this = $(this);
            $.fancybox({content: $this.next(_().config('mediaUploadValidationError'))});
            return false;
        });
    }

    /**
     * Used to assign events on user 
     * @author Ahmed Saharf <a.sharaf@nilecode.com>
     * @returns void
     */
    function _userEvents() {

        //Call mediaOwners SetFeatured action
        $('body').on('click', '.userBannedButton', function() {
            var $this = $(this);
            var id = $this.attr('data-record-id');
            $.ajax({
                url: config.fullUrl + '/admin/users/changeBan/id/' + id,
                beforeSend: function() {
                    $this.val('Loading...');
                },
                success: function(result) {
                    $this.val(result);
                }
            });
            return false;
        });

    }


    /**
     * After upload media file
     * @param obj data
     * @return void
     */
    _().xuploadAfterCompleted = function(data) {
        var responseObj = JSON.parse(data.jqXHR.responseText);
        if (typeof responseObj[0].error !== "undefined")
            return false;
        $.ajax({
            url: config.fullUrl + '/admin/media/xuploadAfterCompleted',
            type: 'POST',
            data: {xUpload: {response: data.jqXHR.responseText}},
            cache: false,
            success: function(result) {
                $.fn.yiiGridView.update('media-grid');
            }
        });
    };

    /**
     * After delete media file
     * @param obj data
     * @return void
     */
    _().xuploadAfterDestroyed = function(data) {
        if (!data.url)
            return false;
        $.ajax({
            url: config.fullUrl + '/admin/media/xuploadAfterDestroyed',
            type: 'POST',
            data: {xUpload: {filename: data.url.substr(data.url.lastIndexOf('/') + 1)}},
            cache: false,
            success: function(result) {
                $.fn.yiiGridView.update('media-grid');
            }
        });
    };

    /**
     * Assign product to order
     * @param string formId to be posted 
     * @return void
     */
    _().ordersProductsAssign = function(formId) {
        $.ajax({
            url: config.fullUrl + '/admin/ordersProducts/assign',
            type: 'POST',
            data: $(formId).serialize(),
            dataType: 'json',
            success: function(result) {
                if ("error" in result)
                    $('#pageAlerts').html(_().generateAlertObj('alert-error', result.error, true, 0));
                else {
                    $('#pageAlerts').html(_().generateAlertObj('alert-success', result.success, true, 2000));
                    $.fn.yiiGridView.update('orders-products-grid');
                }
            }
        });
        return false;
    };

    /**
     * Submits form by ajax
     * @access public
     * @param obj $oForm a <form> elemnt
     * @param string callBack JavaScript code/expressions to be Evaluated/Executed
     * @return bool
     */
    _().ajaxSubmitForm = function($oForm, callBack) {
        $.ajax({
            url: $oForm.attr('action'),
            type: 'POST',
            data: $oForm.serialize(),
            dataType: 'json',
            beforeSend: function() {},
            success: function(result) {
                _().alertResult(result);
                if(callBack)
                    eval(callBack);
            }
        });
        return false;
    };

    /**
     * Requests url by ajax
     * @access public
     * @param obj $oA an <a> element
     * @param string callBack JavaScript code/expressions to be Evaluated/Executed
     * @return bool
     */
    _().ajaxRequestUrl = function($oA, callBack) {
        $.ajax({
            url: $oA.attr('href'),
            dataType: 'json',
            beforeSend: function() {
                $oA.hide().after('<i>loading...</i>');
            },
            success: function(result) {
                $oA.show().next('i').remove();
                _().alertResult(result);
                if(callBack)
                    eval(callBack);
            }
        });
        return false;
    };
    
    /**
     * Serialize input by ajax
     * @access public
     * @param obj $oInput an input element with 'data-url' and 'data-result' attributes
     * @param string callBack JavaScript code/expressions to be Evaluated/Executed
     * @return bool
     */
    _().ajaxInputSerialize = function($oInput, callBack) {
        $.ajax({
            url: $oInput.attr('data-url'),
            type: 'POST',
            data: $oInput.serialize(),
            dataType: 'json',
            beforeSend: function() {},
            success: function(result) {
                $($oInput.attr('data-result')).html(result.html);
                if(callBack)
                    eval(callBack);
            }
        });
        return false;
    };

    
    /**
     * Alert result to spacific $alertArea
     * @author Ahmed Sharaf <a.sharaf@nilecode.com>
     * @access public
     * @param obj|string result
     * @param obj $alertArea
     */
    _().alertResult = function(result, $alertArea) {
        $alertArea = $alertArea ? $alertArea : $('#pageAlerts');
        $alertArea.html('');
        if(typeof(result) === 'object'){
            if ("success" in result)
                $alertArea.append(_().generateAlertObj('alert-success', result.success, true, 2000));
            if ("info" in result)
                $alertArea.append(_().generateAlertObj('alert-info', result.info, true, 2000));
            if ("warning" in result)
                $alertArea.append(_().generateAlertObj('alert-warning', result.warning, true, 0));
            if ("error" in result)
                $alertArea.append(_().generateAlertObj('alert-error', result.error, true, 0));
        }else
            $alertArea.html(result);
    };

    /**
     * Generates Alert Obj
     * @author Ahmed Sharaf <a.sharaf@nilecode.com>
     * @access public
     * @param string alertClass one of bootstrap alert classes ex: 'alert-error', 'alert-success', ...
     * @param string contents any html elements 
     * @param bool close wheather to add close link or not. 
     * @param int fadeOut number of milliseconds before automatically fadeOut, 0 = don't fadeOut 
     * @return obj
     */
    _().generateAlertObj = function(alertClass, contents, close, fadeOut) {
        var $alertObj = $('<div/>').addClass('alert in alert-block fade'),
                closeElm = (close === true) ? '<a class="close" data-dismiss="alert">×</a>' : '';

        if (fadeOut > 0)
            setTimeout(function() {
                $alertObj.fadeOut();
            }, fadeOut);

        return $alertObj.addClass(alertClass).html(closeElm + contents);
    };

}

window.oMain = window.oMain || {};

(function($) {
    $(function() {
        window.oMain = new Main($).config({
            //Post Selectors
            createTitleField: 'form.create #Posts_title',
            titleField: 'form #Posts_title',
            createSlugField: 'form.create #Posts_slug',
            slugField: 'form #Posts_slug',
            createPromotionCodeField: 'form.create #Promotions_code',
            generateCodeButton: 'form .generateCode',
            generateSlugButton: 'form .generateSlug',
            //Media Selectors
            mediaFeaturedButton: '.featuredButton',
            mediaUploadCustomError: '.uploadCustomError',
            mediaUploadValidationError: '.uploadValidationError',
        }).init();
    });
})(jQuery);
