<?php
function isAuthenticated(){
    return auth()->user()===null?false:true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Nuclear Pay :: The most advanced payment wallet for modern needs">
    <meta name="author" content="Pawan Kumar, Anukriti Gupta, Nukrip Technologies Private Limited">
{{--    todo put the correct icon location--}}
{{--    <link rel="icon" type="image/png" sizes="16x16" href="/public/assets/images/favicon.png">--}}
    <title>Mega Wallet</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title></title>
    <!-- Bootstrap Core CSS -->
    <link href="/landing/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- owl slider CSS -->
    <link href="/landing/assets/owl.carousel/owl.carousel.min.css" rel="stylesheet">
    <link href="/landing/assets/owl.carousel/owl.theme.default.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/landing/css/style.css" rel="stylesheet">
    <script src="/landing/js/axios.js"></script>
</head>

<body class="fix-header">
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Login to Mega Wallet</h1><br>
            <form action="javascript:tryLogin()" >
                <input type="text" name="user" id="login-username" required placeholder="Username">

                <input type="password" name="password" id="login-password" required placeholder="Password">
                <span><small id="login-error-message" class="text-danger"></small></span>
                <br/>
                <br/>
                <input type="submit" value="Login" name="action" class="login loginmodal-submit">
            </form>
            <p class="text-center">Not Registered Yet?</p>
            <div class="login-help row justify-content-center">

                <a data-toggle="modal" data-target="#register-modal" href="#" style="width:120px;"><button class="btn btn-success m-auto">Register</button></a>
{{--                <a data-toggle="modal" data-target="#forgot-modal" href="#" style="width:120px;"><button class="btn btn-instagram">Forgot Password</button></a>--}}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">

            <h1 class="text-center">Register to Mega Wallet</h1><br>
{{--            <form id="register-form" action="{{ route('register') }}">--}}
{{--                <input type="text" required name="name" placeholder="Full Name">--}}
{{--                <span><small id="register-error-name" class="text-danger"></small></span>--}}


{{--                <input type="email" required name="email" placeholder="Email Address">--}}
{{--                <span><small id="login-error-email" class="text-danger"></small></span>--}}

{{--                <input type="password" required name="password" placeholder="Password">--}}
{{--                <span><small id="login-error-password" class="text-danger"></small></span>--}}

{{--                <input type="password" required name="confirmPassword" placeholder="Confirm Password">--}}
{{--                <span><small id="login-error-confirmPassword" class="text-danger"></small></span>--}}

{{--                <input type="submit" name="login" class="login loginmodal-submit" value="Process Registration">--}}
{{--            </form>--}}

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
{{--                <div class="form-group row">--}}


                    <label for="name" >{{ __('Name') }}</label>

{{--                    <div class="col-md-6">--}}

                        <input   id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>



                <div class="form-group">
                    <label for="email" >{{ __('E-Mail Address') }}</label>


                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                </div>

                <div class="form-group">
                    <label for="password" >{{ __('Password') }}</label>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                </div>

                <div class="form-group">
                    <label for="password-confirm" >{{ __('Confirm Password') }}</label>


                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"autocomplete="new-password">

                </div>

                <div class="form-group justify-content-center col-md-12">
                    <div >

                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}


                        </button>

                    </div>


{{--                    <div class="col-md-6">--}}
{{--                        <a href="#" data-dismiss="modal"><button class="btn btn-danger w-100">Cancel</button></a>--}}
{{--                    </div>--}}


                </div>
                </div>
            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="forgot-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Recover Password</h1><br>
            <form>
                <input type="text" name="user" placeholder="Username">
                <input type="submit" name="login" class="login loginmodal-submit" value="Forgot Password">
            </form>
            <div class="login-help w-100">
                <a data-toggle="modal" data-target="#register-modal" href="#" ><button class="btn btn-success">Register</button></a>
                <a href="#" data-dismiss="modal"><button class="btn btn-danger w-100">Cancel</button></a>
            </div>
        </div>
    </div>
