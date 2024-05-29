<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index(){
        $title = 'Dashboard';
        $clients_count = Client::count();
        $employee_count = Employee::count();
        $leave = Leave::where('status', '=>', 1)->count();
    $approvedLeaveCount = Leave::with('id',Auth::user()->id)->where('status', 1)->count();
 $disLeaveCount = Leave::with('id',Auth::user()->id)->where('status', 2)->count();
        return view('backend.dashboard',compact(
            'title','clients_count','employee_count','leave','approvedLeaveCount','disLeaveCount'
        ));
    }
}
