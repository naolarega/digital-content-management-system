<div class="col-lg-6 col-lg-offset-3 middle-body">
	<div class="shadow-box sign-up-box well">
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
					<input name="phonenumber" type="number" class="form-control" id="phonenumber" placeholder="phone number { 09xxxxxxxx }" value="<?php echo set_value('phonenumber'); ?>">
					</div>
					<div class="form-group">
					<textarea name="description" class="form-control" rows="3" id="description" placeholder="description"><?php echo set_value('description'); ?></textarea>
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
					<input type="checkbox" value="yes" onchange="agreement(this)">
					<a data-toggle="modal" data-target="#agreement-modal" class="btn btn-link">
						I agree to the terms of services and privacy policy
					</a>
					<button name="signup" type="submit" class="btn btn-default signup-btn" disabled>sign up</button>
				</form>
			</div>
			<div id="agreement-modal" class="modal fade" role="dialog">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Terms of services and privacy policy</h4>
			</div>
			<div class="modal-body">
			<p>
				<h4>Last updated: November, 20, 2020</h4>
				My Company dcms ("us", "we", or "our") operates http://dcms.io. 
				This page informs you of our policies regarding the collection, use and disclosure of
				Personal Information we receive from users of the Site.
				We use your Personal Information only for providing and improving the Site. By using the Site, you
				agree to the collection and use of information in accordance with this policy.
				Information Collection And Use
				While using our Site, we may ask you to provide us with certain personally identifiable information
				that can be used to contact or identify you. Personally identifiable information may include, but is not
				limited to your name ("Personal Information").
				<h4>Log Data</h4>
				Like many site operators, we collect information that your browser sends whenever you visit our Site
				("Log Data").
				This Log Data may include information such as your computer's Internet Protocol ("IP") address,
				browser type, browser version, the pages of our Site that you visit, the time and date of your visit,
				the time spent on those pages and other statistics.
				In addition, we may use third party services such as Google Analytics that collect, monitor and
				analyze this …
				The Log Data section is for businesses that use analytics or tracking services in websites or
				apps, like Google Analytics. For the full disclosure section, create your own Privacy Policy.
				<h4>Communications</h4>
				We may use your Personal Information to contact you with newsletters, marketing or promotional
				materials and other information that ...
				The Communications section is for businesses that may contact users via email admin@dcms.io
				or other methods. For the full disclosure section, create your own Privacy Policy.
				<h4>Cookies</h4>
				Cookies are files with small amount of data, which may include an anonymous unique identifier.
				Cookies are sent to your browser from a web site and stored on your computer's hard drive.
				Like many sites, we use "cookies" to collect information. You can instruct your browser to refuse all
				cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may
				not be able to use some portions of our Site.
				<h4>Security</h4>
				The security of your Personal Information is important to us, but remember that no method of
				transmission over the Internet, or method of electronic storage, is 100% secure. While we strive to
				use commercially acceptable means to protect your Personal Information, we cannot guarantee its
				absolute security.
				<h4>Changes To This Privacy Policy</h4>
				This Privacy Policy is effective as of November, 20, 2020 and will remain in effect except with respect to any
				changes in its provisions in the future, which will be in effect immediately after being posted on this
				page.
				We reserve the right to update or change our Privacy Policy at any time and you should check this
				Privacy Policy periodically. Your continued use of the Service after we post any modifications to the
				Privacy Policy on this page will constitute your acknowledgment of the modifications and your
				consent to abide and be bound by the modified Privacy Policy.
				If we make any material changes to this Privacy Policy, we will notify you either through the email
				address you have provided us, or by placing a prominent notice on our website.
				<h4>Contact Us</h4>
				If you have any questions about this Privacy Policy, please contact us.
			</p>
			</div>
			</div>
			</div>
			</div>
		</div>
	</div>
</div>