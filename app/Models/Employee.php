<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Employee extends Model
{
    //
    protected $fillable=['first_name','last_name','company','email','phone','profile_picture','employee_id'];
    public function getCompany()
   {
        return $this->hasOne(Company::class,'employee_id','id');
   }
}
