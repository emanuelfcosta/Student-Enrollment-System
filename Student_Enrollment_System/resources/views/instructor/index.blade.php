@extends('layout.main')

@section('body')

<div class="alert alert-primary" role="alert">
<h2>Instructors List</h2>
</div>


<section class="content">
<div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
                    
            <div class="box-header">
            <a href="/instructor/new" class="btn btn-success">New Instructor</a>
            </div>
            <br>


            <div class="box-body no-padding">
                <table id="tb_grupos" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th style="width: 250px">&nbsp;</th>
                    
                    
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($instructors as $instructor )
                    
                    <tr>
                    <td>{{$instructor->id}}</td>
                    <td>{{$instructor->name}}</td>
                    @if (isset($instructor->department->name) )
                        <td>{{$instructor->department->name}}</td>
                    @else
                       <td></td>
                    @endif
                    <td>
                        <a href="/instructor/edit/{{$instructor->id}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                        <a href="/instructor/delete/{{$instructor->id}}" onclick="return confirm('Do you want to delete this record  id = {{$instructor->id}}?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
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