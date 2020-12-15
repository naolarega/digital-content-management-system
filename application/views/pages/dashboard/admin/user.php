<div class="col-lg-9">
	<div class="well">
		<div class="row">
			<div class="col-lg-12">
				<?php echo form_open(''); ?>
					<div class="form-group col-lg-3">
						<label for="user-type">user type:</label>
						<select class="form-control" name="user-type-filter" id="user-type">
						<option value="0">all user type</option>
						<option value="1">customer</option>
						<option value="2">creator</option>
						<option value="3">admin</option>
						</select>
					</div>
					<div class="form-group col-lg-3">
						<label for="status">status:</label>
						<select class="form-control" name="status-filter" id="status">
						<option value="all">all status</option>
						<option value="approved">approved</option>
						<option value="new user">new user</option>
						<option value="banned">banned</option>
						<option value="warned">warnned</option>
						</select>
					</div>
					<div class="form-group col-lg-3">
						<br/>
						<button name="filter-user" value="filter-user" type="submit" class="btn btn-default"><span class="	glyphicon glyphicon-filter"></span>filter</button>
					</div>
				</form>
				<?php
					echo form_open('/admin/user/manage');
				?>
				<table class="table table-striped">
					<tr>
					</tr>
					<tr>
						<th></th>
						<th>profile image</th>
						<th>User name</th>
						<th>Full name</th>
						<th>Phone number</th>
						<th>status</th>
					</tr>
					<?php 
					//to traveres through users for the admin to approve disapprove
					foreach($queries->result() as $user): ?>
					<?php if($user->user_name != get_cookie('dcms_username', true)): ?>
					<tr>
						<td>
							<input type="checkbox" name="<?php echo $user->user_id; ?>" value="<?php echo $user->user_id; ?>" /></label>
						</td>
						<td>
							<img width="30" height="30" src="/cdn/images/user-profile/<?php echo $user->profile_image; ?>" class="img-circle" />
						</td>
						<td>
							<span><?php echo $user->user_name; ?></span>
						</td>
						<td>
							<span><?php echo $user->first_name.' '.$user->last_name; ?></span>
						</td>
						<td>
							<span><?php echo $user->phone_number; ?></span>
						</td>
						<td>
							<span><?php echo $user->status; ?></span>
						</td>
					</tr>
					<?php endif; ?>
					<?php endforeach; ?>
				</table>
			</div>
			<div class="col-lg-1">
				<button name="approve" value="approve" class="btn btn-default">approve user</button>
			</div>
			<div class="col-lg-offset-1 col-lg-1">
				<button name="ban" value="ban" class="btn btn-default">ban user</button>
			</div>
			<div class="col-lg-offset-1 col-lg-1">
				<button name="warn" value="warn"  class="btn btn-default">warn user</button>
			</div>
			<div class="col-lg-offset-1 col-lg-1">
				<button name="remove" value="remove"  class="btn btn-default">remove user</button>
			</div>
			</form>
		</div>
	</div>
</div>
</div>