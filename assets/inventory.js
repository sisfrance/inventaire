const $ =require('jquery');



$(document).ready(function(){

let change_page=function(event){
	event.preventDefault();
	event.stopPropagation();
	let page=$(event.target).attr('data-page');
	let url=$(event.target).attr('href');
	console.log(url);
	$.get(url)
		.done(function(response){
			//console.log(response);
			$("#target").empty().html(response);
			$(".page-link").on("click",function(event){
					change_page(event);
			});
		});
	
}
$(".page-link").on("click",function(event){
	event.preventDefault();
	event.stopPropagation();
	change_page(event);	
});	
	
});
