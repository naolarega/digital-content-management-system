<div class="col-lg-9">
	<div class="well">
		<?php
			$contents = array(
				'video' => array(),
				'music' => array(),
				'image' => array(),
				'app' => array(),
				'book' => array(),
			);
			if(isset($wishlist)){
				foreach($wishlist->result() as $content){
					if($content->type == 'video'){
						array_push($contents['video'], $content);
					}
					if($content->type == 'music'){
						array_push($contents['music'], $content);
					}
					if($content->type == 'image'){
						array_push($contents['image'], $content);
					}
					if($content->type == 'app'){
						array_push($contents['app'], $content);
					}
					if($content->type == 'book'){
						array_push($contents['book'], $content);
					}
				}
			}
		?>
		<div class="row videos">
			<div class="col-lg-12">
				<h4><span class="dcms-label label label-info">Video</span></h4>
				<?php
				foreach($contents['video'] as $video){
				echo '<div class="col-lg-3">';
				echo '<div class="video-list well">';
				echo '<img width="180" height="180" src="http://dcms.io/cdn/images/content-thumbnail/'.$video->thumbnail.'" /><br />';
				echo '<a class="content-link" href="/video/view/'.$video->content_id.'">'.$video->content_name.'</a><br/>';
				for($i=0; $i<5; $i++){
						if($video->rating > $i){
							echo '<span class="glyphicon glyphicon-star"></span>';
						}
						else{
							echo '<span class="glyphicon glyphicon-star-empty"></span>';
						}
					}
				echo '<span id="'.$video->content_id.'" class="glyphicon glyphicon-trash" onclick="delete_user(this, \'wishlist\')"></span>';
				echo '</div></div>';
				}
				?>
			</div>
			<?php
			if(count($contents['video']) == 0){
				echo '
					<div class="col-lg-offset-5 col-lg-2">
						<span class="text-center ">no video available</span>
					</div>';
			}
			?>
		</div>
		<div class="row music">
			<div class="col-lg-12">
				<h4><span class="dcms-label label label-info">Music</span></h4>
				<?php
				foreach($contents['music'] as $music){
					echo '<div class="col-lg-8">';
					echo '<div class="music-list well"><span class="name-text">'.$music->content_name.'</span>';
					echo '<br /><a class="content-link" href="/music/view/'.$music->content_id.'"><span class="play-music glyphicon glyphicon-play-circle"></span></a>';
					for($i=0; $i<5; $i++){
						if($music->rating > $i){
							echo '<span class="glyphicon glyphicon-star"></span>';
						}
						else{
							echo '<span class="glyphicon glyphicon-star-empty"></span>';
						}
					}
					echo '<span id="'.$music->content_id.'" class="glyphicon glyphicon-trash" onclick="delete_user(this, \'wishlist\')"></span>';
					echo '</div></div>';				
				}
				?>
			</div>
			<?php
			if(count($contents['music']) == 0){
				echo '
					<div class="col-lg-offset-5 col-lg-2">
						<span class="text-center ">no music available</span>
					</div>';
			}
			?>
		</div>
		<div class="row image">
			<div class="col-lg-12">
				<h4><span class="dcms-label label label-info">Image</span></h4>
				<?php
				foreach($contents['image'] as $image){
					echo '<div class="col-lg-4">';
					echo '<div class="image-list well"><span class="name-text">'.$image->content_name.'</span>';
					echo '<div class="image-list-container">';
					echo '<a class="content-link" href="/image/view/'.$image->content_id.'"><img src="/cdn/images/content-thumbnail/'.$image->thumbnail.'" width="250" height="250" /></a><br/>';
					for($i=0; $i<5; $i++){
						if($image->rating > $i){
							echo '<span class="glyphicon glyphicon-star"></span>';
						}
						else{
							echo '<span class="glyphicon glyphicon-star-empty"></span>';
						}
					}
					echo '<span id="'.$image->content_id.'" class="glyphicon glyphicon-trash" onclick="delete_user(this, \'wishlist\')"></span>';
					echo '</div></div></div>';				
				}
				?>
			</div>
			<?php
			if(count($contents['image']) == 0){
				echo '
					<div class="col-lg-offset-5 col-lg-2">
						<span class="text-center ">no image available</span>
					</div>';
			}
			?>
		</div>
		<div class="row app">
			<div class="col-lg-12">
				<h4><span class="dcms-label label label-info">App</span></h4>
				<?php
				foreach($contents['app'] as $app){				
					echo '<div class="col-lg-2">';
					echo '<div class="app-list well">';
					echo '<img width="100" height="100" src="/cdn/images/content-thumbnail/'.$app->thumbnail.'" />';
					echo '<a class="content-link" href="/app/view/'.$app->content_id.'">'.$app->content_name.'</a><br/>';
					for($i=0; $i<5; $i++){
						if($app->rating > $i){
							echo '<span class="glyphicon glyphicon-star"></span>';
						}
						else{
							echo '<span class="glyphicon glyphicon-star-empty"></span>';
						}
					}
					echo '<span id="'.$app->content_id.'" class="glyphicon glyphicon-trash" onclick="delete_user(this, \'wishlist\')"></span>';
					echo '</div></div>';
				}
				?>
			</div>
			<?php
			if(count($contents['app']) == 0){
				echo '
					<div class="col-lg-offset-5 col-lg-2">
						<span class="text-center ">no app available</span>
					</div>';
			}
			?>
		</div>
		<div class="row book">
			<div class="col-lg-12">
				<h4><span class="dcms-label label label-info">Book</span></h4>
				<?php
				foreach($contents['book'] as $book){
					echo '<div class="col-lg-4"><div class="book-list well">';
					echo '<div><img width="250" width="250" src="/cdn/images/content-thumbnail/'.$book->thumbnail.'" /></div>';
					echo '<div><a class="content-link" href="/book/view/'.$book->content_id.'">'.$book->content_name.'</a></div>';
					for($i=0; $i<5; $i++){
						if($book->rating > $i){
							echo '<span class="glyphicon glyphicon-star"></span>';
						}
						else{
							echo '<span class="glyphicon glyphicon-star-empty"></span>';
						}
					}
					echo '<span id="'.$book->content_id.'" class="glyphicon glyphicon-trash" onclick="delete_user(this, \'wishlist\')"></span>';
					echo '</div></div>';
				}
			?>
			</div>
			<?php
			if(count($contents['book']) == 0){
				echo '
					<div class="col-lg-offset-5 col-lg-2">
						<span class="text-center ">no book available</span>
					</div>';
			}
			?>
		</div>
	</div>
</div>
</div>