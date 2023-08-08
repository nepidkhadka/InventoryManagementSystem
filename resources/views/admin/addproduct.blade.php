@extends('adminlte::page')

@section('title', 'Add Product')

@section('content_header')
    <h1>Add Product</h1>
@stop

@section('content')
    <div class="alert alert-dark" role="alert">
        Fill up the below information to add product
    </div>

        <hr>
    
    @if(\Session::has('success'))
    <div class="alert alert-success">
        <h6>{{ \Session::get('success') }}</h6>
    </div>
        
    @endif

    <form  autocomplete="off" method="post" action="/submitproduct">
        {{csrf_field()}}

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Product Name </label>
            <input type="text" class="form-control" id="productname" pattern="[a-zA-Z\s]+"  name="name" placeholder="Eg. LG TV" maxlength="30" autofocus required>
        </div>
        
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Category :</label>
        <select class="form-control" name="categoryid" id="categoryid">
            @foreach ($categories as $categoryname)
                <option value="{{$categoryname->id}}">{{$categoryname->id}}. {{$categoryname->name}}</option>  
            @endforeach
            </select>
        </div>
        
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Supplier :</label>
        <select class="form-control" name="supplierid" id="supplierid">
            @foreach ($suppliers as $suppliers)
            <option value="{{$suppliers->id}}">{{$suppliers->id}}. {{$suppliers->company}}</option>  
            @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Product Quantity : </label>
            <input autocomplete="false" type="number" class="form-control" pattern="[0-9]+" id="exampleFormControlInput1" max="100" name="quantity"  placeholder="EG. 5,10" required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"> Price (NPR) :</label>
            <input autocomplete="false" type="number" maxlength="6"  max="100000" class="form-control" id="price" name="price"  placeholder="EG. Rs 1,000 (Per Unit/Piece)" required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Date : </label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
       
        
        <!-- Button trigger modal -->
        <button id="btn" type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalLong">
        Add Product
        </button>
    </form>  


    <script>
        const inputDate = document.getElementById('date');

        const today = new Date();
        inputDate.max = today.toISOString().split('T')[0]; // Set the max attribute of the input

        const minDate = new Date(today);
        minDate.setDate(today.getDate() - 14);
        minDate.setHours(0, 0, 0, 0);
        inputDate.min = minDate.toISOString().split('T')[0]; // Set the min attribute of the input

        //name
        const nameInput = document.getElementById('productname');
        const errorDiv = nameInput.nextElementSibling; // Get the next sibling which is the error message div

        nameInput.addEventListener('input', function() {
            const enteredValue = nameInput.value;

            // Check for repeated characters or random input
            if (/(\w)\1{2,}/.test(enteredValue)) {
                nameInput.classList.add('is-invalid'); // Apply Bootstrap's invalid styling
                errorDiv.style.display = 'block'; // Show the error message
            } else {
                nameInput.classList.remove('is-invalid');
                errorDiv.style.display = 'none';
            }
        });



    </script>

@stop