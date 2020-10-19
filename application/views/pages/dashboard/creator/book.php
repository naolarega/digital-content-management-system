<div class="col-lg-9">
	<div class="well">
		<div class="row">
			<div class="col-lg-12">
			<?php
				foreach($contents->result() as $book){
					echo '<div class="col-lg-4"><div class="well">';
					echo '<div><img width="200" width="200" src="/cdn/images/content-thumbnail/'.$book->thumbnail.'" /></div>';
					echo '<div><a href="/book/view/'.$book->content_id.'">'.$book->content_name.'</a></div>';
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