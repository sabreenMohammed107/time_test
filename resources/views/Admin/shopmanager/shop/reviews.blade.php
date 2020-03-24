<script>
$(document).ready(function() {
    //$('select').selectpicker();
    
    $(document).on('click', '.pagination a', function(event){
      event.preventDefault(); 
      var page = $(this).attr('href').split('page=')[1];
      
      fetch_data(page);
      
     });
    
     function fetch_data(page)
     {
        id={{$id}}
      
      $.ajax({
       url:"{{ URL::to('fetch_reviews') }}?page="+page+"&shop="+id,
       success:function(data)
       {
           
        $('#reviews').html(data);
       }
      });
     }
     
    });
</script>

@foreach($reviews as $review)
							<div class="single-review">
								<div class="review-heading">
                                    <div><i class="fa fa-user-o"></i> {{$review->name}}</div>
                                    <div><i class="fa fa-clock-o"></i> {{$review->review_date}}</div>
                                    <div><i class="fas fa-envelope"></i> {{$review->email}}</div>
								
									@foreach(range(1,5) as $i)
									<div class="review-rating pull-right">
									@if($review->stars_rank >=$i )
										<i class="fa fa-star"></i>
										@else
										<i class="fa fa-star-o empty"></i>
										@endif
										
									</div>
									@endforeach
								</div>
								
								<div  class="review-body">
								
									{{$review->review_text}}
									
								</div>
                            </div>
                            
                           
							@endforeach
							<div id="review" class="review-body">
							{!! $reviews->links() !!}
							</div>