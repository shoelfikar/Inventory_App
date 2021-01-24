@extends('layouts.template')
@section('title', 'Data Products')
@section('page-title', 'Data Products')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Products</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Product ID</th>
                      <th>Product Name</th>
                      <th>Description</th>
                      <th>Category</th>
                      <th>Amount</th>
                      <th>Price</th>
                      <th>Stock</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr>
                                <td style="vertical-align: middle; text-align:center">{{$item->id}}</td>
                                <td style="vertical-align: middle">{{$item->product_name}}</td>
                                <td style="vertical-align: middle">{{$item->product_desc}}</td>
                                <td style="vertical-align: middle">{{$item->Category->cat_name}}</td>
                                <td style="vertical-align: middle; text-align:center">{{$item->stock}}</td>
                                <td>
                                    @if ($item->product_image == "")
                                        <img src="{{asset('storage/product/default.png')}}" alt="{{$item->product_name}}" width="80">
                                    @else
                                        <img src="{{asset('storage/product/'. $item->product_image)}}" alt="{{$item->product_name}}" width="80">
                                    @endif
                                </td>
                                <td class="project-actions" style="vertical-align: middle">
                                    <a class="btn btn-info btn-sm" href="{{url('/product'. '/'. $item->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                    </a>
                                    <a class="btn btn-danger btn-sm delete-confirm" href="{{url('/product/delete/'. $item->id)}}">
                                        <i class="fas fa-trash">
                                        </i>
                                    </a>
                                    <a class="btn btn-primary btn-sm delete-confirm" href="{{url('/product/delete/'. $item->id)}}">
                                        <i class="fas fa-cart-plus"></i>
                                        </i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
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
