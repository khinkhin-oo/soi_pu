

<div class="breadcrumb-section-main">
    <ol class="breadcrumb">
        @if($shared_admin_details['permissions']=='1') 
            <li class="{{isset($sub_module_title) && !empty($sub_module_title) ? '' : 'active'}}">
                @if(isset($sub_module_title) && $sub_module_title != '' )
                <a href="{{ $module_url_path }}"><?php echo isset($module_title) ? ucfirst($module_title) : 'javascript:void(0)'?></a>
                @else
                <?php echo isset($module_title) ? ucfirst($module_title) : 'javascript:void(0)'?>
                @endif
            </li>
            @if(isset($sub_module_title) && $sub_module_title != '' )
            <li class="active"><?php echo isset($sub_module_title) ? ucfirst($sub_module_title) : 'javascript:void(0)'?>
            </li>
            @endif
        @elseif($shared_admin_details['permissions']=='0') 
            <li><a href="{{ url('/') }}/admin/dashboard">Dashboard</a></li>
            <li class="{{isset($sub_module_title) && !empty($sub_module_title) ? '' : 'active'}}">
                @if(isset($sub_module_title) && $sub_module_title != '' )
                <a href="{{ $module_url_path }}"><?php echo isset($module_title) ? ucfirst($module_title) : 'javascript:void(0)'?></a>
                @else
                <?php echo isset($module_title) ? ucfirst($module_title) : 'javascript:void(0)'?>
                @endif
            </li>
            @if(isset($sub_module_title) && $sub_module_title != '' )
            <li class="active"><?php echo isset($sub_module_title) ? ucfirst($sub_module_title) : 'javascript:void(0)'?>
            </li>
            @endif
        @endif
    </ol>
</div>