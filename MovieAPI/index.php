<?php 
	require_once 'config.php';
	$customCSS = '<link rel="stylesheet" href="css/search.css">';
	require_once 'includes/header.php';
	if(!isset($_SESSION['ids'])) {	    
		$_SESSION['ids'] = [];
	}

	// var_dump($_SESSION);
	
?>
<input type="hidden" id="api_key" value="<?php echo APIKEY; ?>">
<input type="hidden" id="base_url" value="<?php echo BASEURL;?>">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="input-group" id="search_div">
				<input class="form-control" type="text" name="search" placeholder="Search.." id="search">
				<span class="input-group-btn">
        				<button class="btn btn-primary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
  				 </span>
			</div>
			
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<h1>Last Search items</h1>
		<?php if(isset($_SESSION['ids']) && !empty($_SESSION)){?>
		<table><tr>
		<?php foreach (array_unique($_SESSION['ids']) as $key => $data) { ?>

		<?php $curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.themoviedb.org/3/movie/". $data ."?&api_key=".APIKEY,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_POSTFIELDS => "{}",
			));

			$response = json_decode(curl_exec($curl), true);
			// var_dump("https://api.themoviedb.org/3/movie/". $data['data'. $key + 1] ."?&api_key=d6ed539a741ec0415b9f5118b1645d93");
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} ?>
			<td>			
				<div class="card card-top" style="width: 20rem;">
		  			<img class="card-img-top" src="<?php echo BASEURL.'w92'.$response['poster_path'];?>" alt="Card image cap">
					 <div class="card-block">
					    <h4 class="card-title"><?php echo $response['original_title'];?></h4>
					    <p class="card-text"><?php echo $response['release_date'];?></p>
					    <a href="details.php?id=<?php echo $response['id'];?>" class="btn btn-primary">Details</a>
					 </div>
				</div>
			</td>	
			<?php if(($key + 1) % 5 == 0){ echo '</tr><tr>';}?>
		<?php } ?>
		<?php } ?>
		</tr></table>
	</div>
	<hr>
</div>

<div class="container">
	<div class="row" id="main">
	</div>
</div>

<?php 
	$customJS = "<script type='text/javascript' src='js/search.js'></script>";
	require_once 'includes/footer.php';
?>