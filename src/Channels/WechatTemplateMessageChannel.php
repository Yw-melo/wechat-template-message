<?php

namespace Ywmelo\TemplateMessage\Channels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notification;
use Ywmelo\TemplateMessage\Exceptions\WechatTemplateMessageException;

class WechatTemplateMessageChannel
{
    /**
     * 发送指定的通知.
     *
     * @param  mixed $notifiable
     * @param  \Illuminate\Notifications\Notification $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        if ($notifiable instanceof Model) {
            $to = $notifiable->openid ?? $notifiable->routeNotificationForOpenid($notification);
        }

        dd($to);

        $message = $notification->toWechatTemplateMessage($notifiable)
            ->to($to);

        $result = EasyWeChat::miniProgram()->template_message->send($message->toArray());

        if ($result['errcode'] != 0) {
            throw new WechatTemplateMessageException($result['errmsg'], $result['errcode']);
        }
    }
}
