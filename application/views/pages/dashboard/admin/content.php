<div class="col-lg-9">
	<div class="well">
		<div class="row">
			<div class="col-lg-12">
				<table class="table table-striped">
					<tr>
						<th></th>
						<th>Content</th>
						<th>Type</th>
						<th>User</th>
						<th>date uploaded</th>
					</tr>
					<?php foreach($queries->result() as $content): ?>
					<tr>
						<td>
							<input type="checkbox" value="<?php echo $content->content_id; ?>" />
						</td>
						<td>
							<span><a href="<?php echo '/'.$content->type.'/view/'.$content->content_id; ?>">
							<?php echo $content->content_name?></a></span>
						</td>
						<td>
							<span><?php echo $content->type; ?></span>
						</td>
						<td>
							<span>
							<?php
							$creator = $this->db->get_where('user', array('user_id' => $content->user_id));
							$creator = $creator->result()[0]->user_name;
							echo $creator;
							?>
							</span>
						</td>
						<td>
							<?php echo $content->release_date; ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
			<div class="col-lg-1">
				<button class="btn btn-default">approve</button>
			</div>
			<div class="col-lg-2">
				<button class="btn btn-default btn-block">disapprove</button>
			</div>
			<div class="col-lg-2">
				<button class="btn btn-default btn-block">view</button>
			</div>
		</div>
	</div>
</div>
</div>