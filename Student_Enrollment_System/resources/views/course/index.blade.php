@extends('layout.main')

@section('body')
<h1>chegou no index Course</h1>

<section class="content">
<div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
                    
            <div class="box-header">
            <a href="/course/new" class="btn btn-success">New Course</a>
            </div>
            <br>


            <div class="box-body no-padding">
                <table id="tb_grupos" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Instructor</th>
                    <th style="width: 250px">&nbsp;</th>
                    
                    
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($courses as $course )
                    
                    <tr>
                    <td>{{$course->id}}</td>
                    <td>{{$course->name}}</td>
                    @if (isset($course->instructor->name) )
                        <td>{{$course->instructor->name}}</td>
                    @else
                       <td></td>
                    @endif
                    
                    <td>
                        <a href="/course/edit/{{$course->id}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                        <a href="/course/delete/{{$course->id}}" onclick="return confirm('Do you want to delete this record  id = {{$course->id}}?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
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