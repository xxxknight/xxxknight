$(function(){

	$("#updateAlbum").click(function(){
		$("#albumModal").modal("toggle");
	});

	$("#deleteAlbum").click(function(){
		$("#delete-alert").show();
	});

	$("#deleteAlbum").click(function(){
		$("#delete-alert").show();
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