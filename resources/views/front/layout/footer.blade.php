<style type="text/css">

    .copyright-txt{
        text-transform: uppercase !important;
    }

</style>
<?php $settings = getSettings(); ?>

<div class="footer-seciton">
<div class="container-change-section">
    <div class="footer-logo-seciton">
        <img src="{{ url('/') }}/assets/front/images/logonew.png" alt="" style="width: 250px" />
    </div>
    <div class="footer-menu-section">
        @if(\App::isLocale('th'))
                <li>
                    <a href="{{ url('/') }}/">{{ trans('header.home') }}</a>
                </li>
                @else
                <li>
                    <a href="{{ url('/en') }}/">{{ trans('header.home') }}</a>
                </li>
                @endif
                <li>
                    <a href="{{url('/user_register')}}">{{ trans('header.register') }}</a>
                </li>
                @if(\App::isLocale('th'))
                <li>
                    <a href="{{asset('/faqs')}}">{{ trans('header.faqs') }}</a>
                </li>
                @if($settings->hideblog==1)
                 <li>
                    <a href="{{asset('/blogs')}}">{{ trans('header.blogs') }}</a>
                </li>
                @endif
                @else
                <li>
                    <a href="{{asset('/en/faqs')}}">{{ trans('header.faqs') }}</a>
                </li>
                @if($settings->hideblog==1)
                 <li>
                    <a href="{{asset('/en/blogs')}}">{{ trans('header.blogs') }}</a>
                </li>
                @endif
                @endif
                <li>
                    <a href="{{asset('/contactus')}}">{{ trans('header.contactus') }}</a>
                </li>
    </div>
    <div class="copyright-txt">
        {{ trans('footer.copy rights') }} &copy; {{ trans('footer.2020') }} SOI66.COM {{ trans('footer.all rights reserved.') }}
    </div>
</div>
</div>
<script>
        $(".responsive-show-menu").on("click", function(){
            $("body").addClass("login-open");
        });
        $(".closebtnlogin").on("click", function(){
            $("body").removeClass("login-open");
        })
    </script>


