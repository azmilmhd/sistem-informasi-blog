@extends('master')
@section('content')

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{ url("/photo") }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card">
                <div class="card-body">
               
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Post</label>
                        <select name="photo_post_id" class="form-control  @error('photo_post_id')
                        is-invalid @enderror" value="{{ old('photo_post_id') }}" autofocus>
                        @foreach ($post as $item)
                      <option value="{{ $item->post_id}}">{{$item->post_title}}</option>
                        @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tanggal Photo</label>
                        <input type="date" value="{{ old('photo_date') }}" name="photo_date" class="form-control  @error('photo_date')
                        is-invalid @enderror" autofocus>@error('photo_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                      </div>
                    </div>
                  </div>
                </div>

                
                <div class="card">
                    <div class="card-body">
                   
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="photo_title" class="form-control" required>
                          </div>
                        </div>
    
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Keterangan</label>
                            <textarea type="text" name="photo_text" class="form-control @error('photo_text')
                            is-invalid @enderror" >{{ old('photo_text') }}</textarea>
                            @error('photo_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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