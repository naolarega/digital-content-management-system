	<div class="col-lg-9">
		<div class="well">
			<div class="row">
				<div class="col-lg-8">
					<div class="app-container">
						<?php
						$app = $content->result()[0];
						?>
						<span>app title</span>
						<img class="app-thumbnail" src="<?php echo '/cdn/images/content-thumbnail/'.$app->thumbnail; ?>" />
						<div class="app-description">
							<p>
								<?php echo $app->description; ?>
							</p>
						</div>
						<a class="btn btn-default" download href="<?php echo '/cdn/user-content/apps/'.$app->file_name; ?>">
							<span class="glyphicon glyphicon-download"></span>download</a>
						<a class="btn btn-default" data-toggle="modal" data-target="#comment-modal">
							<span class="glyphicon glyphicon-comment"></span>comment</a>
					</div>
					<div class="comment-display">
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
</div>