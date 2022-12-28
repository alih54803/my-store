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
				<h5 class="mb-0 h6">Attributes</h5>
			</div>
			<div class="card-body">
				<table class="table aiz-table mb-0">
					<thead>
						<tr>
							<th>#</th>
							<th>name</th>
							<th>values</th>
							<th class="text-right">options</th>
						</tr>
					</thead>
					<tbody>
						@foreach($attributes as $key => $attribute)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$attribute->name}}</td>
								{{-- <td>{{$attribute->getTranslation('name')}}</td> --}}
								<td>
									@foreach($attribute->attribute_values as $key => $item)
									<span >{{ $item->value }}</span>
									@endforeach
								</td>
								<td class="text-right">
                                    <a type="button" class="btn btn-soft-info " href="{{route('attributes.show', $attribute->id)}}" title="Attribute values">
                                        <i class="las la-cog">add attribute value</i>
                                    </a>
									{{-- @can('view_product_attribute_values') --}}

									{{-- @endcan
									@can('edit_product_attribute') --}}
										{{-- <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('attributes.edit', ['id'=>$attribute->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="edit"> --}}
										<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('attributes.myedit', ['id'=>$attribute->id, 'name'=>'umer'] )}}" title="edit">
											<i class="las la-edit">edit</i>
										</a>
									{{-- @endcan
									@can('delete_product_attribute') --}}
										<a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('attributes.destroy', $attribute->id)}}" title="delete">
											<i class="las la-trash">trash</i>
										</a>
									{{-- @endcan --}}
								</td>
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
						<h5 class="mb-0 h6">Add New Attribute</h5>
				</div>
				<div class="card-body">
					<form action="{{route('attributes.store')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group mb-3">
							<label for="name">Name</label>
							<input type="text" placeholder="Name" id="name" name="name" class="form-control" required>
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
