@extends('master')
@section('content')

<div class="section-body">
    <div class="section-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
          <a href="{{ url("post/create") }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-file"></i> tambah</a>
          <hr>
          @if (session('status'))
                  <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>×</span>
                      </button>
                      {{session('status')}}
                    </div>
              </div>
              @endif
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">KATEGORI NAMA</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">SLUG</th>
                <th scope="col">JUDUL</th>
                <th scope="col">KETERANGAN</th>
                <th scope="col">ACTION</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($post as $data)
              <tr>
                <td>{{ $loop-> iteration}}</td>
                <td>{{ $data->category->cat_nama}}</td>
                <td>{{ $data->post_date}}</td>
                <td>{{ $data->post_slug}}</td>
                <td>{{ $data->post_title}}</td>
                <td>{{ $data->post_text}}</td>
                <td>
                  <a href="{{ url("/post/{$data->post_id}/edit") }}" class="btn btn-icon icon-left btn-success"><i class="far fa-edit"></i> edit</a>
                   | 
                  <form action="{{ url ("/post/{$data->post_id}") }}" method="POST" class="d-inline" onsubmit="return confirm('data yang di hapus tidak bisa kembali')">
                    @csrf
                    @method('delete')
                    <button class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i>
                      Hapus
                    </button>
                  </form>
                      </td>
              </tr>
              @endforeach
            </tbody>
          </table>
           </div>
          </div>
        </div>
      </div>
</div>
@endsection