@extends('master')
@section('content')

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{ url("/post/{$post->post_id}") }}" method="POST">
                @csrf
                @method('patch')
            <div class="card">
                <div class="card-body">
               
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Kategori</label>
                        <select name="post_cat_id" class="form-control">
                          <option value="{{ $post->category->cat_id }}">{{ $post->category->cat_nama }}</option>
                          @foreach($category as $item)
                          <option value="{{ $item->cat_id }}">{{ $item->cat_nama }}</option>
                          @endforeach
                      </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tanggal Post</label>
                        <input type="date" name="post_date" class="form-control @error('post_date')
                                is-invalid @enderror" value="{{ old('post_date', $post->post_date) }}">
                                @error('post_date')
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
                            <label>Post Slug</label>
                            <input type="text" name="post_slug" class="form-control @error('post_slug')
                                is-invalid @enderror" value="{{ old('post_slug', $post->post_slug) }}">
                                @error('post_slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                          </div>
                        </div>
    
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Judul Post</label>
                                <input type="text" name="post_title" class="form-control @error('post_title')
                                is-invalid @enderror" value="{{ old('post_title', $post->post_title) }}">
                                @error('post_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                 
                    <div class="col-md-12">
                        <div class="form-group">
                          <label>Post Keterangan</label>
                          <textarea type="text" name="post_text" class="form-control @error('post_text')
                                is-invalid @enderror">{{ old('post_text', $post->post_text)}}</textarea>
                                @error('post_text')
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