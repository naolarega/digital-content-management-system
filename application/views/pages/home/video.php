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
						<li><a href="#">alphabet</a></li>
						<li><a href="#">user rate</a></li>
						<li><a href="#">view</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row digital-contents">
			<?php
				$videos = array(
					'1' => 'video title0',
					'2' => 'video title1',
					'3' => 'video title2',
					'4' => 'video title3',
					'5' => 'video title4',
					'6' => 'video title5'
				);
				foreach($videos as $vid){
					echo "<div class='col-lg-6'>";
					echo "<div class='well'>";
					echo "<img class='img-thumbnail' src='/public/image/thumb.jpg' /><br />".$vid;
					echo "<br /><a class='btn btn-default btn-sm' href='view_creator'>";
					echo "<span class='glyphicon glyphicon-chevron-left'></span>creator</a>";
					echo "<span class='glyphicon glyphicon-star'></span>";
					echo "<span class='glyphicon glyphicon-star'></span>";
					echo "<span class='glyphicon glyphicon-star'></span>";
					echo "<span class='glyphicon glyphicon-star'></span>";
					echo "<span class='glyphicon glyphicon-star'></span>";
					echo "</div></div>";
				}
			?>
		</div>
	</div>
</div>
</div>