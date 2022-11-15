@extends('adminlte::page')

@section('title', 'Add Sales')

@section('content_header')
    <h1>Add Sales</h1>
@stop

@section('content')
    <div class="alert alert-dark" role="alert">
        Fill up the below information to add sales
    </div>

        <hr>
    
    @if(\Session::has('success'))
    <div class="alert alert-success">
        <h6>{{ \Session::get('success') }}</h6>
    </div>
        
    @endif

    <form  autocomplete="off" method="post" action="/submitsales">
        {{csrf_field()}}

        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Choose Product :</label>
        <select class="form-control" name="product" id="product">
            <option>Select</option>
            @foreach ($products as $products) 
                <option value="{{$products->id}}">{{$products->name}}</option>  
            @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Customer Details :</label>
            <select class="form-control" name="customer" id="customer">
                @foreach ($customers as $customers)
                    <option value="{{$customers->id}}">{{$customers->firstname}} {{$customers->lastname}}, {{$customers->address}} ({{$customers->phonenumber}})</option>  
                @endforeach
                </select>
        </div>

        <div class="mb-3" id="quantity">
            <!-- <label for="exampleFormControlInput1" class="form-label"> Quantity :</label>
            <input  type="number" class="form-control" id="quantity" name="quantity"  placeholder="EG. 20 (Per Unit)" required> -->
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"> Selling Price (In RS) :</label>
            <input autocomplete="false"  type="number" class="form-control" id="sellingprice" name="sellingprice"  required placeholder="EG. Rs 5,000">
        </div>

        <div class="mb-3">
            <label for="discount" class="form-label"> Discount(In RS) : </label>
            <input  type="number" class="form-control" id="discount" name="discount"  placeholder="EG. Rs 1,000" required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Total Price(In Rs) :</label>
            <input type="number" pattern = "[0-9]" class="form-control" id="total" name="total" required>
        </div>
       
        
        <!-- Button trigger modal -->
        <button type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalLong">
        Add Sales
        </button>
    </form>  

    

@endsection

@section('adminlte_js')

 <script>
     $('#product').on('change', function () {
            let value = $(this).val();
            if (value !== '') {
                $.ajax({
                    type: "get",
                    url: "{{URL::to('/search/product')}}",
                    data: {'search': value},
                    success: function (data) {
                        $("#quantity").html(data);
                    }
                });
            }
        });

        $('#discount').on('keyup', function () {
            let dis = $(this).val();
            let qty = $('#qty').val();
            let price = $('#sellingprice').val();
            let discount = $('#discount').val();
            let grand = grandTotal(qty,price,dis);
            $("#total").val(grand);
            console.log(grand);
        
        });
    
        function grandTotal(qty,price,discount){
            // console.log(qty,price);
            var total = (qty * price);
            return grand = (total - discount);
        }

 </script>

@stop