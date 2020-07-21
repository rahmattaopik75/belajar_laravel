@extends('template_backend.home')
@section('title', 'Post')
@section('sub_judul', 'Post')
@section('content')

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
    @endif

    <a href="{{ route('posts.create')}}" class="btn btn-info my-2">Tambah Post</a>
    <table class="table table-striped table-hover table-sm table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Post</th>
                <th>Kategori</th>
                <th>Tag</th>
                <th>User</th>
                <th>Thumbnail</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $result => $hasil)
            <tr>
                <td>{{ $result + $posts->firstitem()}}</td>
                <td>{{$hasil->judul}}</td>
                <td>{{$hasil->category->name}}</td>
                <td>@foreach($hasil->tags as $tag )
                        <ul>
                        <h6><span class="badge badge-info">{{ $tag->name}}</span></h6>
                        </ul>
                    @endforeach
                </td>
                <td>{{ $hasil->users->name }}</td>
                <td><img src="{{ asset($hasil->gambar)}}" class="img-fluid" style="width:100px"></td>
                <td>
                    <form action=" {{ route('posts.destroy', $hasil->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href=" {{ route('posts.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin data mau di hapus?')">Delete</a>   
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links()}}
@endsection