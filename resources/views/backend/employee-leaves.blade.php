@extends('layouts.backend')

@section('styles')	
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.min.css')}}">

<!-- Datatable CSS -->
<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
@endsection

@section('page-header')
<div class="row align-items-center">
	<div class="col">
		<h3 class="page-title">Leaves</h3>
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
			<li class="breadcrumb-item active">Leaves</li>
		</ul>
	</div>
	<div class="col-auto float-right ml-auto">
		     @if(auth()->user()->status == 0)
		<a href="javascript:void(0)" class="btn add-btn adleave"><i class="fa fa-plus"></i> Add Leave</a>
		@endif
	</div>
</div>
@endsection


@section('content')
	<div id="sucmsg"></div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive" id="mytable">
				<table class="table table-striped custom-table mb-0 datatable">
					<thead>
						<tr>
<th>S. no.</th>
							<th>Employee name</th>
							<th>Leave Type</th>
							<th>From</th>
							<th>To</th>
							<th>No of Days</th>
							<th>Reason</th>
							<th class="text-center">Status</th>
							
							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($leaves as $key => $leave)
							<tr>
							<td>{{ $key+1 }}</td>		      	
								<td>
								{{ $leave->employee->firstname ?? '' }}				
								</td>
								<td>{{$leave->leaveType->type}}</td>
								<td>{{date_format(date_create($leave->from),"d M, Y")}}</td>
								<td>{{date_format(date_create($leave->to),"d M, Y")}}</td>
								<td>
									@php
										$start = new DateTime($leave->to);
										$end_date = new DateTime($leave->from);
									@endphp
									{{($start->diff($end_date,"%d")->days).' '. Str::plural('Days',$start->diff($end_date,"%d")->days)}}
								</td>
								<td>{{substr($leave->reason,0,30).' ........'}}</td>
								<td class="text-center">
									<div class="action-label">
										<a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
											@if($leave->status == 1)
											<i class="fa fa-dot-circle-o text-success"></i> Approved
											@elseif($leave->status == 2)
											<i class="fa fa-dot-circle-o text-danger"></i> Declined
                                           @else
											<i class="fa fa-dot-circle-o text-primary"></i> Pending
											@endif
										</a>
									</div>
								</td>
								
								<td class="text-right">
									<div class="dropdown dropdown-action">
										<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
										@if(Auth::user()->status == 1)
											<a href="javascript:;" id="aprovleave" data-id="{{ $leave->id }}">Approve</a>
										<a href="javascript:;" id="disaprovleave" data-id="{{ $leave->id }}">Disapprove</a>
										

										
											@endif
											<a data-id="{{$leave->id}}" data-from="{{$leave->from}}"
												data-to="{{$leave->to}}" data-employee="{{$leave->employee_id}}"
												data-leave_type="{{$leave->leave_type_id}}" data-status="{{$leave->status}}"
												data-reason="{{$leave->reason}}" class="dropdown-item editbtn" href="javascript:void(0)" data-toggle="modal" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
											<a data-id="{{$leave->id}}" class="dropdown-item deletebtn" href="javascript:void(0)" data-toggle="modal" ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
										</div>
									</div>
								</td>
							</tr>
						@endforeach	
						<!-- delete Leave Modal -->
						<x-modals.delete :route="'leave.destroy'" :title="'Leave'" />
						<!-- /delete Leave Modal -->					
					</tbody>
				</table>
			</div>
		</div>
	</div>

<!-- Add Leave Modal -->
<div id="add_leave" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Leave</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{route('employee-leave')}}">
					@csrf
					
					@if(Auth::user()->status == 1)
<input type="hidden" name="employee_id" value="" />
@else
<input type="hidden" class="employeeid" name="employee_id" value="" />	
@endif	
@if(Auth::user()->status == 1)
<div class="form-group">
						<label>Employee</label>
						<select name="employee" class="select">
							@foreach ($employees as $employee)
								<option value="{{$employee->id}}">{{$employee->firstname}} {{$employee->lastname}}</option>
							@endforeach
						</select>
</div> 
@endif
 -
					<div class="form-group">
						<label>Leave Type <span class="text-danger">*</span></label>
						<select name="leave_type" class="select">
							@foreach ($leave_types as $leave_type)
								<option value="{{$leave_type->id}}">{{$leave_type->type}}</option>
							@endforeach
						</select>
					</div>


					<div class="form-group"> 
						<label>From <span class="text-danger">*</span></label>
						
							<input name="from" class="form-control" id="log_date" type="datetime-local">
						
					</div>
					<div class="form-group">
						<label>To <span class="text-danger">*</span></label>
							<input name="to" class="form-control"  id="end_time" type="datetime-local">
					</div>
					
					<div class="form-group">
						<label>Leave Reason <span class="text-danger">*</span></label>
						<textarea name="reason" rows="4" class="form-control"></textarea>
					</div>

					<!-- <div class="form-group">
                        <label>Status </label>
                        <select name="status" class="select">
                            <option value="null" disabled selected>Select Status</option>
                            <option>Approved</option>
                            <option>Pending</option>
                            <option>Declined</option>
                        </select>
                    </div> -->
					<div class="submit-section">
						<button class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Add Leave Modal -->

