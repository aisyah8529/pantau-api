<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class RoleType extends Enum
{
    const developer = 'DEVELOPER';
    const admin = 'ADMIN';
    const merchant = 'MERCHANT';
    const customer = 'CUSTOMER';
}