




<x-web-layout>
<form method="POST" action="{{ route('register') }}">
@csrf

   <div class="container" id="login">
    <div class="row">
        <div class="col-md-5 py-3 py-md-0" id="side1">
            <h3 class="text-center">Register</h3>
        </div>
        <div class="col-md-7 py-3 py-md-0" id="side2">
            <h3 class="text-center">Create Account</h3>
            <div class="input2 text-center">
            <input type="name" placeholder="Name">
            <input type="name" placeholder="User Name">
            <input type="number" placeholder="Phone">
            <input type="email" placeholder="Email">
            <input type="password" placeholder="Password">
            </div>
            <p class="text-center" id="btnlogin"><a href="{{ route('register') }}">SIGN UP</a></p>
           
        </div>
    

    </div>
   </div>



</x-web-layout>