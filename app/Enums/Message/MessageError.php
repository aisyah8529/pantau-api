<?php

namespace App\Enums\Message;

use BenSampo\Enum\Enum;

final class MessageError extends Enum
{
    
    const INVALID_FORM = ['code' => '10', 'message' => 'error invalid form'];
    const NOT_FOUND = ['code' => '11', 'message' => 'error not found'];
    const THROTTLED = ['code' => '12', 'message' => 'error throttled'];
    const INVALID_TOKEN = ['code' => '13', 'message' => 'error invalid token'];
    const MAX_ACCOUNT = ['code' => '14', 'message' => 'error max account'];
    const STILL_ACTIVE = ['code' => '14', 'message' => 'error still active'];
    const ACCOUNT_NOT_FOUND =  ['code' => '15', 'message' => 'account not found'];
}