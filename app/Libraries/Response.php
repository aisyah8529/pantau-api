<?php

namespace App\Libraries;

class Response {
    private static function send($type, $code, $data, $message) 
    {
        return response()->json([
            'type' => $type,
            'code' => $code,
            'data' => $data,
            'message' => $message
        ], 200);
    }

    static function error($code, $data, $message) 
    {
        return self::send('error', $code, $data, $message);
    }

    static function info($code, $data, $message) 
    {
        return self::send('info', $code, $data, $message);
    }

    static function success($code, $data, $message) 
    {
        return self::send('success', $code, $data, $message);
    }

    static function warning($code, $data, $message) 
    {
        return self::send('warning', $code, $data, $message);
    }
}