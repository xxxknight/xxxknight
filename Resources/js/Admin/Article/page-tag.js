var curPage = 1; //当前页码
var total,pageSize,totalPage;
//获取数据
function getData(page){

  $.ajax({
    type: 'GET',
    url: '/xxxknight/admin.php/Tag/listTag',
    data: {'pageNum':page-1},
    dataType:'json',

    success:function(json){
      $("#taglist tbody").empty();
      if (!json.list) {
        var empty="<tr class='empty'><td colspan='5'>暂无数据</td></tr>";
        $("#taglist tbody").append(empty);
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
          dumpflag = "不启用";
        }else{
          dumpflag = "启用";
        }
        var tr = $("<tr></tr>");
        var title = $("<td></td>").append(array['name']);
        var type = $("<td></td").append(array['type']);
        var flag = $("<td></td>").append(dumpflag);
        var update = $("<a></a>").append("编辑");
        var del = $("<a></a>").append("删除");
        var handle = $("<td></td>").append(update).append(" | ").append(del);
      
        tr.append(title);
        tr.append(type);
        tr.append(flag);
        tr.append(handle);
        $("#taglist tbody").append(tr);

        update.attr("href","javascript:void(0)");
        update.attr("id","update" + array['id']);
        del.attr("href","javascript:void(0)");
        del.attr("id","del" + array['id']);

        $("#update"+array['id']).click(function(){
            updateTag(array);
        });

        $("#del"+array['id']).click(function(){
            deleteTag(array['id']);
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

function deleteTag(id){
  if(confirm("是否删除该关键字")){
    $.get("/xxxknight/admin.php/Tag/deleteTag",
      {'id':id},
      function(data,status){
      alert(data);
      getData(1);
    });
  }else{
  }
}

function updateTag(array){
  var id = array['id'];
  var name = array['name'];
  var type = array['type'];
  var flag = array['flag'];

  
  $("#btnSave").hide();
  $("#btnUpdate").show();
  $("#tagModal").modal("toggle");
  $("#t-title").text("编辑标签——"+ name);

  $("#tid").val(id);
  $("#name").val(name);
  $("input[name='options'][value="+flag+"]").prop("checked",true);
  $("#type").val(type);
}

$(function(){
    $("#btnUpdate").click(function(){
      var id = $("#tid").val();
      var name = $("#name").val();
      var flag = $("input[name='options']:checked").val();
      var type = $("#type").val();

      $.post("/xxxknight/admin.php/Tag/updateTag",
          {
              "id" : id,
              "name" : name,
              "flag" : flag,
              "type" : type,
          },
          function(data,status){
            alert(data);
            window.location.href="/xxxknight/admin.php/Article/tag";
        });

    });
});

