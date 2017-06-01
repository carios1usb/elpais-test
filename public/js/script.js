$(function() {
    // Punto 1.
    // Crear código para filtrar pacientes por nombre.
    var searchInput = $("input#searchPatient");
    searchInput.on("change keyup", function() {
    	if($(this).val().trim().length!=""){
    		searchPatient($(this).val());
    	}else{
    		$(".patient").show();
    		$("#message").hide();
    	}
    	
    });


	/*
     * Search patients by name
     * @param {string} input
     */
     function searchPatient(input) {
     	var message = $("#message");
     	var content = $("#content");
     	$(".patient").each(function(i,e) {
     		$(e).hide();
     	})
     	var divs = $(".patient .patientName:icontains('" + input + "')");
     	if(divs.length <= 0) {
     		message.show();
     		console.log(divs.length);
     	} else {
     		console.log(divs.length);
     		divs.parent().show();
     		message.hide();
     	}
     }
 });

// contains in div or content
jQuery.expr[':'].icontains = function(a,i,m) {
	return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
};