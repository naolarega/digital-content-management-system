<div class="col-lg-9">
	<div class="well">
		<div class="row">
			<div class="col-lg-12">
			<?php
				foreach($contents->result() as $app){
					echo '<div class="col-lg-2">';
					echo '<div class="well">';
					echo '<img width="100" height="100" src="/cdn/images/content-thumbnail/'.$app->thumbnail.'" />';
					echo '<a href="/app/view/'.$app->content_id.'">'.$app->content_name.'</a>';
					echo '<span id="'.$app->content_id.'" class="glyphicon glyphicon-trash" onclick="delete_creator_content(this, \'app\')"></span>';
					echo '<button id="'.$app->content_id.'" data-toggle="modal" data-target="#edit-modal" class="edit btn btn-link" onclick="edit_creator_content(this, \'app\', \'modal\')">
							<span class="glyphicon glyphicon-edit"></span></button>';
					echo '</div></div>';
				}
			?>
			</div>
			<div class="col-lg-offset-5 col-lg-2">
				<a type="button" class="btn btn-default" href="/creator/app/upload">
					<span class="glyphicon glyphicon-upload"></span>
					upload app
				</a>
			</div>
		</div>
	</div>
</div>
</div>