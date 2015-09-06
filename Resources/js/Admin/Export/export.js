$(function(){
    $("#user-sub").click(function(){
    	var flag;
        var starttime = $("#user-starttime").val();
        var endtime = $("#user-endtime").val();
        var formmat = $("input[name='user-formmat']:checked").val();
        if(formmat == '0'){
        	flag = '10'; 
        }else{
        	flag = '11';
        }
        var url = "/xxxknight/admin.php/Export/export/flag/"+flag+"/starttime/"
        +starttime+"/endtime/"+endtime;
        window.open(url);
        //alert(url);
    });

    $("#db-sub").click(function(){
        alert($("#tables").val());
    })
})
