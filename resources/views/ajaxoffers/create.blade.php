@extends('layouts.app')
@section('content')

<div class="container">
	<form class="needs-validation" novalidate enctype="multipart/form-data">
		@csrf
	  <div class="alert alert-danger d-none">Please review the problems below:</div>

	  <div class="form-group row">
	    <label for="exampleInputName" class="col-sm-3 col-form-label">Name</label>
	    <div class="col-sm-9">
	      <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Your name" required>
	      <div class="invalid-feedback">Name can't be blank</div>
	      <div class="valid-feedback">Looks good!</div>
	      <small class="form-text text-muted">Text input example</small>
	    </div>
	  </div>

	  <div class="form-group row">
	    <label for="exampleInputEmail" class="col-sm-3 col-form-label">Price</label>
	    <div class="col-sm-9">
	      <input type="text" name="price" class="form-control" id="exampleInputPrice" placeholder="Enter price" required>
	      <div class="invalid-feedback">Email can't be blank</div>
	      <div class="valid-feedback">Looks good!</div>
	    </div>
	  </div>

	  <div class="form-group row">
	    <label for="exampleCustomFile" class="col-sm-3 col-form-label">Avatar</label>
	    <div class="col-sm-9">
	      <input type="file" name="photo" class="form-control-file" id="exampleCustomFile" required>
	      <div class="invalid-feedback">Please provide a valid value.</div>
	      <div class="valid-feedback">Looks good!</div>
	      <small class="form-text text-muted">File input example</small>
	    </div>
	  </div>

	  <div class="form-group row">
	    <label for="exampleTextareaBio" class="col-sm-3 col-form-label">Detials</label>
	    <div class="col-sm-9">
	      <textarea class="form-control" name="details" id="exampleTextareaDetials" rows="2" placeholder="Enter Detials" required></textarea>
	      <div class="invalid-feedback">Please provide a valid value.</div>
	      <div class="valid-feedback">Looks good!</div>
	      <small class="form-text text-muted">Textarea input example</small>
	    </div>
	  </div>

	  <div class="form-group row mb-0">
	    <div class="col-sm-9 offset-sm-3">
	      <button id="save_offer" class="btn btn-primary">Create User!</button>
	      <button type="reset" class="btn btn-outline-secondary">Cancel</button>
	    </div>
	  </div>
	</form>
</div>
@endsection

@section('scripts')

<script type="text/javascript">

	$(document).on('click','#save_offer',function(e){

		e.preventDefault(e);

			$.ajax({
			type:'post',
			url:{{Route('ajax.offer.store')}},
			data:{
				'_token':"{{csrf_token()}}",
			},
			success:function(data){

			},
			error:function(reject){

			}
		});

	});

</script>

@endsection