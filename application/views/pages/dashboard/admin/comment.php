<div class="col-lg-9">
	<div class="well">
		<div class="row">
			<?php
				echo form_open('/admin/comment/approval');
			?>
			<div class="col-lg-12">
				<table class="table table-striped">
					<tr>
						<th></th>
						<th>User name</th>
						<th>Comment</th>
						<th>content</th>
						<th>approved</th>
					</tr>
					<?php foreach($queries->result() as $comment): ?>
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
								<?php echo $comment->approved; ?>
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