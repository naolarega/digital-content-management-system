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
						<li><a href="/app/sort/alphabet">alphabet</a></li>
						<li><a href="/app/sort/rate">user rate</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row digital-contents">
			<?php
				foreach($contents->result() as $app){
					echo '<div class="col-lg-2">';
					echo '<div class="well">';
					echo '<img width="100" height="100" src="/cdn/images/content-thumbnail/'.$app->thumbnail.'" />';
					echo '<a href="/app/view/'.$app->content_id.'">'.$app->content_name.'</a>';
					echo '</div></div>';
				}
			?>
		</div>
	</div>
</div>
</div>