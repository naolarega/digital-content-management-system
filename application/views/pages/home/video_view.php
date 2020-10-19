	<div class="col-lg-9">
		<div class="well">
			<div class="row">
				<div class="col-lg-8">
					<div class="video-player-container">
						<span>video title</span> 
						<video width="640" height="360" autoplay controls>
							<?php
							$video = $content->result()[0];
							echo '<source src="/cdn/user-content/videos/'.$video->file_name.'" type="video/mp4" />';
							?>
							your browser doesn't support video
						</video>
						<?php
						if(get_cookie('dcms_username') != null){
							echo '<a class="btn btn-default" data-toggle="modal" data-target="#comment-modal">
								<span class="glyphicon glyphicon-comment"></span>comment</a>';
						}
						?>
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
				<div class="col-lg-4">
					<?php
						
					?>
				</div>
			</div>
		</div>
	</div>
</div>