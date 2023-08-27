@extends('adminlte::page')

@section('title', 'Total Sales & Profit/Loss')

@section('content_header')
    <h1>Total Sales & Profit/Loss</h1>
@stop

@section('content')
    <div class="alert alert-dark" role="alert">
        The Total Sales & Profit are listed below
    </div>
    <hr>

    <table id="myTable" class="table table-bordered table-striped table-hover">
    <div class="my-3 d-flex flex-row-reverse" >
    <button id="printButton" class="btn btn-success py-2 px-3 mx-1 ">Export PDF</button>
  </div>
    <thead  class="bg-dark text-center">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Total </th>
              </tr>
            </thead>          
           
            <tbody class="text-center"> 
            <tr>  
                <td>Total Sells</td>         
                <td>Rs. {{$grandtotalsales}}</td>                 
            </tr>             
            <tr>  
                <td>Total Purchase</td>         
                <td>Rs.{{ $grandtotalpurchase}}</td>                 
            </tr>             
            <tr>  
                <td>Total Profit/Loss</td>         
                <td>Rs.{{ $profit}}.00</td>                 
            </tr>             
            </tbody>      
    </table>
  
  

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
       filename: 'ProfitLoss.pdf',
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