@extends('backend.layouts.master')
@section('title','E-SHOP || pekerjaan Page')
@section('main-content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
     <div class="row">
         <div class="col-md-12">
            @include('backend.layouts.notification')
         </div>
     </div>
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary float-left">Pekerjaan List</h6>
      <a href="{{route('pekerjaan.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add pekerjaan</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if(count($pekerjaans)>0)
        <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
            
            <?php $no = 0;?>
              <th>No.</th>
              <th>Nama Pekerjaan</th>
              <th>Nama Perusahaan</th>
              <th>Deskripsi Pekerjaan</th>
              <th>Mulai Bekerja</th>
              <th>Selesai Bekerja</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @php $no = 1; @endphp
            @foreach($pekerjaans as $pekerjaan)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$pekerjaan->nama_pekerjaan}}</td>
                    <td>{{$pekerjaan->nama_perusahaan}}</td>
                    <td>{!! preg_replace("/^(.*)<br.*\/?>/m", '<p>$1</p>' , ($pekerjaan->job_desc)) !!}</td>
                    
                    <td>{{$pekerjaan->start_bekerja}}</td>
                    <td>{{$pekerjaan->end_bekerja}}</td>
                    <td>
                        @if($pekerjaan->status=='active')
                            <span class="badge badge-success">{{$pekerjaan->status}}</span>
                        @else
                            <span class="badge badge-warning">{{$pekerjaan->status}}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('pekerjaan.edit',$pekerjaan->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{route('pekerjaan.destroy',[$pekerjaan->id])}}">
                          @csrf
                          @method('delete')
                              <button class="btn btn-danger btn-sm dltBtn" data-id={{$pekerjaan->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                    {{-- Delete Modal --}}
                    {{-- <div class="modal fade" id="delModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="#delModal{{$user->id}}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="#delModal{{$user->id}}Label">Delete user</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="post" action="{{ route('banners.destroy',$user->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" style="margin:auto; text-align:center">Parmanent delete user</button>
                              </form>
                            </div>
                          </div>
                        </div>
                    </div> --}}
                </tr>
            @endforeach
          </tbody>
        </table>
        <span style="float:right">{{$pekerjaans->links()}}</span>
        @else
          <h6 class="text-center">No pekerjaans found!!! Please create pekerjaan</h6>
        @endif
      </div>
    </div>
</div>
@endsection

@push('styles')
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <style>
      div.dataTables_wrapper div.dataTables_paginate{
          display: none;
      }
      .zoom {
        transition: transform .2s; /* Animation */
      }

      .zoom:hover {
        transform: scale(3.2);
      }
  </style>
@endpush

@push('scripts')

  <!-- Page level plugins -->
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
  <script>

      $('#banner-dataTable').DataTable( {
            "columnDefs":[
                {
                    "orderable":false,
                    "targets":[3,4]
                }
            ]
        } );

        // Sweet alert

        function deleteData(id){

        }
  </script>
  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
          $('.dltBtn').click(function(e){
            var form=$(this).closest('form');
              var dataID=$(this).data('id');
              // alert(dataID);
              e.preventDefault();
              swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                       form.submit();
                    } else {
                        swal("Your data is safe!");
                    }
                });
          })
      })
  </script>
@endpush
