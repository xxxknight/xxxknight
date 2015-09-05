$(function(){

	$("#updateAlbum").click(function(){
		$("#albumModal").modal("toggle");
	});

	$("#deleteAlbum").click(function(){
		$("#delete-alert").show();
	});

	$("#close-delete").click(function(){
		$("#delete-alert").hide();
	});

	$("#cancel-delete").click(function(){
		$("#delete-alert").hide();
	});

	$("#confirm-delete").click(function(){
		var albumid = $("#albumid").val();
    	$.get("/xxxknight/admin.php/Album/deleteAlbum",
      			{'id':albumid},
      			function(data,status){
      			alert(data);
      			window.location.href="/xxxknight/admin.php/Album/manageAlbum";
    	});
	});
	
})

function deletePicture(id){
	
}

function checkSaveUpdateAlbum(){
	var albumid = $("#albumid").val();
	var name = $("#name").val().trim();
	var cover = $("#cover").val();
	var summary = $("#summary").val();

	if(name.length<1 || name.length>20){
			alert("相册名应为1到20个字符");
			return false;
	}
	return true;
}