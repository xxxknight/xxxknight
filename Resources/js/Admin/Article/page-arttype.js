var curPage = 1; //当前页码
var total,pageSize,totalPage;
//获取数据
function getData(page){

  $.ajax({
    type: 'GET',
    url: '/xxxknight/admin.php/Arttype/listArttype',
    data: {'pageNum':page-1},
    dataType:'json',

    success:function(json){
      $("#typelist tbody").empty();
      if (!json.list) {
        var empty="<tr class='empty'><td colspan='5'>暂无数据</td></tr>";
        $("#typelist tbody").append(empty);
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
        var typename = $("<td></td>").append(array['typename']);
        var showname = $("<td></td").append(array['showname']);
        var typenum = $("<td></td").append(array['typenum']);
        var rank = $("<td></td>").append(array['rank']);
        var update = $("<a></a>").append("编辑");
        var del = $("<a></a>").append("删除");
        var handle = $("<td></td>").append(update).append(" | ").append(del);
      
        tr.append(typename);
        tr.append(showname);
        tr.append(typenum);
        tr.append(rank);
        tr.append(handle);
        $("#typelist tbody").append(tr);

        update.attr("href","javascript:void(0)");
        update.attr("id","update" + array['id']);
        del.attr("href","javascript:void(0)");
        del.attr("id","del" + array['id']);

        $("#update"+array['id']).click(function(){
            updateType(array);
        });

        $("#del"+array['id']).click(function(){
            deleteType(array['id']);
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

function deleteType(id){
  if(confirm("是否删除该分类")){
    $.get("/xxxknight/admin.php/Arttype/deleteArttype",
      {'id':id},
      function(data,status){
      alert(data);
      getData(1);
    });
  }else{
  }
}

function updateType(array){
  var id = array['id'];
  var typename = array['typename'];
  var showname = array['showname'];
  var rank = array['rank'];

  
  $("#btnSave").hide();
  $("#btnUpdate").show();
  $("#typeModal").modal("toggle");
  $("#t-title").text("编辑类别——"+ typename);

  $("#typename").val(typename);
  $("#typename").prop("disabled",true);

  $("#tid").val(id);
  $("#showname").val(showname);
  $("#rank").val(rank);
}

$(function(){
    $("#btnUpdate").click(function(){
      var id = $("#tid").val();
      var showname = $("#showname").val();
      var rank = $("#rank").val();

      $.post("/xxxknight/admin.php/Arttype/updateArttype",
          {
              "id" : id,
              "showname" : showname,
              "rank" : rank,
          },
          function(data,status){
            alert(data);
            window.location.href="/xxxknight/admin.php/Article/arttype";
        });

    });
});

