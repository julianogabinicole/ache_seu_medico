/*
    Plugin Name: flexi-dropdown.js
    Description Tags: flexi-dropdown plugin is for basic use of dropdown.
    Created: 02/02/2016
    Version: 1.0
    Author: https://github.com/prashen
    Options:
        - dropdownWidth
        - dropdownTopAuto
        - customClass
*/
;
(function($, window, document, undefined) {
    var pluginName = 'flexidropdown';

    function flexidropdown(elem, options) {
        this.elem = elem;
        this._name = pluginName;
        this._defaults = $.fn.flexidropdown.defaults;
        this.options = $.extend({}, this._defaults, options);
        this.init();
    };

    // Avoid Plugin.prototype conflicts
    $.extend(flexidropdown.prototype, {

        // Initialization logic
        init: function() {
            this.create();
            this._option_dropdownWidth();
            this._option_dropdownTopAuto();
            this._option_customClass();
            this.buildCache();
            this.bindEvents();
        },

        // Remove plugin instance completely
        destroy: function() {
            this.unbindEvents();
            this.$element.removeData();
        },

        // creating the plugin detault feature
        create: function() {
            // binding click events
            $(this.elem).on("click", function() {
                $(this).children('.js-dp-click').toggleClass('target');
                $(this).children('.js-dp-content').toggleClass('toggleHideShow');
                $(this).children('.js-dp-click').parents('body').find('.js-dp-content').not($(this).children('.js-dp-content')).removeClass('toggleHideShow');
                $(this).parents('body').find('.target').not($(this).children('.js-dp-click')).removeClass('target');
            });
        },


        // dropdownWidth option instance
        _option_dropdownWidth: function() {
            // dropdownWidth - if it's not undefined && equal to true
            if (this.options.dropdownWidth !== 'undefined' && this.options.dropdownWidth == true) {
                $(this.elem).children('.js-dp-content').css({
                    width: '100%'
                });
            }
        },

        // dropdownTopAuto option instance
        _option_dropdownTopAuto: function() {
            // dropdownTopAuto - if it's not undefined && equal to true
            if (this.options.dropdownTopAuto !== 'undefined' && this.options.dropdownTopAuto == true) {
                var eleHeight;
                eleHeight = $(this.elem).children('.js-dp-click').innerHeight();
                $(this.elem).children('.js-dp-content').css({
                    top: eleHeight
                });
            }
        },

        // customClass option instance
        _option_customClass: function() {
            // customClass - if it's not undefined
            if (this.options.customClass !== 'undefined') {
                $(this.elem).addClass(this.options.customClass);
            }
        },

        // Cache DOM nodes for performance
        buildCache: function() {
            this.$element = $(this.element);
        },

        // Bind events that trigger methods
        bindEvents: function() {

            var plugin = this;
            plugin.$element.on('click' + '.' + plugin._name, function() {
                plugin.someOtherFunction.call(plugin);
            });
        },

        // Unbind events that trigger methods
        unbindEvents: function() {
            this.$element.off('.' + this._name);
        },

        // Create custom methods
        someOtherFunction: function() {
            alert('I promise to do something cool!');
            this.callback();
        },

        callback: function() {
            // Cache onComplete option
            var onComplete = this.options.onComplete;

            if (typeof onComplete === 'function') {
                onComplete.call(this.element);
            }
        }

    });


    $.fn.flexidropdown = function(options) {
        this.each(function() {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new flexidropdown(this, options));
            }
        });

        return this;
    };



    $.fn.flexidropdown.defaults = {
        dropdownWidth: false,
        dropdownTopAuto: true,
        customClass: 'undefined'
    };

})(jQuery, window, document);
