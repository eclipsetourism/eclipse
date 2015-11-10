
<div class="card-panel">

	<h5>Contact Information</h5>

	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Your Full Name" />
	</div>

	<div class="row no-margin-bottom">
		<div class="col s12 m6">
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Your email" />
			</div>	
		</div>

		<div class="col s12 m6">
			<div class="form-group">
				<label for="phone">Phone</label>
				<input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" placeholder="Your telephone" />
			</div>
		</div>
	</div>

	<div class="row no-margin-bottom">
		<div class="col s12 m6">
			<div class="form-group">
				<label for="city">City</label>
				<input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}" placeholder="Your city" />
			</div>	
		</div>

		<div class="col s12 m6">
			<div class="form-group">
				<label for="country">Country</label>
				<input type="text" name="country" id="country" class="form-control" value="{{ old('country') }}" placeholder="Your country" />
			</div>	
		</div>
	</div>

</div>