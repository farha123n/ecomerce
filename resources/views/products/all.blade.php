@extends('layouts.front_template')

@section('content')
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="item active">
       <a href="kitchen.html"><img class="first-slide" src="{{ asset('/images/ba.jpg') }}" alt="First slide"></a>
   
    </div>
    <div class="item">
      <a href="care.html"> <img class="second-slide " src="{{ asset('/images/ba1.jpg') }}" alt="Second slide"></a>
     
    </div>
    <div class="item">
       <a href="hold.html"><img class="third-slide " src="{{ asset('/images/ba2.jpg') }}" alt="Third slide"></a>
      
    </div>
  </div>

</div><!-- /.carousel -->


<div class="product">
        <div class="container">
            <div class="spec ">
                <h3>Products</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
                <div class="con-w3l agileinf">
                    @foreach($products as $data)
                    @php
                    $cart_price = (!empty($data['product_offer_price'])) ? $data['product_offer_price'] : $data['product_base_price'];
                    @endphp
                    <div class="col-md-3 pro-1">
                        <div class="col-m">
                            <a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
                                <img src="{{ asset('uploads/products/').'/'.$data['product_row_id'].'/thumbnail/'.$data['product_image'] }}" class="img-responsive" alt="">
                            </a>
                            <div class="mid-1">
                                <div class="women">
                                    <h6><a href="{{ url('details').'/'.$data['product_row_id'] }}">{{ $data['product_name'] }}</a>({{ $data['product_weight'] }} KG)</h6>                         
                                </div>
                                <div class="mid-2">
                                    <p style="font-size: 1.1em;"><label>৳{{ $data['product_base_price'] }}</label><em class="item_price">৳{{ $data['product_offer_price'] }}</em></p>
                                    <div class="block">
                                        <div class="starbox small ghosting"> </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                    <div class="add">
                                   <button class="btn btn-danger my-cart-btn my-cart-b add_to_cart" data-id="{{$data['product_row_id']}}" data-name="{{ $data['product_name'] }}" data-summary="summary 24" data-price="{{$cart_price}}" data-quantity="1" data-image="{{ asset('uploads/products/').'/'.$data['product_row_id'].'/thumbnail/'.$data['product_image'] }}">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
        </div>
    </div>    


<script type="text/javascript">
        $(document).ready(function(){
            $('.add_to_cart').click(function(){
                var product_id = $(this).data('id');
                var quantity = $(this).data('quantity');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('update-cart') }}",
                    data: {
                      "_token": "{{ csrf_token() }}",
                      "product_id":product_id,
                      "quantity":quantity
                    },
                    success: function(data){
                      console.log(data);
                    }
                });
            });
        })
    </script>
    @endsection