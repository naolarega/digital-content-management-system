	<div class="col-lg-9">
		<div class="well">
			<div class="row">
				<div class="col-lg-8">
					<?php
						$user = array();
						$is_payed = false;
						if(get_cookie('dcms_username') != null){								
							$user = $this->db->get_where('user', array('user_name' => get_cookie('dcms_username', true)));
							$user = $user->result()[0];
						}
						$video = $content->result()[0];
						if($video->price > 0){
							if(get_cookie('dcms_type') == 1){
								$customer = $this->db->get_where('customer', array('user_id' => $user->user_id))->result()[0];
								$payed_content = unserialize($customer->payed_content);
								if($payed_content){
									if(array_search($video->content_id, $payed_content) !== false){
										$is_payed = true;
									}
								}
							}
							echo '<h4 class="content-view-title">'.$video->content_name.' <span class="label label-info">payed content</span></h4>';
						}
						else{
							echo '<h4 class="content-view-title">'.$video->content_name.'</h4>';
						}
					?>
					<video class="video-player" width="640" height="360" autoplay controls>
						<?php
							if($video->price > 0 and get_cookie('dcms_type') == 1){
								if($is_payed){
									echo '<source id="video-source" src="/cdn/user-content/videos/'.$video->file_name.'" type="video/mp4" /></source>';
								}
								else{
									echo '<source id="video-source" src="/cdn/user-content/videos/default.mp4" type="video/mp4" /></source>';
								}
							}
							else if($video->price > 0 and get_cookie('dcms_type') == 2){
								if($video->user_id == $user->user_id){
									echo '<source id="video-source" src="/cdn/user-content/videos/'.$video->file_name.'" type="video/mp4"></source>'; 
								}
								else{
									echo '<source id="video-source" src="/cdn/user-content/videos/default.mp4" type="video/mp4" /></source>'; 
								}
							}
							else{
								echo '<source id="video-source" src="/cdn/user-content/videos/'.$video->file_name.'" type="video/mp4" /></source>'; 
							}
						?>
						your browser does not support video
					</video>
					<div class="content-view-btn">
					<?php
					if(get_cookie('dcms_username') != null){
						$links['facebook'] = 'https://facebook.com/sharer.php?u='.current_url();
						$links['twitter'] = 'https://twitter.com/intent/tweet?url='.current_url().'&text=dcms&hashtag=dcms';
						$links['linkedin'] = 'https://www.linkedin.com/sharearticle?url='.current_url().'&mini=true';
						echo '<input id="content_id" type="hidden" value="'.$video->content_id.'" />';
						echo '<input id="user_id" type="hidden" value="'.$user->user_id.'" />';
						echo '<input id="creator_id" type="hidden" value="'.$video->user_id.'" />';
						echo '<a class="btn btn-default" data-toggle="modal" data-target="#comment-modal">
							<span class="glyphicon glyphicon-comment"></span>comment</a>';
						if(get_cookie('dcms_type') == 1){								
							echo '<button id="favorite" class="btn btn-default" ><span class="glyphicon glyphicon-thumbs-up"></span>like</button>';
							if(!$is_payed and $video->price > 0){
								echo '<button id="wishlist" class="wishlist-btn btn btn-default" ><span class="glyphicon glyphicon-arrow-down"></span>add to wishlist</button>';
							}
						}
						echo '<div class="dropdown" style="display:inline">
								<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">share
								<span class="glyphicon glyphicon-share"></span></button>
								<ul class="dropdown-menu">
								<li><a target="_blank" href="'.$links['facebook'].'">facebook</a></li>
								<li><a target="_blank" href="'.$links['twitter'].'">twitter</a></li>
								<li><a target="_blank" href="'.$links['linkedin'].'">linkedin</a></li>
								</ul>
							</div>';
						$star_f = '<span class="glyphicon glyphicon-star"></span>';
						$star_e = '<span class="glyphicon glyphicon-star-empty"></span>';
						echo '<div class="dropdown" style="display:inline">
								<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">rate
								<span class="glyphicon glyphicon-share"></span></button>
								<ul class="dropdown-menu">
								<li><a onclick="rate_content(1)">'.$star_f.$star_e.$star_e.$star_e.$star_e.'</a></li>
								<li><a onclick="rate_content(2)">'.$star_f.$star_f.$star_e.$star_e.$star_e.'</a></li>
								<li><a onclick="rate_content(3)">'.$star_f.$star_f.$star_f.$star_e.$star_e.'</a></li>
								<li><a onclick="rate_content(4)">'.$star_f.$star_f.$star_f.$star_f.$star_e.'</a></li>
								<li><a onclick="rate_content(5)">'.$star_f.$star_f.$star_f.$star_f.$star_f.'</a></li>
								</ul>
							</div>';
						if($video->price > 0 and get_cookie('dcms_type') == 1 and !$is_payed){
							echo '<input type="hidden" class="payed-content" value="'.$video->content_id.'" />';
							echo '<button class="pay-btn btn btn-default" value="payed-content" onclick="payment()">
								<span class="glyphicon glyphicon-shopping-cart">
								pay</button>';
						}
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
										<textarea class="form-control" rows="5" id="comment_area"></textarea>
									</div>
								</div>
								<div class="modal-footer">
									<button id="comment" type="button" class="btn btn-default" data-dismiss="modal">send comment</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div style="display:inline; height:400px;">
						<h4><span class="dcms-label label label-info">description:</span></h4>
						<?php
							echo $video->description; 
						?>
					</div>
					<?php
						if($video->price > 0 and !$is_payed){
							echo '<h4><span class="dcms-label label label-info">price</span></h4>';
							echo $video->price.' birr';
						}
					?>
				</div>
			</div>
			<div class="row">
				<div class="comment-display col-lg-8">
					<h4><span class="dcms-label label label-info">comments</span></h4>
					<?php
						foreach($comments->result() as $comment){
							if($comment->approved == true){
								$user = $this->db->get_where('user', array('user_id' => $comment->user_id));
								$user = $user->result()[0];
							echo '<div class="comment-lists"><img width="30" height="30" class="img-circle comment-profile" src="/cdn/images/user-profile/'.$user->profile_image.'" />';
							echo '<span>'.$user->user_name.': </span>';
							echo '<span class="comment-item">'.$comment->comment.'</span></div>';
							}
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>