<div class="col-lg-9">
	<div class="well">
		<?php
		$content_list = array(
			'video' => array(),
			'music' => array(),
			'image' => array(),
			'app' => array(),
			'book' => array()
		);
		foreach($creator_content->result() as $content){
			if($content->type == 'video'){
				array_push($content_list['video'], $content); 
			}
			else if($content->type == 'music'){
				array_push($content_list['music'], $content);
			}
			else if($content->type == 'image'){
				array_push($content_list['image'], $content);
			}
			else if($content->type == 'app'){
				array_push($content_list['app'], $content);
			}
			else if($content->type == 'book'){
				array_push($content_list['book'], $content);
			}
		}
		?>
		<div class="row">
			<h4>Video</h4>
			<?php
			foreach($content_list['video'] as $video){
				echo '<div class="col-lg-3">';
				echo '<div class="well">';
				echo '<img width="180" height="180" src="http://dcms.io/cdn/images/content-thumbnail/'.$video->thumbnail.'" /><br />';
				echo '<a href="/video/view/'.$video->content_id.'">'.$video->content_name.'</a>';
				echo '<span class="glyphicon glyphicon-star"></span>';
				echo '<span class="glyphicon glyphicon-star"></span>';
				echo '<span class="glyphicon glyphicon-star"></span>';
				echo '<span class="glyphicon glyphicon-star"></span>';
				echo '<span class="glyphicon glyphicon-star"></span>';
				echo '</div></div>';
			}
			?>
		</div>
		<div class="row">
			<h4>music</h4>
			<?php
			foreach($content_list['music'] as $music){
				echo '<div class="col-lg-offset-1 col-lg-8">';
				echo '<div class="well">'.$music->content_name;
				echo '<br /><a href="/music/view/'.$music->content_id.'"><span class="play-music glyphicon glyphicon-play-circle"></span></a>';
				echo '<span class="glyphicon glyphicon-star"></span>';
				echo '<span class="glyphicon glyphicon-star"></span>';
				echo '<span class="glyphicon glyphicon-star"></span>';
				echo '<span class="glyphicon glyphicon-star"></span>';
				echo '<span class="glyphicon glyphicon-star"></span>';
				echo '</div></div>';				
			}
			?>
		</div>
		<div class="row">
			<h4>image</h4>
			<?php
			foreach($content_list['image'] as $image){
				echo '<div class="col-lg-4">';
				echo '<div class="well"><span>'.$image->content_name.'</span>';
				echo '<div class="image-list-container">';
				echo '<a href="/image/view/'.$image->content_id.'"><img src="/cdn/images/content-thumbnail/'.$image->thumbnail.'" width="200" height="200" /></a>';
				echo '<span class="glyphicon glyphicon-star"></span>';
				echo '<span class="glyphicon glyphicon-star"></span>';
				echo '<span class="glyphicon glyphicon-star"></span>';
				echo '<span class="glyphicon glyphicon-star"></span>';
				echo '<span class="glyphicon glyphicon-star"></span></div>';
				echo '</div></div>';				
			}
			?>
		</div>
		<div class="row">
			<h4>app</h4>
			<?php
			foreach($content_list['app'] as $app){				
				echo '<div class="col-lg-2">';
				echo '<div class="well">';
				echo '<img width="100" height="100" src="/cdn/images/content-thumbnail/'.$app->thumbnail.'" />';
				echo '<a href="/app/view/'.$app->content_id.'">'.$app->content_name.'</a>';
				echo '</div></div>';
			}
			?>
		</div>
		<div class="row">
			<h4>book</h4>
			<?php
			foreach($content_list['book'] as $book){
				echo '<div class="col-lg-4"><div class="well">';
				echo '<div><img width="200" width="200" src="/cdn/images/content-thumbnail/'.$book->thumbnail.'" /></div>';
				echo '<div><a href="/book/view/'.$book->content_id.'">'.$book->content_name.'</a></div>';
				echo '</div></div>';
			}
			?>
		</div>
	</div>
</div>
</div>