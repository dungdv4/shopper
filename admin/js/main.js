$( function() {
	var searchMaxDate = "-1m";
	$( "#birthday" ).datepicker(
		{
			dateFormat: "dd-mm-yy",
			maxDate: searchMaxDate,
			changeYear: true,
			changeMonth: true,
			yearRange: "1900:2017"
		}
	);
});


function getDicttrict(id){
	$.post("getdictrict.php",{'id':id}, function(data){
    	$("#district").html(data);
	});
}
function getWard(id){
	// alert(id);
	$.post("getward.php",{'id':id}, function(data){
    	$("#ward").html(data);
	});
}