</div>
<script>
    const checkLogin=()=> {
        var login = {{ (integer)isAuthenticated() }};
        if(login)location.replace('/home');
    }
    const tryLogin=()=>{
        $('#login-username').removeClass('has-val-error');
        $('#login-password').removeClass('has-val-error');
        document.getElementById("login-error-message").innerHTML="";
        axios.post('/login',{
            email:$("#login-username").val(),
            password:$("#login-password").val(),
        }).then(response=>{
            console.log(response)
            let data=response.data;
            if(data.result!="error")location.replace('/home');
            else{
                $("#login-username").addClass('has-val-error');
                $("#login-password").addClass('has-val-error');
                document.getElementById("login-error-message").innerHTML=data.message;
            }
        })
    }
    const processRegister=()=>{
        let data={};
        let form= $('#register-form :input');
        form.each((index,element)=>{data[element.name]=element.value})
        axios.post('/process/register',data).then(response=>{
            //todo frontend validation requests
            let data=response.data;
            if(data.result=="success")location.replace(data.url);
        })
    }
</script>


<div id="main-wrapper">
    <header class="topheader" id="top">
        <div class="fix-width">
            <nav class="navbar navbar-expand-md navbar-light p-l-0">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <a class="navbar-brand" href="/"><h1><strong>Mega Wallet</strong></h1></a>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto stylish-nav">

                        <li class="nav-item"> <a class="m-t-5 btn btn-info font-13" data-toggle="modal" onclick="checkLogin()" data-target="#login-modal" href="#" style="width:120px;"><?=isAuthenticated()?'DASHBOARD':'LOGIN'?></a> </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="fix-width">
                <div class="row banner-text">
                    <div class="col-lg-5 m-t-20">
                        <h1>The Most Beautiful &amp; Powerful <span class="text-info">Wallet Application</span> based on Laravel and Vue.js</h1>
                        <p class="subtext"><span class="font-medium">Payments</span> has now become easier with <span class="font-medium">Mega Wallet </span> based on<span class="font-medium">Laravel and Vue.js</span> which is a <span class="font-medium">Single Page Application.</span> It is fully responsive admin dashboard template built with Bootstrap Framework, HTML5 & CSS3, Media query. </p>
                        <div class="down-btn"> <a href="#" class="btn btn-info m-b-10">LARAVEL</a> <a href="#" class="btn btn-success m-b-10">VUE.JS</a> </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="hero-banner">
                            <img src="/assets/theme.svg" style="width: 42vw"/>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row white-space">
                <div class="col-md-12">
                    <div class="fix-width icon-section">
                        <h2 class="display-7">Amazing Features & Flexibility Provided</h2>
                        <div class="row m-t-40">
                            <div class="col-lg-3 col-md-6">
                                <h4 class="font-500">Single Page Application</h4>
                                <p>A single-page application works in the browser and requires no page reloads and no extra time for waiting. The page doesn’t need to be updated since content is downloaded automatically.</p>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <h4 class="font-500">MVC Architecture Support</h4>
                                <p> It provides faster development process as in MVC; one programmer can work on the view while other is working on the controller to create the business logic for the web application.</p>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <h4 class="font-500">Authentication</h4>
                                <p>Authentication is the most important factor in a web application, and developers need to spend a lot of time writing the authentication code. Laravel contains an inbuilt authentication system.</p>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <h4 class="font-500">Performance and flexibility</h4>
                                <p>A competitive SPA usually transfers all of its UI to the client, thanks to its JavaScript SDK of choice (Angular, JQuery, Bootstrap, or any such). This is often good for network performance</p>
                            </div>
                        </div>
                        <div class="text-center">
                            <a data-toggle="modal" data-target="#register-modal" onclick="checkLogin()" href="#" class="btn btn-lg btn-success m-t-40"> Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row light-blue">
                <div class="col-md-12">
                    <div class="fix-width text-center">
                        <h2 class="display-7">What users say about Mega Wallet</h2>
                        <div class="tesimonial-box owl-carousel owl-theme" id="owl-demo2">
                            <div class="item">
                                <p class="testimonial-text"><b class="font-500">The free wallet to support the developer. It’s a great, lightweight!</b> </p>
                                <div class="username"><b>Nick Stanbridge<br/><small class="text-danger"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></small></b></div>
                            </div>
                            <div class="item">
                                <p class="testimonial-text"><b class="font-500">This wallet has helped me a lot in payments, it is worth!</b> </p>
                                <div class="username"><b>Shinwu Ch<br/><small class="text-danger"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></small></b></div>
                            </div>
                            <div class="item">
                                <p class="testimonial-text"><b class="font-500">In my opinion the money you pay for it… Go ahead & give it a try</b> </p>
                                <div class="username"><b>Rohan Sharma<br/><small class="text-danger"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></small></b></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 call-to-action bg-success">
                    <div class="fix-width">
                        <div class="row">
                            <div class="col-md-6 m-t-20 m-b-20"><span>Are you Satisfied with what we Offer?</span></div>
                            <div class="col-md-6 align-self-center text-right"><a data-toggle="modal" data-target="#register-modal" onclick="checkLogin()" href="#" class="btn btn-outline btn-rounded btn-default buy-btn m-t-10 m-b-10">Register Now</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="bt-top btn btn-circle btn-lg btn-info" href="#top"><i class="ti-arrow-up"></i></a>
            <footer class="footer row">
                <div class="fix-width">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <p class="m-t-30">
                                <span class="text-white">Mega Wallet</span> is premium quality admin dashboard template with flat design. It is fully responsive admin dashboard template built with Bootstrap Framework, HTML5 & CSS3, Media query. </p>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <ul class="footer-link list-icons">
                                <li><a href="#"><i class="ti-angle-right"></i>About Company</a></li>
                                <li><a href="#"><i class="ti-angle-right"></i>Documentation</a></li>
                                <li><a href="#"><i class="ti-angle-right"></i>Merchant Section</a></li>
                                <li><a href="#"><i class="ti-angle-right"></i>Raise a Ticket</a></li>
                                <li><a href="#"><i class="ti-angle-right"></i>Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <ul class="footer-link list-icons">
                                <li><a href="#"><i class="ti-angle-right"></i>Merchant API</a></li>
                                <li><a href="#"><i class="ti-angle-right"></i>Test API</a></li>
                                <li><a href="#"><i class="ti-angle-right"></i>Grievance Report</a></li>
                                <li><a href="#"><i class="ti-angle-right"></i>Site Stats</a></li>
                                <li><a href="#"><i class="ti-angle-right"></i>CSR Reports</a></li>
                            </ul>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-md-12 sub-footer">
                            <span>Copyright <?=date('Y')?>. Developed by <a class="text-white" href="https://www.linkedin.com/in/pitss-pawan">Pawan Kumar</a>, <a class="text-white" href="https://www.linkedin.com/in/pitss-pawan">Anukriti Gupta</a></span>

                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
<script src="/landing/js/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="/landing/bootstrap/js/popper.min.js"></script>
<script src="/landing/bootstrap/js/bootstrap.min.js"></script>
<!--Wave Effects -->
<script src="/landing/js/waves.js"></script>
<!--stickey kit -->
<script src="/landing/js/sticky-kit.min.js"></script>
<!-- jQuery for carousel -->
<script src="/landing/assets/owl.carousel/owl.carousel.min.js"></script>
<!--Custom JavaScript -->
<script src="/landing/js/custom.min.js"></script>

<script>
    @if (count($errors) > 0)
    $('#register-modal').modal('show');
    @endif
</script>
</body>
</html>
