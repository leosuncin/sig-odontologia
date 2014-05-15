define(function() {
    return function(errorMap, errorList) {
        $.each(this.successList, function(index, value) {
            return $(value).popover("hide");
        });
        return $.each(errorList, function(index, value) {
            var _popover;
            _popover = $(value.element).popover({
                trigger: "manual",
                placement: "right",
                content: value.message,
                template: "<div class=\"popover\"><div class=\"arrow\"></div><div class=\"popover-inner\"><div class=\"popover-content\"></div></div></div>"
            });
            _popover.data("popover").options.content = value.message;
            return $(value.element).popover("show");
        });
    };
});