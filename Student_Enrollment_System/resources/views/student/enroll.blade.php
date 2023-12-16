@extends('layout.main')

@section('body')

<div class="alert alert-primary" role="alert">
<h2>Enroll</h2>
</div>


    <div class="alert alert-warning" role="alert">

    <div class="form-group">
        <label for="id_student">id</label>
        <input type="text" class="form-control" id="id_student" name="id_student" value="{{$theStudent->id}}" readonly  >
    </div>

    <div class="form-group">
        <label for="name_student">Student</label>
        <input type="text" class="form-control" id="name_student" name="name_student" value="{{$theStudent->name}}" readonly  >
    </div> 
    </div> 



<section class="content">
<div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
                    
            <div class="box-header">
            <div class="alert alert-success" role="alert">    
                <h4>Courses</h4>
            </div>
            </div>
            <br>


            <div class="box-body no-padding">
                <table id="tb_grupos" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th style="width: 300px">&nbsp;</th>
                    
                    
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($courses as $course)
                    
                    <tr>
                    <td>{{$course->id}}</td>
                    <td>{{$course->name}}</td>
                    @if($theStudent->courses()->get()->contains($course->id))
                    <td class="bg-success text-white">Enrolled</td>
                    @else
                    <td class="bg-secondary text-white" >Not Enrolled</td>
                    @endif
                    <td>
                        <a href="/subscribe/{{$course->id}}/student/{{$theStudent->id}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Subscribe</a>
                        <a href="/unsubscribe/{{$course->id}}/student/{{$theStudent->id}}"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Unsubscribe</a>
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