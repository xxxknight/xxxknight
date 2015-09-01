var curPage = 1; //当前页码
var total,pageSize,totalPage;
//获取数据
function getData(page,typeid,classid){

  $.ajax({
    type: 'GET',
    url: '/xxxknight/admin.php/Article/showArts',
    data: {'pageNum':page-1,'typeid':typeid,'classid':classid},
    dataType:'json',
    // beforeSend:function(){
    //    $("#artlist tbody").append("<div id='loading'><img src='/xxxknight/Resources/images/loader.gif'/></div>");
    // },
    success:function(json){
      $("#artlist tbody").empty();
      if (!json.list) {
        var empty="<tr class='empty'><td colspan='5'>暂无数据</td></tr>";
        $("#artlist tbody").append(empty);
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
        item += "<tr><td>"+"<a target='_blank' href='/xxxknight/index.php/Article/detailArt/id/"
        +array['id']+"'>"+array['title']
        +"</a></td><td>"+array['createtime']
        +"</td><td>"+array['viewnum']
        +"</td><td>"+array['commentnum']
        +"</td><td>"+"<a href='/xxxknight/admin.php/Article/updateArt/id/"
        +array['id']+"'>编辑</a> | "
        +"<a href='javascript:void(0);' onclick='deleteArt("+array['id']
        +")'>删除</a>"+"</td></tr>";
      });
      $("#artlist tbody").append(item);
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
      getData(rel,typeid,classid);
    }
  });

  $("#seltype").change(function(){
    refreshArt();

  });

  $("#selclass").change(function(){
    refreshArt();

  });
});

function deleteArt(id){
  if(confirm("是否删除该文章")){
    $.get("/xxxknight/admin.php/Article/deleteArt",
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


