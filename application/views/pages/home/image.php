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
						<li><a href="/image/sort/alphabet">alphabet</a></li>
						<li><a href="/image/sort/rate">user rate</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row digital-contents">
			<?php
				foreach($contents->result() as $image){
					echo '<div class="col-lg-4">';
					echo '<div class="well"><span>'.$image->content_name.'</span>';
					echo '<div class="image-list-container">';
					echo '<a href="/image/view/'.$image->content_id.'"><img src="/cdn/images/content-thumbnail/'.$image->thumbnail.'" width="200" height="200" /></a>';
					echo '<br /><a class="btn btn-default btn-sm" href="/view_creator/'.$image->user_id.'">';
					echo '<span class="glyphicon glyphicon-chevron-left"></span>creator</a>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span></div>';
					echo '</div></div></div>';
				}
			?>
		</div>
	</div>
</div>
</div>