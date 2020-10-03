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
					'1' => 'music title0',
					'2' => 'music title1',
					'3' => 'music title2',
					'4' => 'music title3',
					'5' => 'music title4',
					'6' => 'music title5'
				);
				foreach($videos as $vid){
					echo "<div class='col-lg-offset-1 col-lg-8'>";
					echo "<div class='well'>".$vid;
					echo "<br /><span class='glyphicon glyphicon-play-circle'></span>";
					echo "<br /><button class='btn btn-default btn-sm'>";
					echo "<span class='glyphicon glyphicon-chevron-left'></span>creator</button>";
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