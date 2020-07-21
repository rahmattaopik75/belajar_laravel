@extends('template_backend.home')
@section('title', 'Edit User')
@section('sub_judul','Edit User')
@section('content')

  @if(count($errors)>0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{ $error }}
        </div>
    @endforeach
  @endif

  <form action="{{ route('users.update',$user->id)}}" method="POST">
    @csrf
    @method('patch')
    <div class="form-group">
      <label for="">Nama Lengkap</label>
      <input type="text" class="form-control" name="name" value="{{$user->name}}">
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input type="email" class="form-control" name="email" value="{{$user->email}}">
    </div>
    <div class="form-group">
      <label for="">Tipe User</label>
      <select class="form-control" name="tipe">
        <option value="">Pilih Tipe</option>
        <option value="1"
        @if($user->tipe == 1)
        selected
        @endif
        >Administrator</option>
        <option value="0"
        @if($user->tipe == 0)
        selected
        @endif
        >Penulis</option>
      </select>
    </div>

    <div class="form-group">
      <label for="">Password</label>
      <input type="text" class="form-control" name="password">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block">Update User</button>
    </div>
  </form>
@endsection