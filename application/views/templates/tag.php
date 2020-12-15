<div class="row middle-body">
	<div class="col-lg-2">
		<div class="side-well well">
			<div class="row">
				<?php
					$page = $this->uri->segment(1,'video');
					$tags = array(
						'1' => 'general',
						'2' => 'entertainment',
						'3' => 'education',
					);
					foreach($tags as $tag){
						echo '<div class="col-lg-12">';
						echo '<a class="btn btn-link btn-block" href="/'.$page.'/tag/'.$tag.'">'.$tag;
						echo '<span class="glyphicon glyphicon-plus pull-right"></span></a>';
						echo '</div>';
					}
				?>
			</div>
		</div>
	</div>