@extends('adminlte::page')

@section('title', 'Customer List')

@section('content_header')
<h1>Customer List</h1>
@stop

@section('content')
<div class="alert alert-dark" role="alert">
  The added customer are listed below
</div>

@if(\Session::has('success'))
<div class="alert alert-success">
  <h6>{{ \Session::get('success') }}</h6>
</div>

@endif

<hr>

<table id="myTable" class="table table-bordered table-striped">
  <div class="my-3 d-flex flex-row-reverse">
    <button id="printButton" class="btn btn-success py-2 px-3 mx-1 ">Export PDF</button>
  </div>
  <thead class="table-dark">
    <tr>
      <th scope="col">Customer ID</th>
      <th scope="col">Full Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone Number</th>
    </tr>
  </thead>

  @foreach($listcustomer as $cdata)

  <tbody>
    <tr>
      <td>{{$cdata->id}}</td>
      <td>{{$cdata->firstname}} {{$cdata->lastname}}</td>
      <td>{{$cdata->address}}</td>
      <td>{{$cdata->phonenumber}}</td>
    </tr>
  </tbody>
  @endforeach
</table>


@stop


@section('js')

<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

<script type="text/javascript">
  const printButton = document.getElementById('printButton');
  printButton.addEventListener('click', generatePDF);

  function generatePDF() {

    // Choose the element id which you want to export.
    var element = document.getElementById('myTable');

    var opt = {
      margin: 0.5,
      filename: 'Customerlist.pdf',
      image: {
        type: 'jpeg',
        quality: 1
      },
      html2canvas: {
        scale: 1
      },
      jsPDF: {
        unit: 'in',
        format: 'letter',
        orientation: 'portrait',
        precision: '12'
      }
    };

    // choose the element and pass it to html2pdf() function and call the save() on it to save as pdf.
    html2pdf().set(opt).from(element).save();
  }
</script>
@stop