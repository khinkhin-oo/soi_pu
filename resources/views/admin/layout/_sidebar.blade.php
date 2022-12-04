 <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
        </div>
        @if($shared_admin_details['permissions']=='0')
            <ul class="nav" id="side-menu" >
                <li><a href="{{ url('/') }}/admin/dashboard" class="waves-effect"><i class="ti-home"></i> <span class="hide-menu">Dashboard</span></a></li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-settings" data-icon="v"></i> <span class="hide-menu">Configuration <span class="fa arrow"></span></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ url('/') }}/admin/password/change"><span class="hide-menu">Change Password</span></a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}/admin/account_setting"><span class="hide-menu">Edit Profile</span></a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}/admin/site_setting" class="waves-effect"><span class="hide-menu"> Site Configuration</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('/')}}/admin/models" class="waves-effect"><i class="ti-user" data-icon="v"></i> <span class="hide-menu">Models</span></a>
                </li>
                <li>
                    <a href="{{url('/')}}/admin/banners" class="waves-effect"><i class="ti-layers" data-icon="v"></i> <span class="hide-menu">Banners</span></a>
                </li>
                <li>
                    <a href="{{url('/')}}/admin/faqs" class="waves-effect"><i class="ti-help" data-icon="v"></i> <span class="hide-menu">Faqs</span></a>
                </li>
                <li>
                    <a href="{{url('/')}}/admin/blogs" class="waves-effect"><i class="ti-layout-list-post" data-icon="v"></i> <span class="hide-menu">Blogs</span></a>
                </li>
                <li>
                    <a href="{{url('/')}}/admin/users" class="waves-effect"><i class="ti-user" data-icon="v"></i> <span class="hide-menu">Users</span></a>
                </li>
                <li>
                    <a href="{{url('/')}}/admin/services" class="waves-effect"><i class="ti-calendar" data-icon="v"></i> <span class="hide-menu">Services</span></a>
                </li>
                <li>
                    <a href="{{url('/')}}/admin/category" class="waves-effect"><i class="ti-user" data-icon="v"></i> <span class="hide-menu">Category</span></a>
                </li>
                <li>
                    <a href="{{url('/')}}/admin/blog_category" class="waves-effect"><i class="ti-user" data-icon="v"></i> <span class="hide-menu">Blog Categories</span></a>
                </li>
                <li>
                    <a href="{{url('/')}}/admin/area" class="waves-effect"><i class="ti-location-pin" data-icon="v"></i> <span class="hide-menu">Area</span></a>
                </li>

                <li>
                    <a href="{{url('/')}}/admin/location" class="waves-effect"><i class="ti-location-pin" data-icon="v"></i> <span class="hide-menu">Location</span></a>
                </li>
                <li>
                    <a href="{{url('/')}}/admin/point_system" class="waves-effect"><i class="ti-star" data-icon="v"></i> <span class="hide-menu">Point System</span></a>
                </li>
                <li>
                    <a href="{{url('/')}}/admin/ranks" class="waves-effect">
                        <i class="ti-medall" data-icon="v"></i>
                        <span class="hide-menu">Rank Badges</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}/admin/company" class="waves-effect"><i class="ti-calendar" data-icon="v"></i> <span class="hide-menu">Company</span></a>
                </li>
                <li>
                    <a href="{{url('/')}}/admin/comments" class="waves-effect"><i class="ti-comment-alt" data-icon="v"></i> <span class="hide-menu">Comments</span></a>
                </li>
                <li>
                    <a href="{{url('/')}}/admin/page" class="waves-effect"><i class="ti-layout-placeholder" data-icon="v"></i> <span class="hide-menu">Pages</span></a>
                </li>
                <li>
                    <a href="{{url('/')}}/admin/vaccination" class="waves-effect"><i class="ti-list" data-icon="v"></i> <span class="hide-menu">Vaccination</span></a>
                </li>
                <!-- <li>
                    <a href="{{url('/')}}/admin/forum" class="waves-effect"><i class="ti-list" data-icon="v"></i> <span class="hide-menu">Forum</span></a>
                </li> -->
                {{-- <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-layout-media-left-alt" data-icon="v"></i> <span class="hide-menu">Blogs <span class="fa arrow"></span> </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ url('/') }}/admin/blog_category"><span class="hide-menu">Manage blog category</span></a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}/admin/blogs"><span class="hide-menu">Manage blogs</span></a>
                        </li>
                    </ul>
                </li> --}}
               {{--  <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-rss" data-icon="v"></i> <span class="hide-menu"> Newsletter <span class="fa arrow"></span> </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li> <a href="{{ url('/') }}/admin/newsletters/manage_newsletter"><span class="hide-menu">Manage Newsletters</span></a> </li>
                        <li> <a href="{{ url('/') }}/admin/newsletters/send_newsletter"><span class="hide-menu">Send Newsletters</span></a> </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="icon-layers" data-icon="v"></i> <span class="hide-menu">General <span class="fa arrow"></span> </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ url('/') }}/admin/notifications"><span class="hide-menu"> Notifications</span></a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}/admin/reviews"><span class="hide-menu"> Reviews &amp; Ratings</span></a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}/admin/email_templates"><span class="hide-menu"> Email Templates </span></a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}/admin/contact_enquiry"><span class="hide-menu"> Contact Enquiries </span></a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}/admin/front_pages"><span class="hide-menu"> Front Pages </span></a>
                        </li>
                    </ul>
                </li> --}}

                {{-- <li>
                    <a href="{{ url('/') }}/admin/notifications" class="waves-effect"><span class="hide-menu"> Notifications</span></a>
                </li>
                <li>
                    <a href="{{ url('/') }}/admin/reviews" class="waves-effect"><span class="hide-menu"> Reviews & Ratings</span></a>
                </li>
                <li>
                    <a href="{{ url('/') }}/admin/points_management" class="waves-effect"><span class="hide-menu"> Points Management </span></a>
                </li> --}}
                {{-- <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-email" data-icon="v"></i> <span class="hide-menu">Email Templates <span class="fa arrow"></span> </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ url('/') }}/admin/email_templates"><span class="hide-menu"> Manage</span></a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <a href="{{ url('/') }}/admin/contact_enquiry" class="waves-effect"><i class="ti-comment-alt"></i><span class="hide-menu"> Contact Enquiries</span></a>
                </li> --}}
                {{-- <li>
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-file"></i> <span class="hide-menu">Front Pages <span class="fa arrow"></span> </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ url('/') }}/admin/front_pages"><span class="hide-menu">Manage</span></a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}/admin/front_pages/create"><span class="hide-menu">Create</span></a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        @elseif($shared_admin_details['permissions']=='1')
            <ul class="nav" id="side-menu" >
                <li>
                    <a href="{{url('/')}}/admin/models" class="waves-effect"><i class="ti-user" data-icon="v"></i> <span class="hide-menu">Models</span></a>
                </li>
                <li>
                    <a href="{{url('/')}}/admin/models" class="waves-effect"><i class="ti-user" data-icon="v"></i> <span class="hide-menu">Models</span></a>
                </li>

            </ul>
        @elseif($shared_admin_details['permissions']=='2')
        <ul class="nav" id="side-menu" >
            <li>
                <a href="{{url('/')}}/admin/models" class="waves-effect"><i class="ti-user" data-icon="v"></i> <span class="hide-menu">Models</span></a>
            </li>
            <li>
                <a href="{{url('/')}}/admin/models" class="waves-effect"><i class="ti-user" data-icon="v"></i> <span class="hide-menu">Models</span></a>
            </li>
            <li>
                <a href="{{url('/')}}/admin/comments" class="waves-effect"><i class="ti-comment-alt" data-icon="v"></i> <span class="hide-menu">Comments</span></a>
            </li>
            <li>
                <a href="{{url('/')}}/admin/vaccination" class="waves-effect"><i class="ti-list" data-icon="v"></i> <span class="hide-menu">Vaccination</span></a>
            </li>
            <li>
                <a href="{{url('/')}}/admin/users" class="waves-effect"><i class="ti-user" data-icon="v"></i> <span class="hide-menu">Users</span></a>
            </li>
        </ul>
        @endif
        <div class="user-profile"></div>

    </div>
</div>
