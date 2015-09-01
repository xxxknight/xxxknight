//该JS文件在后台的TPL页面均需引入，为此将此文件在public/tail.html中引入。
$(function(){
	$('#navbar .dropdown').mouseover(function() {   
  		$(this).addClass('open');
  		}).mouseout(function() {        
    	$(this).removeClass('open');
  	});

    $("#li-system>a").click(function(){
      if($("#systemModule").hasClass("in")){
        $("#li-system>a>span").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-left");
      }else{
        $("#li-system>a>span").removeClass("glyphicon-chevron-left").addClass("glyphicon-chevron-down");
      }
    });

  	$("#li-article>a").click(function(){
      if($("#articleModule").hasClass("in")){
        $("#li-article>a>span").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-left");
      }else{
        $("#li-article>a>span").removeClass("glyphicon-chevron-left").addClass("glyphicon-chevron-down");
      }
    });

    $("#li-video>a").click(function(){
      if($("#videoModule").hasClass("in")){
        $("#li-video>a>span").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-left");
      }else{
        $("#li-video>a>span").removeClass("glyphicon-chevron-left").addClass("glyphicon-chevron-down");
      }
    });

    $("#li-album>a").click(function(){
      if($("#albumModule").hasClass("in")){
        $("#li-album>a>span").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-left");
      }else{
        $("#li-album>a>span").removeClass("glyphicon-chevron-left").addClass("glyphicon-chevron-down");
      }
    });


});
