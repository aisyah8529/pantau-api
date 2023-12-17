<?php

namespace App\Enums;

use App\Traits\HasEnumCollection;
use BenSampo\Enum\Enum;

final class Status extends Enum
{
    use HasEnumCollection;

    const inactive = 0;
    const active = 1;
}