@extends('backend.layouts.master')
@section('title','E-SHOP || project Edit')
@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Project</h5>
    <div class="card-body">
      <form method="post" action="{{route('project.update',$project->id)}}">

        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Nama Project <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="nama_project" placeholder="Enter Nama project"  value="{{$project->nama_project}}" class="form-control">
        @error('nama_project')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Penyelenggara <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="penyelenggara" placeholder="Enter Penyelenggara"  value="{{$project->penyelenggara}}" class="form-control">
          @error('penyelenggara')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="deskripsi" class="col-form-label">Deskripsi Project </label>
          {{--  <input id="inputTitle" type="textarea" name="deskripsi" placeholder="Enter Deskripsi Project"  value="{{$project->deskripsi}}" class="form-control"></input>  --}}
          <textarea class="form-control" id="deskripsi"  name="deskripsi">{{$project->deskripsi}}</textarea>
          @error('deskripsi')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>


          <div class="form-group">
            <label for="inputTitle" class="col-form-label">Lokasi <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="lokasi" placeholder="Enter Lokasi" value="{{$project->lokasi}}" class="form-control">
          @error('lokasi')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="inputTitle" class="col-form-label">Tools <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="tools" placeholder="Enter Tools"  value="{{$project->tools}}" class="form-control">
          @error('tools')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="inputTitle" class="col-form-label">Sebagai<span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="sebagai" placeholder="Enter Sebagai"  value="{{$project->sebagai}}" class="form-control">
          @error('sebagai')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="inputTitle" class="col-md-6 col-sm-6">Mulai Project<span class="text-danger">*</span></label>
            <input name="start_project" id="start_project" value="{{$project->start_project}}" class="date-picker form-control fonts" type="date">
          @error('start_project')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="inputTitle" class="col-md-6 col-sm-6">Selesai Project<span class="text-danger">*</span></label>
            <input name="end_project" id="end_project" value="{{$project->end_project}}" class="date-picker form-control fonts" type="date">
          @error('end_project')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
          {{--  <div class="form-group">
            <label for="inputPhoto" class="col-form-label">Photo</label>
            <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$project->photo}}">
          </div>
          <div id="holder" style="margin-top:15px;max-height:100px;"></div>
            @error('photo')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>  --}}

        {{--  <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="active" {{(($project->status=='active') ? 'selected' : '')}}>Active</option>
            <option value="inactive" {{(($project->status=='inactive') ? 'selected' : '')}}>Inactive</option>
          </select>
          @error('status')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>  --}}
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
