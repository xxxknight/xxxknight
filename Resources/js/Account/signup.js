$(function() {
	var error=new Array();	
	
	$('#inputUsername').blur(function() {
		 var username = $(this).val();
		 if (!checkUsername(username)) {
			    error['username']=1;
			    $('#err1').html('用户名为6到20个字符');
			    $('#err1').show();
		 }else{
			 $.get('/xxxknight/index.php/Account/checkName',{'username':username},function(data){
				   if(data == 0){
					 error['username']=1;
					 $('#err1').html('该用户名已注册');
					 $('#err1').show();
				   }else{
					 error['username']=0;
					 $('#err1').html('');
					 $('#err1').hide();
				   }
			  });
		 }
	});
	
	$("#inputEmail").blur(function(){
		var email = $("#inputEmail").val();
		if (!checkEmail(email)) {
			error['email']=1;
			 $('#err2').html('邮箱格式错误');
			 $('#err2').show();
			 
		}else{
			error['email']=0;
			$('#err2').html('');
			$('#err2').hide();
		}
	});
	
	$("#inputPassword").keyup(function(){
		var password = $("#inputPassword").val();
		if (!checkPassword(password)) {
			error['password']=1;
			 $('#err3').html('密码应为6到20位字符');
			 $('#err3').show();
		}else{
			error['password']=0;
			$('#err3').html('');
			$('#err3').hide();
		}
	});
	
	$("#sub").click(function() {
		var username = $("#inputUsername").val();
		var email = $("#inputEmail").val();
		var password = $("#inputPassword").val();

		if(error['username'] == 1 || error['email'] == 1 || error['password'] == 1){
			return false;
		}

	});
})

function checkEmail(str) {
	var reg = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
	return reg.test(str);
}

function checkUsername(str) {
	var reg = /^[a-zA-Z0-9]{6,20}$/;
	return reg.test(str);
}

function checkPassword(str) {
	var reg = /^[a-zA-Z0-9]{6,20}$/;
	return reg.test(str);
}
