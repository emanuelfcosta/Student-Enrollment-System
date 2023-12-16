@extends('layout.main')

@section('body')

<script>

function close_modal_group(){
    $('#modalInstructorCourse').modal('hide');    
    }


function add_instructor_to_course(element) {
// adiciona o centro custo na venda


document.getElementById("id_instructor").value = document.getElementById("grid_instructor_course").rows[element.parentNode.parentNode.rowIndex].cells[0].innerHTML;
document.getElementById("course_instructor").value = document.getElementById("grid_instructor_course").rows[element.parentNode.parentNode.rowIndex].cells[1].innerHTML;

close_modal_group();

}

</script>


                <!-- BEGIN -  Modal Test -->
                <!-- Modal -->
                <div class="modal fade" id="modalInstructorCourse" tabindex="-1" aria-labelledby="modalInstructorCourseLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalInstructorCourseLabel">Instructors</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
        <table class="table table-bordered table-striped table-hover" id="grid_instructor_course">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th style="width: 140px">&nbsp;</th>
              </tr>
            </thead>
            <tbody >
              
              @foreach($instructors as $instructor )
              <tr>
                <td>{{$instructor->id}}</td>
                <td>{{$instructor->name}}</td>
                <td>
                  <button type="button" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top"  onclick="add_instructor_to_course(this)">
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


<h1>Edit course</h1>
<section class="content">
<div class="row">
    <div class="col-md-12">

        <div class="box box-primary">
                    
            
            <br>

            <div class="box-body no-padding">
              <form role="form" action="/course/{{$theCourse->id}}" method="post" >
                @csrf
                <div class="box-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$theCourse->name}}" required  >
                  </div>
                  
                  <!-- instructor is defined -->
                  @if (isset($theCourse->Instructor->id) )  
                  <div class="form-group " >
                    <input type="hidden"  class="form-control" id="id_instructor" name="id_instructor" value="{{$theCourse->Instructor->id}}"  readonly >
                  </div>
                   
                  <div class="form-group">
                    <label for="course_instructor">Instructor:</label>
                    <input type="text" class="form-control" id="course_instructor" name="course_instructor" value="{{$theCourse->Instructor->name}}"  readonly>
                  </div>
                  @else <!-- instructor is not defined -->

                  <div class="form-group " >
                    <input  type="hidden" class="form-control" id="id_instructor" name="id_instructor"   readonly >
                  </div>
                   
                  <div class="form-group">
                    <label for="course_instructor">Instructor:</label>
                    <input type="text" class="form-control" id="course_instructor" name="course_instructor"   readonly>
                  </div>

                  @endif
                     
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalInstructorCourse">
                      Select Instructor
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