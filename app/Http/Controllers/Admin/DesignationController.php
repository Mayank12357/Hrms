<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use Illuminate\Support\Facades\Validator;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Designations";
        $designations = Designation::with('department')->get();
        $departments = Department::get();
        return view('backend.designations',compact('title','designations','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        



$validated = Validator::make($request->all(), ['name' => 'required']);



 if($validated->fails()){

$result = '<p class="alert alert-danger">Name field is required</p>';
$gth = 'danger';

 } else{

     // Designation::create([
     //         'name'=>$request->designation,
     //        'department_id'=>$request->department,
     //     ]);
    
 Designation::create($request->all());
$result = '<p class="alert alert-success">designation has been added successfully!!.</p>';
$gth = 'success';
 }

return Response::json(['success' => $result, 'gth' => $gth], 200);








    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $this->validate($request,[
            'designation'=>'required|max:200',
            'department'=>'required',
        ]);
        $designation = Designation::findOrFail($request->id);
        $designation->update([
            'name'=>$request->designation,
            'department_id'=>$request->department,
        ]);
        return back()->with('success',"designation has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $designation = Designation::findOrFail($request->id);
        $designation->delete();
        return back()->with('success',"Designation has been deleted successfully!!");
    }
}
