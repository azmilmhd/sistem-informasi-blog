@extends('master')
@section('content')

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{ url("/album") }}" method="POST">
                @csrf
            <div class="card">
                <div class="card-body">
               
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Photo</label>
                        <select name="album_photo_id" class="form-control  @error('album_photo_id')
                        is-invalid @enderror" value="{{ old('album_photo_id') }}" autofocus>
                        @foreach ($photo as $item)
                      <option value="{{ $item->photo_id}}">{{$item->photo_text}}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Album</label>
                        <input type="text" value="{{ old('album_name') }}" name="album_name" class="form-control  @error('album_name')
                        is-invalid @enderror" autofocus>@error('album_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                      </div>
                    </div>
                  </div>
                </div>

                
                <div class="card">
                    <div class="card-body">
                   
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" value="{{ old('album_text') }}" name="album_text" class="form-control  @error('album_text')
                             is-invalid @enderror" autofocus>@error('album_text') <div class="invalid-feedback">{{ $message }}</div> @enderror
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