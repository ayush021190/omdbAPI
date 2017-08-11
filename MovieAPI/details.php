<?php 
	require_once 'config.php';
	require_once 'includes/header.php';
	$count = count($_SESSION['ids'])+1;
	$_SESSION['ids']['data'.$count] = $_GET['id'];
	// array_push($_SESSION['ids'], $_GET['id']);
?>

<input type="hidden" id="api_key" value="<?php echo APIKEY; ?>">
<input type="hidden" id="base_url" value="<?php echo BASEURL;?>">
<input type="hidden" id="movie_id" value="<?php echo $_GET['id'];?>">
<div class="container">
	<div class="row">
		<div class="col-md-12" id="main">
			<!-- <div class="input-group" id="search_div">
				<input class="form-control" type="text" name="search" placeholder="Search.." id="search">
				<span class="input-group-btn">
        				<button class="btn btn-primary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
  				 </span>
			</div> -->
			
		</div>
	</div>
</div>

<?php 
	$customJS = '<script type="text/javascript" src="js/details.js"></script>';
	require_once 'includes/footer.php';
?>