<div class="col-lg-9">
	<div class="well">
		<div class="row">
			<?php
				$this->db->select('user_name, user_id');
				$users = $this->db->get('user')->result();
				$this->db->select('content_id, content_name');
				$contents = $this->db->get('content')->result();
			?>
			<div class="col-lg-12">
				<?php echo form_open(''); ?>
					<div class="form-group col-lg-3">
						<label for="user">user:</label>
						<select class="form-control" name="user-filter" id="user">
						<option value="user-all">all users</option>
						<?php
							foreach($users as $user){
								echo '<option value="'.$user->user_id.'">'.$user->user_name.'</option>';
							}
						?>
						</select>
					</div>
					<div class="form-group col-lg-3">
						<label for="content">content:</label>
						<select class="form-control" name="content-filter" id="content">
						<option value="content-all">all contents</option>
						<?php
							foreach($contents as $content){
								echo '<option value="'.$content->content_id.'">'.$content->content_name.'</option>';
							}
						?>
						</select>
					</div>
					<div class="form-group col-lg-3">
						<br/>
						<button name="filter-comment" value="filter-comment" type="submit" class="btn btn-default"><span class="	glyphicon glyphicon-filter"></span>filter</button>
					</div>
				</form>
				<?php
					echo form_open('/admin/comment/approval');
				?>
				<table class="table table-striped">
					<tr>
						<th></th>
						<th>User name</th>
						<th>Comment</th>
						<th>content</th>
						<th>approved</th>
					</tr>
					<?php 
					//to traverse through comments for the admin
					foreach($queries->result() as $comment): ?>
					<tr>
						<td>
							<input name="<?php echo $comment->comment_id; ?>" type="checkbox" value="<?php echo $comment->comment_id; ?>" />
						</td>
						<td>
							<span>
							<?php
							$user = $this->db->get_where('user', array('user_id' => $comment->user_id));
							$user = $user->result()[0]->user_name;
							echo $user;
							?>
							</span>
						</td>
						<td>
							<span>
								<?php echo $comment->comment; ?>
							</span>
						</td>
						<td>
							<span>
								<?php echo $comment->content_id; ?>
							</span>
						</td>
						<td>
							<span>
								<?php 
									if($comment->approved == 1)
										echo 'yes';
									else
										echo 'no';
								?>
							</span>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
			<div class="col-lg-1">
				<button name="approve" value="approve" type="submit" class="btn btn-default">approve</button>
			</div>
			<div class="col-lg-1">
				<button name="disapprove" value="disapprove" type="submit" class="btn btn-default">disapprove</button>
			</div>
			</form>
		</div>
	</div>
</div>
</div>