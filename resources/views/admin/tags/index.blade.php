@extends('template_backend.home')
@section('title', 'Tag')
@section('sub_judul', 'Tag')
@section('content')

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
      {{ Session('success') }}
    </div>
    @endif

    <a href="{{ route('tags.create')}}" class="btn btn-info my-2">Tambah Tag</a>
    <table class="table table-striped table-hover table-sm table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tag</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $result => $hasil)
            <tr>
                <td>{{ $result + $tags->firstitem()}}</td>
                <td>{{$hasil->name}}</td>
                <td>
                    <form action=" {{ route('tags.destroy', $hasil->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href=" {{ route('tags.edit', $hasil->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin data ini mau di hapus ?')">Delete</a>   
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tags->links()}}
@endsection