<?php

namespace App\Enums\Message;

use BenSampo\Enum\Enum;

final class MessageSuccess extends Enum
{
    const REGISTERED = ['code' => '00', 'message' => 'success registered'];
    const LOGGED_IN = ['code' => '01', 'message' => 'success logged-in'];
    const LOGGED_OUT = ['code' => '02', 'message' => 'success logged-out'];
    const VERIFIED = ['code' => '03', 'message' => 'success verified'];
    const CREATED = ['code' => '04', 'message' => 'success created'];
    const RETRIEVED = ['code' => '05', 'message' => 'success retrieved'];
    const UPDATED = ['code' => '06', 'message' => 'success updated'];
    const EMAIL_SENT = ['code' => '07', 'message' => 'success sent email'];
    const RESET = ['code' => '08', 'message' => 'success reset'];
    const SWITCHED = ['code' => '09', 'message' => 'success switched'];
    const DELETED = ['code' => '09', 'message' => 'success deleted'];
    const UPLOADED = ['code' => '10', 'message' => 'success uploaded'];
    const CANCELLED = ['code' => '11', 'message' => 'success cancelled'];
    const REFUNDED = ['code' => '12', 'message' => 'success refunded'];
    const RECEIVED = ['code' => '13', 'message' => 'success received'];
    const REQUEST_CANCELLATION = ['code' => '14', 'message' => 'success request cancellation'];
    const REQUEST_VERIFICATION = ['code' => '15', 'message' => 'success request verification'];
}