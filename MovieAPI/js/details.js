$(document).ready(function() {
	var baseUrl = '';
	$.ajax({
		url: 'https://api.themoviedb.org/3/configuration?api_key=d6ed539a741ec0415b9f5118b1645d93',
		type: 'GET',
		dataType: 'json',
	})
	.done(function(json) {
		baseUrl = json.images.base_url;
	});

	$.ajax({
		url: 'https://api.themoviedb.org/3/movie/'+ $('#movie_id').val()+'?api_key=d6ed539a741ec0415b9f5118b1645d93',
		type: 'GET',
		dataType: 'json',
	})
	.done(function(json) {
		var data = '<div class="col-md-12">'+
						'<h1 >'+ json.original_title + '</h1>'+
					'</div>'+
					'<div class="col-md-3">'+
						'<img class="img-responsive" src="'+ baseUrl + 'w500' + json.poster_path + '">'+
					'</div>' +
					'<div class="col-md-5">'+
						'<p>'+ json.overview + '</p>'+
					'</div>'+
					'<div class="col-md-4">'+
						'<p><b>Release Date :</b> '+ json.release_date + '</p>'+
						'<p> <b>Vote Average :</b> '+ json.vote_average + '</p>'+
						'<p> <b>Vote Count :</b> '+ json.vote_count + '</p>'+
						'<p> <b>Budget :</b> '+ json.budget + '</p>'+
					'</div>'+
					'<div class="col-md-12">'+
						'<blockquote class="blockquote"><p class="mb-0"><strong>"'+ json.tagline +'"</strong></p></blockquote>'+
					'</div>';

		$('#main').append(data);
		// console.log(json);
	});
});