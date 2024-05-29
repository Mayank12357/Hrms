<?php

namespace App\Http\Controllers\Admin;

use App\Models\Leave;
use App\Models\Employee;
use App\Models\User;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeeLeaveController extends Controller
{


public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "employee leave";
        
        $leave_types = LeaveType::get();
        //$employees = Employee::get();$user = auth()->guard('admin')->user();
        
        if(Auth::user()->status == 1){
        $leaves = Leave::with('leaveType','employee')->orderBy('id', 'DESC')->get();
        } else{
   

      $employees = Employee::where('user_id', Auth::user()->id)->first();
             $leaves = Leave::with('leaveType','employee')->where('employee_id', $employees->id)->get();

        }
        
    
        
        //dd(Auth::user()->status);
        if(Auth::user()->status == 1){
            
         $employees = Employee::get();
         } else{
             
             $employees = Employee::where('user_id', Auth::user()->id)->first();


         }

         $users = User::get();
        return view('backend.employee-leaves',compact(
            'title','leaves','leave_types','employees','users'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
               // dd($request->all());
        
        $this->validate($request,[
             //'employee'=>'   ',
            'leave_type'=>'required',
            'from'=>'required',
            'to'=>'required',
            'reason'=>'required'
        ]);
      $leave =  Leave::create([
             'employee_id'=>$request->employee_id,
            'leave_type_id'=>$request->leave_type,
            'from'=>$request->from,
            'to'=>$request->to,
            'reason'=>$request->reason,
            $data = Auth::user()->user_id,
        ]);

 
$empleave = Leave::latest()->first();

$empem = Employee::where('id', $empleave->employee_id)->first();


$empem = [
    'firstname' => $empem->firstname,
    'email'=>$empem->email,
    'from'=>$empleave->from,
    'to'=>$empleave->to,
    'reason'=>$empleave->reason,
    'leave_type'=>$empleave->leave_type,

];

dd($empem);

 $emps =   Mail::send('emails.applyleave', $empem, function($message) use ($empem){
   $message->to('hr@kodegurus.com',)->cc(['ceo@kodegurus.com'])->bcc(['ravinder@kodegurus.com']);
                  $message->from($empem['email'], 'Kodegurus HR');
                  $message->subject('Request For Leave ');                

});




        

        $notification = notify("Employee leave has been added");
        return back()->with($notification);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $leave = Leave::find($request->id);
        $leave->update([
            'employee_id'=>$request->employee,
            'leave_type_id'=>$request->leave_type,
            'from'=>$request->from,
            'to'=>$request->to,
            'reason'=>$request->reason,
          
        ]);
        $notification = notify("Employee leave has been updated");
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $leave = Leave::find($request->id);
        $leave->delete();
        $notification = notify('Employee leave has been deleted');
        return back()->with($notification);
    }
    
    public function leaveaprove(Request $request)
   {
        $mcv = Leave::where('id', $request->id)->first();
        
$empem = Employee::where('id', $mcv->employee_id)->first();
        

        if($mcv){
            
            $mcv->update(array('status' => 1));
            $message = 'Leave has been approved successfuly';
            


$empem = [
    'firstname' => $empem->firstname,
    'email'=>$empem->email,
];

 $emps =   Mail::send('emails.approveleave', $empem, function($message) use ($empem){
   $message->to($empem['email'])->cc(['ceo@kodegurus.com']);
                  $message->from('hr@kodegurus.com', 'Kodegurus HR');
                  $message->subject('Leave Approved successfully');                

});


return response()->json([
                'success' => true,
                'message' => $message,
            ]);




            
        } else{
            
            return false;
        }
        

    }
    
    
    public function leavedisaprove(Request $request)
    
    {
        $mcvd = Leave::where('id', $request->id)->first();
        $empem = Employee::where('id', $mcvd->employee_id)->first();
        
        if($mcvd){
            $mcvd->update(array('status' => 2));
            $message = 'Leave has been disapproved successfuly';
        
            
$empem = [
    'firstname' => $empem->firstname,
    'email'=>$empem->email,

];

 $emps =   Mail::send('emails.disapproveleave', $empem, function($message) use ($empem){
   $message->to($empem['email'])->cc(['ceo@kodegurus.com']);
                  $message->from('hr@kodegurus.com', 'Kodegurus HR');
                  $message->subject('Leave Disapproved successfully');                

});

                return response()->json([
                'success' => true,
                'message' => $message,
            ]);
            
            
        } else{
            
            return false;
        }
        
    }


    public function aplyleave(Request $request)
{

$employee_id = Employee::where('user_id', $request->id)->first();

return response()->json([
                'success' => true,
                'data' => $employee_id,
            ]);

}


}
