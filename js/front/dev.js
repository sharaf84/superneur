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
     * Used to assign events.
     *
     * @access private
     * @return bool
     */
    function _assignEvents() {

        if (config.controller === 'site')
            _homeEvents();
        if (config.controller === 'orders')
            _ordersEvents();
    }


    /**
     * Used to assign events on home page 
     * @author Ahmed Sharaf <a.sharaf@nilecode.com>
     * @returns void
     */
    function _homeEvents() {
        _().playIframe($('.playIframe').first());
        $('.playIframe').click(function() {
            return _().playIframe($(this));
        });
    }

    /**
     * Used to assign events on orders page 
     * @author Ahmed Sharaf <a.sharaf@nilecode.com>
     * @returns void
     */
    function _ordersEvents() {
        _().activateOrderFooter();
        $('#categoriesList').change(function() {
            _().getProductsList($(this).val());
        });
    }

    /**
     * Play an iframe of $aObj link
     * @param {obj} $aObj of an a tag with attr 'data-iframe'
     * @returns {Boolean}
     */
    _().playIframe = function($aObj) {
        $('#playIframe').html($aObj.attr('data-iframe'));
        return false;
    }

    /**
     * Submits form by ajax
     * @access public
     * @param $form the form obj
     * @param bool alert whether to alert or return result.
     * @return bool
     */
    _().ajaxSubmitForm = function($form, alert) {
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: $form.serialize(),
            dataType: 'json',
            beforeSend: function() {
            },
            success: function(result) {
                if (!alert)
                    return result;

                if ("error" in result)
                    $('#pageAlerts').html(_().generateAlertObj('alert-error', result.error, false, 0));
                else
                    $('#pageAlerts').html(_().generateAlertObj('alert-success', result.success, false, 2000));
            }
        });
        return false;
    }

    _().getProductsList = function(categoryId) {
        $.ajax({
            url: config.fullUrl + '/orders/getProductsList/?categoryId=' + categoryId,
            dataType: 'json',
            success: function(result) {
                if ("error" in result)
                    $('#assignProductForm .alerts').html(_().generateAlertObj('alert-error', result.error, false, 2000));

                $('#productsList').easyDropDown('destroy');
                $('#productsList').html(result.options);
                $('#productsList').easyDropDown({
                    wrapperClass: 'dropdown',
                });
            }
        });
        return false;
    };

    /**
     * Assign product to order
     * @param string formId to be posted 
     * @return void
     */
    _().assignProductAfterSubmit = function(result) {

        $('#assignProductForm_es_, #assignProductForm .alerts').html('');

        if ("error" in result)
            $('#assignProductForm_es_').html(result.error).show();
        else {
            $('#assignProductForm .alerts').html(_().generateAlertObj('alert-success', result.success, false, 2000));
            $.fn.yiiListView.update('ordersProductsList');
            if ("points" in result)
                _().updateTotalPoints(result.points);
            _().activateOrderFooter();
        }
    }

    /**
     * Ajax call orders deleteProduct action
     * @access public
     * @param {obj} $aObj of an a tag
     * @return bool
     */
    _().deleteProduct = function($aObj) {
        $.ajax({
            url: $aObj.attr('href'),
            type: 'POST',
            dataType: 'json',
            beforeSend: function() {
                return confirm('Are you sure you want to delete this item?');
            },
            success: function(result) {
                $.fn.yiiListView.update('ordersProductsList');
                if ("points" in result)
                    _().updateTotalPoints(result.points);
                _().activateOrderFooter();
            }
        });
        return false;
    }

    /**
     * Updates order total points
     * @access public
     * @param {int} ponits
     */
    _().updateTotalPoints = function(points) {
        $('#totalPoints').html(points);
    }

    _().activateOrderFooter = function() {
        if (parseInt($('#totalPoints').text()) > 0)
            $('#orderFooter .target').addClass('active');
        else
            $('#orderFooter .target').removeClass('active');
    }

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
    }

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