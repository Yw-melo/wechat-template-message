<?php

namespace Ywmelo\TemplateMessage\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class WechatTemplateMessageException extends Exception
{

    /**
     * WechatTemplateMessageException constructor.
     * @param $message
     * @param $code
     */
    public function __construct($message, $code)
    {
        parent::__construct($message);

        $this->message = $message;
        $this->code = $code;
    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request)
    {
        return response()->json([
            'message' => $this->message,
            'code' => $this->code,
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
