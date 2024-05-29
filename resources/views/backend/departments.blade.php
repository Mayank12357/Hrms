@extends('layouts.backend')

@section('styles')
<!-- Datatable CSS -->
<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
@endsection
@section('page-header')
<div class="row align-items-center">
    <div class="col">
        <h3 class="page-title">Department</h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Department</li>
        </ul>
    </div>
    <div class="col-auto float-right ml-auto">
        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_department"><i class="fa fa-plus"></i> Add Department</a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div>
            <table class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th style="width: 30px;">#</th>
                        <th>Department Name</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($departments->count()))
                        @foreach ($departments as $department)
                            <tr>
                                <td>{{$department->id}}</td>
                                <td>{{$department->name}}</td>
                                <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a data-id="{{$department->id}}" data-name="{{$department->name}}" class="dropdown-item editbtn" href="javascript:void(0);" data-toggle="modal"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a data-id="{{$department->id}}" class="dropdown-item deletebtn" href="javascript:void(0);" data-toggle="modal"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        
                        <!-- Edit Department Modal -->
                        <div id="edit_department" class="modal custom-modal fade" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Department</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{route('departments')}}" id="">
                                            @csrf
                                            @method("PUT")
                                            <input type="hidden" id="edit_id" name="id">
                                            <div class="form-group">
                                                <label>Department Name <span class="text-danger">*</span></label>
                                                <input class="form-control" name="name" id="edit_name" type="text">
                                            </div>
                                            <div class="submit-section">
                                                <button type="submit" class="btn btn-primary submit-btn">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Edit Department Modal -->
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Department Modal -->
<div id="add_department" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Department dffsdfds</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="restfy"></div>
                <form action="" method="POST" id="myForm1">
                    @csrf
                    <div class="form-group">
                        <label>Department Name <span class="text-danger">*</span></label>
                        <input class="form-control" id="dp1" name="name" type="text">
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Add Department Modal -->
@endsection

@section('scripts')
<!-- Datatable JS -->
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function (){
        $('.table').on('click','.editbtn',function (){
            $('#edit_department').modal('show');
            var id = $(this).data('id');
            var name = $(this).data('name');
            console.log(name);
            $('#edit_id').val(id);
            $('#edit_name').val(name);
        });
    });
</script>

 <script>
  
  $(document).ready(function(){


$('.submit-btn').click(function(e){
        e.preventDefault();
        var formData = $("#dp1").val();
        
        $.ajax({
            url: "{{ route('departments') }}",
            type: "POST",
            data: { "_token":"{{ csrf_token() }}", 'name': formData },
            success: function(response){
$(".alert").hide();


                if(response.gth == 'danger'){

$("#add_department .modal-body .restfy").append(response.success);
$("#add_department").modal("show");
                } else{
$("#add_department .modal-body .restfy").append(response.success);
$("#add_department").modal("show");
location.reload();               
 }
            }
        });
     });
  });


</script> 



@endsection

