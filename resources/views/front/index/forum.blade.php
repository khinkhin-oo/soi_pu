<!DOCTYPE html>
<html lang="en">

<style type="text/css">
    .ads-page {
    width: 100% !important;
    border: 1px solid #91127e !important;
    border-radius: 5px !important;
    margin: 0 auto;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    padding: 50px;
    background: #ffffff;
    position: relative;
}

.ads-page-middle {
    background: #fff ;
    background-repeat: no-repeat;
    background-position: center center;
    position: relative;
    background-size: cover;
    padding: 100px 0;
}

.input-box-right{
    text-align: center !important; 
}


</style>




@section('title',$settings->title_forum)
@section('metadesc',$settings->meta_forum) 
<!--Footer Section  Start--> 
@include('front.layout.header')
<!--Footer Section End -->   

<style type="text/css">
    body {
      background: #e2e1e0;
    }
    .topic
    {
       background-color: #43A6DF;
       width: 100%;
       height: 50px;
       line-height: 50px;
       color:white;
       padding-left:30px;
    }
    .card-new 
    {
      background: #fff;
      border-radius: 2px;
      display: inline-block;
      height: auto;
      padding: 1rem;
      position: relative;
      width: 100%;
      box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    }
</style>

<link rel="stylesheet" href="{{asset('assets/bootstrap.min.css')}}" />

