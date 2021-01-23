@extends('layouts.template')
@section('title', 'Create Categories')
@section('page-title', 'Create Categories')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
            @endif
            <div class="card card-primary swalDefaultSuccess">
              <div class="card-header">
                <h3 class="card-title">Create</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                  <form action="{{url('/category/create')}}" method="POST">
                    @csrf
                      <div class="form-group">
                        <label for="inputName">Category Name</label>
                        <input type="text" id="inputName" class="form-control" name="cat_name">
                      </div>
                      <div class="form-group">
                        <label for="inputDescription">Category Description</label>
                        <textarea id="inputDescription" class="form-control" rows="4" name="cat_desc"></textarea>
                      </div>
                      <div class="form-group text-right">
                          <a href="{{url('/category')}}" class="btn btn-secondary">Cancel</a>
                          {{-- <button type="button" class="btn btn-secondary">Create</button> --}}
                          {{-- <a href="#" ">Create</a> --}}
                          <button type="submit" class="btn btn-primary">Create</button>
                      </div>
                  </form>
              </div>
            </div>
          </div>
    </div>
@endsection

@push('custom-script')
    <script>
        $(document).ready(function(){
            $(function() {
                var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            function showAlert(){
                $('.swalDefaultSuccess').Toast.fire({
                    icon: 'success',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            }
            showAlert()
        })
    </script>
@endpush
