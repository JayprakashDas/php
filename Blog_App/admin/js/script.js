function loadUserOnline(){
	$.get("function.php?useronline=result",function(data){
		$(".useronline").text(data);
	});
}
setInterval(function(){
	loadUserOnline();
},500);

