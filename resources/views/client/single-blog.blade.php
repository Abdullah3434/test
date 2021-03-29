 @extends('client.layouts.appclient')
@section('content') 
<!--Breadcrumb Tow Start-->
<div class="breadcrumb-tow mb-120">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb-title">
          <h1>Single Blog</h1>
        </div>
        <div class="breadcrumb-content breadcrumb-content-tow">
          <ul>
            <li><a href="{{url('/')}}/">Home</a></li>
            <li class="active">Single Blog</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container"> @if(Session::has('message'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ Session::get('message') }}</strong> </div>
  @endif </div>
<!--Breadcrumb Tow End--> 
<!--Blog Area Start-->
<div class="blog-area white-bg pt-0 pb-0 mb-50">
  <div class="container">
    <div class="row"> 
      <!--Blog Post Start-->
      <div class="col-lg-9 col-sm-12 col-xs-12">
        <div class="blog_area"> @if(count($result)>0)
          @foreach($result as $results)
          <article class="blog_single blog-details">
            <header class="entry-header">
              <h2 class="entry-title"> {{$results->name}} </h2>
              <span class="post-author"> <span class="post-by"> Posts by : </span> {{$results->post_by}} </span> <span class="post-separator">|</span> <span class="blog-post-date"><i class="fas fa-calendar-alt"></i>{{$results->created_at}} </span> </header>
            <div class="post-thumbnail img-full"> <img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt=""> </div>
            <div class="postinfo-wrapper">
              <div class="post-info">
                <div class="entry-summary blog-post-description">
                  <article class="blog-post">
                    <div class="post-content"> {!!$results->description!!} </div>
                  </article>
                  
                  <!--Blog Post Tag-->
                  <div class="single-post-tag"> <a href="#">3 comments</a> Tags: <a href="#">fashion</a>, <a href="#">t-shirt</a>, <a href="#">white</a>, </div>
                  <!--Blog Post Tag-->
                  <div class="social-sharing">
                    <div class="widget widget_socialsharing_widget">
                      <h3 class="widget-title">Share this post</h3>
                      <ul class="blog-social-icons">
                        <li> <a target="_blank" title="Facebook" href="#" class="facebook social-icon"> <i class="fa fa-facebook"></i> </a> </li>
                        <li> <a target="_blank" title="twitter" href="#" class="twitter social-icon"> <i class="fa fa-twitter"></i> </a> </li>
                        <li> <a target="_blank" title="pinterest" href="#" class="pinterest social-icon"> <i class="fa fa-pinterest"></i> </a> </li>
                        <li> <a target="_blank" title="linkedin" href="#" class="linkedin social-icon"> <i class="fa fa-linkedin"></i> </a> </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </article>
          @endforeach
          @endif
          <div class="relatedposts">
            <h3>Related posts</h3>
            <div class="row"> @if(count($result1)>0)
              @foreach($result1 as $results)
              <div class="col-md-4">
                <div class="relatedthumb">
                  <div class="image img-full"> <a href="{{URL('/')}}/single/blog/{{$results->pk_id}}"><img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt=""></a> </div>
                  <h4><a href="#">{{$results->name}}</a></h4>
                  <span class="rl-post-date">{{$results->created_at}}</span> </div>
              </div>
              @endforeach
              @endif </div>
          </div>
        </div>
        <!--Comment Area Start-->
        <div class="comments-area mt-80"> @if(count($result2)>0)
          <h3>{{count($result2)}} Comments</h3>
          <ol class="commentlist">
            @foreach($result2 as $results)
            <li>
              <div class="single-comment">
                <div class="comment-avatar img-full"> <img src="img/icon/author.png" alt=""> </div>
                <div class="comment-info"> <a href="#">{{$results->name}}</a> <span class="date">{{$results->created_at}}</span>
                  <p>{{$results->message}}</p>
                </div>
              </div>
            </li>
            @endforeach
          </ol>
          @endif </div>
        <div class="comment-box mt-30 mb-40">
          <h3>Leave a Comment</h3>
          @if(count($result)>0)
          <form method="post" action="{{URL('/')}}/comments/{{$result[0]->pk_id}}" class="login-form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <p class="comment-note"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
            <div class="row">
              <div class="col-md-12">
                <div class="single-input">
                  <label>Comment*</label>
                  <textarea name="message" placeholder="Message" id="commenter-message" cols="30" rows="5"></textarea>
                </div>
              </div>
              <div class="col-md-4">
                <div class="single-input">
                  <label>Name*</label>
                  <input name="name" id="commenter-name" type="text">
                </div>
              </div>
              <div class="col-md-4">
                <div class="single-input">
                  <label>Email*</label>
                  <input name="email" id="commenter-email" type="email">
                </div>
              </div>
              <div class="col-md-4">
                <div class="single-input">
                  <label>Website*</label>
                  <input name="url" id="commenter-url" type="text">
                </div>
              </div>
              <div class="col-md-12">
                <div class="single-input">
                  <button class="form-button" type="submit">Post Comment</button>
                </div>
              </div>
            </div>
          </form>
          @endif </div>
        <!--Comment Area End--> 
      </div>
      <!--Blog Post End--> 
      <!--Blog Sidebar Start-->
      <div class="col-lg-3 col-sm-12 col-xs-12">
        <div class="blog_sidebar">
          <div class="row_products_side">
            <div class="product_left_sidbar">
              <div class="product-filter  mb-35">
                <h5>Search </h5>
                <div class="search__sidbar">
                  <div class="input_form">
                    <input id="search_input" name="s" value="Search..." class="input_text" type="text">
                    <button id="blogsearchsubmit" type="submit" class="button"> <i class="fa fa-search"></i> </button>
                  </div>
                </div>
              </div>
              <div class="product-filter  mb-35">
                <h5>Blog Archives </h5>
                <div class="blog_Archives__sidbar">
                  <ul>
                    <li> <a href="#">March 2015</a>&nbsp;(1)</li>
                    <li> <a href="#">December 2014</a>&nbsp;(3)</li>
                    <li> <a href="#">November 2014</a>&nbsp;(4)</li>
                    <li> <a href="#">September 2014</a>&nbsp;(1)</li>
                    <li> <a href="#">August 2014</a>&nbsp;(1)</li>
                  </ul>
                </div>
              </div>
              <div class="product-filter  mb-35">
                <h5>Recent Posts</h5>
                <div class="blog_Archives__sidbar">
                  <ul>
                    <li> <a href="#">Blog image post</a>&nbsp;(1)</li>
                    <li> <a href="#">Post with Gallery</a>&nbsp;(3)</li>
                    <li><a href="#">Post with Audio</a>&nbsp;(4)</li>
                    <li><a href="#">Post with Video</a>&nbsp;(1)</li>
                    <li><a href="#">Post with Text</a>&nbsp;(1)</li>
                  </ul>
                </div>
              </div>
              <div class="product-filter  mb-35">
                <div class="sidebar-banner single-banner">
                  <div class="banner-img"> <a href="#"><img src="img/banner/shop-sidebar.jpg" alt=""></a> </div>
                </div>
              </div>
              <div class="product-filter mb-35">
                <h5>tags</h5>
                <div class="product-tag blog-tag">
                  <ul>
                    <li><a href="#">brand</a></li>
                    <li><a href="#">black</a></li>
                    <li><a href="#">white</a></li>
                    <li><a href="#">chire</a></li>
                    <li><a href="#">table</a></li>
                    <li><a href="#">Lorem</a></li>
                    <li><a href="#">ipsum</a></li>
                    <li><a href="#">dolor</a></li>
                    <li><a href="#">sit</a></li>
                    <li><a href="#">amet</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--Blog Sidebar End--> 
    </div>
  </div>
</div>
<!--Blog Area End--> 
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:808301,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    });
</script> 

<!--Brand Area End--> 
@endsection