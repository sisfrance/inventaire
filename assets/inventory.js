const $ =require('jquery');



$(document).ready(function(){
	/**
	 *  PARTIE FILTRES ---- PAGES
	 * */
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
				$("#add").on("click",function(event){add(event);});
				$(".edit-button").on("click",function(event){edit(event);});
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
				$("#add").on("click",function(event){add(event);});
				$(".edit-button").on("click",function(event){edit(event);});
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
			$("#add").on("click",function(event){add(event);});
			$(".edit-button").on("click",function(event){edit(event);});
				
		});
	  });
	$("#filtres-button").on("click",function(event){
		filter(event);
	  });
	/**
	 * FIN FILTRES - PAGES
	 * */
	 /**
	  * PARTIE MANAGE
	  **/
	  
	  let add = function(event){
			event.preventDefault();
			event.stopPropagation();
			
			let objet = $(event.target).attr("data-objet");
			$.get("/base/add/"+objet)
			.done(function(response){
				$("#target").empty().html(response);
			});
		  
	  }
	  
	  let edit = function(event){
			event.preventDefault();
			event.stopPropagation();
			let objet = $(event.target).attr("data-objet");
			let id = $(event.target).attr("data-id");
			let url = ["/base","edit",objet,id].join("/");
			$.get(url).done(function(response){
				$("#target").empty().html(response);
				
			});
		  
	  }
	 $("#add").on("click",function(event){
		add(event);
	 });
	 $(".edit-button").on("click",function(event){
		edit(event);	 
	});
	$(".del-button").on("click",function(event){
		
	  });
  
});
