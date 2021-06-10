const $ =require('jquery');



$(document).ready(function(){

let change_page=function(event){
	event.preventDefault();
	event.stopPropagation();
	let page=$(event.target).attr('data-page');
	let url=$(event.target).attr('href');
	$.get(url)
		.done(function(response){
			//console.log(response);
			$("#target").empty().html(response);
			$(".page-link").on("click",function(event){
					change_page(event);
			});
			$("#filtres-button").on("click",function(event){
					filter(event);
			});
		});
	
}
let filter=function(event){
	event.preventDefault();
	event.stopPropagation();
	let datas={
				"serialnumber":$("#filtre-serial-number").val(),
				"utilisateurs[]": $("#filtre-utilisateurs").val(),
				"sites[]":$("#filtre-sites").val()
			};
	$.post("/base/filter/update",datas)
	.done(function(response){
			$("#target").empty().html(response);
			$(".page-link").on("click",function(event){
					change_page(event);
			});
			$("#filtres-button").on("click",function(event){
					filter(event);
			});
		});
			
	
}
$(".page-link").on("click",function(event){
	event.preventDefault();
	event.stopPropagation();
	change_page(event);	
});	
$("#filtre-client").on("change",function(event){
	event.preventDefault();
	event.stopPropagation();
	$.post("/base/client/change",{'clients[]':$(event.target).val()})
	.done(function(response){
		$("#target").empty().html(response);
		$(".page-link").on("click",function(event){
				change_page(event);
		});
		$("#filtres-button").on("click",function(event){
			filter(event);
		});
			
	});
  });
$("#filtres-button").on("click",function(event){
	filter(event);
  });
});
