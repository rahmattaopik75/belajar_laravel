@extends('template_backend.home')
@section('title', 'Tambah  Tag')
@section('sub_judul','Tambah Tag')
@section('content')

  @if(count($errors)>0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{ $error }}
        </div>
    @endforeach
  @endif

  <form action="{{ route('tags.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="">Tag</label>
      <input type="text" class="form-control" name="name">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block">Simpan Tag</button>
    </div>
  </form>
@endsection