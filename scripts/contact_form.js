'use strict';

//FUNCTIONS
function validateContact() {
    var valid = true;	
    //INPUT TXT
    if(!$("#user_name").val()) {
        $("#user_name").css('background-color','#efc5c5');
        valid = false;
    }else{
        $("#user_name").css('background-color','#fff');
    }
    //INPUT EMAIL
    if(!$("#user_mail").val()) {
        $("#user_mail").css('background-color','#efc5c5');
        valid = false;
    }
    if(!$("#user_mail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
        $("#user_mail").css('background-color','#efc5c5');
        valid = false;
    }
    //RGPD
    if(!$("#user_rgpd").prop('checked') == true) {
        $("#user_rgpd").parent().css('color','#ff0000');
        valid = false;
    }else{
        $("#user_rgpd").parent().css('color','#21273d');
    }

    if(!$("#user_msg").val()) {
        $("#user_msg").css('background-color','#efc5c5');
        valid = false;
    }else{
        $("#user_msg").css('background-color','#fff');
    }
    return valid;
}


function sendContact() {
    var valid;	
    valid = validateContact();
    if(valid) {
        jQuery.ajax({
            url: "/forms/form_contact.php",
            data:{
                lg: $("#form_lg").val(),
                user_name: $("#user_name").val(),
                user_soc: $("#user_soc").val(),
                user_func: $("#user_func").val(),
                user_address: $("#user_address").val(),
                user_phone: $("#user_phone").val(),
                user_mail: $("#user_mail").val(),
                user_msg: $("#user_msg").val(),
                user_rgpd: $("#user_rgpd").val(),
                'g-recaptcha-response' : $("#g-recaptcha-response").val()
            },
            type: "POST",
            success:function(data){
                $("#formStatus").html(data);
            },
            error:function (){}
        });
    }
}


//READY
$(document).ready(function(){

	$('.btnSendForm').click(function(e){
		e.preventDefault();
		console.log("Form to send");
		sendContact();
	});

});

