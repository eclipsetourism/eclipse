<a class="modal-trigger" href="#item{{ $item->id }}">
	<i class="fa fa-pencil"></i> Edit</a>
</a>

<div id="item{{ $item->id }}" class="modal">
	<div class="modal-content">
		<h4>{{ $item->name }}</h4>

		<form method="POST" action="{{ route('cart.update', $item->rowid) }}">
			{!! csrf_field() !!}
			{!! method_field('PUT') !!}
			
			<div class="row">
				<div class="col s6 m3">
					<div class="form-group">
						<label for="quantity">Adult Quantity:</label>

						<div class="input-with-price">
							<input type="text" name="adult_quantity" class="form-control item-quantity" value="{{ $item->qty }}" size="5" />
							<span>
								&times;
								{!! convertedAmountWithCurrency($item->options->package->adult_price) !!}
							</span>
						</div>
					</div>
				</div>

				<div class="col s6 m3">
					<div class="form-group">
						<label for="quantity">Child Quantity:</label>

						<div class="input-with-price">
							<input type="text" name="child_quantity" class="form-control item-quantity" value="{{ $item->options->child_quantity }}" size="5" />
							<span>
								&times;
								{!! convertedAmountWithCurrency($item->options->package->child_price) !!}
							</span>
						</div>
					</div>	
				</div>

				<div class="col s6 m3">
					<div class="form-group">
						<div class="form-group">
							<label for="quantity">&nbsp;</label>
							<button type="submit" class="btn waves-effect waves-light">
								Update Cart
							</button>
						</div>	
					</div>	
				</div>										
			</div>

		</form>								
		
		<hr />

		<form method="POST" action="{{ route('cart.destroy', $item->rowid) }}">
			{!! csrf_field() !!}
			{!! method_field('DELETE') !!}

			<button type="submit" class="btn-flat center-content">
				<i class="material-icons">delete</i> Remove from Cart
			</button>
		</form>								
	</div>
</div>