<?php

namespace App\Enums;

use App\Traits\HasEnumCollection;
use BenSampo\Enum\Enum;

final class InStatus extends Enum
{
    use HasEnumCollection;

    const in   = '0'; /// belum keluar
    const out  = '1'; /// pelajar keluar
    const home = '2'; /// balik
    const late = '3'; /// lambat
}
