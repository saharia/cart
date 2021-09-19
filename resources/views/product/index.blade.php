@extends('adminlte::page')
@section('plugins.Summernote', true)
@section('plugins.BsCustomFileInput', true)
@section('plugins.BootstrapSwitch', true)
@section('content')
<form action="{{ url('/products') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
<div class="" style="margin-top:12px">
  <div class="row">

    <div class="col-md-9">

    <x-adminlte-card theme="lime" theme-mode="outline">
        <div class="row">
          <div class="col-md-12">
            <x-adminlte-input name="name" label="Name" placeholder="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
              value="{{ old('name') }}" />
             @if($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <x-adminlte-text-editor name="description" label="Description">
            {{ old('description') }}
            </x-adminlte-text-editor>
            @if($errors->has('description'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('description') }}</strong>
                </div>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <x-adminlte-text-editor name="content" label="Content">
            {{ old('content') }}
            </x-adminlte-text-editor>
            @if($errors->has('content'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('content') }}</strong>
                </div>
            @endif
          </div>
        </div>
    
        <div class="row">
          <div class="col-md-12">
          <x-adminlte-input-file id="images" name="images[]" label="Upload images"
              placeholder="Choose multiple files..." igroup-size="lg" legend="Choose" multiple>
              <x-slot name="prependSlot">
                  <div class="input-group-text text-primary">
                      <i class="fas fa-file-upload"></i>
                  </div>
              </x-slot>
          </x-adminlte-input-file>
          </div>
        </div>
    </x-adminlte-card>


    <x-adminlte-card theme="lime" theme-mode="outline" title="overview">
    <div class="row">
          <div class="col-md-6">
          <x-adminlte-input name="price" label="Price" placeholder="price"
          class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"  value="{{ old('price') }}"/>
             @if($errors->has('price'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('price') }}</strong>
                </div>
            @endif
          </div>
          <div class="col-md-6">
          <x-adminlte-input name="price" label="Price Scale" placeholder="price scale" name="scale_price"
          class="form-control {{ $errors->has('scale_price') ? 'is-invalid' : '' }}"  value="{{ old('scale_price') }}"/>
             @if($errors->has('scale_price'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('scale_price') }}</strong>
                </div>
            @endif
          </div>
          </div>

          <div class="row">
            <div class="col-md-12">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="with_storehouse" name="with_storehouse" {{ (old('with_storehouse')) ? ' checked' : '' }}>
              <label class="form-check-label" for="with_storehouse">With Stcohouse</label>
            </div>
            
            </div>
          </div>

          <div class="row">
          <div class="col-md-12">
            <x-adminlte-input name="quantity" label="Quantity" placeholder="Quantity"
            class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}"  value="{{ old('quantity') }}"/>
             @if($errors->has('quantity'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('quantity') }}</strong>
                </div>
            @endif
          </div>
          </div>

          <div class="row">
            <div class="col-md-12">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="allow_checkout_when_out_of_stock" name="allow_checkout_when_out_of_stock" {{ (old('allow_checkout_when_out_of_stock')) ? ' checked' : '' }}>
              <label class="form-check-label" for="allow_checkout_when_out_of_stock">Allow customer checkout when product is out of stock</label>
            </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">
            <x-adminlte-input name="weight" label="weight" placeholder="weight"
            class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}" value="{{ old('weight') }}" />
             @if($errors->has('weight'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('weight') }}</strong>
                </div>
            @endif
            </div>
            <div class="col-md-6">
            <x-adminlte-input name="length" label="length" placeholder="length"
            class="form-control {{ $errors->has('length') ? 'is-invalid' : '' }}" value="{{ old('length') }}" />
             @if($errors->has('length'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('length') }}</strong>
                </div>
            @endif
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
            <x-adminlte-input name="wide" label="wide" placeholder="wide"
            class="form-control {{ $errors->has('wide') ? 'is-invalid' : '' }}" value="{{ old('wide') }}" />
             @if($errors->has('wide'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('wide') }}</strong>
                </div>
            @endif
            </div>
            <div class="col-md-6">
            <x-adminlte-input name="height" label="height" placeholder="height"
            class="form-control {{ $errors->has('height') ? 'is-invalid' : '' }}" value="{{ old('height') }}" />
             @if($errors->has('height'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('height') }}</strong>
                </div>
            @endif
            </div>
          </div>


          

    </x-adminlte-card>


    </div>
    <div class="col-md-3">

    <x-adminlte-card theme="lime" theme-mode="outline" title="Publish">
    <div class="row">
            <div class="col-md-6">
            <x-adminlte-button label="Save" type="Save" theme="primary"/>
            </div>

            <div class="col-md-6">
            <x-adminlte-button label="Save & Edit" type="Save" theme="primary"/>
            </div>
          </div>
    </x-adminlte-card>

    <x-adminlte-card theme="lime" theme-mode="outline" title="Is Featured">
    <div class="row">
            <div class="col-md-12">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" {{ (old('is_featured')) ? ' checked' : '' }}>
            </div>
            </div>
          </div>
    </x-adminlte-card>

    <x-adminlte-card theme="lime" theme-mode="outline" title="Categories">
    <div class="row">
            <div class="col-md-6">
            </div>

    </x-adminlte-card>
    </div>
    </div>
</div>
</form>
@endsection
