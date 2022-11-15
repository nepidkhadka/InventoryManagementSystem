@extends('adminlte::page')

@section('title', 'Category List')

@section('content_header')
    <h1>Category List</h1>
@stop

@section('content')
    <div class="alert alert-dark" role="alert">
        The added category are listed below
    </div>

    <hr>

    <table class="table table-bordered table-striped table-hover">
                    <!-- class="thead-light" -->
            <thead  class="bg-dark text-center">
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