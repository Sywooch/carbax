$(document).ready(function(){

	$(".comment__item_thumb").click(function () {
		var id = $(this).attr('data-id');
		$(this).addClass("obvodka");
	

		$('.comment__item_thumb').each( function(){
			if($(this).attr('data-id') != id){
				$(this).removeClass('obvodka');
			
			
			}
		});

		$("#"+id).fadeIn();
		$('.comment__item_text p').each( function(){
			if($(this).attr('id') != id){
				$(this).hide();
			}
		});
		       
	 	return false;
	});


	$(".owl-carousel").owlCarousel({
		loop: true,
		margin: 35,
		nav : true,
		navText: true,
		//pagination : true,
		items: 1,
		responsiveClass:false,
		responsive: {
			0: {
				items: 1,
				nav: true,
			},
			600: {
				items: 1,
				nav: true
			},
			1000: {
				items: 1,
				nav: true,
				loop: true
			}
		}
	});


});

