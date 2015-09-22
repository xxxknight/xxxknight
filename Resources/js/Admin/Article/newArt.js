$(function(){

	$("#title").keyup(function(){
		var title = $("#title").val();
		$("#dump-title").val(title);
	});

	$("#btnSave").click(function(){
		var title = $("#title").val().trim();
		if(title.length == 0){
			alert("标题为空。请重新填写！");
			return false;
		}
		if(title.length > 64){
			alert("标题长度超过64个字符。请重新填写！");
			return false;
		}
    $("#dump-title").val(title);
		$("#saveModal").modal("toggle");

	});

	$("#btnPreview").click(function(){
      $("#mymodal").modal("toggle");
  });

  $("#btnReset").click(function(){
      $("#title").val("");
      ue.setContent("");
      $("#dump-title").val("");

  });

  $(".tag-span").click(function(){
      var temp = $(this).clone();
      temp.children("i").remove();
      $("#t1").addTag(temp.text());
  });

  $("#btnCommit").click(function(){
    	var title = $("#title").val().trim();
    	var classid = $("#class").val();
    	var typeid = $("#type").val();
    	var flag = $("input[name='options']:checked").val();
    	var content = ue.getContent();
      var summary = ue.getContentTxt();
      var tags = $("#t1").val().trim();
      //alert(tags);

      if(!typeid){
      	alert("您还未选择分类!");
      	return false;
      }

      if(tags.length>=60){
        alert("标签长度过长,请移除部分标签！")
        return false;
      }

      $.post("/xxxknight/admin.php/Article/addArt",
        {
            "title": title,
            "classid": classid,
            "typeid": typeid,
            "flag": flag,
            "tags":tags,
            "content": content,
            "summary": summary,
        },
        function(data,status){
            alert(data);
            window.location.reload();//刷新当前页面.
        });
    });

});


$(function() {

    $('#t1').tagsInput({width:'auto'});
});