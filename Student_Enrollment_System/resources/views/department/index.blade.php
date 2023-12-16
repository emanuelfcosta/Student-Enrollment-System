@extends('layout.main')

@section('body')
<div class="alert alert-primary" role="alert">
<h2>Departments List</h2>
</div>
<section class="content">
<div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
                    
            <div class="box-header">
            <a href="/department/new" class="btn btn-success">New Department</a>
            </div>
            <br>


            <div class="box-body no-padding">
                <table id="tb_grupos" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th style="width: 250px">&nbsp;</th>
                    
                    
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($departments as $department)
                    
                    <tr>
                    <td>{{$department->id}}</td>
                    <td>{{$department->name}}</td>
                    
                    
                    <td>
                        <a href="/department/edit/{{$department->id}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                        <a href="/department/delete/{{$department->id}}" onclick="return confirm('Do you want to delete this record  id = {{$department->id}}?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
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