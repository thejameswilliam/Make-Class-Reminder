(function( root, $, undefined ) {
	"use strict";

	$(function () {





    $(document).on('focus', '#instructorID', function() {
        if (!$(this).data('ui-autocomplete')) { // Prevent reinitializing autocomplete
            $(this).autocomplete({
                source: function(request, response) {
                    $.ajax({
                        type: 'POST',
                        url: svgvars.ajaxUrl,
                        data: {
                            action: "mindevents_get_instructors",
                            instructorID: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(data) {
                                return {
                                    label: data.name,
                                    value: data.id
                                };
                            }));
                        }
                    });
                },
                minLength: 3
                
            });
        }
    });




});


} ( this, jQuery ));
