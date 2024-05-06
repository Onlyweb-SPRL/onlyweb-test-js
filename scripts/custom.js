'use strict';
$(document).ready(function(){
    $('#menuClose').click(function(e){
		e.preventDefault();
        $('#menu ul').toggle();
	});
});
/*
$( window ).resize(function() {
    var w_site = $(window).width();	
    if(w_site>689){
        if($('#menu ul:hidden')){
            $('#menu ul').css('display','block');
        }
    }
});
*/

