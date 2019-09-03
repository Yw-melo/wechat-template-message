<?php

namespace Ywmelo\TemplateMessage\Channels;

use Illuminate\Notifications\Notification;

class WechatTemplateMessageChannel
{
    /**
     * 发送指定的通知.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toWechatTemplateMessage($notifiable);
    }
}
