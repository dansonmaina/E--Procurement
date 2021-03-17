$( document ).ready(function() {
    $('.select-language').change(function() {
	    var selectVal = $('.select-language select').val();
	    
	    $.ajax({
            url: 'selectlang.php?language=' + selectVal,
            method: 'get',
            async: false,
            success: function(data) {

               location.reload();

            },
            fail: function() {

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {

            }
        });
	    
	});
	
	$('.select-role').change(function() {
	    var selectVal = $('.select-role select').val();
	    console.log(selectVal);
		window.location = "selectrole.php?role=" + selectVal;
	});
});

function backToLogin(){
	window.location = "logout.php";
}

const queryString = window.location.search;
var xmlhttp = new XMLHttpRequest(); 

xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == XMLHttpRequest.DONE) {   // XMLHttpRequest.DONE == 4
       if (xmlhttp.status == 200) {
           document.getElementById("side-menu").innerHTML = xmlhttp.responseText;
       }
       else if (xmlhttp.status == 400) {
          alert('There was an error 400');
       }
       else {
           alert('something else other than 200 was returned');
       }
    }
};

xmlhttp.open("GET", 'menu_new.php' + queryString, true);
xmlhttp.send();