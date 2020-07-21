@extends('template_backend.home')
@section('title', 'Tambah Post')
@section('sub_judul','Tambah Post')
@section('content')

  @if(count($errors)>0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{ $error }}
        </div>
    @endforeach
  @endif

  <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="">Judul</label>
      <input type="text" class="form-control" name="judul">
    </div>
    <div class="form-group">
      <label for="">Kategori</label>
      <select class="form-control" name="category_id">
        <option value="" holder>Pilih Kategori</option>
        @foreach($category as $result)
        <option value="{{ $result->id}}">
        {{ $result->name }}
        </option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label>Pilih Tag</label>
      <select class="form-control select2" multiple="" name="tags[]">
        @foreach($tags as $tag)
        <option value="{{ $tag->id}}">{{ $tag->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="">Konten</label>
      <textarea name="content" id="" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label for="">Thumbnail</label>
      <input type="file" class="form-control" name="gambar">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block">Simpan Post</button>
    </div>
  </form>
@endsection