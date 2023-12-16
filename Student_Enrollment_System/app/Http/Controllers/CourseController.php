<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Instructor;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();

        return view('course.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instructors = Instructor::all();

        if(isset($instructors)){
            return view('course.new', compact('instructors'));
        }




    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $theInsctructor = Instructor::find($request->input('id_instructor'));

        if(isset($theInsctructor)){

            $theCourse = new Course();
            $theCourse->name = $request->input('name');
            $theCourse->instructor()->associate($theInsctructor);
            $theCourse->save();
            
            return redirect('/course');

        } else{ // is instructor not defined

            $theCourse = new Course();
            $theCourse->name = $request->input('name');
            $theCourse->save();
            
            return redirect('/course');


        }  

       
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
        $theCourse = Course::find($id);

        $instructors = Instructor::all();

        if(isset($theCourse)){
         

          return view('course.edit', compact('theCourse','instructors'));
        }

        return redirect('/course');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $theCourse = Course::find($id);

        $theInsctructor = Instructor::find($request->input('id_instructor'));

        if(isset($theCourse)){

            if(isset($theInsctructor)){ // instructor is defined

                $theCourse->name = $request->input('name');
                $theCourse->instructor()->associate($theInsctructor);
                $theCourse->save();
                
                return redirect('/course');

            } else{ // is instructor not defined

                $theCourse->name = $request->input('name');
                $theCourse->save();
                
                return redirect('/course');
    
    
            }  
            
        }

        return redirect('/course');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $theCourse = Course::find($id);
        if(isset($theCourse)){
            $theCourse->delete();
        }

        return redirect('/course');
    }
}
