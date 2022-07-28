const $ =require('jquery');

$(document).ready(function(){

 $("#add").on("click",function(event){
	event.preventDefault();
	event.stopPropagation();
	let objet = $(event.target).attr("data-objet");
	$.get("/base/add/"+objet)
	.done(function(response){
		$("#target").empty().html(response);
	});
});
 $(".edit-button").on("click",function(event){
	event.preventDefault();
	event.stopPropagation();
	let objet = $(event.target).attr("data-objet");
	let id = $(event.target).attr("data-id");
	let url = ["/base","edit",objet,id].join("/");
	$.get(url).done(function(response){
		$("#target").empty().html(response);
		
	});
	 
});
$(".del-button").on("click",function(event){
	
  });
	 
});
