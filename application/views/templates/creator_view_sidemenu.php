<div class="row dashboard-middle-body">
	<div class="col-lg-3">
		<div class="well">
			<?php
			if(get_cookie('dcms_username', true) != null){				
				$user = $this->db->get_where('user', array('user_name' => get_cookie('dcms_username', true)));
				$user = $user->result()[0];
				echo '<input type="hidden" id="user_id" value="'.$user->user_id.'"/>';
			}
			$creator = $creator_info->result()[0];
			?>
			<h4 class="creator-view-name"><?php echo $creator->user_name; ?></h4>
			<img class="creator-view-profile img-circle " width="150" height="150" src="/cdn/images/user-profile/<?php echo $creator->profile_image; ?>" class="img-circle" /><br />
			<input type="hidden" id="creator_id" value="<?php echo $creator->user_id; ?>" />
			<?php
			if(get_cookie('dcms_type', true) == "1"){
			echo '<button id="subscription" class="subscription-btn btn btn-default" onclick="subscribe()">
					<span class="glyphicon glyphicon-chevron-left"></span>
					subscribe
				</button>';
			}
			?>
		</div>
	</div>