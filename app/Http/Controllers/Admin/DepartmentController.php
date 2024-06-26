<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use Illuminate\Support\Facades\Validator;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Departments";
        $departments = Department::get();
        return view('backend.departments',compact('title','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


//$validated = $request->validate([
    //        'name' => 'required',
     //   ]);

$validated = Validator::make($request->all(), ['name' => 'required']);



 if($validated->fails()){

$result = '<p class="alert alert-danger">Name field is required</p>';
$gth = 'danger';

 } else{

Department::create($request->all());
$result = '<p class="alert alert-success">Department has been added successfully!!.</p>';
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,['name'=>'required|max:100']);
        $department = Department::find($request->id);
        $department->update([
            'name'=>$request->name,
        ]);
        return back()->with('success',"Holiday has been updated successfully!!.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $department = Department::find($request->id);
        $department->delete();
        return back()->with('success',"Holiday has been deleted successfully!!.");
    }
}
