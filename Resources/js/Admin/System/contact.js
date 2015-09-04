var curPage = 1; //当前页码
var total,pageSize,totalPage;
//获取数据
function getData(page){

  $.ajax({
    type: 'GET',
    url: '/xxxknight/admin.php/Contact/listContact',
    data: {'pageNum':page-1},
    dataType:'json',

    success:function(json){
      $("#contactlist tbody").empty();
      if (!json.list) {
        var empty="<tr class='empty'><td colspan='7'>暂无数据</td></tr>";
        $("#contactlist tbody").append(empty);
        $("#pagecount").html("");
        return;
      };
      
      total = json.total; //总记录数
      pageSize = json.pageSize; //每页显示条数
      curPage = page; //当前页
      totalPage = json.totalPage; //总页数
      var item = "";
      var list = json.list;
      $.each(list,function(index,array){ //遍历json数据列
        var dumpflag ="";
        if(array['flag'] == 0){
          dumpflag = "<span class='red'>未回复</span>";
        }else{
          dumpflag = "已回复";
        }

        var dumpauthor ="";
        if(!array['author']){
          dumpauthor = "匿名";
        }else{
          dumpauthor = array['author'];
        }

        var tr = $("<tr></tr>");
        var id = $("<td></td>").append(index+1);
        var problem = $("<td></td>").append(array['problem']);
        var title = $("<td></td>").append(array['title']);
        var createtime = $("<td></td").append(array['createtime']);
        var author = $("<td></td>").append(dumpauthor);
        var flag = $("<td></td>").append(dumpflag);
        var show = $("<a></a>").append("详情");
        var del = $("<a></a>").append("删除");
        var handle = $("<td></td>").append(show).append(" | ").append(del);
      
        tr.append(id);
        tr.append(problem);
        tr.append(title);
        tr.append(createtime);
        tr.append(author);
        tr.append(flag);
        tr.append(handle);
        $("#contactlist tbody").append(tr);

        show.attr("href","javascript:void(0)");
        show.attr("id","show" + array['id']);
        del.attr("href","javascript:void(0)");
        del.attr("id","del" + array['id']);

        $("#show"+array['id']).click(function(){
            showContact(array);
        });

        $("#del"+array['id']).click(function(){
            deleteContact(array['id']);
        });

      });
     

      getPageBar();//生成分页条
    },
    complete:function(){
     
    },
    error:function(){
      alert("数据加载失败");
    }
  });
}

//获取分页条
function getPageBar(){
  //页码大于最大页数
  if(curPage>totalPage) curPage=totalPage;
  //页码小于1
  if(curPage<1) curPage=1;
  pageStr = "<span>共"+total+"条数据</span>&nbsp;<span>"+curPage+"/"+totalPage+"</span>&nbsp;";
  
  //如果是第一页
  if(curPage==1){
    pageStr += "<span>首页</span>&nbsp;<span>上一页</span>&nbsp;";
  }else{
    pageStr += "<span><a href='javascript:void(0)' rel='1'>首页</a></span>&nbsp;"
    +"<span><a href='javascript:void(0)' rel='"+(curPage-1)+"'>上一页</a></span>&nbsp;";
  }
  
  //如果是最后页
  if(curPage>=totalPage){
    pageStr += "<span>下一页</span>&nbsp;<span>尾页</span>";
  }else{
    pageStr += "<span><a href='javascript:void(0)' rel='"+(parseInt(curPage)+1)+"'>下一页</a></span>"
    +"&nbsp;<span><a href='javascript:void(0)' rel='"+totalPage+"'>尾页</a></span>";
  }
    
  $("#pagecount").html(pageStr);
}

$(function(){
  getData(1);
  $("body").on('click',"#pagecount span a",function(){
    var rel = $(this).attr("rel");
    if(rel){
      getData(rel);
    }
  });
});

function deleteContact(id){
  if(confirm("是否删除该数据")){
    $.get("/xxxknight/admin.php/Contact/deleteContact",
      {'id':id},
      function(data,status){
        alert(data);
        getData(1);
    });
  }else{
  }
}

function showContact(arr){
  $("#cid").val(arr['id']);
  $("#problem").val(arr['problem']);
  $("#createtime").val(arr['createtime']);
  $("#title").val(arr['title']);
  $("#email").val(arr['email']);
  $("#summary").val(arr['summary']);
  
  var flag = arr['flag'];
  if(flag == 0){
    $("#flag").val("未回复");
  }else{
    $("#flag").val("已回复");
    $("#reply").val(arr['reply']);
    $("#reply").prop("disabled",true);
    $("#btnSend").hide();
  }

  $("#contactModal").modal("toggle");

}

$(function(){
  $("#btnSend").click(function(){
      var id = $("#cid").val();
      var reply = $("#reply").val().trim();
      var email = $("#email").val();
      var author = $("#author").val();
      
      if(reply.length>300){
          alert("您输入的内容超过300，请重新输入。");
          return false;
      }else if(reply.length == 0){
          alert("您输入的内容为空。");
          return false;
      }
      $.post("/xxxknight/admin.php/Contact/sendFeedback",
          {
              'id':id,
              'email' : email,
              'reply' : reply,
          },
          function(data,status){
          alert(data);
          window.location.reload();
    });
  });

})
