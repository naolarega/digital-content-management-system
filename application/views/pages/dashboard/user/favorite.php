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
			if(isset($favorite)){
				foreach($favorite->result() as $content){
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
				<h4>Video</h4>
				<?php
				foreach($contents['video'] as $video){
				echo '<div class="col-lg-3">';
				echo '<div class="well">';
				echo '<img width="180" height="180" src="http://dcms.io/cdn/images/content-thumbnail/'.$video->thumbnail.'" /><br />';
				echo '<a href="/video/view/'.$video->content_id.'">'.$video->content_name.'</a>';
				echo '<span id="'.$video->content_id.'" class="glyphicon glyphicon-trash" onclick="delete_user(this, \'favorite\')"></span>';
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
				<h4>Music</h4>
				<?php
				foreach($contents['music'] as $music){
					echo '<div class="col-lg-offset-1 col-lg-8">';
					echo '<div class="well">'.$music->content_name;
					echo '<br /><a href="/music/view/'.$music->content_id.'"><span class="play-music glyphicon glyphicon-play-circle"></span></a>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span id="'.$music->content_id.'" class="glyphicon glyphicon-trash" onclick="delete_user(this, \'favorite\')"></span>';
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
				<h4>Image</h4>
				<?php
				foreach($contents['image'] as $image){
					echo '<div class="col-lg-4">';
					echo '<div class="well"><span>'.$image->content_name.'</span>';
					echo '<div class="image-list-container">';
					echo '<a href="/image/view/'.$image->content_id.'"><img src="/cdn/images/content-thumbnail/'.$image->thumbnail.'" width="200" height="200" /></a>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span></div>';
					echo '<span id="'.$image->content_id.'" class="glyphicon glyphicon-trash" onclick="delete_user(this, \'favorite\')"></span>';
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
				<h4>App</h4>
				<?php
				foreach($contents['app'] as $app){				
					echo '<div class="col-lg-2">';
					echo '<div class="well">';
					echo '<img width="100" height="100" src="/cdn/images/content-thumbnail/'.$app->thumbnail.'" />';
					echo '<a href="/app/view/'.$app->content_id.'">'.$app->content_name.'</a>';
					echo '<span id="'.$app->content_id.'" class="glyphicon glyphicon-trash" onclick="delete_user(this, \'favorite\')"></span>';
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
				<h4>Book</h4>
				<?php
				foreach($contents['book'] as $book){
					echo '<div class="col-lg-4"><div class="well">';
					echo '<div><img width="200" width="200" src="/cdn/images/content-thumbnail/'.$book->thumbnail.'" /></div>';
					echo '<div><a href="/book/view/'.$book->content_id.'">'.$book->content_name.'</a></div>';
					echo '<span id="'.$book->content_id.'" class="glyphicon glyphicon-trash" onclick="delete_user(this, \'favorite\')"></span>';
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