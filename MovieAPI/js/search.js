$(document).ready(function() {
	
//  search API

	$('#search').keyup(function(event) {
		$('#search_list').remove();
		$('#main').html('');
		if(event.which == 13) {
			// window.location.href = "card.php?search="+ $('#search').val();
			$.ajax({
					url: 'https://api.themoviedb.org/3/search/movie?api_key='+ $('#api_key').val()+'&query=' + $('#search').val(),
					type: 'GET',
					dataType: 'json',
				}).done(function(json) {
					$('#main').append('<h1> Search results</h1><table><tr>');
					$(json.results).each(function(index, el) {
						var card_data = '<td><div class="card card-top" style="width: 20rem;">'+
  											'<img class="card-img-top" src="'+ $('#base_url').val() +'w92'+ el.poster_path + '" alt="Card image cap">'+
			 								'<div class="card-block">'+
				    							'<h4 class="card-title">'+ el.title +'</h4>'+
				    							'<p class="card-text">'+ el.release_date +'</p>'+
				    							'<a href="details.php?id='+ el.id +'" class="btn btn-primary">Details</a>'+
			 								'</div>'+
										'</div> </td>';
						$('#main').append(card_data);
						if((parseInt(index)+ parseInt(1)) % 5 == 0){
							$('#main').append('</tr><tr>');
						}
					});
					$('#main').append('</tr></table');
				});

		} else {
			if ($('#search').val().length >= 3) {
				$.ajax({
					url: 'https://api.themoviedb.org/3/search/movie?api_key='+ $('#api_key').val() +'&query=' + $('#search').val(),
					type: 'GET',
					dataType: 'json',
				})
				.done(function(json) {
					// console.log(json);
					$( "#search_div" ).after( "<ul class='list-group' style='list-style: none; overflow-y: scroll;' id ='search_list'></ul>" );
					$(json.results).each(function(index, el) {
						var append_data = '<a href ="details.php?id='+ el.id +'">'+
											'<li>' +
											  	'<div class="results row">'+
											  		'<div class="item col-md-12">' +
											  			'<div class="col-md-2 text-center col-xs-3">' +
											  				'<img class="img-responsive" src="'+ $('#base_url').val() +'w92'+ el.poster_path + '"/>'+
											  			'</div>' +
											  			'<div class="col-md-5 col-xs-7">' +
											  				'<p>'+ el.title + '</p>'+
											  				'<p>'+ el.release_date + '</p>'+
											  			'</div>'+
											  		'</div>'+
											  	'</div>'+
											  '</li>'+
											'</a>';

						$('#search_list').append(append_data);
						
					});
				});
				
			}			
		}
	});

});