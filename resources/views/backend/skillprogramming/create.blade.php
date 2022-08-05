@extends('backend.layouts.master')
@section('title','Portfolio || Skill Create')
@section('main-content')

<div class="card">
    <h5 class="card-header">Add Skil Programming</h5>
    <div class="card-body">
      <form method="post" action="{{route('skillprogramming.store')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Nama Skill <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="nama_skill" placeholder="Enter Nama Skill" class="form-control">
          @error('nama_skill')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="form-group">
              <label for="inputTitle" class="col-form-label">Level <span class="text-danger">*</span></label>
            <input id="inputTitle" type="text" name="level" placeholder="Enter Level"  class="form-control">
            @error('level')
            <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

            <div class="form-group">
              <label for="inputPhoto" class="col-form-label">Photo</label>
              <div class="input-group">
                  <span class="input-group-btn">
                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                      <i class="fa fa-picture-o"></i> Choose
                      </a>
                  </span>
              <input id="thumbnail" class="form-control" type="text" name="photo">
            </div>
            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
              @error('photo')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
           <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
@endpush
