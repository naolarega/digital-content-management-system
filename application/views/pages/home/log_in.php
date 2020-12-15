<div class="col-lg-6 col-lg-offset-3 middle-body">
	<div class="shadow-box log-in-box well">
		<div class="row">
			<div id="sign_up_option_modal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">sign up option</h4>
						</div>
						<div class="modal-body">
							<p>as what would you like to sign up</p>
						</div>
						<div class="modal-footer">
							<a class="btn btn-default pull-left" href="/sign_up/user">user</a>
							<a class="btn btn-default pull-right" href="/sign_up/creator">creator</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-lg-offset-2">
				<?php
					echo validation_errors();
					echo form_open('log_in');
				?>
					<div class="form-group">
					<span class="glyphicon glyphicon-user"></span>
					<span class="label label-default">log in</span>
					</div>
					<?php
						if($signed_in == true){
							echo '
							<div class="alert alert-success alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Success!</strong> signed up successfuly.
							</div>';
						}
						if($wrong_user_password == true){
							echo '
							<div class="alert alert-danger alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>login!</strong> wrong username or password
							</div>';
							
						}
						if($status != "" and $status != 'approved'){
							echo '
							<div class="alert alert-info alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>login!</strong> ';
							if($status == 'banned') echo 'you have been baned';
							if($status == 'new user') echo 'your account is not activated yet';
							echo '</div>';
							
						} 
					?>
					<div class="form-group">
					<input name="username" type="text" class="form-control" id="username" placeholder="username">
					</div>
					<div class="form-group">
					<input name="password" type="password" class="form-control" id="password" placeholder="password">	
					</div>
					<a class="btn btn-link" href="/forgot_password">forgot password</a> 
					<button name="login" type="submit" class="btn btn-default">log in</button>
				</form>
			</div>
		</div>
	</div>
</div>