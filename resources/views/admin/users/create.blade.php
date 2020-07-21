@extends('template_backend.home')
@section('title', 'Tambah User')
@section('sub_judul','Tambah User')
@section('content')

  @if(count($errors)>0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{ $error }}
        </div>
    @endforeach
  @endif

  <form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="">Nama Lengkap</label>
      <input type="text" class="form-control" name="name">
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
      <label for="">Tipe User</label>
      <select class="form-control" name="tipe">
        <option value="">Pilih Tipe</option>
        <option value="1">Administrator</option>
        <option value="0">Author</option>
      </select>
    </div>

    <div class="form-group">
      <label for="">Password</label>
      <input type="text" class="form-control" name="password">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block">Simpan User</button>
    </div>
  </form>
@endsection