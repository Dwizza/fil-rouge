@extends('layouts.app')
@section('content')

<!-- Sidebar area start here -->
<div id="targetElement" class="side_bar slideInRight side_bar_hidden">
    <div class="side_bar_overlay"></div>
    <div class="logo mb-30">
        <img src="assets/images/logo/logo.svg" alt="logo">
    </div>
    <p class="text-justify">The foundation of any road is the subgrade, which provides a stable base for the road
        layers above. Proper compaction of
        the subgrade is crucial to prevent settling and ensure long-term road stability.</p>
    <ul class="info py-4 mt-65 bor-top bor-bottom">
        <li><i class="fa-solid primary-color fa-location-dot"></i> <a href="#0">example@example.com</a>
        </li>
        <li class="py-4"><i class="fa-solid primary-color fa-phone-volume"></i> <a href="tel:+912659302003">+91 2659
                302 003</a>
        </li>
        <li><i class="fa-solid primary-color fa-paper-plane"></i> <a href="#0">info.company@gmail.com</a></li>
    </ul>
    <div class="social-icon mt-65">
        <a href="#0"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#0"><i class="fa-brands fa-twitter"></i></a>
        <a href="#0"><i class="fa-brands fa-linkedin-in"></i></a>
        <a href="#0"><i class="fa-brands fa-instagram"></i></a>
    </div>
    <button id="closeButton" class="text-white"><i class="fa-solid fa-xmark"></i></button>
</div>
<!-- Sidebar area end here -->

<!-- Preloader area start -->
<div class="loading">
    <span class="text-capitalize">L</span>
    <span>o</span>
    <span>a</span>
    <span>d</span>
    <span>i</span>
    <span>n</span>
    <span>g</span>
</div>

<div id="preloader">
</div>
<!-- Preloader area end -->

<!-- Mouse cursor area start here -->
<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>
<!-- Mouse cursor area end here -->


<main>
  

    <!-- Login area start here -->
    <section class="login-area pt-130 pb-130">
        <div class="container">
            <div class="login__item">
                <div class="row g-4">
                    <div class="col-xxl-8">
                        <div class="login__image">
                            <img src="assets/images/register/res-image1.jpg" alt="image">
                            <div class="btn-wrp">
                                <a href="/login">sign in</a>
                                <a class="active" href="/register">create account</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4">
                        <div class="login__content">
                            <h2 class="text-white mb-65">create account</h2>
                            <div class="form-area login__form">
                                <form action="{{ route('register')}}" method="POST">
                                    @csrf
                                    <input type="text" name="name" placeholder="User Name">
                                    <input class="mt-30" name="email" type="email" placeholder="Email">
                                    <input class="mt-30" name="password" type="password" placeholder="Enter Password">
                                    <button class="mt-30" type="submit" name="submit">Create Account</button>
                                    <div class="radio-btn mt-30">
                                        <span></span>
                                        <p>I accept your terms & conditions</p>
                                    </div>
                                </form>
                                <span class="or pt-30 pb-40">OR</span>
                            </div>
                            <div class="login__with">
                                <a href="#0"><img src="assets/images/icon/google.svg" alt=""> continue with
                                    google</a>
                                <a class="mt-15" href="#0"><img src="assets/images/icon/facebook.svg" alt="">
                                    continue with
                                    facebook</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login area end here -->
</main>

@endsection