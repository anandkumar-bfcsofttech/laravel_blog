<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use File;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::latest()->paginate(10);
        return view('employees.index',compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'profile_picture'=>'required'
        ]);
        $fileName=time().'.'.$request->profile_picture->extension();
        $request->profile_picture->move(public_path('uploads'), $fileName);
        $emp=Employee::insert(['first_name'=>$request->first_name,'last_name'=>$request->last_name,'company'=>$request->company,'email'=>$request->email,'phone'=>$request->phone,'profile_picture'=>$fileName]);

        return redirect('employees')
                        ->with('success','Employee created successfully.');
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
        $employees['employee'] = Employee::where(['id'=>$id])->first();
        return view('employees.show',$employees);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        //
        $employees['employee'] = Employee::where(['id'=>$id])->first();
        return view('employees.edit',$employees);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request);
        // $rel=Employee::find(1)->getCompany;  //for getting relation of particular id 
        //laravel relation call inner join by defult.
        $rel=Employee::with('getCompany')->get();  //for make relation between all  common field
        // dd($rel);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        if($request->hasFile('profile_picture'))
        {
            // dd('if');
            $profile_picture = $request->file('profile_picture');
            $fileName=time().'.'.$profile_picture->extension();
            $profile_picture->move(public_path('uploads'), $fileName);

            $exist_image = Employee::find($id);
            $exist_image=$exist_image->profile_picture;
            if (!empty($exist_image)) 
            {
                unlink(public_path('uploads/').$exist_image);    
            }
            Employee::where(['id'=>$request->id])->update(['first_name'=>$request->first_name,'last_name'=>$request->last_name,'company'=>$request->company,'email'=>$request->email,'phone'=>$request->phone,'profile_picture'=>$fileName]);
        }
        $employees=Employee::where(['id'=>$request->id])->update(['first_name'=>$request->first_name,'last_name'=>$request->last_name,'company'=>$request->company,'email'=>$request->email,'phone'=>$request->phone]);

        return redirect('employees')
                        ->with('success','Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::where(['id'=>$id])->delete();
    
        return redirect('employees')
                        ->with('success','Employee deleted successfully');
    }
    
}
