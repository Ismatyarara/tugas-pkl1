@extends('layouts.backend')
@section('content')
<div class="container-fluid">
  <div class="row">
   <div class="card">
<div class="card-header">
tambaha kategori
</div>
<div class="card-body">
    <form action="{{route('backend.category.store') }}" method="post">
        @csrf
        <div class="mb-5">
        <label for="">nama kategori</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
        @error('name')
        <span class="invalid-feedback" role="alert">
         <strong>{{$message}}</strong>
        </span>
        @enderror
        </div>
        <div class="mb-2">
            <button type="submit" class="btn btn-sm btn-outline-primary">simpan</button>
            <button type="reset" class="btn btn-sm btn-outline-warning">reset</button>
        </div>
    </form>
     </div>
</div>
  </div>
</div>
@endsection