const $ =require('jquery');



$(document).ready(function(){
	/*****
	* CREE LA FENETRE DETAILS
	* ***/

	var popupObjet=function(voile,id){
                 return    {
                            show:function(htmldatas){
                                $("#"+voile).addClass("obscur");
                                $("#"+id).css({'width':'800px','minHeight':(window.innerHeight-100)+'px'});
                                $("#"+id+"-content").html(htmldatas);
                               
                            },
                            hide:function(){   
								$("#"+voile).removeClass("obscur");
                                $("#"+id+"-content").empty();
                                $("#"+id).css({'width':'0','height':'0'});
                                                                
                            }
                        };
                    }
	/**
	 *  PARTIE FILTRES ---- PAGES
	 * */
	var popup=popupObjet("voile","window");
	
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
					"serialnumber":$("#filtre-serialnumber").val(),
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
	  
	  let show = function(event){
		  event.preventDefault();
		  event.stopPropagation();
		  let id = $(event.target).attr("data-id");
		  let objet =$(event.target).attr("data-objet");
		  let url=["/base","details",objet,id].join("/");
		 
		  $.get(url).done(function(response){
			  popup.show(response);	  
			  $(".visualiser").on('click',function(event){
					event.preventDefault();
					event.stopPropagation();
					let id=$(event.target).attr("data-id");
					let objet=$(event.target).attr("data-objet");
					let state=$(event.target).attr("data-state");
					if(state == "hide"){
						action = "show";
						$(event.target).attr({"data-state":"show"});
					}
					else
					{
						action = "hide";
						$(event.target).attr({"data-state":"hide"});
					}
					$.post("/base/"+action+"pw",{"id":id,"objet":objet})
					.done(function(response){
						$("#"+objet+"-mdp-"+id).val(response);		
					 });
				});
			});
		  
	  }
	  
	 $("#add").on("click",function(event){
		add(event);
	 });
	 $(".edit-button").on("click",function(event){
		edit(event);	 
	});
	$(".details-button").on("click",function(event){
		show(event);
	  });
    $("#close-window").on('click',function(event){
		popup.hide();
	});
	
	
});
