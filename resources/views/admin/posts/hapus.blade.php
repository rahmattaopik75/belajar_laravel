@extends('template_backend.home')
@section('title', 'Tampil Hapus Post')
@section('sub_judul', 'Tampil Hapus Post')
@section('content')

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
    @endif
    <table class="table table-striped table-hover table-sm table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Post</th>
                <th>Kategori</th>
                <th>Tag</th>
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
                            <li>{{ $tag->name}}</li>
                        </ul>
                    @endforeach
                </td>
                <td><img src="{{ asset($hasil->gambar)}}" class="img-fluid" style="width:100px"></td>
                <td>
                    <form action="{{ route('posts.forcedelete', $hasil->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{ route('posts.restore', $hasil->id)}}" class="btn btn-primary btn-sm" onclick="return confirm('Apakah Yakin data Mau di restore?')">Restore</a>
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin data mau di Hapus Permanen?')">Delete Permanen</a>   
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links()}}
@endsection