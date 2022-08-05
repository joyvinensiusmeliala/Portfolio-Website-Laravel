@extends('backend.layouts.master')
@section('title','E-SHOP || pekerjaan Edit')
@section('main-content')

<div class="card">
    <h5 class="card-header">Edit pekerjaan</h5>
    <div class="card-body">
      <form method="post" action="{{route('pekerjaan.update',$pekerjaan->id)}}">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Nama Pekerjaan <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="nama_pekerjaan" placeholder="Enter Nama Pekerjaan"  value="{{$pekerjaan->nama_pekerjaan}}" class="form-control">
        @error('nama_pekerjaan')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Nama Perusahaan <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="nama_perusahaan" placeholder="Enter Nama Perusahaan"  value="{{$pekerjaan->nama_perusahaan}}" class="form-control">
          @error('nama_perusahaan')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="job_desc" class="col-form-label">Deskripsi Pekerjaan </label>
          {{--  <input id="inputTitle" type="textarea" name="job_desc" placeholder="Enter Deskripsi Pekerjaan"  value="{{$pekerjaan->job_desc}}" class="form-control"></input>  --}}
          <textarea class="form-control" id="job_desc"  name="job_desc">{{$pekerjaan->job_desc}}</textarea>
          @error('deskripsi')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="inputTitle" class="col-md-6 col-sm-6">Mulai Bekerja<span class="text-danger">*</span></label>
            <input name="start_bekerja" id="start_bekerja" value="{{$pekerjaan->start_bekerja}}" class="date-picker form-control fonts" type="date">
          @error('start_bekerja')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="inputTitle" class="col-md-6 col-sm-6">Selesai Bekerja<span class="text-danger">*</span></label>
            <input name="end_bekerja" id="end_bekerja" value="{{$pekerjaan->end_bekerja}}" class="date-picker form-control fonts" type="date">
          @error('end_bekerja')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="inputTitle" class="col-form-label">Lokasi Perusahaan <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="lokasi" placeholder="Enter Lokasi Pekerjaan"  value="{{$pekerjaan->lokasi}}" class="form-control">
          @error('lokasi')
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
            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$pekerjaan->photo}}">
          </div>
          <div id="holder" style="margin-top:15px;max-height:100px;"></div>
            @error('photo')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="active" {{(($pekerjaan->status=='active') ? 'selected' : '')}}>Active</option>
            <option value="inactive" {{(($pekerjaan->status=='inactive') ? 'selected' : '')}}>Inactive</option>
          </select>
          @error('status')
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

<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#job_desc').summernote({
      placeholder: "Write short description.....",
        tabsize: 2,
        height: 100
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
