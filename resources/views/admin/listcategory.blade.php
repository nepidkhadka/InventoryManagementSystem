 @extends('adminlte::page')
 @section('plugins.Datatables', true)
 @section('title', 'Category List')

 @section('content_header')
 <h1>Category List</h1>
 @stop

 @section('content')
 <div class="alert alert-dark" role="alert">
   The added category are listed below
 </div>

 <hr>

 <table  id="myTable" class="table table-bordered table-striped table-hover">
  <div class="my-3 d-flex flex-row-reverse" >
    <button class="btn btn-success py-2 px-3 mx-1 ">Export PDF</button>
  </div>
   <!-- class="thead-light" -->
   <thead class="bg-dark text-center">
     <tr>
       <th scope="col">#</th>
       <th scope="col">Category Name</th>
     </tr>
   </thead>

   @foreach($listcategory as $listcategory)

   <tbody class="text-center">
     <tr>
       <td>{{$listcategory->id}}</td>
       <td>{{$listcategory->name}}</td>
     </tr>
   </tbody>
   @endforeach
 </table>


 @stop

 @section('js')

<script> 
   $(document).ready(function () {
      $('#myTable').DataTable();
   });
</script>
@stop