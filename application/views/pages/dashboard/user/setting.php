<div class="col-lg-9">
	<div class="well settings">
	<?php
		echo validation_errors();
		echo form_open('/user/setting');
		echo '<br />';
	?>
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label">User Name</label>
			<div class="col-sm-6">
				<input name="username" type="text" class="form-control" id="username" />
			</div>
		</div><br />
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-6">
				<input name="password" type="text" class="form-control" id="password" />
			</div>
		</div><br />
		<div class="form-group">
		<label for="preference" class="col-sm-2 control-label">Preference</label>
		<div class="col-sm-6">
		<select name="preference" class="form-control" id="preference">
			<option value="general">general</option>
			<option value="education">education</option>
			<option value="entertainment">entertainment</option>
		</select>
		</div>
		</div><br />
		<div class="form-group">
			<label for="balance" class="col-sm-2 control-label">your balance</label>
			<div class="col-sm-6">
				<span>N/A</span> 
			</div>
		</div><br />
		<div class="form-group">
			<div class="col-lg-offset-5 col-lg-2">
				<button name="submit" type="submit" class="btn btn-default btn-block">
					<span class="glyphicon glyphicon-save"></span>
					save setting</button>
			</div>
		</div>
		</form>
	</div>
</div>
</div>