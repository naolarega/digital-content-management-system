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
						$book = $content->result()[0];
						$book_extra = $this->db->get_where('book', array('content_id' => $book->content_id))->result()[0];
						if($book->price > 0){
							if(get_cookie('dcms_type') == 1){
								$customer = $this->db->get_where('customer', array('user_id' => $user->user_id))->result()[0];
								$payed_content = unserialize($customer->payed_content);
								if($payed_content){
									if(array_search($book->content_id, $payed_content) !== false){
										$is_payed = true;
									}
									
								}
							}
							echo '<h4 class="content-view-title">'.$book->content_name.' <span class="label label-info">payed content</span></h4>';
						}
						else{
							echo '<h4 class="content-view-title">'.$book->content_name.'</h4>';
						}
					?>
					<img width="218" height="218"  class="book-thumbnail" src="<?php echo '/cdn/images/content-thumbnail/'.$book->thumbnail; ?>" /><br/>
					<div class="content-view-btn">
					<?php
					if(get_cookie('dcms_username') != null){
						$user = $this->db->get_where('user', array('user_name' => get_cookie('dcms_username', true)));
						$user = $user->result()[0];
						$links['facebook'] = 'https://facebook.com/sharer.php?u='.current_url();
						$links['twitter'] = 'https://twitter.com/intent/tweet?url='.current_url().'&text=dcms&hashtag=dcms';
						$links['linkedin'] = 'https://www.linkedin.com/sharearticle?url='.current_url().'&mini=true';
						echo '<input id="content_id" type="hidden" value="'.$book->content_id.'" />';
						echo '<input id="user_id" type="hidden" value="'.$user->user_id.'" />';
						echo '<input id="creator_id" type="hidden" value="'.$book->user_id.'" />';
						if($book->price > 0 and $is_payed or $book->price == 0 or get_cookie('dcms_type') == 3 or $book->user_id == $user->user_id){								
							echo '<a id="download" class="btn btn-default" download href="/cdn/user-content/books/'.$book->file_name.'">
								<span class="glyphicon glyphicon-download"></span>download</a>';
						}
						else{								
							echo '<a id="download" class="disabled btn btn-default" download>
								<span class="glyphicon glyphicon-download"></span>download</a>';
						}
						echo '<a class="btn btn-default" data-toggle="modal" data-target="#comment-modal">
							<span class="glyphicon glyphicon-comment"></span>comment</a>';
						if(get_cookie('dcms_type') == 1){								
							echo '<button id="favorite" class="btn btn-default" ><span class="glyphicon glyphicon-thumbs-up"></span>like</button>';
							if(!$is_payed and $book->price > 0){
								echo '<button id="wishlist" class="wishlist-btn btn btn-default" ><span class="glyphicon glyphicon-arrow-down"></span>add to wishlist</button>';
							}
						}
						echo '<div class="dropdown" style="display:inline;">
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
						echo '<div class="dropdown" style="display:inline;">
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
						if($book->price > 0 and get_cookie('dcms_type') == 1 and !$is_payed){
							echo '<input type="hidden" class="payed-content" value="'.$book->content_id.'" />';
							echo '<button class="pay-btn btn btn-default" value="payed-content" onclick="payment()">
								<span class="glyphicon glyphicon-shopping-cart">
								pay</button>';
						}
					}
					?>
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
				<div class="col-lg-4">
					<div style="display:inline; height:400px;">
						<h4><span class="dcms-label label label-info">description:</span></h4>
						<?php
							echo $book->description; 
							echo '<h4><span class="dcms-label label label-info">author:</span></h4>';
							echo $book_extra->author;
							if($book->price > 0 and !$is_payed){
								echo '<h4><span class="dcms-label label label-info">price:</span></h4>';
								echo '<h5>'.$book->price.' birr</h5>';
							}
						?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="comment-display col-lg-6">
					<h4><span class="dcms-label label label-info">comments</span></h4>
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