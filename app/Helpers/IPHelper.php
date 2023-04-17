<?php

namespace App\Helpers;

use App\Http\Requests\TestRequest;
use Illuminate\Http\Request;

class IPHelper
{
    /**
     * @return array
     */
    public static function blocked(): array
    {
        return [];
    }
}
