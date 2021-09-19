@extends('adminlte::page')
@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="container">
  <div class="row">
    <div class="col-md-12"  style="margin: 16px;">
      <span style="font-size: 16px;">Products</span>
      <a href="{{ url('products/create') }}" class="text-right">
        <button type="button" class="btn btn-primary float-right" >New Product
  </button>
      </a>
    </div>
  </div>
    <table class="table table-condensed table-bordered">
        <tr>
            <th width="80px">@sortablelink('id')</th>
            <th>Image</th>
            <th>@sortablelink('name', 'Name')</th>
            <th>@sortablelink('price')</th>
            <th>@sortablelink('quantity')</th>
            <th>@sortablelink('created_at')</th>
            <th>@sortablelink('status')</th>
            <th>Action</th>
        </tr>
        @if($products->count())
            @foreach($products as $key => $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                      <img src="{{ count($product->images) ? asset('images/' . $product->images->first()->name) : '' }}" style="width:100px;" /></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->created_at->format('d-m-Y') }}</td>
                    <td>Published</td>
                    <td>
                      <a href="{{ route('products.edit', $product->id) }}">
                        <button class="btn btn-primary">
                          Edit
                        </button>
                      </a>
                        <button class="btn btn-danger delete">
                          Delete
                        </button>
                        <form id="delete-form-{{$product->id}}" 
                               action="{{route('products.destroy', $product->id)}}"
                              method="post">
                            @csrf @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
    {!! $products->appends(Request::except('page'))->render() !!}

</div>
@endsection
@section('js')
<script>
  $(document).ready(() => {
    $(document).on('click', '.delete', (e) => {
      if(confirm('Are you sure to delete')) {
        console.log($(e.target).closest('td').html());
        $(e.target).closest('td').find('form').submit();
      }
    });
  });
</script>
@endsection