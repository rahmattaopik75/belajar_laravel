@extends('template_backend.home')
@section('title', 'Edit Kategori')
@section('sub_judul','Edit Kategori')
@section('content')

  @if(count($errors)>0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{ $error }}
        </div>
    @endforeach
  @endif

  <form action="{{ route('category.update', $category->id) }}" method="POST">
    @method('patch')
    @csrf
    <div class="form-group">
      <label for="">Kategori</label>
      <input type="text" class="form-control" name="name" value="{{ $category->name}}">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block">Update Kategori</button>
    </div>
  </form>
@endsection