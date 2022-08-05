@extends('backend.layouts.master')
@section('title','E-SHOP || pendidikan Edit')
@section('main-content')

<div class="card">
    <h5 class="card-header">Edit pendidikan</h5>
    <div class="card-body">
      <form method="post" action="{{route('pendidikan.update',$pendidikan->id)}}">
        @csrf
        @method('PATCH')
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Tempat Pendidikan<span class="text-danger">*</span></label>
        <input id="inputTitle" type="text" name="tempat_pendidikan" placeholder="Enter Tempat Pendidikan"  value="{{$pendidikan->tempat_pendidikan}}" class="form-control">
        @error('tempat_pendidikan')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Jenjang Pendidikan <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="jenjang_pendidikan" placeholder="Enter Jenjang Pendidikan"  value="{{$pendidikan->jenjang_pendidikan}}" class="form-control">
          @error('jenjang_pendidikan')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="inputTitle" class="col-form-label">Jurusan <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="jurusan" placeholder="Enter Jurusan"  value="{{$pendidikan->jurusan}}" class="form-control">
          @error('jurusan')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <div class="form-group">
            <label for="inputTitle" class="col-md-6 col-sm-6">Mulai Pendidikan<span class="text-danger">*</span></label>
            <input name="start_pendidikan" id="start_pendidikan" value="{{$pendidikan->start_pendidikan}}" class="date-picker form-control fonts" type="date">
          @error('start_pendidikan')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

          <!-- test  -->

         

            <div class="form-group">
            <label for="inputTitle" class="col-md-6 col-sm-6">Selesai Pendidikan<span class="text-danger">*</span></label>
            <input name="end_pendidikan" id="end_pendidikan" value="{{$pendidikan->end_pendidikan}}" class="date-picker form-control fonts" type="date">
          <!-- @error('end_pendidikan')
          <span class="text-danger">{{$message}}</span>
          @enderror -->
          </div>

          <div class="form-group">
          <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="Sedang Menempuh Pendidikan" {{(($pendidikan->status=='Sedang Menempuh Pendidikan') ? 'selected' : '')}}>Sedang Menempuh Pendidikan</option>
            <option value="Sudah Lulus" {{(($pendidikan->status=='Sudah Lulus') ? 'selected' : '')}}>Sudah Lulus</option>
          </select>
          @error('status')
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
            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$pendidikan->photo}}">
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
  $('#status').change(function(){
    var is_checked=$('#status').prop('checked');
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
