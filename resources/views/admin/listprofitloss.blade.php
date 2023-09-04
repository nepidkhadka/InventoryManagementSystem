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
                <td>Total Purchase</td>         
                <td id="purchaseprice" >{{ $grandtotalpurchase}}</td>                 
            </tr>   
            <tr>  
                <td>Total Sells</td>         
                <td id="salesprice" >{{$grandtotalsales}}</td>                 
            </tr>             
            <tr>  
                <td>Total Profit/Loss</td>         
                <td id="profitprice" >{{ $profit}}</td>                 
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


<script>

const formatNumberWithCommas = (number) => {
    const numberString = String(number);
    
    if (numberString.length === 5) {
        return numberString.substring(0, 2) + ',' + numberString.substring(2);
    } else if (numberString.length === 6) {
        return numberString.substring(0, 1) + ',' + numberString.substring(1, 3) + ',' + numberString.substring(3);
    } else if (numberString.length === 7) {
        return numberString.substring(0, 2) + ',' + numberString.substring(2, 4) + ',' + numberString.substring(4);
    } else {
        return numberString;
    }
}

//purchase
const purchasepricenode = document.getElementById("purchaseprice");
const purchasepricedata = purchasepricenode.textContent;
const formattedpurchasepricedata = formatNumberWithCommas(purchasepricedata);
purchasepricenode.textContent = "Rs." + formattedpurchasepricedata;

//sales
const salespricenode = document.getElementById("salesprice");
const salespricedata = salespricenode.textContent;
const formattedsalespricedata = formatNumberWithCommas(salespricedata);
salespricenode.textContent = "Rs." + formattedsalespricedata;

//profti&sales
const profitlosspricenode = document.getElementById("profitprice");
const profitlosspricedata = profitlosspricenode.textContent;
const formattedprofitlosspricedata = formatNumberWithCommas(profitlosspricedata);
profitlosspricenode.textContent = "Rs." + formattedprofitlosspricedata;



</script>

@stop