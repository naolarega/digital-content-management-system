<div class="col-lg-9">
	<div class="content-list-well well">
		<div class="row">
			<div class="col-lg-12">
				<div class="dropdown pull-right">
					<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
						<span class="glyphicon glyphicon-sort"></span>
						Sort by
						<span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a href="/video/sort/alphabet"><span class="glyphicon glyphicon-sort-by-alphabet"></span>alphabet</a></li>
						<li><a href="/video/sort/rate"><span class="glyphicon glyphicon-star"></span>user rate</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row digital-contents">
			<?php
				foreach($contents->result() as $video){
					if ($video->approved == 1){
					echo '<div class="col-lg-3">';
					echo '<div class="video-list well">';
					echo '<img width="180" height="180" src="http://dcms.io/cdn/images/content-thumbnail/'.$video->thumbnail.'" /><br />';
					echo '<a class="content-link" href="/video/view/'.$video->content_id.'">'.$video->content_name.'</a>';
					echo '<br /><a class="btn btn-default btn-sm" href="/view_creator/'.$video->user_id.'">';
					echo '<span class="glyphicon glyphicon-chevron-left"></span>creator</a>';
					for($i=0; $i<5; $i++){
						if($video->rating > $i){
							echo '<span class="glyphicon glyphicon-star"></span>';
						}
						else{
							echo '<span class="glyphicon glyphicon-star-empty"></span>';
						}
					}
					if($video->price > 0){
						echo '<br/><span class="price-text">'.$video->price.' birr</span>';
					}
					else{
						echo '<br/><span class="price-text">free</span>';
					}
					echo '</div></div>';
					}
				}
			?>
		</div>
	</div>
</div>
</div>