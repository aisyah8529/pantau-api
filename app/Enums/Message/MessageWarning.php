<?php

namespace App\Enums\Message;

use BenSampo\Enum\Enum;

final class MessageWarning extends Enum
{
    const UNAUTHORIZED_EXPIRED = ['code' => '99', 'message' => 'warning unauthorized expired'];
    const UNAUTHORIZED_UNVERIFIED = ['code' => '90', 'message' => 'warning unauthorized unverified'];
    const UNAUTHORIZED_ROLE = ['code' => '91', 'message' => 'warning unauthorized role'];
    const UNAUTHORIZED_MODEL = ['code' => '92', 'message' => 'warning unauthorized model'];
    const OUT_OF_STOCK = ['code' => '93', 'message' => 'warning out of stock'];
    const CHANGES_DETECTED = ['code' => '94', 'message' => 'warning changes detected'];
    const MAINTENANCE_MODE = ['code' => '95', 'message' => 'warning maintenance mode'];
}