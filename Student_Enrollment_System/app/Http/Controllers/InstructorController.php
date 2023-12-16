<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Models\Department;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::all();

        return view('instructor.index',compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      //  return view('instructor.new');

      $departments = Department::all();

      if(isset($departments)){
          return view('instructor.new', compact('departments'));
      }



    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $theDepartment = Department::find($request->input('id_department'));

        if(isset($theDepartment)){

            $theInstructor = new Instructor();
            $theInstructor->name = $request->input('name');
            $theInstructor->department()->associate($theDepartment);
            $theInstructor->save();
            
            return redirect('/instructor');

        } else{ //  department is not defined

             $theInstructor = new Instructor();
            $theInstructor->name = $request->input('name');
            $theInstructor->save();
            return redirect('/instructor');


        }  


    }

    /**
     * Display the specified resource.
     */
    public function show(Instructor $instructor)
    {
        //

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
       $theInstructor = Instructor::find($id);

        
       
       $departments = Department::all();


      
        if(isset($theInstructor)){
          

          return view('instructor.edit', compact('theInstructor','departments'));
        }

        return redirect('/instructor');




    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $theInstructor = Instructor::find($id);

      
       $theDepartment = Department::find($request->input('id_department'));


        if(isset($theInstructor)){

            if(isset($theDepartment)){ // department is defined

                $theInstructor->name = $request->input('name');
                $theInstructor->department()->associate($theDepartment);
                $theInstructor->save();
                
                return redirect('/instructor');

            } else{ // department is not defined

                $theInstructor->name = $request->input('name');
                $theInstructor->save();
                
                return redirect('/instructor');
    
            }  
            
        }

        return redirect('/instructor');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $theInsctructor = Instructor::find($id);
        if(isset($theInsctructor)){
            $theInsctructor->delete();
        }

        return redirect('/instructor');

    }
}
