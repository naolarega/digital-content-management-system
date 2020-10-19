<div class="col-lg-6 col-lg-offset-3 middle-body">
	<div class="well">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<?php
					echo validation_errors();
					echo form_open_multipart('sign_up/creator');
				?>
					<div class="form-group">
					<span class="glyphicon glyphicon-user"></span>insert profile image
					<input name="profileimage" type="file" accept="image/jpg" class="form-control" id="input_file">
					</div>
					<div class="form-group">
					<input name="username" type="text" class="form-control" id="username" placeholder="username" value="<?php echo set_value('username'); ?>">
					</div>
					<div class="form-group">
					<input name="firstname" type="text" class="form-control" id="firstname" placeholder="first name" value="<?php echo set_value('firstname'); ?>">
					</div>
					<div class="form-group">
					<input name="lastname" type="text" class="form-control" id="lastname" placeholder="last name" value="<?php echo set_value('lastname'); ?>">
					</div>
					<div class="form-group">
					<input name="email" type="email" class="form-control" id="email" placeholder="email" value="<?php echo set_value('email'); ?>">
					</div>
					<div class="form-group">
					<input name="phonenumber" type="number" class="form-control" id="phonenumber" placeholder="phone number" value="<?php echo set_value('phonenumber'); ?>">
					</div>
					<div class="form-group">
					<textarea name="description" class="form-control" rows="3" id="description" placeholder="description" value="<?php echo set_value('description'); ?>"></textarea>
					</div>
					<div class="form-group">
					<select name="knownfor" class="form-control" id="sel1">
						<option value="1" selected>video</option>
						<option value="2">music</option>
						<option value="3">image</option>
						<option value="4">app</option>
						<option value="5">book</option>
					</select>
					</div>
					<div class="form-group">
					<input name="password" type="password" class="form-control" id="password" placeholder="password">
					</div>
					<div class="form-group">
					<input name="confirm_password" type="password" class="form-control" id="confirm_password" placeholder="confirm password" >
					</div>
					<button name="signup" type="submit" class="btn btn-default">sign up</button>
				</form>
			</div>
		</div>
	</div>
</div>