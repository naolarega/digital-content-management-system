<div class="row dashboard-middle-body">
	<div class="col-lg-3">
		<div class="well">
			<?php
			$user = $this->db->get_where('user', array('user_name' => get_cookie('dcms_username', true)));
			$user = $user->result()[0];
			$creator = $creator_info->result()[0];
			?>
			<h4><?php echo $creator->user_name; ?></h4>
			<img width="150" height="150" src="/cdn/images/user-profile/<?php echo $creator->profile_image; ?>" class="img-circle" /><br />
			<input type="hidden" id="creator_id" value="<?php echo $creator->user_id; ?>" />
			<input type="hidden" id="user_id" value="<?php echo $user->user_id; ?>" />
			<button id="subscribe" class="btn btn-default">
				<span class="glyphicon glyphicon-chevron-left"></span>
				subscribe
			</button>
		</div>
	</div>