<body>



    
<div class="container" style="padding-top:30px;">

 
                        @if(count($errors) > 0)
                                <div class="alert alert-danger alert-dismissible">
                                 <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                                 {{ trans('validation.errorinbox') }}
                                </div>
                        @endif

    @if(!empty($user))
            <button id="addthread" class="btn btn-success" style="background-color: #28d82d;border:1px solid #28d82d;border-radius: 0;">
                <i class="fa fa-plus"></i>
                Add Thread
            </button>
        @if($user->admin_status==1)    
            <a href="{{asset('subadmin/subadmin_login')}}">
                <button class="btn btn-primary" style="background-color: #43A6DF;border:1px solid #43A6DF;border-radius: 0;">
                <i class="fa fa-plus"></i>
                Add Model
                </button>
            </a>

            <div class="row" id="disscuss" style="margin-top:10px;display: none">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-body">  
                                                <h6>Topic Title</h6>  
                                                <hr />            
                                                <form accept-charset="UTF-8" action="{{route('savediscuss',array('user'=>$user))}}" method="POST">
                                                    @csrf

                                                    <div class="form-group">
                                                      <label for="usr">Title:</label>
                                                      <input name="title" type="text" class="form-control" id="usr">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Type</label>
                                                                <select name="type" class="form-control">
                                                                  <option value="1">sticky</option>
                                                                  <option value="2">simple</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                     <div class="form-group">
                                                        <label class="control-label">Description</label>
                                                        <div class="input-group ">
                                                            <textarea rows="5" cols="100" style="resize: none" class="form-control" placeholder="Description" name="description" data-rule-reuired="true" id="editor4"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <button type="submit" class="btn btn-success" style="background-color: #28d82d;border:1px solid #28d82d;border-radius: 0;margin-top:20px">
                                                        <i class="fa fa-save"></i>
                                                        Add Thread
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            <script type="text/javascript">
                $("#addthread").click(function(){
                    $("#disscuss").slideToggle();
                })
            </script>
        @elseif($user->admin_status==2)
                <button id="addadvertiser" class="btn btn-primary" style="background-color: #94357f;border:1px solid #94357f;border-radius: 0;">
                <i class="fa fa-plus"></i>
                    Add Advertiser
                </button>

            <div class="row" id="register" style="margin-top:10px;display: none">
                 <form class="form-horizontal new-lg-form" id="registerform" 
                       action="{{url('/')}}/storeadviser" method="POST" 
                       enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="middle-section-gray regiater-page-middle">
                        <div class="container">
                            <div class="login-page">
                                <div>
                                    @if(Session::has('success'))
                                        <div class="alert alert-success alert-dismissible">
                                            <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                                            {{ trans('register.Registration complete Please login.') }}
                                        </div>
                                    @endif  

                                    @if(Session::has('error'))
                                    <div class="alert alert-danger alert-dismissible">
                                     <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                                     {{ trans('register.An error occurred while registering.') }}
                                    </div>
                                    @endif
                                    {{-- @if(Session::has('warning'))
                                        <div class="alert alert-warning alert-dismissible">
                                        <a href="#" class="close close-btn1" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{ trans('register.password') }}
                                        </div>
                                    @endif --}}
                                </div>                     
                                <div class="login"><h1>{{ trans('header.register') }}</h1>
                                    <div class="login-line"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="input-box-right">
                                            <div class="input-name">{{ trans('register.first name') }}</div>
                                            <input type="text" name="first_name" required placeholder="{{ trans('register.first name') }}" value="{{old('first_name')}}" >
                                            <span class="bar" style="color: red;">{{ $errors->first('first_name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="input-box-right">
                                            <div class="input-name">{{ trans('register.surname') }}</div>
                                            <input type="text" name="last_name" required placeholder="{{ trans('register.surname') }}" value="{{old('last_name')}}">
                                            <span class="bar" style="color: red;">{{ $errors->first('last_name') }}</span>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="input-box-right">
                                    <div class="input-name">{{ trans('register.email') }}</div>
                                    <input type="email" name="email" required placeholder="alexandraba@gmail.com" value="{{old('email')}}">
                                    <span class="bar" style="color: red;">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="input-box-right">
                                    <div class="input-name">{{ trans('register.username') }}</div>
                                    <input type="text" name="username" required placeholder="{{ trans('register.username') }}" value="{{old('username')}}">
                                    <span class="bar" style="color: red;">{{ $errors->first('username') }}</span>
                                </div>
                                <div class="input-box-right">
                                    <div class="input-name password">{{ trans('register.password') }}</div>
                                    <input type="password" name="password" required placeholder="{{ trans('register.password') }}" minlength="6" maxlength="10" value="{{old('password')}}">
                                    <span class="bar" style="color: red;">{{ $errors->first('password') }}</span>
                                </div>
                                <div class="input-box-right">
                                    <div class="input-name password">{{ trans('register.confirm password') }}</div>
                                    <input type="password" name="confirm_password" required placeholder="{{ trans('register.confirm password') }}" minlength="6" maxlength="10" value="{{old('confirm_password')}}">
                                    <span class="bar" style="color: red;">{{ $errors->first('confirm_password') }}</span>
                                </div>
                                <div class="login-btn-box">
                                    {{-- <div class="login-btn-box"><a class="login-btn" href="#">Register</a></div> --}}
                                    <button type="submit" class="login-form-btn">{{ trans('header.register') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>                   
            </div>
            <script type="text/javascript">
                $("#addadvertiser").click(function(){
                    $("#register").slideToggle();
                })
            </script>

            <div class="row" id="disscuss" style="margin-top:10px;display: none">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-body">  
                                                <h6>Topic Title</h6>  
                                                <hr />            
                                                <form accept-charset="UTF-8" action="{{route('savediscuss',array('user'=>$user))}}" method="POST">
                                                    @csrf

                                                    <div class="form-group">
                                                      <label for="usr">Title:</label>
                                                      <input name="title" type="text" class="form-control" id="usr">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Type</label>
                                                                <select name="type" class="form-control">
                                                                  <option value="1">sticky</option>
                                                                  <option value="2">simple</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                     <div class="form-group">
                                                        <label class="control-label">Description</label>
                                                        <div class="input-group ">
                                                            <textarea rows="5" cols="100" style="resize: none" class="form-control" placeholder="Description" name="description" data-rule-reuired="true" id="editor4"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <button type="submit" class="btn btn-success" style="background-color: #28d82d;border:1px solid #28d82d;border-radius: 0;margin-top:20px">
                                                        <i class="fa fa-save"></i>
                                                        Add Thread
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            <script type="text/javascript">
                $("#addthread").click(function(){
                    $("#disscuss").slideToggle();
                })
            </script>
        @elseif($user->admin_status==3) 
            <a href="{{asset('subadmin/subadmin_login')}}">
                <button class="btn btn-primary" style="background-color: #43A6DF;border:1px solid #43A6DF;border-radius: 0;">
                <i class="fa fa-plus"></i>
                Add Model
                </button>
            </a>

            <div class="row" id="disscuss" style="margin-top:10px;display: none">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-body">  
                                                <h6>Topic Title</h6>  
                                                <hr />            
                                                <form accept-charset="UTF-8" action="{{route('savediscuss',array('user'=>$user))}}" method="POST">
                                                    @csrf

                                                    <div class="form-group">
                                                      <label for="usr">Title:</label>
                                                      <input name="title" type="text" class="form-control" id="usr">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Type</label>
                                                                <select name="type" class="form-control">
                                                                  <option value="1">sticky</option>
                                                                  <option value="2">simple</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                     <div class="form-group">
                                                        <label class="control-label">Description</label>
                                                        <div class="input-group ">
                                                            <textarea rows="5" cols="100" style="resize: none" class="form-control" placeholder="Description" name="description" data-rule-reuired="true" id="editor4"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <button type="submit" class="btn btn-success" style="background-color: #28d82d;border:1px solid #28d82d;border-radius: 0;margin-top:20px">
                                                        <i class="fa fa-save"></i>
                                                        Add Thread
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            <script type="text/javascript">
                $("#addthread").click(function(){
                    $("#disscuss").slideToggle();
                })
            </script>
        @else
             <div class="row" id="disscuss" style="margin-top:10px;display: none">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-body">  
                                                <h6>Topic Title</h6>  
                                                <hr />            
                                                <form accept-charset="UTF-8" action="{{route('savediscuss',array('user'=>$user))}}" method="POST">
                                                    @csrf

                                                    <div class="form-group">
                                                      <label for="usr">Title:</label>
                                                      <input name="title" type="text" class="form-control" id="usr">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Type</label>
                                                                <select name="type" class="form-control">
                                                                  <option value="2">simple</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                     <div class="form-group">
                                                        <label class="control-label">Description</label>
                                                        <div class="input-group ">
                                                            <textarea rows="5" cols="100" style="resize: none" class="form-control" placeholder="Description" name="description" data-rule-reuired="true" id="editor4"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <button type="submit" class="btn btn-success" style="background-color: #28d82d;border:1px solid #28d82d;border-radius: 0;margin-top:20px">
                                                        <i class="fa fa-save"></i>
                                                        Add Thread
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            <script type="text/javascript">
                $("#addthread").click(function(){
                    $("#disscuss").slideToggle();
                })
            </script>    
        @endif        
            
        <br />
        <br />
    @endif
    
    <div class="topic">
        Topic Title
    </div>
    @foreach($discusses_sticky as $discuss)
        <a href="{{asset('thread/'.$discuss->id)}}">
            <div class="row card-new" style="margin:0;">
                <div class="col-md-8">
                    <h4> 
                        <img src="{{asset('assets/sticky.png')}}" style="height: 30px;" /> 
                        {{$discuss->title}}
                    </h4>
                    <span class="badge badge-info"> username : {{$discuss->user->user_name}}</span>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </a>
    @endforeach


    @foreach($discusses as $discuss)
        <a href="{{asset('thread/'.$discuss->id)}}">
            <div class="row card-new" style="margin:0;">
                <div class="col-md-8">
                    <h4> 
                        <img src="{{asset('assets/post-it.png')}}" style="height: 30px;" /> 
                        {{$discuss->title}}
                    </h4>
                    <span class="badge badge-info"> username : {{$discuss->user->user_name}}</span>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </a>
    @endforeach
</div>


   
    
    <!--Footer Section  Start--> 
    @include('front.layout.footer')
    <!--Footer Section End -->  
    
    <script src="{{ url('/') }}/assets/front/js/infiniteslidev2.js"></script>    
    <script type="text/javascript">
        $(function() {
            $('.scroll1').infiniteslide({
                speed: 30,
            });
        });
    </script>
    
    <script>
        $(".advance-search-label-section").on("click", function(){
            $(".advance-search-section-main").toggleClass("searchactive");
        });
    </script>
    
    <script>
        $(".responsive-show-menu").on("click", function(){
            $("body").addClass("login-open");
        });
        $(".closebtnlogin").on("click", function(){
            $("body").removeClass("login-open");
        })
    </script>
    
    <script>
        $(".menu-icon").on("click", function(){
            $("body").addClass("menu-active");
        });
        $(".closebtn").on("click", function(){
            $("body").removeClass("menu-active");
        })
    </script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        var doc_width = $(document).width();
        if (doc_width < 768){
            $(".ads-banners-row").addClass("scroll1");
        }


        tinymce.init({
            selector: '#editor4',
            height:250,
            valid_elements: "*[*]",
            force_p_newlines : !1,
            forced_root_block : !1,

            plugins: [
            'advlist autolink lists link charmap print preview anchor',
            'searchreplace visualblocks fullscreen',
            'insertdatetime table contextmenu paste'
            ],
            toolbar: 
            'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
            content_css: [

            ],
        });
    </script>
    
</body>

</html>