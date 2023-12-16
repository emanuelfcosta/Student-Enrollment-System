<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        if(isset($students)){
            return view('student.index', compact('students'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $theStudent = new Student();
        $theStudent->name = $request->input('name');
        $theStudent->save();
        return redirect('/student');
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
        $theStudent = Student::find($id);
        if(isset($theStudent)){
            return view('student.edit', compact('theStudent'));
        }

        return redirect('/student');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $theStudent = Student::find($id);
        if(isset($theStudent)){
            
            $theStudent->name = $request->input('name');
            $theStudent->save();

        }

        return redirect('/student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $theStudent = Student::find($id);
        if(isset($theStudent)){
            $theStudent->delete();
        }

        return redirect('/student');
    }
}
