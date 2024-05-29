<?php

namespace App\Models;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Leave;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname','lastname','uuid',
        'email','phone',
        'department_id','designation_id','company','avatar','user_id',
    ];


    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function designation(){
        return $this->belongsTo(Designation::class);
    }
	public function leaves(){
        return $this->hasOne('\App\Models\Leave','employee_id','id');
    }

    
}
