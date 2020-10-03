<div class="row">
	<div class="col-lg-2">
		<div class="well">
			<div class="row">
				<?php
					$videos = array(
						'1' => 'tag number0',
						'2' => 'tag number1',
						'3' => 'tag number2',
						'4' => 'tag number3',
						'5' => 'tag number4',
						'6' => 'tag number5'
					);
					foreach($videos as $vid){
						echo "<div class='col-lg-12'>";
						echo "<buttun class='btn btn-link btn-block'>".$vid;
						echo "<span class='glyphicon glyphicon-plus pull-right'></span></div>";
						echo "</button>";
					}
				?>
			</div>
		</div>
	</div>