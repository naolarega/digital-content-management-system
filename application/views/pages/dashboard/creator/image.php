<div class="col-lg-9">
	<div class="well">
		<div class="row">
			<div class="col-lg-12">
			<?php
				foreach($contents->result() as $image){
					echo '<div class="col-lg-4">';
					echo '<div class="well"><span>'.$image->content_name.'</span>';
					echo '<div class="image-list-container">';
					echo '<a href="/image/view/'.$image->content_id.'"><img src="/cdn/images/content-thumbnail/'.$image->thumbnail.'" width="200" height="200" /></a>';
					echo '<div ><span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span>';
					echo '<span class="glyphicon glyphicon-star"></span></div>';
					echo '<span id="'.$image->content_id.'" class="glyphicon glyphicon-trash" onclick="delete_creator_content(this, \'image\')"></span>';
					echo '<button id="'.$image->content_id.'" data-toggle="modal" data-target="#edit-modal" class="edit btn btn-link" onclick="edit_creator_content(this, \'image\', \'modal\')">
							<span class="glyphicon glyphicon-edit"></span></button>';
					echo '</div></div></div>';
				}
			?>
			</div>
			<div class="col-lg-offset-5 col-lg-2">
				<a type="button" class="btn btn-default" href="/creator/image/upload">
					<span class="glyphicon glyphicon-upload"></span>
					upload image
				</a>
			</div>
		</div>
	</div>
</div>
</div>