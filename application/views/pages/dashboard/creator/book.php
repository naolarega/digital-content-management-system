<div class="col-lg-9">
	<div class="well">
		<div class="row">
			<div class="col-lg-12">
			<?php
				foreach($contents->result() as $book){
					echo '<div class="col-lg-4"><div class="book-list well">';
					echo '<div><img width="250" width="250" src="/cdn/images/content-thumbnail/'.$book->thumbnail.'" /></div>';
					echo '<div><a class="content-link" href="/book/view/'.$book->content_id.'">'.$book->content_name.'</a></div>';
					for($i=0; $i<5; $i++){
						if($book->rating > $i){
							echo '<span class="glyphicon glyphicon-star"></span>';
						}
						else{
							echo '<span class="glyphicon glyphicon-star-empty"></span>';
						}
					}
					echo '<button id="'.$book->content_id.'" class="btn btn-link" onclick="delete_creator_content(this, \'book\')"><span class="glyphicon glyphicon-trash"></span></button>';
					echo '<button id="'.$book->content_id.'" data-toggle="modal" data-target="#edit-modal" class="edit btn btn-link" onclick="edit_creator_content(this, \'book\', \'modal\')">
							<span class="glyphicon glyphicon-edit"></span></button>';
					echo '</div></div>';
				}
			?>
			</div>
			<div class="col-lg-offset-5 col-lg-2">
				<a type="button" class="btn btn-default" href="/creator/book/upload">
					<span class="glyphicon glyphicon-upload"></span>
					upload book
				</a>
			</div>
		</div>
	</div>
</div>
</div>