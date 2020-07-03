@extends('master')
@section('content')

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                
                <div class="card-body">
                <form action="{{ url("/category") }}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" value="{{ old('cat_nama') }}" name="cat_nama" class="form-control  @error('cat_nama')
                        is-invalid @enderror" autofocus>@error('cat_nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Keterangan</label>
                        <textarea type="text" name="cat_text" class="form-control @error('cat_text')
                                is-invalid @enderror" >{{ old('cat_text') }}</textarea>
                                @error('cat_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                      </div>
                    </div>
                  </div>
                 
                  
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
</div>
@endsection