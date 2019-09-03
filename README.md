# EasyWechat template message notification for Laravel

使用 EasyWechat 的模板消息功能发送 Laravel 消息通知。

## 安装

```shell
composer require ywmelo/template-message
```

## 使用

### 创建通知：

```php
namespace App\Notifications;

use BC\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Ywmelo\TemplateMessage\Message\WechatTemplateMessage;
use Ywmelo\TemplateMessage\Channels\WechatTemplateMessageChannel;

class WechatTemplateMessageNotification extends Notification
{
    use Queueable;

    public function __construct($formId)
    {
        $this->formId = $formId;
    }

    public function via($notifiable)
    {
        return [WechatTemplateMessageChannel::class];
    }

    public function toEasySms($notifiable)
    {
        return (new WechatTemplateMessage)
            ->to('open_id')
            ->setTemplateId('template_id')
            ->setPage('page')
            ->setFormId($this->formId)
            ->setData([
                'keyword1' => 'keyword1',
                'keyword2' => 'keyword2',
                'keyword3' => 'keyword3',
                'keyword4' => 'keyword4',
            ])
            ->send();
    }
}
```
    
### 发送

```php
$user->notify(new WechatTemplateMessageNotification($formId));

```
