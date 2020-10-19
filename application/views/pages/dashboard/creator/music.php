<div class="col-lg-9">
	<div class="well">
		<div class="row">
			<div class="col-lg-12">
			<?php
				foreach($contents->result() as $music){
					echo '<div class="col-lg-offset-1 col-lg-8">';
					echo '<div class="well">'.$music->content_name;
					echo '<br /><a href="/music/view/'.$music->content_id.'"><span class="play-music glyphicon glyphicon-play-circle"></span></a>';
					echo '</div></div>';
				}
			?>
			</div>
			<div class="col-lg-offset-5 col-lg-2">
				<a type="button" class="btn btn-default" href="/creator/music/upload">
					<span class="glyphicon glyphicon-upload"></span>
					upload music
				</a>
			</div>
		</div>
	</div>
</div>
</div>