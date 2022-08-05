@extends('backend.layouts.master')
@section('title','E-SHOP || pekerjaan Create')
@section('main-content')

<div class="card">
    <h5 class="card-header">Add pekerjaan</h5>
    <div class="card-body">
      <form method="post" action="{{route('pendidikan.store')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Tempat Pendidikan<span class="text-danger">*</span></label>
          <input id="tempat_pendidikan" type="text" name="tempat_pendidikan" placeholder="Enter Tempat Pendidikan"  class="form-control">
          @error('tempat_pendidikan')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>
          <div class="form-group">
              <label for="inputTitle" class="col-form-label">Jenjang Pendidikan <span class="text-danger">*</span></label>
            <input id="jenjang_pendidikan" type="text" name="jenjang_pendidikan" placeholder="Enter Jenjang Pendidikan"  class="form-control">
            @error('jenjang_pendidikan')
            <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

            <div class="form-group">
              <label for="inputTitle" class="col-form-label">Jurusan <span class="text-danger">*</span></label>
            <input id="jurusan" type="text" name="jurusan" placeholder="Enter Jurusan" class="form-control">
            @error('jurusan')
            <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

            <div class="form-group">
              <label for="inputTitle" class="col-md-6 col-sm-6">Mulai Pendidikan<span class="text-danger">*</span></label>
              <input name="start_pendidikan" id="start_pendidikan" class="date-picker form-control fonts" type="date">
            @error('start_pendidikan')
            <span class="text-danger">{{$message}}</span>
            @enderror
            </div>

            
            

            <!-- Test  -->

            <div class="form-group">
              <label for="end_pendidikan">Aktif Bekerja</label><br>
              <input type="checkbox" name='end_pendidikan' id='end_pendidikan' value='Active Bekerja' checked> Aktif Bekerja   
              <!-- @error('end_pendidikan')
            <span class="text-danger">{{$message}}</span>
            @enderror                     -->
            </div> 

            <div class="form-group d-none" id='parent_cat_div'>
              <label for="inputTitle" class="col-md-6 col-sm-6">Selesai Pendidikan<span class="text-danger">*</span></label>
                <input id="end_pendidikan" class="date-picker form-control fonts" type="date">
              <!-- @error('end_pendidikan')
              <span class="text-danger">{{$message}}</span>
              @enderror -->
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

            
            <!-- {{--  <div class="form-group">
                <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                <select name="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                @error('status')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>  --}} -->
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
  $('#end_pendidikan').change(function(){
    var is_checked=$('#end_pendidikan').prop('checked');
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

@endpush
