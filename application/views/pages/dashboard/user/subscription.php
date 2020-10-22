<div class="col-lg-9">
	<div class="well">
		<div class="row">
		<?php
		if(isset($subscription)){
			foreach($subscription->result() as $subs){
				echo '<div class="col-lg-3">';
				echo '<img class="" width="100" height="100" src="/cdn/images/user-profile/'.$subs->profile_image.'" />';
				echo '<a href="/view-creator/'.$subs->user_id.'">'.$subs->user_name.'</a>';	
				echo '<span id="'.$subs->user_id.'" class="glyphicon glyphicon-trash" onclick="delete_user(this, \'subscription\')"></span>';
				echo '</div>';
			}
		}
		?>
		</div>
	</div>
</div>
</div>