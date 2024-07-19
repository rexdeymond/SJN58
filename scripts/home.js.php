<!-- THIS PAGE PLUGINS -->    
<script>
$(document).ready(function() {
  var owl = $('.owl-carousel');
  owl.owlCarousel({
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 1000,
    autoplayHoverPause: true,
    nav:false,
	responsiveClass:true,
	responsive:{
		0:{
			items:1,
			//nav:true
		},
		600:{
			items:3,
			//nav:false
		},
		1000:{
			items:4,
			//nav:true,
			//loop:false
		}
	}
	
  });
})
</script>
<!-- END PAGE PLUGINS -->