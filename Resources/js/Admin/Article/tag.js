var error = new Array();
$(function(){
	$("#btn-tag").click(function(){
		$("#tid").val("");
  		$("#t-title").text("新增标签");
  		$("#name").val("");
  		$("#option1").prop("checked",true);
  		$("#type").val(0);

		$("#btnSave").show();
		$("#btnUpdate").hide();
		$("#tagModal").modal("toggle");
	});

	$("#name").keyup(function(){
		var name = $("#name").val();
		if(name.length < 1 || name.length > 20){
			error['tip']=false;
			$("#tip").empty();
			$("#tip").append("<span class='tips'>该名称不符合长度限制</span>");
			return ;
		}
		$.get("/xxxknight/admin.php/Tag/selName",
			{'name' : name},
			function(data){
				if(data == 1){
					error['tip'] = false;
					$("#tip").empty();
					$("#tip").append("<span class='tips'>该标签名已被使用</span>");
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
		var flag = $("input[name='options']:checked").val();
		var type = $("#type").val();

		if(name.length < 1 || name.length > 20 || !error['tip']){
			alert("该标签不可用，标签名称应为1到20个字符");
			return false;
		}



		$.post("/xxxknight/admin.php/Tag/addTag",
        	{
            	"name" : name,
            	"flag" : flag,
            	"type" : type,
        	},
        	function(data,status){
            alert(data);
            window.location.reload();//刷新当前页面.
        });
	});


});