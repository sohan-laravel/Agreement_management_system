   <nav class="navbar navbar-expand-md navbar-dark fixed-top p-1">

        <!-- <div class="container"> -->

        <a class="navbar-brand" href="#">
            <img src="{{ asset('frontend/img/logow.png') }}" width="60">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navigation-menu" id="navbarCollapse">
            <ul class="navbar-nav ml-auto mr-5 ">
                <li class="nav-item active"><a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">About us</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Product</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Irrigation</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Fertilizer</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Pesticide</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#">Diseases</a></li>

                <li class="nav-item dropdown">
                    <a style="color: white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sign Up
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="signup/signup.html">Farmer Account</a>
                        <a class="dropdown-item" href="signup/signup.html">Customer Account</a>
                        <a class="dropdown-item" href="signup/signup.html">Worker Account</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a style="color: white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Log In
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="login/login.html">Farmer</a>
                        <a class="dropdown-item" href="login/login.html">Customer</a>
                        <a class="dropdown-item" href="login/login.html">Worker</a>
                    </div>
                </li>

            </ul>
        </div>
        <!--    </div> -->
    </nav>