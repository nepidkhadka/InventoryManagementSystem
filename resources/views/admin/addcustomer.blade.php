@extends('adminlte::page')

@section('title', 'Add Customer')

@section('content_header')
<h1>Add Customer</h1>
@stop

@section('content')
<div id="validationMessage" class="alert alert-dark" role="alert">
    Fill up the below information to add customer
</div>

<hr>

@if(\Session::has('success'))
<div class="alert alert-success">
    <h6>{{ \Session::get('success') }}</h6>
</div>

@endif

<form method="post" action="/submitcustomer">
    {{csrf_field()}}

    <form>

        <label for="inputEmail4" class="form-label">Full Name</label>
        <div class="mb-3">
            <div class="form-row">
                <div class="col">
                    <input type="text" id="exampleFormControlInput1" class="form-control" name="firstname" pattern="[a-zA-Z]+" minlength="3" maxlength="10" placeholder="First name" required autofocus>
                </div>
                <div class="col">
                    <input type="text" id="exampleFormControlInput1" class="form-control" name="lastname" pattern="[a-zA-Z]+"" minlength="2" maxlength="12" required placeholder=" Last name">
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Address </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="address" placeholder="EG. Lubhu" minlength="5" pattern="[a-zA-Z\s]+" required>
                    <div class="col">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Phone Number </label>
                    <input type="text" class="form-control" maxlength="10" id="numberInput" name="phonenumber" pattern="[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}" placeholder="EG. 9808465246" required>
                </div>
    </form>


    <!-- Button trigger modal -->
    <button id="btn" type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalLong" required>
        Add Customer
    </button>
</form>



<script>
    let input = document.getElementById("numberInput");
    input.addEventListener('input', () => {
        const inputElement = document.getElementById("numberInput");
        const disablebtn = document.getElementById("btn");
        const inputValue = inputElement.value.trim();
        const validationMessageElement = document.getElementById("validationMessage");

        if (inputValue.startsWith("98") || inputValue.startsWith("97")) {

            validationMessageElement.textContent = "Valid number!";
            validationMessageElement.style.color = "white";
            validationMessageElement.style.background = "green";
            disablebtn.disabled = false;
            disablebtn.style.background = "blue"
            setTimeout(() => {
                validationMessageElement.style.background = "#212529";
                validationMessageElement.textContent = "Fill up the below information to add customer";
            }, 2000)

        } else {
            validationMessageElement.textContent = "Number should start with 98 or 97.";
            validationMessageElement.style.color = "red";
            disablebtn.disabled = true;
            disablebtn.style.background = "red"
            setTimeout(() => {
                // validationMessageElement.style.background = "green";
                validationMessageElement.style.color = "white";
                validationMessageElement.textContent = "Fill up the below information to add customer";
            }, 2000)

        }

    })

    const nameInput = document.querySelectorAll('.form-control');
    const errorDiv = nameInput.nextElementSibling; // Get the next sibling which is the error message div
    const disablebtn = document.getElementById("btn");

    nameInput.forEach((myinput) => {
        myinput.addEventListener('input', function() {
            console.log(myinput.value);
            const enteredValue = myinput.value;

            if (/(\w)\1{2,}/.test(enteredValue)) {
                disablebtn.disabled = true;
                disablebtn.style.background = "red"
                myinput.classList.add('is-invalid'); // Apply Bootstrap's invalid styling
                errorDiv.style.display = 'block';
            } else {
                disablebtn.disabled = false;
                disablebtn.style.background = "blue"
                myinput.classList.remove('is-invalid');
                errorDiv.style.display = 'none';
            }
        });
    })
</script>

@stop