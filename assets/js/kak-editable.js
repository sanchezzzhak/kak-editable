(function ($) {
    "use strict";

    var Editable = function (element, options) {
        var self = this;
        self.element = $(element);
        self.init(options);
        self.destroy();
        self.create();
    };

    Editable.prototype = {
        constructor: Editable,
        init: function (options) {
            var self = this, $el = self.element;
        },
        destroy : function(){
            var self = this, $el = self.element;
        },
        create: function(){
            var self = this, $el = self.element;
        }
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

    $.fn.editable.Constructor = Editable;

})(window.jQuery);