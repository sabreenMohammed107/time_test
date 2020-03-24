<script>
$(document).ready(function() {
    //$('select').selectpicker();
    
    $(document).on('click', '.pagination a', function(event){
      event.preventDefault(); 
      var page = $(this).attr('href').split('page=')[1];
      
      fetch_contacts(page);
      
     });
    
     function fetch_contacts(page)
     {
        id={{$id}}
      
      $.ajax({
       url:"{{ URL::to('fetch_contacts') }}?page="+page+"&shop="+id,
       success:function(data)
       {
           
        $('#contacts').html(data);
       }
      });
     }
     
    });
</script>

@foreach($contacts as $contact)



							<div class="single-review">
								<div class="review-heading">

                  <div><i class="fa fa-user-o"></i> {{$contact->first_name}}</div>
                  <div>{{$contact->last_name}}</div>
                  <div><i class="fa fa-phone"></i> {{$contact->phone}}</div>
                                    
                  <div><i class="fas fa-envelope"></i> {{$contact->email}}</div>
                  <div class="review-rating pull-right">
                    <div><a href="#"><i class="fa fa-clock-o"></i> {{$contact->message_date}}</a></div>
                  </div>
								
								</div>
								
								<div  class="review-body">
								
									{{$contact->message}}
									
								</div>
                            </div>
                            
                           
							@endforeach
							<div id="review" class="review-body">
							{!! $contacts->links() !!}
							</div>