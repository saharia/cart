@extends('adminlte::page')
@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<div class="container">
  <div class="row">
    <div class="col-md-12"  style="margin: 16px;">
      <span style="font-size: 16px;">Products</span>
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
                </tr>
            @endforeach
        @endif
    </table>
    {!! $products->appends(Request::except('page'))->render() !!}

</div>
@endsection