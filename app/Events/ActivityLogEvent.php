<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ActivityLogEvent extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Array $arr_activity_data)
    {
        $this->module_title  = "";
        $this->module_action = "";
        $this->activity_msg  = "";
        $this->user_id       = "";
        $this->ip_address    = "";


        $this->auth = auth()->guard('admin');

        if(isset($this->auth))
        {
            $user = $this->auth->user();
            $user_id   = isset($user->id)?$user->id:'';
        }

        if(isset($arr_activity_data['activity_msg']))
        {
            $this->activity_msg  = $arr_activity_data['activity_msg'];
        }
        if(isset($arr_activity_data['module_title']))
        {
            $this->module_title   = $arr_activity_data['module_title'];
        }

        if(isset($arr_activity_data['module_action']))
        {
            $this->module_action  = $arr_activity_data['module_action'];
        }
        if(isset($user_id))
        {
            $this->user_id        = $user_id;
        }   
        if(isset($arr_activity_data['ip_address']))
        {
            $this->ip_address = $arr_activity_data['ip_address'];
        }       
        //dd($arr_activity_data);
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
