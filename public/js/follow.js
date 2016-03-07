function updatezan(userID,pageID){
	   $("#zan0").click(function(){ 
	       $.ajax({ 
	           type: "POST",     
	           url: "/page/zanajax",
	           data: {
	               userID:userID,
	               pageID:pageID
//	                name: $("#staffName").val(),
	           },
	           dataType: "json",
	           success: function(data){
	               if (data.success) { 
	                   num=parseInt($("#zan0 span").html())+1;
	                   $("#zan0 span").html(num);
	               } else {
	                   $("#createResult").html(data.msg);
	               }  
	           },
	           error: function(jqXHR){     
	              alert("发生错误：" + jqXHR.status);  
	           },     
	       });
	   });
}