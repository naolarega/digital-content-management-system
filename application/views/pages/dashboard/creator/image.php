<div class="col-lg-9">
	<div class="well">
		<div class="row">
			<div class="col-lg-12">
			<?php
				foreach($contents->result() as $image){
					echo '<div class="col-lg-4">';
					echo '<div class="image-list well"><span class="name-text">'.$image->content_name.'</span>';
					echo '<div class="image-list-container">';
					echo '<a href="/image/view/'.$image->content_id.'"><img src="/cdn/images/content-thumbnail/'.$image->thumbnail.'" width="250" height="250" /></a><br/>';
					for($i=0; $i<5; $i++){
						if($image->rating > $i){
							echo '<span class="glyphicon glyphicon-star"></span>';
						}
						else{
							echo '<span class="glyphicon glyphicon-star-empty"></span>';
						}
					}
					echo '<button id="'.$image->content_id.'" class="btn btn-link" onclick="delete_creator_content(this, \'image\')"><span class="glyphicon glyphicon-trash"></span></button>';
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