var error = new Array();
$(function(){
	$("#btn-keyword").click(function(){
		$("#kid").val("");
  		$("#kw-title").text("新增关键字");
  		$("#name").val("");
  		$("#value").val("");
  		$("#option1").prop("checked",true);
  		$("#type").val(0);

		$("#btnSave").show();
		$("#btnUpdate").hide();
		$("#keywordModal").modal("toggle");
	});

	$("#name").keyup(function(){
		var name = $("#name").val();
		if(name.length < 1 || name.length > 20){
			error['tip']=false;
			$("#tip").empty();
			$("#tip").append("<span class='tips'>该名称不符合长度限制</span>");
			return ;
		}
		$.get("/xxxknight/admin.php/Keyword/selName",
			{'name' : name},
			function(data){
				if(data == 1){
					error['tip'] = false;
					$("#tip").empty();
					$("#tip").append("<span class='tips'>该名称已被使用</span>");
				}else{
					error['tip'] = true;
					$("#tip").empty();
					$("#tip").append("<span class='tips'>该名称可用</span>")
				}
			}
		);

	});

	$("#btnSave").click(function(){
		var name = $("#name").val().trim();
		var value = $("#value").val().trim();
		var flag = $("input[name='options']:checked").val();
		var type = $("#type").val();

		if(name.length < 1 || name.length > 20 || !error['tip']){
			alert("该关键字不可用，关键字名称应为1到20个字符");
			return false;
		}

		if((!value) || isNaN(value)){
			alert("关键值应为1到9999999的随机数.");
			return false;
		}


		$.post("/xxxknight/admin.php/Keyword/addKeyword",
        	{
            	"name" : name,
            	"value" : value,
            	"flag" : flag,
            	"type" : type,
        	},
        	function(data,status){
            alert(data);
            window.location.reload();//刷新当前页面.
        });
	});


});