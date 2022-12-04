<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NotificationEvent extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Array $arr_notification_data)
    {
        $this->receiver_id          = "";
        $this->receiver_type        = "";
        $this->sender_id            = "";
        $this->sender_type          = "";
        $this->module_type          = "";
        $this->module_section       = "";
        $this->title                = "";
        $this->description          = "";
        $this->redirect_url         = "";
        $this->status               = "";
        $this->notification_type    = "";

        if(isset($arr_notification_data['receiver_id']))
        {
            $this->receiver_id   = $arr_notification_data['receiver_id'];
        }

        if(isset($arr_notification_data['receiver_type']))
        {
            $this->receiver_type  = $arr_notification_data['receiver_type'];
        }

        if(isset($arr_notification_data['sender_id']))
        {
            $this->sender_id  = $arr_notification_data['sender_id'];
        }

        if(isset($arr_notification_data['sender_type']))
        {
            $this->sender_type  = $arr_notification_data['sender_type'];
        }
    
        if(isset($arr_notification_data['title']))
        {
            $this->title  = $arr_notification_data['title'];
        }

        if(isset($arr_notification_data['description']))
        {
            $this->description  = $arr_notification_data['description'];
        }

        if(isset($arr_notification_data['redirect_url']))
        {
            $this->redirect_url  = $arr_notification_data['redirect_url'];
        }

        if(isset($arr_notification_data['status']))
        {
            $this->status  = $arr_notification_data['status'];
        }
        if(isset($arr_notification_data['notification_type']))
        {
            $this->notification_type  = $arr_notification_data['notification_type'];
        }

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
