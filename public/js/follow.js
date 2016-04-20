/*function updatezan(userID,pageID){
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
}*/
function updatezan(userID, pageID,star){
		var oStar = document.getElementById("star");
		var aLi = oStar.getElementsByTagName("li");
		var oUl = oStar.getElementsByTagName("ul")[0];
		var oSpan = oStar.getElementsByTagName("span")[1];
		var oP = oStar.getElementsByTagName("p")[0];
		var i = iScore  =iStar= 0;
		var aMsg = [
					"不值得推荐|内容不值得看",
					"不看好|内容没有多大帮助",
					"一般|内容一般",
					"还不错|内容值得一看",
					"很有帮助|内容好，五星推荐！"
					]
		if(star==0){
		for (i = 1; i <= aLi.length; i++){
			aLi[i - 1].index = i;
			
			//鼠标移过显示分数
			aLi[i - 1].onmouseover = function (){
				fnPoint(this.index);
				//浮动层显示
				oP.style.display = "block";
				//计算浮动层位置
				oP.style.left = oUl.offsetLeft + this.index * this.offsetWidth - 104 + "px";
				//匹配浮动层文字内容
				oP.innerHTML = "<em><b>" + this.index + "</b> 分 " + aMsg[this.index - 1].match(/(.+)\|/)[1] + "</em>" + aMsg[this.index - 1].match(/\|(.+)/)[1]
			};
			
			//鼠标离开后恢复上次评分
			aLi[i - 1].onmouseout = function (){
				fnPoint();
				//关闭浮动层
				oP.style.display = "none"
			};
			
			//点击后进行评分处理
			aLi[i - 1].onclick = function (){
				iStar = this.index;//此处是分数值
				oP.style.display = "none";
				oSpan.innerHTML = "<strong>" + (this.index) + " 分</strong> (" + aMsg[this.index - 1].match(/\|(.+)/)[1] + ")";
				
				
			$.ajax({
		    dataType:"json",
	        type:"POST",
			url:"/page/zanajax",
			data:{
				iStar:iStar,
				userID:userID,
				pageID:pageID
			},
			success:function(data)
			  {
				if(data.success) { //评分成功
					alert(data.msg);
				}
				else{              //已经进行过评论，或者数据库错误
					alert(data.msg);
				}
				},
			error:function(data){   //出错
	                alert("Error");
	            }
			});
			}
		}
		
	}
	else{
		fnPoint(star);
	}
	//评分处理
	function fnPoint(iArg){
		//分数赋值
		iScore = iArg || iStar;
		for (i = 0; i < aLi.length; i++) aLi[i].className = i < iScore ? "on" : "";	
	}

}

