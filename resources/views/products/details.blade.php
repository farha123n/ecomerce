@extends('layouts.front_template')

@section('content')

 <!--banner-->
<div class="banner-top">
    <div class="container">
        <h3 >Lorem</h3>
        <h4><a href="index.html">Home</a><label>/</label>Lorem</h4>
        <div class="clearfix"> </div>
    </div>
</div>

<div class="single">
    <div class="container">
        <div class="single-top-main">
            <div class="col-md-5 single-top">
            <div class="single-w3agile">
                            
            <div id="picture-frame">
                <img src="{{ $thumb_image_path }}" data-src="{{ $original_image_path }}" alt="" class="img-responsive"/>
            </div>
            <script src="{{ asset('/js/jquery.zoomtoo.js') }}"></script>
            <script>
                $(function() {
                    $("#picture-frame").zoomToo({
                        magnify: 1
                    });
                });
            </script>
        
        
        
            </div>
            </div>
            <div class="col-md-7 single-top-left ">
                                <div class="single-right">
                <h3>{{ $product_details->product_name }}</h3>
                
                    
                 <div class="pr-single">
                  <p class="reduced "><del>$70.00</del>$50.00</p>
                </div>
                <div class="block block-w3">
                    <div class="starbox small ghosting"> </div>
                </div>
                <p class="in-pa"> This is a rice brand which is very helpfull for health  </p>
                
                <ul class="social-top">
                    <li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
                    <li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
                    <li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span></span></a></li>
                    <li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a></li>
                </ul>
                    <div class="add add-3">
                                           <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="Wheat" data-summary="summary 1" data-price="6.00" data-quantity="1" data-image="images/si.jpg">Add to Cart</button>
                                        </div>
                
                 
               
            <div class="clearfix"> </div>
            </div>
         

            </div>
           <div class="clearfix"> </div>
       </div>   
                 
                
    </div>
</div>
        <!---->
 

@endsection