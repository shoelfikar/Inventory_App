@extends('layouts.template')
@section('title', 'Data Detail Transaction')
@section('page-title', 'Data Detail Transaction')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Detail Transaction</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Transaction ID</th>
                      <th>Tanggal</th>
                      <th>Transaction Type</th>
                      <th>Discount</th>
                      <th>Qty</th>
                      <th>Total</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaction as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->type}}</td>
                                <td>{{$item->discount_total}}</td>
                                <td>{{$item->qty_total}}</td>
                                <td>{{$item->price_total}}</td>
                                <td>
                                    <a href="{{url('transaction/'. $item->id)}}" class="badge badge-primary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
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
