
<x-web-layout>






    
   <div class="container" id="login">
    <div class="row">
        <div class="col-md-5 py-3 py-md-0" id="side1">
            <h3 class="text-center">Welcome Back!</h3>
        </div>
        <div class="col-md-7 py-3 py-md-0" id="side2">
            <h3 class="text-center">Account login</h3>
            <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, sequi.</p>
            <div class="input2 text-center">
            <input type="name" placeholder="User Name">
            <input type="password" placeholder="Password">
            </div>
            <p class="text-center" id="btnlogin"><a href="{{ route('login') }}">LOG IN</a></p>
            <p class="text-center">Join Today! <a href="register">Register</a></p>
        </div>

    </div>
   </div>




    


</x-web-layout>
