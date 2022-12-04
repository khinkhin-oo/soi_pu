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




@section('title',$discuss->title)
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
    
    <div class="topic">
        {{$discuss->title}}
    </div>
    <div class="row card-new" style="margin:0;">
        <div class="col-md-2">

            @if($discuss->user->admin_status !=0)
                            <img src="{{asset('assets/badges/admin.png')}}" 
                            alt="" 
                            class="img-rounded" />      
            @else
                        @if($discuss->user->rank > 0 && $discuss->user->rank <= 100)
                            <img src="{{asset('assets/badges/newbie.png')}}" 
                            alt="" 
                            class="img-rounded" />            
                        @elseif($discuss->user->rank > 100 && $discuss->user->rank <= 500)
                            <img src="{{asset('assets/badges/junior.png')}}" 
                            alt="" 
                            class="img-rounded" />  
                        @elseif($discuss->user->rank > 500 && $discuss->user->rank <= 1000)
                            <img src="{{asset('assets/badges/silver.png')}}" 
                            alt="" 
                            class="img-rounded" />  
                        @elseif($discuss->user->rank > 1000 && $discuss->user->rank <= 2500)
                            <img src="{{asset('assets/badges/gold.png')}}" 
                            alt="" 
                            class="img-rounded" />  
                        @elseif($discuss->user->rank > 2500 && $discuss->user->rank <= 4000)
                            <img src="{{asset('assets/badges/platinum.png')}}" 
                            alt="" 
                            class="img-rounded" />  
                        @elseif($discuss->user->rank > 4000 && $discuss->user->rank <= 5000)
                             <img src="{{asset('assets/badges/diamond.png')}}" 
                              alt="" 
                              class="img-rounded" /> 
                        @elseif($discuss->user->rank > 5000)
                             <img src="{{asset('assets/badges/blackdiamond.png')}}" 
                              alt="" 
                              class="img-rounded" /> 
                        @else
                             <img src="{{asset('assets/badges/newbie.png')}}" 
                              alt="" 
                              class="img-rounded" /> 
                        @endif
            @endif
                            
        </div>
         <div class="col-md-10">
                <h4> 
                    <img src="{{asset('assets/sticky.png')}}" style="height: 30px;" /> 
                    {{$discuss->title}}
                </h4>
                <div>
                    {!! html_entity_decode($discuss->description) !!}
                </div>
                <span class="badge badge-info"> username : {{$discuss->user->user_name}}</span>
            </div>
    </div>

    @foreach($threads as $thread)
        <div class="row card-new" style="margin:0;">
            <div class="col-md-2">
                        @if($thread->user->admin_status ==3)
                            <img src="{{asset('assets/badges/admin.png')}}" 
                            alt="" 
                            class="img-rounded" />      
                        @else
                            @if($thread->user->rank > 0 && $thread->user->rank <= 100)
                            <img src="{{asset('assets/badges/newbie.png')}}" 
                            alt="" 
                            class="img-rounded" />            
                            @elseif($thread->user->rank > 100 && $thread->user->rank <= 500)
                                <img src="{{asset('assets/badges/junior.png')}}" 
                                alt="" 
                                class="img-rounded" />  
                            @elseif($thread->user->rank > 500 && $thread->user->rank <= 1000)
                                <img src="{{asset('assets/badges/silver.png')}}" 
                                alt="" 
                                class="img-rounded" />  
                            @elseif($thread->user->rank > 1000 && $thread->user->rank <= 2500)
                                <img src="{{asset('assets/badges/gold.png')}}" 
                                alt="" 
                                class="img-rounded" />  
                            @elseif($thread->user->rank > 2500 && $thread->user->rank <= 4000)
                                <img src="{{asset('assets/badges/platinum.png')}}" 
                                alt="" 
                                class="img-rounded" />  
                            @elseif($thread->user->rank > 4000 && $thread->user->rank <= 5000)
                                 <img src="{{asset('assets/badges/diamond.png')}}" 
                                  alt="" 
                                  class="img-rounded" /> 
                            @elseif($thread->user->rank > 5000)
                                 <img src="{{asset('assets/badges/blackdiamond.png')}}" 
                                  alt="" 
                                  class="img-rounded" /> 
                            @else
                                 <img src="{{asset('assets/badges/newbie.png')}}" 
                                  alt="" 
                                  class="img-rounded" /> 
                            @endif 
                        @endif   
            </div>
            <div class="col-md-10">
                <h4> 
                    {{$thread->title}}
                </h4>

                <div>
                    {!! html_entity_decode($thread->comment) !!}
                </div>

                <span class="badge badge-info"> username : {{$thread->user->user_name}}</span>
            </div>
        </div>
    @endforeach

    @if(!empty($user))
    <div class="row" id="disscuss" style="margin-top:10px;">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-body">  
                                                <h6>Topic Title</h6>  
                                                <hr />            
                                                <form accept-charset="UTF-8" action="{{route('savethread',array('user'=>$user,'discuss'=>$discuss))}}" method="POST">
                                                    @csrf

                                                    <div class="form-group">
                                                      <label for="usr">Title:</label>
                                                      <input name="title" type="text" class="form-control" id="usr">
                                                    </div>

                                                     <div class="form-group">
                                                        <label class="control-label">Description</label>
                                                        <div class="input-group ">
                                                            <textarea rows="5" cols="100" style="resize: none" class="form-control" placeholder="Description" name="description" data-rule-reuired="true" id="editor4"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <button type="submit" class="btn btn-success" style="background-color: #28d82d;border:1px solid #28d82d;border-radius: 0;margin-top:20px">
                                                        <i class="fa fa-save"></i>
                                                        Add Reply
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

    @endif  
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