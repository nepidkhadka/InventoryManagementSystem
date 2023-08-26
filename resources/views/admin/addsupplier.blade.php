@extends('adminlte::page')

@section('title', 'Add Supplier')

@section('content_header')
<h1>Add Supplier</h1>
@stop

@section('content')
<div id="validationMessage" class="alert alert-dark" role="alert">
    Fill up the below information to add supplier
</div>

<hr>

@if(\Session::has('success'))
<div class="alert alert-success">
    <h6>{{ \Session::get('success') }}</h6>
</div>

@endif

<form autocomplete="off" method="post" action="/submitsupplier">
    {{csrf_field()}}

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Company Name </label>
        <input type="text" class="form-control" id="exampleFormControlInput1" pattern="[a-zA-Z\s]+" name="companyname" placeholder="Eg. ABC Suppliers" maxlength="20" autofocus required>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Contact Person </label>
        <input type="text" class="form-control" id="exampleFormControlInput1" pattern="[a-zA-Z\s]+" name="contactperson" placeholder="Eg. Krishna Thapa" maxlength="20" autofocus required>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Address </label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="address" placeholder="EG. Lubhu" pattern="[a-zA-Z\s]+" maxlength="20  required>
        </div> 
           
         <div class=" mb-3">
        <label for="exampleFormControlInput1" class="form-label">Contact Number </label>
        <input type="text" class="form-control" id="numberInput" name="contactnumber" pattern="[9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}" placeholder="EG. 9808465246" maxlength="10" required>
    </div>

    <!-- Button trigger modal -->
    <button type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalLong">
        Add Supplier
    </button>
</form>



<script>
    let input = document.getElementById("numberInput");
    input.addEventListener('input', () => {
        const inputElement = document.getElementById("numberInput");
        const inputValue = inputElement.value.trim();

        const validationMessageElement = document.getElementById("validationMessage");

        if (inputValue.startsWith("98") || inputValue.startsWith("97")) {
            validationMessageElement.textContent = "Valid number!";
            validationMessageElement.style.color = "white";
            validationMessageElement.style.background = "green !important";
            setTimeout(() => {
                validationMessageElement.textContent = "Fill up the below information to add supplier";
            }, 1500)

        } else {
            validationMessageElement.textContent = "Number should start with 98 or 97.";
            validationMessageElement.style.color = "red";
            setTimeout(() => {
                validationMessageElement.style.color = "white";
                validationMessageElement.textContent = "Fill up the below information to add supplier";
            }, 1500)

        }

    })
</script>


@stop