<!-- Edit Leave Modal -->
<div id="edit_leave" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Leave</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="{{route('employee-leave')}}" method="post">
					@csrf
					@method("PUT")
					<input type="hidden" name="id" id="edit_id">
					{{-- <div class="form-group">
						<label>Employee<span class="text-danger">*</span></label>
						<select name="employee" class="select2" id="edit_employee">
							@foreach ($employees as $employee)
								<option value="{{$employee->id}}">{{$employee->firstname.' '.$employee->lastname}}</option>
							@endforeach
						</select>
					</div> --}}

					<div class="form-group">
						<label>Leave Type <span class="text-danger">*</span></label>
						<select name="leave_type" class="select2" id="edit_leave_type">
							@foreach ($leave_types as $leave_type)
								<option value="{{$leave_type->id}}">{{$leave_type->type}}</option>
							@endforeach
						</select>
					</div>
					
					<div class="form-group">
						<label>From <span class="text-danger">*</span></label>
						<div class="cal-icon">
							<input name="from" class="form-control" type="datetime-local" id="edit_from">
						</div>
					</div>
					<div class="form-group">
						<label>To <span class="text-danger">*</span></label>
						<div class="cal-icon">
							<input name="to" class="form-control" type="datetime-local" id="edit_to">
						</div>
					</div>
					
					<div class="form-group">
						<label>Leave Reason <span class="text-danger">*</span></label>
						<textarea name="reason" rows="4" class="form-control" id="edit_reason"></textarea>
					</div>
					<div class="form-group">
                   <!--      <label>Status </label>
                        <select name="status" class="select2 form-control" id="edit_status">
                            <option value="null">Select Status</option>
                            <option>Approved</option>
                            <option>Pending</option>
                            <option>Declined</option>
                        </select>
                    </div> -->
					<div class="submit-section">
						<button class="btn btn-primary submit-btn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit Leave Modal -->
@endsection

@section('scripts')
<!-- Select2 JS -->
<script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script>
<!-- Datatable JS -->
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script>

// disabled the past date

var today = new Date().toISOString().slice(0, 16);
document.getElementById("log_date").min = today;




	$(document).ready(function(){	
		$('.editbtn').click(function(){
			var id = $(this).data('id');
			var employee = $(this).data('employee');
			var leave_type = $(this).data('leave_type');
			var status = $(this).data('status');
			var from  = $(this).data('from');
			var to  = $(this).data('to');
			var reason = $(this).data('reason')
			$('#edit_leave').modal('show');
			$('#edit_id').val(id);
			$('#edit_employee').val(employee).trigger('change');
			$('#edit_leave_type').val(leave_type).trigger('change');
			$('#edit_status').val(status).trigger('change');
			$('#edit_from').val(from);
			$('#edit_to').val(to)
			$('#edit_reason').append(reason);
			// check employee select
			$("#edit_employee option").each(function()
			{
				if($(this).val() == employee){
					$(this).attr('selected','selected');
				}
			});
			// check leave type select
			$("#edit_type option").each(function()
			{
				if($(this).val() == leave_type){
					$(this).attr('selected','selected');
				}
			});
			// check status select
			$("#edit_status option").each(function()
			{
				if($(this).val() == status){
					$(this).attr('selected','selected');
				}
			});
		});
		
		
		//Approved leave
		$(document).on("click", "#aprovleave", function(){
		var id = $(this).data("id");
		
		$.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "{{ url('leaveaprove') }}",
        data : {'id' : id},
        type : 'POST',
        dataType : 'json',
        success : function(response){
           var msg = response.message;
		   $("#sucmsg").html(msg);
		   $( "#mytable" ).load( "http://127.0.0.1:8000/employee-leave #mytable" );

        }
    });
		
});
		
		
		//disApproved leave
		$(document).on("click", "#disaprovleave", function(){
		var id = $(this).data("id");
		
		$.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "{{ url('leavedisaprove') }}",
        data : {'id' : id},
        type : 'POST',
        dataType : 'json',
        success : function(response){
           var msg = response.message;
		   $("#sucmsg").html(msg);
		   $( "#mytable" ).load( "http://127.0.0.1:8000/employee-leave #mytable" );

        }
    });
		
});	

$(document).on("click", ".adleave", function(){

var userid = {{ Auth::user()->id }} ;

$.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "{{ url('aplyleave') }}",
        data : {'id' : userid},
        type : 'POST',
        dataType : 'json',
        success : function(response){
           var data = response.data;

           $(".employeeid").val(data.id);

           $("#add_leave").modal('show'); 

        }
    });

});

$(document).on("change", "#log_date", function(){

	var nval = $(this).val();

$("#end_time").attr("min", nval);


});

		
	});
</script>
 
@endsection
