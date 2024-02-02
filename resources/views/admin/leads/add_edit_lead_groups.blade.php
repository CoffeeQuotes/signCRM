@extends('admin.layouts.layout')
@section('content')
<div class="col-md-12 mt-5">
    <div class="card">
        <div class="card-header">
            <h2>New Lead Group</h2>
        </div>
        <div class="card-body">
        	 @if ($errors->any())
            <div class="m-2">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="bi bi-patch-exclamation"></i> Error Occured</strong>
                    <ol>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ol>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif
            <form id="leadGroupForm" action="{{ route('admin_add_edit_lead_group') }}" method="post">
                @csrf
                <div class="mb-3 form-group">
                    <label for="name" class="form-label">Name<sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ old('name', optional($lead_group)->name) }}" />
                </div>
                <div class="mb-3 form-group">
                    <label for="lead_group_id" class="form-label">Lead Group<sup class="text-danger">*</sup></label>
                    <select class="form-select" name="lead_group_id" id="lead_group_id">
                    <option value="primary">Primary</option>
					    <option value="success">
					     Success
					    </option>
					    <option value="secondary">
					     Secondary
					    </option>
					    <option value="danger">
					      Danger
					    </option>
					    <option value="purple">
					      Purple
					    </option>
					    <option value="warning">
					      Warning
					    </option>
					    <option value="info">
					      Info
					    </option>
					    <option value="light">
					      Light
					    </option>
					    <option value="dark">
					      Dark
					    </option>
					    <option value="link">
					      Link
					    </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
     </div>
</div>
@endsection
