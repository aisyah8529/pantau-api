<?php

namespace App\Enums;

use App\Traits\HasEnumCollection;
use BenSampo\Enum\Enum;

final class Gender extends Enum
{
    use HasEnumCollection;

    const male = 1;
    const female = 2;
}