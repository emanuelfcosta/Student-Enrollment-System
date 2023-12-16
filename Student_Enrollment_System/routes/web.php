<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StudentController;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
   // return view('welcome');
   return view('index');
});


// instructor
Route::get('/instructor', [InstructorController::class, 'index']);
Route::get('/instructor/new', [InstructorController::class, 'create']);
Route::post('/instructor', [InstructorController::class, 'store']);
Route::get('/instructor/delete/{id}', [InstructorController::class, 'destroy']);
Route::get('/instructor/edit/{id}', [InstructorController::class, 'edit']);
Route::post('/instructor/{id}', [InstructorController::class, 'update']);

//Route::resource('instructor', InstructorController::class);

//course

Route::get('/course', [CourseController::class, 'index']);
Route::get('/course/new', [CourseController::class, 'create']);
Route::post('/course', [CourseController::class, 'store']);
Route::get('/course/delete/{id}', [CourseController::class, 'destroy']);
Route::get('/course/edit/{id}', [CourseController::class, 'edit']);
Route::post('/course/{id}', [CourseController::class, 'update']);

//department

Route::get('/department', [DepartmentController::class, 'index']);
Route::get('/department/new', [DepartmentController::class, 'create']);
Route::post('/department', [DepartmentController::class, 'store']);
Route::get('/department/delete/{id}', [DepartmentController::class, 'destroy']);
Route::get('/department/edit/{id}', [DepartmentController::class, 'edit']);
Route::post('/department/{id}', [DepartmentController::class, 'update']);

//student

Route::get('/student', [StudentController::class, 'index']);
Route::get('/student/new', [StudentController::class, 'create']);
Route::post('/student', [StudentController::class, 'store']);
Route::get('/student/delete/{id}', [StudentController::class, 'destroy']);
Route::get('/student/edit/{id}', [StudentController::class, 'edit']);
Route::post('/student/{id}', [StudentController::class, 'update']);


// enroll

Route::get('/enroll/{student_id}', function (int $student_id) {

   $courses = Course::all();
   $theStudent = Student::find($student_id);

        if(isset($theStudent)){
          
         return view('student.enroll',compact('courses','theStudent'));

        }

});

Route::get('/subscribe/{course_id}/student/{student_id}', function (int $course_id, int $student_id) {


      $theStudent = Student::find($student_id);
      $theCourse = Course::find($course_id);

      // to check if the student item already attached to the course 
    // if( $theStudent->courses->contains($course_id) ) this is the same result  
   //   if( $theStudent->courses()->get()->contains($theCourse->id))

   //      echo 'enrolled';
   //   else 
   //      echo 'not enrolled ';


      if(isset($theStudent) and isset($theCourse) ){

       //  $theStudent->courses()->attach($theCourse);

       //$theStudent->courses()->sync($theCourse);

         $theStudent->courses()->syncWithoutDetaching($theCourse);

         return redirect('/enroll/'. $student_id);
   
      }
   
});

Route::get('/unsubscribe/{course_id}/student/{student_id}', function (int $course_id, int $student_id) {


   $theStudent = Student::find($student_id);
   $theCourse = Course::find($course_id);

  

   if(isset($theStudent) and isset($theCourse) ){

    //  $theStudent->courses()->attach($theCourse);

    //$theStudent->courses()->sync($theCourse);

      $theStudent->courses()->detach($theCourse);

      return redirect('/enroll/'. $student_id);

   }

});


