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
						<li><a href="/image/sort/alphabet"><span class="glyphicon glyphicon-sort-by-alphabet"></span>alphabet</a></li>
						<li><a href="/image/sort/rate"><span class="glyphicon glyphicon-star"></span>user rate</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row digital-contents">
			<?php
				foreach($contents->result() as $image){
					if ($image->approved == 1){
						echo '<div class="col-lg-4">';
						echo '<div class="image-list well"><span class="name-text">'.$image->content_name.'</span>';
						echo '<div class="image-list-container">';
						echo '<a href="/image/view/'.$image->content_id.'"><img src="/cdn/images/content-thumbnail/'.$image->thumbnail.'" width="250" height="250" /></a>';
						echo '<br /><a class="btn btn-default btn-sm" href="/view_creator/'.$image->user_id.'">';
						echo '<span class="glyphicon glyphicon-chevron-left"></span>creator</a>';
						for($i=0; $i<5; $i++){
							if($image->rating > $i){
								echo '<span class="glyphicon glyphicon-star"></span>';
							}
							else{
								echo '<span class="glyphicon glyphicon-star-empty"></span>';
							}
						}
						if($image->price > 0){
							echo '<br/><span class="price-text">'.$image->price.' birr</span>';
						}
						else{
							echo '<br/><span class="price-text">free</span>';
						}
						echo '</div></div></div>';
					}
				}
			?>
		</div>
	</div>
</div>
</div>