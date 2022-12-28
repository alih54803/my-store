@extends('layouts.admin_inc.master')
@section('title', 'Admin Dashboard')
@section('content')

{{-- @php
CoreComponentRepository::instantiateShopRepository();
CoreComponentRepository::initializeCache();
@endphp --}}

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">Add New Product</h5>
</div>
<div>
    <form action="{{route           ('admin.product_store')}}" method="post" enctype="multipart/form-data">
        @csrf

            <input type="hidden" name="added_by" value="admin">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">Product Information</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3 col-from-label">Product Name<span
                                class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" placeholder="Product Name"
                                onchange="update_sku()" required>
                        </div>
                    </div>
                    <div class="form-group row" id="category">
                        <label class="col-md-3 col-from-label">Category<span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <select class="form-control aiz-selectpicker" name="category_id" id="category_id"
                                data-live-search="true" required>

                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">name</option>
                                @foreach ($category->childrenCategories as $childCategory)
                                @include('admin.products.categories.child_category', ['child_category' =>
                                $childCategory])
                                @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="brand">
                        <label class="col-md-3 col-from-label">Brand</label>
                        <div class="col-md-8">
                            <select class="form-control aiz-selectpicker" name="brand_id" id="brand_id"
                                data-live-search="true">
                                <option value="">Select Brand</option>
                                @foreach (\App\Models\Brands::all() as $brand)
                                <option value="{{ $brand->id }}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>



            <div class="card">
                <div class="card-header">
                    <h5 class="">Product Variation</h5>
                </div>
                <div class="card-body">

                    <div class="form-group row gutters-5">
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="Attributes" disabled>
                        </div>
                        <div class="col-md-8">
                            <select name="choice_attributes[]" id="choice_attributes"
                                class="form-control aiz-selectpicker" data-selected-text-format="count"
                                data-live-search="true" multiple data-placeholder="Choose Attributes">
                                @foreach (\App\Models\Attribute::all() as $key => $attribute)
                                <option value="{{ $attribute->id }}">{{$attribute->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="customer_choice_options" id="customer_choice_options">

                    </div>

                </div>
            </div>
        </div>

       <button type="submit">save</button>
    </form>



@endsection

@section('scripts')

<script type="text/javascript">
    // $(document).ready(function(){
//     alert('umer')
// })

    // $('form').bind('submit', function (e) {
	// 	if ( $(".action-btn").attr('attempted') == 'true' ) {
	// 		//stop submitting the form because we have already clicked submit.
	// 		e.preventDefault();
	// 	}
	// 	else {
	// 		$(".action-btn").attr("attempted", 'true');
	// 	}
    //     // Disable the submit button while evaluating if the form should be submitted
    //     // $("button[type='submit']").prop('disabled', true);

    //     // var valid = true;

    //     // if (!valid) {
    //         // e.preventDefault();

    //         ////Reactivate the button if the form was not submitted
    //         // $("button[type='submit']").button.prop('disabled', false);
    //     // }
    // });

    // $("[name=shipping_type]").on("change", function (){
    //     $(".flat_rate_shipping_div").hide();

    //     if($(this).val() == 'flat_rate'){
    //         $(".flat_rate_shipping_div").show();
    //     }

    // });

    // function add_more_customer_choice_option(value, name){
    //     // alert(value)
    //     $.ajax({
    //         headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')},
    //         type:"post",
    //         data:{
    //             attribute_id:value
    //         },
    //         success:function(data){
    //             alert('umerr')
    //         }
    //     });
    // }

    function add_more_customer_choice_option(i, name){
        // alert(i)
        // $.ajaxSetup ({
        //    headers:{
        //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        // }
        // });
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method:"POST",
            url:'{{ route('add.product.options') }}',
            data:{
               attribute_id: i
            },
            dataType:'json',
            success: function(data) {
                // alert('umer');
                // var obj = JSON.parse);
                $('#customer_choice_options').append('\
                <div class="form-group row">\
                    <div class="col-md-3">\
                        <input type="hidden" name="choice_no[]" value="'+i+'">\
                        <input type="text" class="form-control" name="choice[]" value="'+name+'" placeholder="{{('Choice Title') }}" readonly>\
                    </div>\
                    <div class="col-md-8">\
                        <select class="form-control aiz-selectpicker attribute_choice"  name="choice_options_'+ i +'[]" multiple>\
                            '+data+'\
                        </select>\
                    </div>\
                </div>');
                // AIZ.plugins.bootstrapSelect('refresh');
           }
       });
    }

    $('input[name="colors_active"]').on('change', function() {
        if(!$('input[name="colors_active"]').is(':checked')) {
            $('#colors').prop('disabled', true);
            AIZ.plugins.bootstrapSelect('refresh');
        }
        else {
            $('#colors').prop('disabled', false);
            AIZ.plugins.bootstrapSelect('refresh');
        }
        update_sku();
    });

    $(document).on("change", ".attribute_choice",function() {
        update_sku();
    });

    $('#colors').on('change', function() {
        update_sku();
    });

    $('input[name="unit_price"]').on('keyup', function() {
        update_sku();
    });

    $('input[name="name"]').on('keyup', function() {
        update_sku();
    });

    function delete_row(em){
        $(em).closest('.form-group row').remove();
        update_sku();
    }

    function delete_variant(em){
        $(em).closest('.variant').remove();
    }

    // function update_sku(){
    //     $.ajax({
    //        type:"POST",
    //        url:'{{ route('products.sku_combination') }}',
    //        data:$('#choice_form').serialize(),
    //        success: function(data) {
    //             $('#sku_combination').html(data);
    //             AIZ.uploader.previewGenerate();
    //             AIZ.plugins.fooTable();
    //             if (data.length > 1) {
    //                $('#show-hide-div').hide();
    //             }
    //             else {
    //                 $('#show-hide-div').show();
    //             }
    //        }
    //    });
    // }

    $('#choice_attributes').on('change',function(){
        // alert($('#choice_attributes option:selected').val());
        // alert($(this).val());
        $('#customer_choice_options').html(null);

        $.each($('#choice_attributes option:selected'),function(){
            // alert($(this).val());
            add_more_customer_choice_option($(this).val(),$(this).text());


        })


    });

</script>

@endsection
