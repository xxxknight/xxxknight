$(function(){
	$("#sub-info").click(function(){
		var id = $("#uid").val();
		var username = $("#username").val().trim();
		var email = $("#email").val().trim();
		var sex = $("input[name='options']:checked").val();
		var phone = $("#phone").val().trim();
		var birth = $("#birth").val();

		if(!checkUsername(username)){
			alert("用户名不符合要求");
			return false;
		}

		if(!checkEmail(email)){
			alert("邮箱格式不符合要求");
			return false;
		}
		if(!checkPhone(phone)){
			alert("联系方式不符合要求");
			return false;
		}

		$.post(
			"/xxxknight/admin.php/System/saveProfile",
			{
				"id" : id ,
				"username" : username,
				"email" : email,
				"sex" : sex,
				"phone" : phone,
				"birth" :birth
			},
			function(data){
				alert(data);
			}
		);
	});

	$("#sub-pw").click(function(){
		var id = $("#uid").val();
		if(!checkPassword()){
			alert("密码长度不符合要求！");
			return false;
		}

		var password = $("#password").val();
		var repassword = $("#repassword").val();
		if(password != repassword){
			alert("两次密码输入不一致！");
			return false;
		}

		$.post(
			"/xxxknight/admin.php/System/savePassword",
			{
				"id" : id ,
				"password" : password,
			},
			function(data){
				alert(data);
			}
		);

	});
})

function checkEmail(str) {
	var reg = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
	return reg.test(str);
}

function checkUsername(name){
	if(name.length >= 6 && name.length<=20){
		return true;
	}else{
		return false;
	}
}

function checkPhone(phone){
	var reg = /^1[0-9]{10}$/;
	return reg.test(phone);
}

function checkPassword(){
	var pw = $("#password").val().trim();
	if(pw.length >= 6 && pw.length<=20){
		return true;
	}else{
		return false;
	}
}
