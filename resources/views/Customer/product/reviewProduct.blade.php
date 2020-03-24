@foreach($reviews as $review)
							<div class="single-review">
								<div class="review-heading">
									<div><a href="#"><i class="fa fa-user-o"></i>{{$review->name}}</a></div>
									<div><a href="#"><i class="fa fa-clock-o"></i> {{$review->review_date}}</a></div>
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
							<div id="reviewProduction" class="review-body">
							{!! $reviews->links() !!}
							</div>