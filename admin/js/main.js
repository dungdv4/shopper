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
var appendString = "";
$(function() {
$("#file").change(function() {
	
	if(appendString==""){
	 appendString = "<div id=\"image_preview\"><img id=\"previewing\" src=\"noimage.png\" /></div>";
	 //alert(appendString);
	 this.append(appendString);
	}

$("#message").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing').attr('src','noimage.png');
$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
this.value="";
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);

//alert(file);
$('#image_preview').append('<a class="remove" href="#">Remove</a>');
          $(".remove").click(function(){
          //	$(this).parent("#image_preview").value = "";
            $(this).parent("#image_preview").remove();
            appendString = "";
          });
}
});
});
function imageIsLoaded(e) {
$("#file").css("color","green");
$('#image_preview').css("display", "block");
$('#previewing').attr('src', e.target.result);
$('#previewing').attr('width', '250px');
$('#previewing').attr('height', '230px');
}
