<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/menuBar.css') }}" rel="stylesheet">
       
    </head>
    <body>
        @extends('layouts.naviBar')
        @section('content')
        <div class="position-ref full-height" style="width: 100%">
            <div class ="slidershow-container">
                <div class="mySlides">
                    <img class= "slideImages" src="/image/cakebanner6.jpg">
                </div>
                <div class="mySlides">
                    <img class= "slideImages" src="/image/cakebanner13.jpg">
                </div>
                <div class="mySlides">
                    <img class= "slideImages" src="/image/cakebanner16.jpg">
                </div>
                <div class="mySlides">
                    <img class= "slideImages" src="/image/cakebanner14.jpg">
                </div>
                <div class="mySlides">
                    <img class= "slideImages" src="/image/cakebanner8.jpg">
                </div>
                <div class="mySlides">
                    <img class= "slideImages" src="/image/cakebanner15.jpg">
                </div>
                <div class="mySlides">
                    <img class= "slideImages" src="/image/cakebanner3.jpg">
                </div>


                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>

            <div class="content">
                <div class="title m-b-md">
                    <h1 style="margin-top: 55px;margin-bottom: 50px">Everything You Want Are Here</h1>
                </div>

                <div class="container">
                  <div class="row" style="margin-bottom: 40px">
                    <div class="col-md-4">
                      <img src="/image/Sponge/spongeCake.png" style="width:200px;height: 200px;">
                    </div>
                    <div class="col-md-4">
                      <img src="/image/mangoMousse.jpg" style="width:200px;height: 200px;">
                    </div>
                    <div class="col-md-4">
                      <img src="/image/cheeseCake.jpg" style="width:200px;height: 200px;">
                    </div>
                  </div>

                  <div class="row" style="margin-bottom: 100px">
                    <div class="col-md-4">
                       <button type="button" class="btn btn-primary">Sponge Cake</button>
                    </div>
                    <div class="col-md-4">
                       <button type="button" class="btn btn-primary">Mousse Cake</button>
                    </div>
                    <div class="col-md-4">
                       <button type="button" class="btn btn-primary">Cheese Cake</button>
                    </div>                         
                  </div>
                </div>
                <div class="container" style="width: 100%;">
                <div class="row" style="background-color: black;height: 680px">
                    <h1 class="col-md-12" style="font-size:60px; font-family:Bradley Hand ITC; color:white;font-style: bold;margin:30px">Meet Our Baker</h1>
                    <div class="col-md-6">
                        <div style="padding-top:20px;padding-bottom:20px;background-color: white;margin:15px">
                            <img src="/image/baker.jpg" style="height: 450px;width: 650px">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="margin: 30px">
                        <p style="font-size: 25px ;color: white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget.
                        </p>
                        </div>
                    </div>
                </div> 

                <div class="row" style="height: 680px">
                    <div class="col-md-6">
                        <div style="margin: 80px">
                        <p style="font-size:25px;font-style:bold;font-family: Arial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget.
                        </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="padding:22px;background-color: black;margin:25px">
                            <img src="/image/baker1.jpg" style="height: 450px;width: 650px">
                        </div>
                    </div>
                </div> 
            </div>                     
        </div>

        <script type="text/javascript">
                var slideIndex = 1;
                showSlides(slideIndex);

                // Next/previous controls
                function plusSlides(n) {
                  showSlides(slideIndex += n);
                }

                // Thumbnail image controls
                function currentSlide(n) {
                  showSlides(slideIndex = n);
                }

                function showSlides(n) {
                  var i;
                  var slides = document.getElementsByClassName("mySlides");
                  var dots = document.getElementsByClassName("dot");
                  if (n > slides.length) {slideIndex = 1} 
                  if (n < 1) {slideIndex = slides.length}
                  for (i = 0; i < slides.length; i++) {
                      slides[i].style.display = "none"; 
                  }
                  for (i = 0; i < dots.length; i++) {
                      dots[i].className = dots[i].className.replace(" active", "");
                  }
                  slides[slideIndex-1].style.display = "block"; 
                  dots[slideIndex-1].className += " active";
                }

        </script>


      @endsection
    </body>
 </html>