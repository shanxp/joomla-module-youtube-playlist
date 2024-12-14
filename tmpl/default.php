<?php
defined('_JEXEC') or die('Restricted access');

//$youtubeBaseUrl = 'https://www.youtube.com/watch?v=';
$youtubeBaseUrl = 'https://www.youtube-nocookie.com/embed/';
$playListDecode = json_decode($playlist, true);
//https://img.youtube.com/vi/yKhFz8VdXL8/mqdefault.jpg
//https://img.youtube.com/vi/yKhFz8VdXL8/maxresdefault.jpg

if(isset($playListDecode['items'])) {
?>

<div class="row">
<?php 
	$counter = 0;
	foreach($playListDecode['items'] as $item){
		$unavailable = strpos(strtolower($item['snippet']['description']), 'this video is unavailable');
		$private = strpos(strtolower($item['snippet']['title']), 'private video');
		if( $unavailable !== false || $private !== false ) {
			continue;
		}
		if($counter != 0 && $counter % 3 == 0){
			echo '</div><div class="row">';
		}
		$title = $item['snippet']['title']; 
		$videoId = $item['snippet']['resourceId']['videoId'];
		$imageUrl = 'https://img.youtube.com/vi/'.$videoId.'/mqdefault.jpg' ;//$item['snippet']['thumbnails']['high']['url']; 
		$counter++;
?>
	<div class="col-md-4 mb-3">
	  <div class="card shadow-sm">
		<a target="_blank" href="<?php echo $youtubeBaseUrl.$videoId; ?>" >	
		<img src="<?php echo $imageUrl; ?>" title="<?php echo $title; ?>" />
		</a>
		<div class="card-body">
		  <p class="card-text">
		  <a target="_blank" href="<?php echo $youtubeBaseUrl.$videoId; ?>" >	
		  <?php echo $title; ?>
		  </a>
		  </p>
		</div>
		
	  </div>
	</div>
<?php } ?>
</div>
<?php } ?>

<style>
.card {
	width: 100%;
	height: 100%;
	object-fit: cover;
	margin: 0 0 20px 0;
}

.card-body {
	min-height: auto;
}

.card img {
	width: 100%;
}
</style>