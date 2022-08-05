@extends('backend.layouts.master')
@section('title','Portfolio || Pekerjaan Create')
@section('main-content')

<div class="card">
    <h5 class="card-header">Add pekerjaan</h5>
    <div class="card-body">
      <form method="post" action="{{route('pekerjaan.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Nama Pekerjaan <span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="nama_pekerjaan" placeholder="Enter Nama Pekerjaan" class="form-control">
        @error('nama_pekerjaan')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Nama Perusahaan <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="nama_perusahaan" placeholder="Enter Nama Perusahaan"  class="form-control">
          @error('nama_perusahaan')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="job_desc" class="col-form-label">Deskripsi Pekerjaan </label>
          {{--  <input id="inputTitle" type="textarea" name="deskripsi" placeholder="Enter Deskripsi Pekerjaan" class="form-control"></input>  --}}
          <textarea class="form-control" id="job_desc"  name="job_desc"></textarea>
          @error('job_desc')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
          
          <div class="form-group">
              <label for="inputTitle" class="col-md-6 col-sm-6">Mulai Bekerja<span class="text-danger">*</span></label>
              <input name="start_bekerja" id="start_bekerja" class="date-picker form-control fonts" type="date">
            @error('start_bekerja')
            <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

            <div class="form-group">
              <label for="inputTitle" class="col-md-6 col-sm-6">Selesai Bekerja<span class="text-danger">*</span></label>
              <input name="end_bekerja" id="end_bekerja" class="date-picker form-control fonts" type="date">
            @error('end_bekerja')
            <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

            <div class="form-group">
            <label for="inputTitle" class="col-form-label">Lokasi Perusahaan <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="lokasi" placeholder="Enter Lokasi Perusahaan"  class="form-control">
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
              <input id="thumbnail" class="form-control" type="text" name="photo">
            </div>
            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
              @error('photo')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
          </select>
          @error('status')
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

<script>
  $('#end_bekerja').change(function(){
    var is_checked=$('#end_bekerja').prop('checked');
    // alert(is_checked);
    if(is_checked){
      $('#parent_cat_div').addClass('d-none');
      $('#parent_cat_div').val('');
    }
    else{
      $('#parent_cat_div').removeClass('d-none');
    }
  })
</script>

<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#job_desc').summernote({
      placeholder: "Write short Job Description.....",
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
