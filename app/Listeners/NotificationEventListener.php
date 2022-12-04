<?php

namespace App\Listeners;

use App\Events\NotificationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\NotificationModel;
use App\Common\Services\NotificationService;

class NotificationEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(NotificationModel $notification,NotificationService $notification_service)
    {
        $this->NotificationModel  = $notification; 
        $this->NotificationService = $notification_service;
    }

    /**
     * Handle the event.
     *
     * @param  NotificationEvent  $event
     * @return void
     */
    public function handle(NotificationEvent $event)
    {
        $arr_notification_data['receiver_id']            = $event->receiver_id;
        $arr_notification_data['receiver_type']          = $event->receiver_type;
        $arr_notification_data['sender_id']              = $event->sender_id;
        $arr_notification_data['sender_type']            = $event->sender_type;
        $arr_notification_data['title']                  = $event->title;
        $arr_notification_data['description']            = $event->description;
        $arr_notification_data['redirect_url']           = $event->redirect_url;
        $arr_notification_data['notification_type']      = $event->notification_type;
        //$arr_notification_data['status']                 = $event->status; Dont add it as its 0 i.e unread by default
       $this->NotificationModel->create($arr_notification_data);

         
    }
}
