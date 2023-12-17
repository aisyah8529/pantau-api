<?php

namespace App\Libraries;

use Illuminate\Contracts\Validation\Validator;

class Validation {

	static function summarize(Validator $validator)
    {	
		$summary = [];

		// Get errors in array
		$errors = $validator->errors()->toArray();

		foreach ($errors as $input => $error) 
		{
			// Set summary array
			$summary[$input] = $error[0];
		}

		// Get summarize validation
		$validation = self::undot($summary);

		return ['validation' => (object) $validation];
    }

	static function undot($array, $delimiter = '.')
	{
		$result = [];

		foreach ($array as $notations => $value) 
		{
			// Extract keys
			$keys = explode($delimiter, $notations);
			
			// Reverse keys for assignments
			$keys = array_reverse($keys);
	
			// set initial value
			$currentValue = $value;
			
			foreach ($keys as $key) 
			{
				// Wrap value with key over each iteration
				$currentValue = [$key => $currentValue];
			}
			
			// Merge result
			$result = array_merge_recursive($result, $currentValue);
		}
	
		return $result;
	}
}