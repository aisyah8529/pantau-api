<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

trait HasLocale
{
    function setLocale(Request $request)
    {
        $availableLocales = ['en', 'bm'];

        // Check if request has Accept-Language header
        if ($request->hasHeader('Accept-Language')) 
        {   
            // Check Accept-Language header's value is available for translation
            if (in_array($request->header('Accept-Language'), $availableLocales)) 
            {
                // Set locale based on Accept-Language header
                App::setLocale($request->header('Accept-Language'));
            }
        }
    }
}