@extends('admin.layouts.admin')

@section('pageTitle', 'Add New Package')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Add New Package</h1>

            <div class="row">
            	<div class="col-md-12">
            		
            		@include('errors.forms')

		            <form method="POST" action="{{ route('admin.packages.store') }}">
		            	{!! csrf_field() !!}

		            	<div class="row">
		            		<div class="col-md-6">
				            	<div class="form-group">
				            		<label for="name">Name</label>
				            		<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Package Name" />
				            	</div>
		            		</div>

		            		<div class="col-md-6">
				            	<div class="form-group">
				            		<label for="subtitle">Subtitle</label>
				            		<input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle') }}" placeholder="Action Packed Off Road Exploring" />
				            	</div>
		            		</div>
		            	</div>


		            	<div class="row">
		            		<div class="col-md-6">
		            			<div class="row">
		            				<div class="col-md-4">
						            	<div class="form-group">
						            		<label for="departs">Departs</label>
						            		<input type="text" name="departs" id="departs" class="form-control" value="{{ old('departs') }}" placeholder="Departs" />
						            	</div>	
		            				</div>

		            				<div class="col-md-4">
						            	<div class="form-group">
						            		<label for="returns">Returns</label>
						            		<input type="text" name="returns" id="returns" class="form-control" value="{{ old('returns') }}" placeholder="Returns" />
						            	</div>	
		            				</div>

		            				<div class="col-md-4">
						            	<div class="form-group">
						            		<label for="duration">Duration</label>
						            		
						            		<input type="text" name="duration" id="duration" class="form-control" value="{{ old('duration') }}" placeholder="Duration" />
						            	
						            	</div>	
		            				</div>
		            			</div>
		            		</div>
		            		<div class="col-md-6">
		            			<div class="row">
		            				<div class="col-md-6">
						            	<div class="form-group">
						            		<label for="adult_price">Adult Price</label>
						            		<div class="input-group">
						            			
						            			<input type="text" name="adult_price" id="adult_price" class="form-control" value="{{ old('adult_price') }}" placeholder="Adult Price" />
						            			<div class="input-group-addon">AED</div>
						            		</div>
						            	</div>
		            				</div>

		            				<div class="col-md-6">
						            	<div class="form-group">
						            		<label for="child_price">Child Price</label>
						            		<div class="input-group">
						            			<input type="text" name="child_price" id="child_price" class="form-control" value="{{ old('child_price') }}" placeholder="Child Price" />
						            			<div class="input-group-addon">AED</div>
						            		</div>
						            	</div>
		            				</div>
		            			</div>
		            		</div>
		            	</div>

		            	<div class="form-group">
		            		<label for="description">Description</label>
		            		<textarea name="description" id="description" class="form-control ckeditor" placeholder="Package Description" rows="10"></textarea>
		            	</div>

		            	<hr />

		            	<div class="form-group">
		            		<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Record</button>
		            	</div>
		            </form>
            	</div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
	<script src="http://cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
@endsection