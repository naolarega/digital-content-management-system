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
						<?php
						if(get_cookie('dcms_username') != null){
							$user = $this->db->get_where('user', array('user_name' => get_cookie('dcms_username', true)));
							$user = $user->result()[0];
							$links['facebook'] = 'https://facebook.com/sharer.php?u='.current_url();
							$links['twitter'] = 'https://twitter.com/intent/tweet?url='.current_url().'&text=dcms&hashtag=dcms';
							$links['linkedin'] = 'https://www.linkedin.com/sharearticle?url='.current_url().'&mini=true';
							echo '<input id="content_id" type="hidden" value="'.$app->content_id.'" />';
							echo '<input id="user_id" type="hidden" value="'.$user->user_id.'" />';
							echo '<a class="btn btn-default" data-toggle="modal" data-target="#comment-modal">
								<span class="glyphicon glyphicon-comment"></span>comment</a>';
							echo '<a id="favorite" class="btn btn-default" ><span class="glyphicon glyphicon-thumbs-up"></span>like</a>';
							echo '<button id="wishlist" class="btn btn-default" ><span class="glyphicon glyphicon-arrow-down"></span>add to wishlist</a>';
							echo '<div class="dropdown">
									<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">share
									<span class="glyphicon glyphicon-share"></span></button>
									<ul class="dropdown-menu">
									<li><a target="_blank" href="'.$links['facebook'].'">facebook</a></li>
									<li><a target="_blank" href="'.$links['twitter'].'">twitter</a></li>
									<li><a target="_blank" href="'.$links['linkedin'].'">linkedin</a></li>
									</ul>
								</div>';
						}
						?>
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
</div>