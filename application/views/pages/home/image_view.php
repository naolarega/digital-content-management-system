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
						<?php
						if(get_cookie('dcms_username') != null){
							$user = $this->db->get_where('user', array('user_name' => get_cookie('dcms_username', true)));
							$user = $user->result()[0];
							$links['facebook'] = 'https://facebook.com/sharer.php?u='.current_url();
							$links['twitter'] = 'https://twitter.com/intent/tweet?url='.current_url().'&text=dcms&hashtag=dcms';
							$links['linkedin'] = 'https://www.linkedin.com/sharearticle?url='.current_url().'&mini=true';
							echo '<input id="content_id" type="hidden" value="'.$image->content_id.'" />';
							echo '<input id="user_id" type="hidden" value="'.$user->user_id.'" />';
							echo '<span id="favorite" class="image-btn glyphicon glyphicon-thumbs-up"></span>';
							echo '<span id="wishlist" class="image-btn glyphicon glyphicon-thumbs-down"></span>';
							echo '<a data-toggle="modal" data-target="#comment-modal">
								<span class="image-btn glyphicon glyphicon-comment"></span></a>';
							echo '<div class="dropdown">
									<button class="btn btn-link dropdown-toggle" type="button" data-toggle="dropdown">
									<span class="glyphicon glyphicon-share"></span></button>
									<ul class="dropdown-menu">
									<li><a target="_blank" href="'.$links['facebook'].'">facebook</a></li>
									<li><a target="_blank" href="'.$links['twitter'].'">twitter</a></li>
									<li><a target="_blank" href="'.$links['linkedin'].'">linkedin</a></li>
									</ul>
								</div>';
						}
						?>
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
									<textarea class="form-control" rows="5" id="comment_area"></textarea>
								</div>
							</div>
							<div class="modal-footer">
								<button id="comment" type="button" class="btn btn-default" data-dismiss="modal">send comment</button>
							</div>
						</div>
					</div>
				</div>
				<div class="comment-display col-lg-6">
					<h4>comment</h4>
					<?php
						foreach($comments->result() as $comment){
							if($comment->approved == true){
								$user_name = $this->db->get_where('user', array('user_id' => $comment->user_id));
								$user_name = $user_name->result()[0]->user_name;
								echo '<span>'.$user_name.': </span>';
								echo '<span>'.$comment->comment.'</span>';
							}
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>