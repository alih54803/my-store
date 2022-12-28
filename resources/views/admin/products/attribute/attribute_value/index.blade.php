@extends('layouts.admin_inc.master')
@section('title', 'Admin Dashboard')
@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
		{{-- <h1 class="h3">{{translate('All Attributes')}}</h1> --}}
		<h1 class="h3">All Attributes</h1>
	</div>
</div>

<div class="row">
	<div class="@if(auth()->user()->can('add_product_attribute')) col-lg-7 @else col-lg-12 @endif">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">Attributes values</h5>
			</div>
			<div class="card-body">
				<table class="table aiz-table mb-0">
					<thead>
						<tr>
							<th>#</th>
							<th>values</th>
							<th class="text-right">options</th>
						</tr>
					</thead>
					<tbody>
						@foreach($all_attribute_value as $key => $attribute)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$attribute->value}}</td>
								{{-- <td>{{$attribute->getTranslation('name')}}</td> --}}

								<td>actions</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	{{-- @can('add_product_attribute') --}}
		<div class="col-md-5">
			<div class="card">
				<div class="card-header">
						<h5 class="mb-0 h6">Add New Attribute Value</h5>
				</div>
				<div class="card-body">
					<form action="{{route('attributes.value.store')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group mb-3">
							<label for="name">Name</label>
                            {{-- @dd($attributee->id) --}}
                            <input type="hidden" name="attribute_id" value="{{$attributee->id}}">
							<input type="text" value="{{$attributee->name}}" id="name" name="name" class="form-control" >
						</div>
                        <div class="form-group mb-3">
                            <label for="name">Attribute Value</label>
                            <input type="text" placeholder="value" id="value" name="value" class="form-control" required>
                        </div>
						<div class="form-group mb-3 text-right">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	{{-- @endcan --}}
</div>
@endsection
@section('scripts')

@endsection
