jQuery(function ($) {  // use $ for jQuery
	"use strict";

	// Import demo content located in tools
	$(document).on('click', '.import-demo-button', function() {
        var nonce = $('#import_demo_content').val();
        $('.import-demo-button').attr('disabled', 'disabled');
		$('.demo-import-fail-div').addClass('hidden'); // just in case it's shown from a previous fail
        $('.demo-import-wait-div').removeClass('hidden');

        // get the button selected
        var demoChoice = $('.import-demo-choice :selected').val();
        // 1 = main demo
        // 2 = single page demo
        if (!demoChoice) {
            demoChoice = 1;
        }
        $.ajax({
            type : "post",
            dataType : "json",
            url : tfnAdmin.adminUrl,
            data : {action : "import_demo_content", nonce: nonce, demo_choice: demoChoice},
            success: function(response) {
                if(response.type == "success") {
                    var id = 3;
                    $('.demo-import-wait-div').addClass('hidden');
                    $('.demo-import-success-div').removeClass('hidden');
                    $('.import-demo-button').fadeOut();
                    alert('Demo Content Has been Imported!');
                } else {
                    $('.import-demo-button').removeAttr('disabled');
                    $('.demo-import-wait-div').addClass('hidden');
                    $('.demo-import-fail-div').removeClass('hidden');
                }
            }
        });
        return false;
    });
		

});



