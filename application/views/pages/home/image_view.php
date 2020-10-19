	<div class="col-lg-9">
		<div class="well">
			<div class="row">
				<?php
				$image = $content->result()[0];
				?>
				<div class="col-lg-6">
					<img src="/cdn/user-content/images/<?php echo $image->file_name; ?>" width="500" height="500"/>
				</div>
				<div class="col-lg-6">
					<div class="image-option well">
						<div class="image-title">
							<span>image title</span>
						</div>
						<div class="image-like-comment">
							<span class="image-btn glyphicon glyphicon-thumbs-up"></span>
							<span class="image-btn glyphicon glyphicon-thumbs-down"></span>
							<a data-toggle="modal" data-target="#comment-modal">
								<span class="image-btn glyphicon glyphicon-comment"></span></a>
						</div>
						<div class="dropdown resolution">
							<button class="btn btn-link dropdown-toggle" type="button" data-toggle="dropdown">resolution
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">1920x1080</a></li>
								<li><a href="#">1280x720</a></li>
								<li><a href="#">640x360</a></li>
							</ul>
						</div>
						<div class="download-button-container">
							<button class="btn btn-default">download</button>
						</div>
					</div>
				</div>
				<div id="comment-modal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">comment</h4>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label for="comment">comment:</label>
									<textarea class="form-control" rows="5" id="comment"></textarea>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">send comment</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>