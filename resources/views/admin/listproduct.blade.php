@extends('adminlte::page')

@section('title', 'Product List')

@section('content_header')
<h1>Product List</h1>
@stop

@section('content')

<style>
  .toast {
    backdrop-filter: blur(50px);
    transition: .5s cubic-bezier(0.18, 0.89, 0.32, 1.28);
  }
</style>
<div class="alert alert-dark" role="alert">
  The recorded product are listed below
</div>

<hr>

<table id="myTable" class="table table-bordered table-striped">
  <div class="my-3 d-flex flex">
    <button id="printButton" class="btn btn-success py-2 px-3 mx-1 ">Export PDF</button>
    <button id="stockalertbnt" class="btn btn-danger py-2 px-3 mx-2 ">Stock Alert</button>
    <button id="higheststockalertbnt" class="btn btn-dark py-2 px-3 mx-2 ">Highest Quantity</button>
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

<div class="toast" style="position: absolute; top: 65px; right: 20px;" data-autohide="false">
  <div class="toast-header">
    <strong id="toast-title" class="mr-auto text-primary">Attention: Low Stock Alert </strong>
    <small class="text-muted">1 mins ago</small>
  </div>
  <div class="toast-body">
  </div>
</div>




@stop

@section('js')

<script>
  //Jquery DataTable
  $(document).ready(function() {
    $('#myTable').DataTable();
  });

  let toasttitle = document.querySelector("#toast-title");

  // Toast
  const toastalert = () => {
    const qty = document.querySelectorAll("#qty");
    const mytoastbody = document.querySelector(".toast-body");
    const mytoast = document.querySelector(".toast");
    const qtyArray = Array.from(qty);

    const toastAll = qtyArray.map(items => {
      let secondFromFifth = items.previousElementSibling.previousElementSibling.previousElementSibling;
      let Name = secondFromFifth.textContent;
      let myqty = items.textContent;

      if (myqty <= 10) {
        mytoast.classList.add("show");
        // mytoastbody.textContent = `Product : (${Name}) Available Quantity : (${myqty}) .Please restock soon to avoid shortages.`;
        setTimeout(() => {
          mytoast.classList.remove("show");
        }, 5000);
        return (`Product Name : <b> (${Name}) </b>  Available Quantity : <b> (${myqty}) </b>. Please restock soon to avoid shortages.<hr>`)
      }
    });
    toasttitle.innerText = "Attention: Low Stock Alert";
    let toastreturn = document.querySelector(".toast-body");
    toastreturn.innerHTML = toastAll.join('');
  }
  toastalert();
  clickalertbtn = document.getElementById("stockalertbnt");
  clickalertbtn.addEventListener("click", toastalert);


  //Finding Highest Stock Product
  let highqtyarray = [];
  let highproductarray = [];
  let highestqty = "";
  let highestqtyproduct = "";
  let indexofhighestqty = "";

  const highestquantity = () => {
    const qty = document.querySelectorAll("#qty");
    const mytoastbody = document.querySelector(".toast-body");
    const mytoast = document.querySelector(".toast");
    const qtyArray = Array.from(qty);
    if (qty.length > 0) {
      const highstockalert = qtyArray.map((items, i) => {
        let name = items.previousElementSibling.previousElementSibling.previousElementSibling.textContent;
        let myqty = +items.innerText;
        highqtyarray.push(myqty);
        highproductarray.push(name);
        // console.log("Max QTY Output :", Math.max(...highqtyarray));
        // higestqty = Math.max.apply(Math, highqtyarray);
        // highqtyarray.findIndex()
      })


      highestqty = Math.max.apply(Math, highqtyarray);
      indexofhighestqty = highqtyarray.indexOf(highestqty);
      highestqtyproduct = highproductarray[indexofhighestqty];

      // alert("Highest Available Quantity is: " + highestqty + " Product Name : " + highestqtyproduct);
      highqtyarray = [];
      highproductarray = [];

      mytoast.classList.add("show");
      setTimeout(() => {
        mytoast.classList.remove("show");
      }, 5000);

      let highquantityalertdata =
        `The Highest Available Quantity Product Is : <br> <b> (${highestqtyproduct}) </b> & Available Quantity : <b> (${highestqty}) </b>`

      let titlefortoast = 'Highest Quantity Product'
      mytoastbody.innerHTML = highquantityalertdata;
      toasttitle.innerHTML = titlefortoast;
    } else {
      mytoast.classList.add("show");
      setTimeout(() => {
        mytoast.classList.remove("show");
      }, 5000);
      let highquantityalertdata = "No Products Available !!! <br> Please add atleast one products and try again.<hr>"
      let titlefortoast = 'No Product Availability'
      mytoastbody.innerHTML = highquantityalertdata;
      toasttitle.innerHTML = titlefortoast;
    }
  }

  higheststockalertbnt = document.getElementById("higheststockalertbnt");
  higheststockalertbnt.addEventListener("click", highestquantity);
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
        scale: 1.2
      },
      jsPDF: {
        unit: 'in',
        format: 'letter',
        orientation: 'landscape',
        precision: '12'
      }
    };

    // choose the element and pass it to html2pdf() function and call the save() on it to save as pdf.
    html2pdf().set(opt).from(element).save();
  }
</script>

@stop