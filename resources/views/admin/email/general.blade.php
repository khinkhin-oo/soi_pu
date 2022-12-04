<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{config('app.project.name')}}</title>
</head>
<body style="background:#f5f6f8; margin:0px; padding:0px; font-size:12px; font-family:Arial, Helvetica, sans-serif; line-height:21px; color:#666; text-align:justify;">
    <div style="max-width:630px;width:100%;margin:0 auto;">
        <div style="padding:0px 15px;">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                       <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                               <td style="padding:42px 0 8px 0; color: #858585; font-size:13px; letter-spacing: 1px;"><span style="font-size:11px;color#858585;margin-top:2px;vertical-align:top;">@</span><?php echo isset($arr_global_site_setting['site_name']) ? $arr_global_site_setting['site_name']:  '' ?></td>
                               <td style="padding:42px 0 8px 0;"><div style="float:right; padding-right:15px;"> 
                               {{-- <img src="{{ url('/').'/'.config('app.project.img_path.business_logo') }}" alt="link" style="vertical-align:middle;margin:-1px 2px 0 0;"/> --}}<a href="{{ url('/') }}" style="text-decoration:none; color: #88ba7b; font-size:13px;" > visit website </a> </div></td>
                           </tr>
                       </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#FFFFFF" style="padding:0px;box-shadow:0 0 12px #e8e8e8;-webkit-box-shadow:0 0 12px #e8e8e8;-moz-box-shadow:0 0 12px #e8e8e8;border-radius:4px 4px 0 0;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td style="background:#e2e2e2;height: 115px; text-align:center;border-radius:4px 4px 0 0;">
                                            <a href="#" style="line-height:101px; text-decoration:none; letter-spacing: 3px; color:#fff;font-size:22px; font-weight:200;display: block;margin: 10px;" >
                                                <b>
                                                    <img src="{{ url('/') }}/assets/admin_assets/images/logo.png" alt="home" class="light-logo" />
                                                </b>
                                                {{-- <img src="{{ url('/') }}/assets/admin_assets/images/admin-text.png" alt="logo" /> --}}
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td height="40"></td></tr>
                        <tr>
                            <td style="color: #545454 !important;font-size: 15px;padding: 12px 30px;">
                                {!! $content ?? '' !!}
                            </td>
                        </tr>
                       
                         <tr>
                          <td style="color: #333333; font-size: 16px; padding: 0 30px;">
                            Thanks &amp; Regards,
                          </td>
                        </tr>

                        <tr>
                          <td style="color: #f58915;  font-size: 15px; padding: 0 30px;">
                            Team {{config('app.project.name')}}
                          </td>
                        </tr>

                     </table>
                    </td>
                </tr>
                
            </table>
        </div>
    </div>
</body>
</html>