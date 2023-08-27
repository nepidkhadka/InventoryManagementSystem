@extends('adminlte::page')

@section('title', 'Product List')

@section('content_header')
<h1>Product List</h1>
@stop

@section('content')
<div class="alert alert-dark" role="alert">
  The recorded product are listed below
</div>

<hr>

<table id="myTable" class="table table-bordered table-striped">
  <div class="my-3 d-flex flex-row-reverse">
    <button id="printButton" class="btn btn-success py-2 px-3 mx-1 ">Export PDF</button>
  </div>
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Category</th>
      <th scope="col">Supplier</th>
      <th scope="col">Quantity</th>
      <th scope="col">Rate Per Unit/Qty</th>
      <th scope="col">Total Price</th>
      <!-- <th  colspan="2" scope="col">Rate(Buying & Selling)</th> -->
      <th scope="col">Added Date</th>
    </tr>
  </thead>

  @foreach($listproduct as $listproduct)

  <tbody>
    <tr>
      <td>{{$listproduct->id}}</td>
      <td>{{$listproduct->name}}</td>
      <td>{{$listproduct->categories->name}}</td>
      <td>{{$listproduct->suppliers->company}}</td>
      <td id="qty">{{$listproduct->quantity}}</td>
      <td>Rs.{{$listproduct->price}}</td>
      <td>Rs.{{$listproduct->totalprice}}</td>
      <td>{{$listproduct->date}}</td>
    </tr>
  </tbody>
  @endforeach
</table>


<div style="margin-top:1.5rem;" class="toast" data-autohide="false">
  <div class="toast-header">
    <strong class="mr-auto text-primary">Attention: Low Stock Alert </strong>
    <small class="text-muted">1 mins ago</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
  </div>
  <div class="toast-body">

  </div>
</div>



@stop

@section('js')

<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });

  // Toast
  const qty = document.querySelectorAll("#qty");

  const mytoastbody = document.querySelector(".toast-body");

  mytoast = document.querySelector(".toast");

  qty.forEach((items) => {

    let secondFromFifth = items.previousElementSibling.previousElementSibling.previousElementSibling;
    let Name = secondFromFifth.textContent;
    let myqty = items.textContent;
    console.log(qty)


    if (myqty <= 10) {
      mytoast.classList.add("show");
      mytoastbody.textContent = "Product : (" + Name + ") Available Quantity : (" + myqty + ") .Please restock soon to avoid shortages."
      setTimeout(() => {
        mytoast.classList.remove("show");
      }, 6000)
    }

  })
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
      filename: 'Productlist.pdf',
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