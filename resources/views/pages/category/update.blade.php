@extends('layouts.template')
@section('title', 'Update Categories')
@section('page-title', 'Update Categories')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
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
                  <form action="{{url('/category'. '/'. $category->id)}}" method="POST">
                    @method('PATCH')
                    @csrf
                      <div class="form-group">
                        <label for="inputName">Category Name</label>
                        <input type="text" id="inputName" class="form-control @error('cat_name') is-invalid @enderror" name="cat_name" value="{{$category->cat_name}}">
                        @error('cat_name')
                            <div  class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="inputDescription">Category Description</label>
                        <textarea id="inputDescription" class="form-control" rows="4" name="cat_desc">{{$category->cat_desc}}</textarea>
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

