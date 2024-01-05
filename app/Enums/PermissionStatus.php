<?php

namespace App\Enums;

use App\Traits\HasEnumCollection;
use BenSampo\Enum\Enum;

final class PermissionStatus extends Enum
{
    use HasEnumCollection;

    const pending   = 1; /// dalam proses
    const approved  = 2; /// diluluskan
    const rejected  = 3; /// Ditolak
    const suspended = 4; /// Digantung
}
