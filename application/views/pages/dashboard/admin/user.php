<div class="col-lg-9">
	<div class="well">
		<div class="row">
			<?php
				echo form_open('/admin/user/manage');
			?>
			<div class="col-lg-12">
				<table class="table table-striped">
					<tr>
						<th></th>
						<th>User name</th>
						<th>Full name</th>
						<th>Phone number</th>
					</tr>
					<?php foreach($queries->result() as $user): ?>
					<?php if($user->user_name != get_cookie('dcms_username', true)): ?>
					<tr>
						<td>
							<input type="checkbox" name="<?php echo $user->user_id; ?>" value="<?php echo $user->user_id; ?>" /></label>
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
					</tr>
					<?php endif; ?>
					<?php endforeach; ?>
				</table>
			</div>
			<div class="col-lg-1">
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