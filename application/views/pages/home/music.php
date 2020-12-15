<div class="col-lg-9">
	<div class="well">
		<div class="row">
			<div class="col-lg-12">
				<div class="dropdown pull-right">
					<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
						<span class="glyphicon glyphicon-sort"></span>
						Sort by
						<span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a href="/music/sort/alphabet"><span class="glyphicon glyphicon-sort-by-alphabet"></span>alphabet</a></li>
						<li><a href="/music/sort/rate"><span class="glyphicon glyphicon-star"></span>user rate</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row digital-contents">
			<?php
				foreach($contents->result() as $music){
					if ($music->approved == 1){
					echo '<div class="col-lg-offset-1 col-lg-8">';
					echo '<div class="music-list well">'.$music->content_name;
					echo '<br /><a href="/music/view/'.$music->content_id.'"><span class="play-music glyphicon glyphicon-play-circle"></span></a>';
					echo '<br /><a class="btn btn-default btn-sm" href="/view_creator/'.$music->user_id.'">';
					echo '<span class="glyphicon glyphicon-chevron-left"></span>creator</a>';
					for($i=0; $i<5; $i++){
						if($music->rating > $i){
							echo '<span class="glyphicon glyphicon-star"></span>';
						}
						else{
							echo '<span class="glyphicon glyphicon-star-empty"></span>';
						}
					}
					if($music->price > 0){
						echo '<span class="price-text">'.$music->price.' birr</span>';
					}
					else{
						echo '<span class="price-text">free</span>';
					}
					echo '</div></div>';
					}
				}
			?>
		</div>
	</div>
</div>
</div>