
<!-- Start Slider section -->
<script type="text/javascript" src="{{ asset('webasset/engine1/wowslider.js')}}"></script>
	<script type="text/javascript" src="{{ asset('webasset/engine1/script.js')}}"></script>
	<!-- End Slider section -->

	<!-- jQuery Plugins -->
	<script src="{{ asset('webasset/js/pro/jquery.min.js')}}"></script>
	<script src="{{ asset('webasset/js/pro/bootstrap.min.js')}}"></script>
	<script src="{{ asset('webasset/js/pro/slick.min.js')}}"></script>
	<script src="{{ asset('webasset/js/pro/nouislider.min.js')}}"></script>
	<script src="{{ asset('webasset/js/pro/jquery.zoom.min.js')}}"></script>
	<script src="{{ asset('webasset/js/pro/main.js')}}"></script>

	<!--Start Gallery section -->
	<!--<script src="js/gallery-jquery.min.js"></script>-->
	<script src="{{ asset('webasset/js/gallery-jquery.flipster.min.js')}}"></script>
	<script>
            var coverflow = $("#coverflow").flipster();
	</script>
	<!--<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>-->
	<!-- End Gallery section -->
	
	
	<script src="{{ asset('webasset/js/jquery.stellar.min.js')}}"></script>
	<script src="{{ asset('webasset/js/owl.carousel.min.js')}}"></script>
	<script src="{{ asset('webasset/js/aos.js')}}"></script>
	<script src="{{ asset('webasset/js/scrollax.min.js')}}"></script>
	<script src="{{ asset('webasset/js/main.js')}}"></script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

	<script>
 $(document).ready(function() {
	var path = "{{ route('autocomplete') }}";
	var id=0;
	
    $("#searchIndex").autocomplete({

        source: function(request, response) {
            $.ajax({
            url:path,
            data: {
                    term : request.term,
					selectItem:$('#NameForSearch option:selected').val(),
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
				id=obj.id;
                    return{
						value: obj.value,
                           id: obj.id,
					} 
               }); 

               response(resp);
            }
        });

    },

    minLength: 1,
	select: function(event, ui) {
  $('#searchIndex').val(ui.item.value);
  $(' #id_personne ').val( ui.item.id ); 
  id= ui.item.id;
  
if($('#NameForSearch option:selected').val()==0){
	
	var url = window.location.origin;
	url = url + "/product?productId="+id ;
  	window.location.href = url;
}
if($('#NameForSearch option:selected').val()==2){
	
	var url = window.location.origin;
	url = url + '/shop/' +id ;
	window.location.href = url;
  }
  if($('#NameForSearch option:selected').val()==1){
	
	var url = window.location.origin;
	url = url + '/category/' +id ;
	window.location.href = url;
  }


}

 });


//  $("#accountClient").click(function(){
	
// 	 var id=$('#valClient').val();
//         $.ajax({

// 			url:"{{route('profile', "+id+")}}",

// 			 success: function(result){
			
//             // $(".title").html(result);
//         }});
//    });



  // check language

  var locale = document.getElementsByTagName("html")[0].getAttribute("lang");
  if(locale === 'ar'){
	document.body.classList.add('rtl');
	$('#mainLang').text('عربي');
  } 
  else {
	document.body.classList.remove('rtl')
	$('#mainLang').text('En');


  }
 });

//get account 
// get product to cart
function addProductCart(id){
	alert('hiii');
	$.ajax({
    type: 'get',
    url:'/cart/'+id+'/edit',
    data:
    {
		prodId:id,
		clientId:1,
        } ,

   success:function(data)
   {
      console.log(data);
    $('html header').html(data);
	$("div .addCart").fadeTo(2000, 500).slideUp(500, function() {
      $("div .addCart").slideUp(3000);
    });
   } ,
   error: function(response){
	$("div .delCart").fadeTo(2000, 500).slideUp(500, function() {
      $("div .delCart").slideUp(3000);
	});
    }
  });
}
</script>   

@yield('scripts')
</body>
</html>
