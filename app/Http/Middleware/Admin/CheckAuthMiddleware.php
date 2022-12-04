<?php
namespace App\Http\Middleware\Admin;
use App\Models\SiteSettingModel;
use Closure;
use DB;
class CheckAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { 
       /* try {
           $x=  DB::connection()->getMongoClient()->listDatabases();
           //dd($x);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }*/

        $arr_site_data=[];
        $obj_site_data = SiteSettingModel::first();

        if($obj_site_data){ $arr_site_data = $obj_site_data->toArray(); }

        view()->share('arr_global_site_setting',$arr_site_data);

        $this->auth = auth()->guard('admin');
        if($this->auth->user())
        {
            return redirect(url('/admin/account_setting')); 
        }
        return $next($request);
    }
}
