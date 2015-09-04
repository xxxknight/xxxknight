var curPage = 1; //当前页码
var total,pageSize,totalPage;
//获取数据
function getData(page){

  $.ajax({
    type: 'GET',
    url: '/xxxknight/admin.php/Account/listAccount',
    data: {'pageNum':page-1},
    dataType:'json',

    success:function(json){
      $("#accountlist tbody").empty();
      if (!json.list) {
        var empty="<tr class='empty'><td colspan='6'>暂无数据</td></tr>";
        $("#accountlist tbody").append(empty);
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
        var disabled ="";
        if(array['flag'] == 0){
          dumpflag = "<span class='red'>禁用</span>";
          disabled = $("<a></a>").append("启用");
        }else{
          dumpflag = "可用";
          disabled = $("<a></a>").append("<span class='red'>禁用</span>");
        }


        var tr = $("<tr></tr>");
        var id = $("<td></td>").append(index+1);
        var username = $("<td></td>").append(array['username']);
        var email = $("<td></td>").append(array['email']);
        var createtime = $("<td></td").append(array['createtime']);
        var flag = $("<td></td>").append(dumpflag);
        
        var handle = $("<td></td>").append(disabled);
      
        tr.append(id);
        tr.append(username);
        tr.append(email);
        tr.append(createtime);
        tr.append(flag);
        tr.append(handle);
        $("#accountlist tbody").append(tr);

        disabled.attr("href","javascript:void(0)");
        disabled.attr("id","dis" + array['id']);

        $("#dis"+array['id']).click(function(){
            setDisable(array['id'],array['flag']);
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

function setDisable(id,flag){
  var con = "";
  if(flag==0){
    flag = 1;
    con = "是否启用该用户？";
  }else{
    flag = 0;
    con = "是否禁用该用户？";
  }
  if(confirm(con)){
    $.post("/xxxknight/admin.php/Account/setDisable",
      {'id':id , 'flag' : flag},
      function(data,status){
        alert(data);
        getData(1);
    });
  }
}