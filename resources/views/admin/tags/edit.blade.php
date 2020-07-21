@extends('template_backend.home')
@section('title', 'Edit  Tag')
@section('sub_judul','Edit Tag')
@section('content')

  @if(count($errors)>0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{ $error }}
        </div>
    @endforeach
  @endif

  <form action="{{ route('tags.update', $tag->id)}}" method="POST">
    @method('patch')
    @csrf
    <div class="form-group">
      <label for="">Tag</label>
      <input type="text" class="form-control" name="name" value="{{ $tag->name}}">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block">Update Tag</button>
    </div>
  </form>
@endsection