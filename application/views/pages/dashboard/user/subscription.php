<div class="col-lg-9">
	<div class="well">
		<div class="row">
		<?php
		if(isset($subscription)){
			foreach($subscription->result() as $subs){
				echo '<div class="col-lg-3">';
				echo '<div class="creator-list well">';
				echo '<img class="" width="175" height="175" src="/cdn/images/user-profile/'.$subs->profile_image.'" /><br/>';
				echo '<a class="content-link" href="/view-creator/'.$subs->user_id.'">'.$subs->user_name.'</a>';	
				echo '<span id="'.$subs->user_id.'" class="glyphicon glyphicon-trash" onclick="delete_user(this, \'subscription\')"></span>';
				echo '</div></div>';
			}
		}
		?>
		</div>
	</div>
</div>
</div>