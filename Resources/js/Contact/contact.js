$(function(){
	$("#sub").click(function(){
		var option = $("input[name='options']:checked").val();
		var email = $("#email").val();
		var title = $("#title").val();
		var summary = $("#summary").val();
		if(!checkEmail(email)){
			alert("邮箱格式不合法！");
			return false;
		}
		if(!checkLength(title,20,5)){
			alert("问题标题长度不合法，请重新填写！");
			return false;
		}
		if(!checkLength(summary,200,0)){
			alert("问题描述长度不合法，请重新填写！");
			return false;
		}
		$.post("/xxxknight/index.php/Contact/submitContact",
        {
            "option": option,
            "email": email,
            "title": title,
            "summary": summary,
        },
        function(data,status){
            alert(data);
        });
		
	});
})


function checkEmail(str) {
	var reg = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
	return reg.test(str);
}

function checkLength(str,max,min) {
	str = str.trim();
	if(str.length<=max && str.length>=min){
		return true;
	}else{
		//alert("数据长度不合法.");
		return false;
	}
}