@extends('layouts.template')
@section('title', 'Cart Transaction')
@section('page-title', 'Cart Transaction')

@section('content')
    <div class="row">
        <form action="" class="col-12">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">User</label>
                            <input type="text" id="inputName" class="form-control @error('discount') is-invalid @enderror" name="username" value="{{Auth::user()->name}}">
                            @error('discount')
                                <div  class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <select id="inputStatus" class="form-control custom-select @error('type') is-invalid @enderror" name="type" >
                            <option selected value="JUAL">JUAL</option>
                            <option value="BELI">BELI</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Cart Transaction</h3>
                    </div>
                    <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach (session('cart') as $key => $item)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$item['product_name']}}</td>
                                    <td>{{$item['category']}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-danger" href="{{url('/transaction/decrement/'. $item['product_id'])}}">
                                            -
                                        </a>
                                        <input type="text" value="{{$item['qty']}}" style="width: 30px; height:37px; text-align:center; margin: 0 5px 0 5px;" disabled name="qty" class="quantity">
                                        <a class="btn btn-primary" href="{{url('/transaction/increment/'. $item['product_id'])}}">
                                            +
                                        </a>
                                    </td>
                                    <td>{{$item['price']}}</td>
                                    <td>{{$item['qty'] * $item['price']}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-danger btn-sm delete-confirm" href="{{url('/transaction/cart/'. $item['product_id'])}}">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="col-4 offset-8">
                <div class="card">
                    <div class="card-body">

                            <div class="form-group">
                                <label for="inputName">Discount (%)</label>
                                <input type="text" id="inputName" class="form-control @error('discount_total') is-invalid @enderror" name="discount_total" value="0">
                                @error('discount_total')
                                    <div  class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Total</label>
                                <input type="text" id="inputName" class="form-control @error('price_total') is-invalid @enderror" name="price_total" value="{{number_format($amount)}}">
                                @error('price_total')
                                    <div  class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Checkout</button>
                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('custom-script')
   <script>
       $(document).ready(function(){
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });

            $('.delete-confirm').on('click', function (event) {
                event.preventDefault();
                const url = $(this).attr('href');
                swal({
                    title: 'Anda yakin ingin menghapus data?',
                    icon: 'warning',
                    buttons: ["Cancel", "Yes"],
                }).then(function(value) {
                    if (value) {
                        window.location.href = url;
                    }
                });
            });
       })
    </script>
@endpush
