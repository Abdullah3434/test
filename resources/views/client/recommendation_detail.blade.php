@extends('client.layouts.appclient')
@section('content') 
<!--Breadcrumb One Start-->

<div class="breadcrumb-one mb-120">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb-img"> <img src="{{URL('/')}}/client/img/page-banner/product-banner.jpg" alt=""> </div>
        <div class="breadcrumb-content">
          <ul>
            <li><a href="{{URL('/')}}/">Home</a></li>
            <li><a href="{{URL('/')}}/recommendation">TFP Recommendation</a></li>
            <li><a href="{{URL('/')}}/recommendation">Food</a></li>
            <li class="active">Lal Qilla</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Breadcrumb One End--> 
<!--Single Product Area Start-->

<div class="single-product-area mb-115">
  <div class="container">
    <div class="row">
    @if(count($result)>0)
                    @foreach($result as $results)
      <div class="col-md-12 col-lg-5">
      <div class="product-details-img-tab"> 
        <!--Product Tab Content Start-->
        <div class="tab-content single-product-img">
          <div class="tab-pane fade show active" id="product1">
            <div class="product-large-thumb img-full">
              <div class="easyzoom easyzoom--overlay"> <a href="{{URL('/')}}/storage/images/{{$result[0]->thumbnail}}"> <img src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail}}" alt=""> </a> <a href="{{URL('/')}}/storage/images/{{$result[0]->thumbnail}}" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-search"></i></a> </div>
            </div>
          </div>
          <div class="tab-pane fade" id="product2">
            <div class="product-large-thumb img-full">
              <div class="easyzoom easyzoom--overlay"> <a href="{{URL('/')}}/storage/images/{{$result[0]->thumbnail2}}"> <img src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail2}}" alt=""> </a> <a href="{{URL('/')}}/storage/images/{{$result[0]->thumbnail2}}" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-search"></i></a> </div>
            </div>
          </div>
          <div class="tab-pane fade" id="product3">
            <div class="product-large-thumb img-full">
              <div class="easyzoom easyzoom--overlay"> <a href="{{URL('/')}}/storage/images/{{$result[0]->thumbnail3}}"> <img href="{{URL('/')}}/storage/images/{{$result[0]->thumbnail3}}" alt=""> </a> <a href="{{URL('/')}}/storage/images/{{$result[0]->thumbnail3}}" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-search"></i></a> </div>
            </div>
          </div>
        </div>
        <!--Product Tab Content End--> 
        <!--Product Tab Menu Start-->
        <div class="product-menu">
          <div class="nav product-tab-menu">
            <div class="product-details-img"> <a class="active" data-toggle="tab" href="#product1"><img src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail}}" alt=""></a> </div>
            <div class="product-details-img"> <a data-toggle="tab" href="#product2"><img src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail2}}" alt=""></a> </div>
            <div class="product-details-img"> <a data-toggle="tab" href="#product3"><img src="{{URL('/')}}/storage/images/{{$result[0]->thumbnail3}}" alt=""></a> </div>
          </div>
        </div>
        <!--Product Tab Menu End--> 
      </div>
    </div>
      <div class="col-md-12 col-lg-7"> 
        <!--Product Details Content Start-->
        <div class="product-details-content">
          <h2 class="green">{{$results->recom_name}}</h2>
          <div class="single-product-reviews">
          
          @php
                $count = $results->rating;
                $star = 5 - $count;
                @endphp
                <div class="rc-product-review"> 
                @for($i = 0; $i<$count; $i++)
                 <span class="fa fa-star checked"></span> @endfor
                @for($i = 0; $i<$star; $i++)
                  <span class="fa fa-star" style="color:lightgrey;"></span> @endfor 
                  <h5>{{$results->rating}}/5</h5>
                  </div>
             </div>
          
          
          
          <div class="product-description">
            <p>
            
            {{$results->description}} 
            </p>
          </div>



         


          @php
                $url = URL("/");
                
           
                $str = $results->specification;
                $tok = strtok($str, "\n");
                if($tok[0]=="*")
                {
                $tok[0] = ' ';
                $skillset ="
                <p><img src='".$url."/client/img/li-img.jpg' alt='img'>".$tok."</p>
                ";
                }
                else {
                $skillset ="
                <p><img src='".$url."/client/img/li-img.jpg' alt='img'>".$tok."</p>
                ";
                }
                while ($tok !== false) {
                 
                
                $tok = strtok("\n");
                
                if(is_string($tok))
                if($tok[0]=="*")
                {
                $tok[0] = ' ';
                $skillset =$skillset ."
                <p><img src='".$url."/client/img/li-img.jpg' alt='img'>".$tok."</p>
                ";
                }
                else {
                $skillset = $skillset ."
                <p><img src='".$url."/client/img/li-img.jpg' alt='img'>".$tok."</p>
                ";
                }
                
                }
                echo $skillset;
                
                @endphp








          <!-- <p class="stock in-stock">{{$results->specification}}</p> -->
          <!-- <p class="stock in-stock">Mughlai Hall</p>
          <p class="stock in-stock">Bara - Dari</p>
          <p class="stock in-stock">Dewan - e- Khas</p>
          <p class="stock in-stock">River</p> -->
        </div>
        <div class="single-product-sharing">
          <h3 class="green">Address:</h3>
          <span>{{$results->address}}</span> </div>
        <div class="single-product-sharing">
          <h3 class="green">Phone:</h3>
          <span>{{$results->phone}}</span> </div>
        <div class="single-product-sharing">
          <h3 class="green">Opening Hour:</h3>
          <span>24/7 Hour</span> </div>
        <!--Product Details Content End--> 
      </div>
    </div>
  </div>
</div>
<!--Single Product Area End--> 
@endforeach
                    @endif
@endsection