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
						<li><a href="/book/sort/alphabet">alphabet</a></li>
						<li><a href="/book/sort/rate">user rate</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row digital-contents">
			<?php
				foreach($contents->result() as $book){
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