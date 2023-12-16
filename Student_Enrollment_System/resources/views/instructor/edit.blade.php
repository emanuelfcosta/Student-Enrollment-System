@extends('layout.main')

@section('body')

<script>

function close_modal(){
    $('#modalDepartmentInstructor').modal('hide');    
    }


function add_department_to_instructor(element) {



document.getElementById("id_department").value = document.getElementById("grid_department_instructor").rows[element.parentNode.parentNode.rowIndex].cells[0].innerHTML;
document.getElementById("department_instructor").value = document.getElementById("grid_department_instructor").rows[element.parentNode.parentNode.rowIndex].cells[1].innerHTML;

close_modal();

}

</script>

               <!-- BEGIN -  Modal Test -->
                <!-- Modal -->
                <div class="modal fade" id="modalDepartmentInstructor" tabindex="-1" aria-labelledby="modalDepartmentInstructorLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalDepartmentInstructorLabel">Departments</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
        <table class="table table-bordered table-striped table-hover" id="grid_department_instructor">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th style="width: 140px">&nbsp;</th>
              </tr>
            </thead>
            <tbody >
              
              @foreach($departments as $department )
              <tr>
                <td>{{$department->id}}</td>
                <td>{{$department->name}}</td>
                <td>
                  <button type="button" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top"  onclick="add_department_to_instructor(this)">
                    <i class="fa fa-plus"></i> Select
                  </button>
              
                  
                </td>
              </tr>
              
              @endforeach
            </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                <!-- END -  Modal Test -->



<div class="alert alert-primary" role="alert">
  <h2>Edit instructor</h2>
</div>
<section class="content">
<div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
                    
            
            <br>

            <div class="box-body no-padding">
              <form role="form" action="/instructor/{{$theInstructor->id}}" method="post" >
                @csrf
                <div class="box-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$theInstructor->name}}" required  >
                  </div> 
                  
                  <!-- department is defined -->
                  @if (isset($theInstructor->Department->id) )  
                  <div class="form-group " >
                    <input type="hidden"  class="form-control" id="id_department" name="id_department" value="{{$theInstructor->Department->id}}"  readonly >
                  </div>
                   
                  <div class="form-group">
                    <label for="department_instructor">Department:</label>
                    <input type="text" class="form-control" id="department_instructor" name="department_instructor" value="{{$theInstructor->Department->name}}"  readonly>
                  </div>
                  @else <!-- instructor is not defined -->

                  <div class="form-group " >
                    <input  type="hidden" class="form-control" id="id_department" name="id_department"   readonly >
                  </div>
                   
                  <div class="form-group">
                    <label for="department_instructor">Department:</label>
                    <input type="text" class="form-control" id="department_instructor" name="department_instructor"   readonly>
                  </div>

                  @endif
                     
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDepartmentInstructor">
                      Select Department
                    </button>
                  


      
                </div>
                <!-- /.box-body -->

                <br>
                <div class="box-footer">
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
              </form>
                
            </div>
        <!-- /.box-body -->
        </div>
     </div>
</div>   
</section>



@endsection