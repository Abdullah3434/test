@extends('client.layouts.appclient')
@section('content') 
<!--Shop Area Start-->
<div class="shop-area mb-70">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 order-2 order-lg-1"> 
        <!--Product Category Widget Start-->
        <div class="sidebar-layout mb-35">
          <div class="category-menu">
            <div class="category-heading">
              <h2 class="categories-toggle"><span>categories</span></h2>
            </div>
            @if(count($result1)>0)
                    @foreach($result1 as $results)
            <div class="category-menu-list">
              <ul>
                <li><a href="{{URL('/')}}/recommendation/{{$results->category}}">{{$results->category}}</a></li>
                
              </ul>
              </div>
              @endforeach
              @endif
          </div>
        </div>
        <!--Product Category Widget End--> 
      </div>
      <div class="col-lg-9 order-1 order-lg-2">
        <div class="shop-layout"> 
          <!--Breadcrumb One Start-->
          
          <div class="breadcrumb-one mb-20">
            <div class="breadcrumb-img"> <img src="{{URL('/')}}/client/img/recommendationpic.png" alt=""> </div>
            <div class="breadcrumb-content">
              <ul>
                <li><a href="{{URL('/')}}/">Home</a></li>
                <li><a href="{{URL('/')}}/recommendation">Recommendation</a></li>
                <li class="active">Food</li>
              </ul>
            </div>
          </div>
          <!--Breadcrumb One End--> 
          <!--Shop Product Start-->
          <div class="shop-product">
            <div class="tab-content">
              <div id="grid" class="tab-pane fade show active">
                <div class="product-grid-view">
                  <div class="row">
                  @if(count($result)>0)
                    @foreach($result as $results)
                    <div class="col-md-4 col-sm-12 col-xs-12 col-lg-4"> 
                      <!--Single Product Start-->
                      <div class="single-product mb-25">
                        <div class="product-img img-full"> <a href="{{URL('/')}}//recommendation/detail/{{$results->pk_id}}"> <img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt=""> </a>
                        </div> 
                        <a href="{{URL('/')}}/recommendation/detail/{{$results->pk_id}}"><div class="product-content bg-green">
                          <h2>{{$results->recom_name}}</h2>
                          <p>{{$results->description}}</p>
                          <!-- @php
                $count = $results->rating;
                
                @endphp

                @for ($i = 0; $i <= $count; $i++)
                <i class="fa fa-star checked" ></i>
    @endfor -->

                  @php
                $count = $results->rating;
                $star = 5 - $count;
                @endphp
                <div class="rc-product-review"> 
                @for($i = 0; $i<$count; $i++)
                 <span class="fa fa-star checked"></span> @endfor
                @for($i = 0; $i<$star; $i++)
                  <span class="fa fa-star" style="color:white;"></span> @endfor 
                  <h5>{{$results->rating}}/5</h5>
                  </div>
<!-- 
                        <div class="rc-product-review"> 
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i> 
                        <i class="fa fa-star"></i> 
                        <i class="fa fa-star"></i> 
                        <h5>{{$results->rating}}/5</h5></div> -->
                        </div></a>
                      </div>
                      <!--Single Product End--> 
                      
                    </div> 
                    @endforeach
                    @endif
                    </div>

                
                </div>
              </div>
            </div>
          </div>
           
        </div>
      </div>
      <!--Shop Product End--> 
    </div>
  </div>
</div>
<!--Shop Area End--> 
@endsection