<?php

namespace App\Http\Controllers\utile;

use Carbon\Carbon;

class DateHelper
{
    public static function calculateAge($birthdate)
    {
        $birthDate = Carbon::parse($birthdate);
        return $birthDate->age;
    }
}
