@extends('master')
@section('content')

<div class="section-body">
    <div class="section-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
          <a href="{{ url("photo/create") }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-file"></i> tambah</a>
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
                <th scope="col">NAMA POST</th>
                <th scope="col">TANGGAL</th>
                <th scope="col">JUDUL</th>
                <th scope="col">KETERANGAN</th>
                <th scope="col">ACTION</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($photo as $data)
              <tr>
                <td>{{ $loop-> iteration}}</td>
                <td>{{ $data->post->post_title}}</td>
                <td>{{ $data->photo_date}}</td>
              <td><img src="{{asset('photo_img/' .$data->photo_title)}}" class="img-table" width="100px" height="100px" alt=""></td>
                <td>{{ $data->photo_text}}</td>
                <td>
                  <a href="{{ url("/photo/{$data->photo_id}/edit") }}" class="btn btn-icon icon-left btn-success"><i class="far fa-edit"></i> edit</a>
                   | 
                  <form action="{{ url ("/photo/{$data->photo_id}") }}" method="POST" class="d-inline" onsubmit="return confirm('data yang di hapus tidak bisa kembali')">
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