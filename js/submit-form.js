/**************************************************************
 * Script for form ajax processor handling
 *************************************************************/
(function($) {
    "use strict";

	var form="form-send.php";  // The PHP handler script used that we submit to

	// About Us Page Form Submission
	$(document).on('submit', '#contact-form', function() {
		var btnText = $('#submit').val();
		$('#submit').val('Sending...');
		$('#submit').attr('disabled', 'disabled');
	
		var name      = $('#contact-form .input_name').val();
		var email     = $('#contact-form .input_email').val();
		var message   = $('#contact-form .input_message').val();
		var from_form = 'about-us-page';
		$.ajax({
			type: "POST",
        	dataType: 'json',
        	url: form,
        	data: {from_form:from_form, name:name, email:email, message:message},
        	success: function(response) {
				$('.response').html(response);
				$('#submit').val(btnText);
				$('#submit').removeAttr('disabled');
				$('#submit').hide();
				$('#contact-form').trigger('reset');
			}
		});
		return false;  // Don't trigger normal form post, since this handles it
	});
			
	// Blog Page Comment Form Submission
	$(document).on('submit', '#commentform', function() {
    	var btnText = $('#submit').val();
    	$('#submit').val('Sending...');
    	$('#submit').attr('disabled', 'disabled');

    	var name      = $('#author').val();
    	var email     = $('#email').val();
		var url       = $('#url').val();
		var subject   = 'Blog Comment';
    	var message   = $('#comment').val();
    	var from_form = 'blogpage';
    	$.ajax({
        	type: "POST",
        	dataType: 'json',
        	url: form,
        	data: {from_form:from_form, name:name, email:email, url:url, subject:subject, message:message},
        	success: function(response) {
            	$('.response').html(response);
            	$('#submit').val(btnText);
            	$('#submit').removeAttr('disabled');
				$('#submit').hide();
            	$('#commentform').trigger('reset');
        	}
    	});
    	return false;  // Don't trigger normal form post, since this handles it
	});

})(jQuery);
