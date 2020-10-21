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
						<li><a href="/music/sort/alphabet">alphabet</a></li>
						<li><a href="/music/sort/rate">user rate</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row digital-contents">
			<?php
				foreach($contents->result() as $music){
					echo '<div class="col-lg-offset-1 col-lg-8">';
					echo '<div class="well">'.$music->content_name;
					echo '<br /><a href="/music/view/'.$music->content_id.'"><span class="play-music glyphicon glyphicon-play-circle"></span></a>';
					echo '<br /><a class="btn btn-default btn-sm" href="/view_creator/'.$music->user_id.'">';
					echo '<span class="glyphicon glyphicon-chevron-left"></span>creator</a>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '</div></div>';
				}
			?>
		</div>
	</div>
</div>
</div>