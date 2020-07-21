@extends('template_backend.home')
@section('title', 'User')
@section('sub_judul', 'User')
@section('content')

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
    @endif

    <a href="{{ route('users.create')}}" class="btn btn-info my-2">Tambah User</a>
    <table class="table table-striped table-hover table-sm table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Email</th>
                <th>Tipe</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $result => $hasil)
            <tr>
                <td>{{ $result + $users->firstitem()}}</td>
                <td>{{$hasil->name}}</td>
                <td>{{$hasil->email}}</td>
                <td>
                    @if($hasil->tipe)
                        <span class="badge badge-info">Administrator</span>
                    @else
                        <span class="badge badge-warning">Penulis</span>
                    @endif
                </td>
                <td>
                    <form action=" {{ route('users.destroy', $hasil->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href=" {{ route('users.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin data mau di hapus?')">Delete</a>   
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links()}}
@endsection