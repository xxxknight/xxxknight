$(function(){
	$("#sub").click(function(){
		var aid = $("#sub-aid").val();
		var content = $("#sub-content").val().trim();
		if(!content){
			alert("评论不能为空！");
			return false;
		}else if (content.length>200) {
			alert("评论内容应为1到200个字符! ");
			return false;
		}else{
            $.post("/xxxknight/index.php/Article/submitComment",
            {
                "aid": aid,
                "content": content
            },
            function(data,status){
            alert(data);
            getData(1);
            $("#sub-content").val("");
            });
		}

	})
})