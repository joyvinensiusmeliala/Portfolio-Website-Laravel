@extends('backend.layouts.master')
@section('title','E-SHOP || Skill Programming Edit')
@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Skill Programming</h5>
    <div class="card-body">
      <form method="post" action="{{route('skillprogramming.update',$skillprogramming->id)}}">

        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Nama Skill <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="nama_skill" placeholder="Enter Nama Skill"  value="{{$skillprogramming->nama_skill}}" class="form-control">
        @error('nama_skill')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Level <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="level" placeholder="Enter Level"  value="{{$skillprogramming->level}}" class="form-control">
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
            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$skillprogramming->photo}}">
          </div>
          <div id="holder" style="margin-top:15px;max-height:100px;"></div>
            @error('photo')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

       
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#description').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 150
    });
    });

    $(document).ready(function() {
        $('#deskripsi').summernote({
          placeholder: "Write short Quote.....",
            tabsize: 2,
            height: 100
        });
      });
</script>
@endpush
