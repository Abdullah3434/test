 @extends('client.layouts.appclient')
@section('content') 

<!--Breadcrumb Tow Start-->
<div class="breadcrumb-tow mb-120">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb-title">
          <h1>Blog</h1>
        </div>
        <div class="breadcrumb-content breadcrumb-content-tow">
          <ul>
            <li><a href="{{url('/')}}/">Home</a></li>
            <li class="active">Blog</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Breadcrumb Tow End--> 
<!--Blog Area Start-->
<div class="blog-area white-bg pt-0 pb-0 mb-70">
  <div class="container">
    <div class="row"> 
      <!--Blog Post Start-->
      <div class="col-lg-9 col-sm-12 col-xs-12">
        <div class="blog_area"> @if(count($result)>0)
          @foreach($result as $results)
          <article class="blog_single">
            <header class="entry-header">
              <h2 class="entry-title"> <a href="{{URL('/')}}/single/blog/{{$results->pk_id}}">{{$results->name}}</a> </h2>
              <span class="post-author"> <span class="post-by"> Posts by : </span> {{$results->post_by}} </span> <span class="post-separator">|</span> <span class="blog-post-date"><i class="fas fa-calendar-alt"></i>On {{$results->created_at}} </span> </header>
            <div class="post-thumbnail img-full"> <a href="{{URL('/')}}/single/blog/{{$results->pk_id}}"> <img src="{{URL('/')}}/storage/images/{{$results->thumbnail}}" alt="image"> </a> </div>
            <div class="postinfo-wrapper">
              <div class="post-info">
                <div class="entry-summary">
                  <p> {!! substr(strip_tags($results->description), 0, 200) !!}</p>
                  <a href="{{URL('/')}}/single/blog/{{$results->pk_id}}" class="form-button">Read More</a>
                  
                </div>
              </div>
            </div>
          </article>
          @endforeach
          @endif <?php echo $result->render(); ?> </div>
      </div>
      <!--Blog Post End--> 
    </div>
  </div>
</div>
<!--Blog Area End--> 
@endsection