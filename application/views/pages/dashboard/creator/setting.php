<div class="col-lg-9">
	<div class="well settings">
	<?php
		echo validation_errors();
		echo form_open('/creator/setting');
		echo '<br />';
	?>
		<div class="form-group">
			<label for="username" class="col-sm-2 control-label">User Name</label>
			<div class="col-sm-6">
				<input type="text" name="username" class="form-control" id="username" />
			</div>
		</div><br />
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-6">
				<input type="text" name="password" class="form-control" id="password" />
			</div>
		</div><br />
		<div class="form-group">
			<label for="knownfor" class="col-sm-2 control-label">Known for</label>			
			<div class="col-lg-6">
			<select name="knownfor" class="form-control" id="sel1">
				<option value="1" selected>video</option>
				<option value="2">music</option>
				<option value="3">image</option>
				<option value="4">app</option>
				<option value="5">book</option>
			</select>
			</div>
		</div><br />
		<div class="form-group">
			<label for="phonenumber" class="col-sm-2 control-label">Phone number</label>
			<div class="col-sm-6">
				<input type="text" name="phonenumber" class="form-control" id="phonenumber" />
			</div>
		</div><br />
		<div class="form-group">
			<label for="firstname" class="col-sm-2 control-label">your balance</label>
			<div class="col-sm-6">
				<button type="button" class="btn btn-link" id="balance">N/A</button>
			</div>
		</div><br />
		<div class="form-group">
			<div class="col-lg-offset-5 col-lg-2">
				<button type="submit" class="btn btn-default btn-block">
					<span class="glyphicon glyphicon-save"></span>
					save setting</button>
			</div>
		</div>
	</div>
</div>
</div>