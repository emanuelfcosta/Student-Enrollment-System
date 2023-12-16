<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $departments = Department::all();

        return view('department.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $theDepartment = new Department();
        $theDepartment->name = $request->input('name');
        $theDepartment->save();
        return redirect('/department');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $theDepartment = Department::find($id);
        if(isset($theDepartment)){
            return view('department.edit', compact('theDepartment'));
        }

        return redirect('/department');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $theDepartment = Department::find($id);
        if(isset($theDepartment)){
            
            $theDepartment->name = $request->input('name');
            $theDepartment->save();

        }

        return redirect('/department');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $theDepartment = Department::find($id);
        if(isset($theDepartment)){
            $theDepartment->delete();
        }

        return redirect('/department');
    }
}
