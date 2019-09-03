<?php

namespace Ywmelo\TemplateMessage\Messages;

use EasyWeChat;
use Ywmelo\TemplateMessage\Exceptions\WechatTemplateMessageException;

class WechatTemplateMessage
{

    private $templateMessage;

    private $openId;

    private $templateId;

    private $formId;

    private $page;

    private $data;

    /**
     * WechatTemplateMessage constructor.
     */
    public function __construct()
    {
        $this->templateMessage = EasyWeChat::miniProgram()->template_message;
    }

    /**
     * @return mixed
     * @throws WechatTemplateMessageException
     */
//    public function send()
//    {
//        $result = $this->templateMessage->send($this->setMessage());
//        if ($result['errcode'] != 0) {
//            throw new WechatTemplateMessageException($result['errmsg'], $result['errcode']);
//        }
//
//        return $result;
//    }

    /**
     * @return array
     */
    public function setMessage()
    {
        return [
            'template_id' => $this->templateId,
            'page' => $this->page,
            'form_id' => $this->formId,
            'data' => $this->data,
        ];
    }

    /**
     * @param string $openId
     * @return $this
     */
    public function to($openId = '')
    {
        $this->openId = $openId;

        return $this;
    }

    /**
     * @param $templateId
     * @return $this
     */
    public function setTemplateId($templateId = '')
    {
        $this->templateId = $templateId;

        return $this;
    }

    /**
     * @param string $page
     * @return $this
     */
    public function setPage($page = '')
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @param string $formId
     * @return $this
     */
    public function setFormId($formId = '')
    {
        $this->formId = $formId;

        return $this;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setData($data = [])
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'touser' => $this->openId,
            'template_id' => $this->templateId,
            'page' => $this->page,
            'form_id' => $this->formId,
            'data' => $this->data,
        ];
    }
}
