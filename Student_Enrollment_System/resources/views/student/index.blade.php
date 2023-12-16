@extends('layout.main')

@section('body')

<div class="alert alert-primary" role="alert">
 <h2>Students List</h2>
</div>

<section class="content">
<div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
                    
            <div class="box-header">
            <a href="/student/new" class="btn btn-success">New Student</a>
            </div>
            <br>


            <div class="box-body no-padding">
                <table id="tb_grupos" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Courses</th>
                    <th style="width: 300px">&nbsp;</th>
                    
                    
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($students as $student)
                    
                    <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->name}}</td>
                    <td>
                        <ul>
                            @foreach ($student->courses as $course) 
                                    <li> {{$course->name}} </li>
                            @endforeach
                    
                        </ul>  
                    </td>
                    <td>
                       
                        <a href="/enroll/{{$student->id}}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Enroll</a>
                        <a href="/student/edit/{{$student->id}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                        <a href="/student/delete/{{$student->id}}" onclick="return confirm('Do you want to delete this record  id = {{$student->id}}?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a> 

                    </td>
                    </tr>
                    @endforeach
                    
                </tbody>
                </table>
            </div>
        <!-- /.box-body -->
        </div>
     </div>
</div>   
</section>




@endsection