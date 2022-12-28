
@php
$value=null;
for($i=0;$i<$child_category->order_level;$i++){
    $value.='--';
}
@endphp
<option value="{{$child_category->id}}">{{$value." ".$child_category->name}}</option>
@if ($child_category->categories)
@foreach ($child_category->categories  as $childCategory)
    @include('admin.products.categories.child_category',['child_category'=>$childCategory])
@endforeach
@endif

