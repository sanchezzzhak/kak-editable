(function ($) {
    "use strict";

    var Editable = function (element, options) {
        var self = this;
        self.element = $(element);
        self.init(options);
        self.destroy();
        self.create();
    };

    /**
     * @type {{constructor: Function, init: Function, destroy: Function, create: Function}}
     */
    Editable.prototype = {
        constructor: Editable,
        /**
         * @param options
         */
        init: function (options) {
            var self = this, $el = self.element;
            self.$close = $el.find('.close');
            self.$click  = $el.find('.kak-editable-click');
            self.$popover  = $el.find('.kak-editable-popover');

            $.each(options, function (key, value) {
                self[key] = value;
            });

            $el.triggerHandler('init',this);
        },
        destroy : function(){
            var self = this, $el = self.element;
            $el.triggerHandler('destroy',this);
        },
        create: function(){
            var self = this, $el = self.element;
            var delay = 'fast';

            self.$click.on('click',function(e){
                self.$popover.fadeIn(delay);
            });
            $el.triggerHandler('create',this);

        },


    };

    $.fn.editable = function (option) {
        var args = Array.apply(null, arguments);
        args.shift();
        return this.each(function () {
            var $this = $(this), data = $this.data('editable'), options = typeof option === 'object' && option;
            if (!data) {
                data = new Editable(this, $.extend({}, $.fn.editable.defaults, options, $(this).data()));
                $this.data('editable', data);
            }
            if (typeof option === 'string') {
                data[option].apply(data, args);
            }
        });
    };
    $.fn.editable.defaults = {
        valueIfNull: '<em>(not set)</em>',
    };
    $.fn.editable.Constructor = Editable;

})(window.jQuery);