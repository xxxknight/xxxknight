var curPage = 1; //当前页码
var total,pageSize,totalPage;
//获取数据
function getData(page){

  $.ajax({
    type: 'GET',
    url: '/xxxknight/admin.php/Artcomment/listComment',
    data: {'pageNum':page-1,},
    dataType:'json',
    // beforeSend:function(){
    //    $("#artlist tbody").append("<div id='loading'><img src='/xxxknight/Resources/images/loader.gif'/></div>");
    // },
    success:function(json){
      $("#commentlist tbody").empty();
      if (!json.list) {
        var empty="<tr class='empty'><td colspan='5'>暂无数据</td></tr>";
        $("#commentlist tbody").append(empty);
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

        var tr = $("<tr></tr>");
        var index = $("<td></td>").append(index+1);
        var title = $("<td></td>").append(array['title']);
        var username = $("<td></td>").append(array['username']);
        var createtime = $("<td></td").append(array['createtime']);
        var reply_flag = $("<td></td>").append(array['reply']);
        var del = $("<a></a>").append("删除");
        var handle = $("<td></td>").append(del);

        tr.append(index);
        tr.append(title);
        tr.append(username);
        tr.append(createtime);
        tr.append(reply_flag);
        tr.append(handle);
        $("#commentlist tbody").append(tr);

        var content = $("<td colspan='5'></td").append("评论内容： "+array['content']);
        var tr_content = $("<tr></tr>");
        tr_content.append(content);
        $("#commentlist tbody").append(tr_content);

        del.attr("href","javascript:void(0)");
        del.attr("id","del" + array['id']);


        $("#del"+array['id']).click(function(){
            deleteComment(array['id']);
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
  pageStr = "<span>共"+total+"条</span>&nbsp;<span>"+curPage+"/"+totalPage+"</span>&nbsp;";
  
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
    var typeid = $("#seltype").val();
    var classid = $("#selclass").val();
    if(rel){
      getData(rel);
    }
  });

  $("#seltype").change(function(){
    refreshArt();

  });

  $("#selclass").change(function(){
    refreshArt();

  });
});

function deleteComment(id){
  if(confirm("是否删除该条评论")){
    $.get("/xxxknight/admin.php/Artcomment/deleteComment",
      {'id':id},
      function(data,status){
      alert(data);
      refreshArt();
    });
  }else{

  }
  
}

function refreshArt(){
  var typeid = $("#seltype").val();
  var classid = $("#selclass").val();
  getData(1,typeid,classid);
}


