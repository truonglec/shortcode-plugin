<form data-plugin="rpcForm" data-method="nyk-dynamic" data-type="contact">
	<div class="success-replace">
		<div class="row">

			<input type="hidden" name="antibot">
			<input type="hidden" name="nyk" value="ajax">

			<div class="col-sm-6 form-group">
				<input type="text" name="fname" class="form-control"
					placeholder="First Name(required)"
					data-bvalidator="required">
			</div>

			<div class="col-sm-6 form-group">
				<input type="text" name="lname" class="form-control"
					placeholder="Last Name"
					data-bvalidator="alpha">
			</div>

			<div class="col-sm-6 form-group">
				<input type="text" name="email" class="form-control"
					placeholder="Email Address(required)"
					data-bvalidator="email,required">
			</div>

			<div class="col-sm-6 form-group">
				<input type="text" name="phone" class="form-control"
					placeholder="Phone Number"
					data-bvalidator="bValidatePhone"
					data-plugin="mask">
			</div>

			<div class="col-sm-12 form-group">
				<select name="inquiring" class="form-control" data-bvalidator="required" data-nyk-dynamic>
					<option value="">
						Inquiring about:
					</option>

					<?php
					$interests = [
						['Getting Treatment for Self', 'email'],
						['Getting Treatment for a Loved One', 'email'],
						['Treatment Center Advertising', 'facility'],
						['Other Marketing', 'facility'],
						['Press/Media', 'general'],
						['Investor-Related', 'general'],
						['Other (please explain below)', 'general'],
					];
					foreach ($interests as $interest) : ?>
						<option value="<?= $interest[0]; ?>" data-type="<?= $interest[1]; ?>">
							<?= $interest[0]; ?>
						</option>
					<?php endforeach; ?>

				</select>
			</div>

			<div class="col-sm-12 form-group">
				<textarea name="description" class="form-control" rows="6"
					placeholder="Additional Info(required)"
					data-bvalidator="required"></textarea>
			</div>

			<div class="col-sm-12">
				<input type="hidden" name="pageUrl" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
				<button type="submit" class="btn btn-primary">
					<i class="glyphicon glyphicon-envelope"></i>
					Send Us A Message
				</button>

				<div class="msg-error hidden"></div>

			</div>

		</div>
	</div>
</form>
