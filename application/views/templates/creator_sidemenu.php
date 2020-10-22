<div class="row dashboard-middle-body">
	<div class="col-lg-3">
		<div class="well">
			<ul class="nav nav-pills nav-stacked">
				<?php if($page =='video')echo '<li class="active">';
						else echo '<li>'?><a href="/creator/video" class="text-center">video</a></li> 
				<?php if($page =='music')echo '<li class="active">';
						else echo '<li>'?><a href="/creator/music" class="text-center">music</a></li> 
				<?php if($page =='image')echo '<li class="active">';
						else echo '<li>'?><a href="/creator/image" class="text-center">image</a></li> 
				<?php if($page =='app')echo '<li class="active">';
						else echo '<li>'?><a href="/creator/app" class="text-center">app</a></li> 
				<?php if($page =='book')echo '<li class="active">';
						else echo '<li>'?><a href="/creator/book" class="text-center">book</a></li>  
				<li class="divider"></li>
				<?php if($page =='setting')echo '<li class="active">';
						else echo '<li>'?><a href="/creator/setting" class="text-center">setting</a></li> 
			</ul>
			<?php
			if(isset($error)){
				if($error == 'uploaded successfuly'){
					echo '<div class="alert alert-success">
					<strong>Success!</strong> '.$page.' uploaded successfuly.
					</div>';
				}
			}
			?>
		</div>
		<div id="edit-modal" class="modal fade" role="dialog">
		<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">edit content</h4>
		</div>
		<div class="modal-body">
		<div class="form-group">
		<input name="title" type="text" class="form-control" id="edit-title" placeholder="title">
		</div>
		<div class="form-group">
		<textarea name="description" class="form-control" rows="5" id="edit-description" placeholder="description"></textarea>
		</div>
		<div class="form-group">
		<select name="tags" class="form-control" id="edit-tags">
			<option value="general">general</option>
			<option value="education">education</option>
			<option value="entertainment">entertainment</option>
		</select>
		</div>
		</div>
		<div class="modal-footer">
		<button type="button" onclick="edit_creator_content(this, '', 'done')" class="btn btn-default">edit</button>
		<button type="button" class="edit-cancel btn btn-default" data-dismiss="modal">cancel</button>
		</div>
		</div>
		</div>
		</div>
	</div>