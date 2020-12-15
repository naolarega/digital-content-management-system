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
						<li><a href="/app/sort/alphabet"><span class="glyphicon glyphicon-sort-by-alphabet"></span>alphabet</a></li>
						<li><a href="/app/sort/rate"><span class="glyphicon glyphicon-star"></span>user rate</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row digital-contents">
			<?php
				foreach($contents->result() as $app){
					if ($app->approved == 1){
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
					if($app->price > 0){
						echo '<br/><span class="price-text">'.$app->price.' birr</span>';
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