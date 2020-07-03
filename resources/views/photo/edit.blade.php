@extends('master')
@section('content')

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{ url("/photo/{$photo->photo_id}") }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
            <div class="card">
                <div class="card-body">
               
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Kategori</label>
                        <select name="photo_post_id" class="form-control">
                            <option value="{{ $photo->post->post_id }}">{{ $photo->post->post_title }}</option>
                            @foreach($post as $item)
                            <option value="{{ $item->post_id }}">{{ $item->post_title}}</option>
                            @endforeach
    
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tanggal Photo</label>
                        <input type="date" name="photo_date" class="form-control @error('photo_date')
                                is-invalid @enderror" value="{{ old('photo_date', $photo->photo_date) }}">
                                @error('photo_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                      </div>
                    </div>
                  </div>
                </div>

                
                <div class="card">
                    <div class="card-body">
                   
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="photo_title" class="form-control @error('photo_title')
                            is-invalid @enderror" value="{{ old('photo_title', $photo->photo_title) }}">
                          </div>
                        </div>
    
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Keterangan foto</label>
                            <textarea type="text" name="photo_text" class="form-control @error('photo_text')
                            is-invalid @enderror">{{ old('photo_text', $photo->photo_text)}}</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                 
                
                  
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                
              </div>
            </div>
        </form>
        </div>
</div>
@endsection