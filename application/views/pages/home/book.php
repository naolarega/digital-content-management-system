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
					'1' => 'book title0',
					'2' => 'book title1',
					'3' => 'book title2',
					'4' => 'book title3',
					'5' => 'book title4',
					'6' => 'book title5'
				);
				foreach($videos as $vid){
					echo "<div class='col-lg-4'>";
					echo "<div class='well'>".$vid."</div>";
					echo "</div>";
				}
			?>
		</div>
	</div>
</div>
</div>