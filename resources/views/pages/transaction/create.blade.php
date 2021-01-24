@extends('layouts.template')
@section('title', 'Create Transaction')
@section('page-title', 'Create Transaction')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{url('transaction/addtocart')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="inputName">Product</label>
                            <select name="product" class="selectpicker form-control" data-live-search="true">
                                <option value="1" selected>Pilih Product</option>
                                @foreach ($product as $item)
                                    <option value="{{$item->id}}">{{$item->product_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Harga</label>
                            <input type="text" id="inputName" class="form-control @error('price') is-invalid @enderror" name="price">
                            @error('price')
                                <div  class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                          </div>
                        <div class="form-group mt-2 text-right">
                            <button class="btn btn-primary" type="submit">Add To Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
