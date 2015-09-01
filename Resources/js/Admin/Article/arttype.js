var error = new Array();
$(function(){
	$("#btn-type").click(function(){
		$("#tid").val("");
  		$("#t-title").text("新增类别");
  		$("#typename").val("");
  		$("#showname").val("");
  		$("#rank").val("");
  		

		$("#btnSave").show();
		$("#btnUpdate").hide();
		$("#typeModal").modal("toggle");
	});

	$("#typename").keyup(function(){
		var typename = $("#typename").val();
		if(typename.length < 1 || typename.length > 20){
			error['tip']=false;
			$("#tip").empty();
			$("#tip").append("<span class='tips'>该名称不符合长度限制</span>");
			return ;
		}
		$.get("/xxxknight/admin.php/Arttype/selName",
			{'typename' : typename},
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
		var typename = $("#typename").val().trim();
		var showname = $("#showname").val().trim();
		var rank = $("#rank").val().trim();
		

		if(typename.length < 1 || typename.length > 20 || !error['tip']){
			alert("该名称不可用，类别名称应为1到20个字符");
			return false;
		}

		if((!rank) || isNaN(rank)){
			alert("显示顺序应为1到99999的随机数.");
			return false;
		}

		$.post("/xxxknight/admin.php/Arttype/addArttype",
        	{
            	"typename" : typename,
            	"showname" : showname,
            	"rank" : rank,
        	},
        	function(data,status){
            alert(data);
            window.location.reload();//刷新当前页面.
        });
	});


});