
<div class="popup popup--search">
	<div class="popup__close"><a href="#" class="close-popup" data-popup="search"><img src="{{asset('mobile/assets/images/icons/blue/close.svg')}}" alt="" title=""/></a></div>
	<div class="search">	  
		<div class="search__form">
			<form>
				<input type="text" class="search__input" onkeyup="searching()" name="search" value="" placeholder="SEARCH" />
				<input type="submit" class="search__submit" value="Send" />
			</form>		
		</div>
		<div class="search__results">
			<h3>Results</h3>
			<div id="search_products">
			
			</div>
		</div>
				
	</div>
</div>

<script>

function searching(){
	var search_query = $( "input[type=text][name=search]" ).val();
	//alert(search_query);
	$.ajax({
		type:'POST',
		dataType: 'json',
		url:"{{ route('search.post') }}",
		data:{"_token": "{{ csrf_token() }}", search_query:search_query},
		success:function(data){
			console.log('Done');
			var res='';
            $.each (data, function (key, value) {
				res +=
				'<div class="search-result">'+
					'<a href="/product-detail/'+value.slug+'">'+
						'<div class="search-result__thumb"><img src="/img/product/'+value.slug+'/thumbs/'+value.get_image_relation[0].image+'"/></div>'+
					'</a>'+				
					'<div class="search-result__details">'+
						'<p><a href="/product-detail/'+value.slug+'" style="color:#44484a;">'+value.title+'</a></p>'+
					'</div>'+
				'</div>';
			});

		$('#search_products').html(res);			
		}
	});
};
</script>