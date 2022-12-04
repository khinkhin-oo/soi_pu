<?php
use App\Models\SiteSettingModel;
use App\Models\NotificationModel;
use App\Models\UsersModel;
use App\Models\UserModel;
use App\Models\CommentModelsModel;
use App\Models\MessageModel;
use App\Models\DiscussModel;
use App\Models\CommentsModel;
use App\Models\LocationModel;


function login_admin_details()
{
	
	$auth    = auth()->guard('admin');
	if($auth->user()){
	
		return $auth->user();
	}
	return null;
}

function login_restaurant_details()
{
	
	$auth    = auth()->guard('restaurant');
	if($auth->user()){
	
		return $auth->user();
	}
	return null;
}


function login_user_details()
{
	
	$auth    = auth()->guard('users');
	if($auth->user()){
	
		return $auth->user();
	}
	return null;
}

function login_operator_details()
{
	$auth = [];
	$auth    = auth()->guard('operator');
	
	if($auth->user()){
		return $auth->user();	
	}

	return $auth;
}

function is_user_logged_in($type)
{
	$status = false;
	
	$auth   = auth()->guard($type);

	if ($auth->check())
	{
		$status = true;
	}
	return $status;
}



function login_user_id($type)
{
	if($type!=null)
	{
		$auth    = auth()->guard($type);
		if ($auth->user()) 
		{
			return $auth->user()->id;
		}
	}
	return null;
}

function login_name($type)
{
	if($type!=null)
	{
		$auth    = auth()->guard($type);
		if ($auth->user()) 
		{
			return $auth->user()->first_name.' '.$auth->user()->last_name;
		}
	}
	return null;
}

function get_formated_date($date='', $format=null)
{

    if ($format!=null) 
    {
        return date($format, strtotime($date));
    }

    return date('D d, M Y', strtotime($date));
}

function get_formated_time($date=null)
{
    if ($date!='0000-00-00 00:00:00') 
    {
        return date('H:i A',strtotime($date));
    }
    return '-';
}

function get_admin_commission()
{
	$obj_commission = SiteSettingModel:: where('id',1)
                                         ->select('commission_rate')
										 ->first();
	if($obj_commission)
	{
		$commission_rate = $obj_commission['commission_rate'];
		return $commission_rate;
	}
}

function getSettings()
{
	$settings = SiteSettingModel::find(1);
	return $settings;
}

function get_slug($model,$slug)
{

$arr_data = [];

$model_name = '\\App\\Models\\'.$model;
$model = new $model_name;

$obj_data = $model->select('slug')->where('slug','LIKE',$slug.'%')->get();

if($obj_data)
{
	$arr_data = $obj_data->toArray();
}

if(isset($arr_data) && !empty($arr_data))
{
	$slugs = array_column($arr_data, 'slug');
}

if(isset($slugs) && isset($slug) && in_array($slug, $slugs))
{
	$max = 0;

	while(in_array( ($slug . '-' . ++$max ), $slugs) );

	$slug .= '-' . $max;
}

return  $slug;
}

function time_elapsed_string($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function get_notification_count($user_id)
{
	$notification_count = '0';

	if(isset($user_id) && $user_id!='')
	{			
		$notification_count = NotificationModel::where('receiver_id',$user_id)
											->where('receiver_type','user')
											->where('status','0')
											->count();
	}
	
	return $notification_count;
}

function get_clients_count(){

	$count = UsersModel::whereHas('get_user_roles', function($q){
							$q->where('role','user');
						})
						->with(['get_user_roles'=>function($q){
							$q->where('role','user');
						}])
						->count();
	return (int) $count;
}

function get_lawyers_count(){

	$count = UsersModel::whereHas('get_user_roles', function($q){
							$q->where('role','lawyer');
						})
						->with(['get_user_roles'=>function($q){
							$q->where('role','lawyer');
						}])
						->count();
	return (int) $count;
}

function getreplaycomments($modelid,$replayid,$commentid)
{
	return CommentModelsModel::where('model_id',$modelid)
							->where('comment_id',$commentid)
                            ->where('replay_user_id',$replayid)->get();
}

function finduser($id)
{
	if($id == 0  || empty($id))
	{
		return null;
	}
	else
	{
		$user = UserModel::find($id);
		if(!empty($user))
		{
			return $user;
		}
		else
		{
			return 0;
		}
	}
}


function getmessagesbyid($userid)
{
	return MessageModel::whereIn('receive_id',$userid)->get();
}

function getmyposts($userid)
{
	return DiscussModel::where('user_id',$userid)->count();
}

function getmycomments($userid)
{
	return CommentsModel::where('user_id',$userid)->count();
}

function getlocationById($id)
{
	return LocationModel::find($id);
}


?>