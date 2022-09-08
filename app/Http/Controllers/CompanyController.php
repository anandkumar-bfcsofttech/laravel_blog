<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies = Company::latest()->paginate(10);
        return view('companies.index',compact('companies'))
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
        return view('companies.create');
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
        // dd($request);
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:255',
            'logo'=>'required'
        ]);
        $fileName=time().'.'.$request->logo->extension();
        $request->logo->move(public_path('logos'), $fileName);
        $com=Company::insert(['name'=>$request->name,'email'=>$request->email,'website'=>$request->website,'logo'=>$fileName]);
        return redirect('companies')
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
        $companies['company'] = Company::where(['id'=>$id])->first();
        return view('companies.show',$companies);
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
        $companies['company'] = Company::where(['id'=>$id])->first();
        return view('companies.edit',$companies);
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
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        Company::where(['id'=>$request->id])->update(['name'=>$request->name,'email'=>$request->email,'website'=>$request->website]); 
        return redirect('companies')
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
        Company::where(['id'=>$id])->delete();
        return redirect('companies')
                        ->with('success','Company deleted successfully');
    }
    
}