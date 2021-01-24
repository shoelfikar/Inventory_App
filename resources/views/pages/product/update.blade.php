@extends('layouts.template')
@section('title', 'Update Product')
@section('page-title', 'Update Product')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-primary swalDefaultSuccess">
              <div class="card-header">
                <h3 class="card-title">Update</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                  <form action="{{url('/product' .'/'. $product->id )}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                      <div class="form-group">
                        <label for="inputName">Product Name</label>
                        <input type="text" id="inputName" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{old('product_name')? old('product_name'): $product->product_name}}">
                        @error('product_name')
                            <div  class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="inputStatus">Category</label>
                        <select id="inputStatus" class="form-control custom-select @error('category') is-invalid @enderror" name="category" >
                          <option selected value="{{$product->Category->id}}">{{$product->Category->cat_name}}</option>
                          @foreach ($category as $item)
                            <option value="{{$item->id}}">{{$item->cat_name}}</option>
                          @endforeach
                        </select>
                        @error('category')
                            <div  class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="inputName">Stock</label>
                        <input type="text" id="inputName" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{$product->stock}}" readonly>
                        @error('stock')
                            <div  class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label>Product Image</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="image">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="inputDescription">Description</label>
                        <textarea id="inputDescription" class="form-control" rows="4" name="description">{{$product->product_desc}}</textarea>
                      </div>
                      <div class="form-group text-right">
                          <a href="{{url('/category')}}" class="btn btn-secondary">Cancel</a>
                          <button type="submit" class="btn btn-primary">Create</button>
                      </div>
                  </form>
              </div>
            </div>
          </div>
    </div>
@endsection

