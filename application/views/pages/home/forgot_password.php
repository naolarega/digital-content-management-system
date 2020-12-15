<div class="col-lg-6 col-lg-offset-3 middle-body">
	<div class="well">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="form-group">
				<span class="label label-default">forgot password</span>
				</div>
				<div class="alert alert-info">
					<strong>Info!</strong><span class="input-info"> enter your email</span>
				</div>
				<div class="email-container">
					<div class="form-group">
					<input name="email-input" type="text" class="form-control" id="email-input" placeholder="email">
					</div>
					<button name="email-submit" type="button" class="btn btn-default" onclick="forgot_password('email')">done</button>
				</div>
				<div class="code-container">
					<div class="form-group">
					<input name="code-input" type="text" class="form-control" id="code-input" placeholder="code">
					</div>
					<button name="email-submit" type="button" class="btn btn-default" onclick="forgot_password('code')">done</button>
				</div>
				<div class="new-password-container">
					<div class="form-group">
					<input name="password" type="password" class="form-control" id="new-password-input" placeholder="new password">	
					</div>
					<button name="login" type="button" class="btn btn-default" onclick="forgot_password('new_password')">done</button>
				</div>
			</div>
		</div>
	</div>
</div>