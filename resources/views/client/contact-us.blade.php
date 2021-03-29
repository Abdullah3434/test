@extends('client.layouts.appclient')
@section('content')
<!--Breadcrumb Tow Start-->
<div class="breadcrumb-tow">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-title">
                    <h1>Contact Us</h1>
                </div>
                <div class="breadcrumb-content breadcrumb-content-tow">
                    <ul>
                        <li><a href="{{url('/')}}/">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumb Tow End-->

<!--Contact Area Start-->
<div class="contact-area gray-bg pt-110 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-form-area">
                    <div class="contact-form-title">
                        <h2>GET IN TOUCH</h2>
                    </div>
                    <form  method="post" action = "{{url('/')}}/contact" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if(session()->has('message'))
            <div class="alert alert-success"> {{ session()->get('message') }} </div>
            @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="contact-form-style mb-20">
                                    <input name="fname" placeholder="Name" maxlength="100" required="" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-form-style mb-20">
                                    <input name="email" placeholder="Email" required="" type="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-form-style mb-20">
                                    <input name="subject" placeholder="Subject" maxlength="100" required="" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contact-form-style form-style-2">
                                    <textarea name="note" placeholder="Message" maxlength="500" rows="9" required></textarea>
                                    <button class="form-button btn-style-2" type="submit"><span>Send Email</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Contact Area End-->
<!--Contact Address Area Start-->
<div class="contact-address-area pt-120 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title2 bl-color mb-70">
                    <h3>CONTACT US</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <!--Single Contact Address Start-->
            <div class="col-md-6 col-lg-3">
                <div class="single-contact-address text-center mb-35">
                    <div class="contact-icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="contact-info">
                        <h2>Number Phone</h2>
                        <p>Phone : (+92) 302 843 7778</p>
                    </div>
                </div>
            </div>
            <!--Single Contact Address End-->
            <!--Single Contact Address Start-->
            <div class="col-md-6 col-lg-3">
                <div class="single-contact-address text-center mb-35">
                    <div class="contact-icon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="contact-info">
                        <h2>Email</h2>
                        <p>thefoodpharmcyapp@gmail.com</p>
                    </div>
                </div>
            </div>
            <!--Single Contact Address End-->
        </div>
    </div>
</div>
<!--Contact Address Area End-->
<!--Social Link Area Start-->
<div class="social-link-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="social-link">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-skype"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Social Link Area End-->
@endsection