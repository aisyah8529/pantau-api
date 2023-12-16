<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute must be accepted.',
    'accepted_if' => ':attribute must be accepted when :other is :value.',
    'active_url' => ':attribute is not a valid URL.',
    'after' => ':attribute must be a date after :date.',
    'after_or_equal' => ':attribute must be a date after or equal to :date.',
    'alpha' => ':attribute must only contain letters.',
    'alpha_dash' => ':attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => ':attribute must only contain letters and numbers.',
    'array' => ':attribute must be an array.',
    'before' => ':attribute must be a date before :date.',
    'before_or_equal' => ':attribute must be a date before or equal to :date.',
    'between' => [
        'array' => ':attribute must have between :min and :max items.',
        'file' => ':attribute must be between :min and :max kilobytes.',
        'numeric' => ':attribute must be between :min and :max.',
        'string' => ':attribute must be between :min and :max characters.',
    ],
    'boolean' => ':attribute must be true or false.',
    'confirmed' => ':attribute confirmation does not match.',
    'current_password' => ':attribute is incorrect.',
    'date' => ':attribute is not a valid date.',
    'date_equals' => ':attribute must be a date equal to :date.',
    'date_format' => ':attribute does not match the format :format.',
    'declined' => ':attribute must be declined.',
    'declined_if' => ':attribute must be declined when :other is :value.',
    'different' => ':attribute and :other must be different.',
    'digits' => ':attribute must be :digits digits.',
    'digits_between' => ':attribute must be between :min and :max digits.',
    'dimensions' => ':attribute has invalid image dimensions.',
    'distinct' => ':attribute has a duplicate value.',
    'email' => ':attribute must be a valid email address.',
    'ends_with' => ':attribute must end with one of the following: :values.',
    'enum' => ':attribute is invalid.',
    'enum_key' => ':attribute is invalid.',
    'enum_value' => ':attribute is invalid.',
    'exists' => ':attribute is not found.',
    'file' => ':attribute must be a file.',
    'filled' => ':attribute must have a value.',
    'gt' => [
        'array' => ':attribute must have more than :value items.',
        'file' => ':attribute must be greater than :value kilobytes.',
        'numeric' => ':attribute must be greater than :value.',
        'string' => ':attribute must be greater than :value characters.',
    ],
    'gte' => [
        'array' => ':attribute must have :value items or more.',
        'file' => ':attribute must be greater than or equal to :value kilobytes.',
        'numeric' => ':attribute must be greater than or equal to :value.',
        'string' => ':attribute must be greater than or equal to :value characters.',
    ],
    'image' => ':attribute must be an image.',
    'in' => ':attribute is invalid.',
    'in_array' => ':attribute does not exist in :other.',
    'integer' => ':attribute must be an integer.',
    'ip' => ':attribute must be a valid IP address.',
    'ipv4' => ':attribute must be a valid IPv4 address.',
    'ipv6' => ':attribute must be a valid IPv6 address.',
    'json' => ':attribute must be a valid JSON string.',
    'lt' => [
        'array' => ':attribute must have less than :value items.',
        'file' => ':attribute must be less than :value kilobytes.',
        'numeric' => ':attribute must be less than :value.',
        'string' => ':attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => ':attribute must not have more than :value items.',
        'file' => ':attribute must be less than or equal to :value kilobytes.',
        'numeric' => ':attribute must be less than or equal to :value.',
        'string' => ':attribute must be less than or equal to :value characters.',
    ],
    'mac_address' => ':attribute must be a valid MAC address.',
    'max' => [
        'array' => ':attribute must not have more than :max items.',
        'file' => ':attribute must not be greater than :max kilobytes.',
        'numeric' => ':attribute must not be greater than :max.',
        'string' => ':attribute must not be greater than :max characters.',
    ],
    'mimes' => ':attribute must be a file of type: :values.',
    'mimetypes' => ':attribute must be a file of type: :values.',
    'min' => [
        'array' => ':attribute must have at least :min items.',
        'file' => ':attribute must be at least :min kilobytes.',
        'numeric' => ':attribute must be at least :min.',
        'string' => ':attribute must be at least :min characters.',
    ],
    'multiple_of' => ':attribute must be a multiple of :value.',
    'not_in' => ':attribute is invalid.',
    'not_regex' => ':attribute format is invalid.',
    'numeric' => ':attribute must be a number.',
    'password' => ':attribute is incorrect.',
    'phone' => ':attribute is invalid for this country.',
    'present' => ':attribute must be present.',
    'prohibited' => ':attribute is prohibited.',
    'prohibited_if' => ':attribute is prohibited when :other is :value.',
    'prohibited_unless' => ':attribute is prohibited unless :other is in :values.',
    'prohibits' => ':attribute prohibits :other from being present.',
    'regex' => ':attribute format is invalid.',
    'required' => ':attribute is required.',
    'required_array_keys' => ':attribute must contain entries for: :values.',
    'required_if' => ':attribute is required when :other is :value.',
    'required_unless' => ':attribute is required unless :other is in :values.',
    'required_with' => ':attribute is required when :values is present.',
    'required_with_all' => ':attribute is required when :values are present.',
    'required_without' => ':attribute is required when :values is not present.',
    'required_without_all' => ':attribute is required when none of :values are present.',
    'same' => ':attribute and :other must match.',
    'size' => [
        'array' => ':attribute must contain :size items.',
        'file' => ':attribute must be :size kilobytes.',
        'numeric' => ':attribute must be :size.',
        'string' => ':attribute must be :size characters.',
    ],
    'starts_with' => ':attribute must start with one of the following: :values.',
    'string' => ':attribute must be a string.',
    'timezone' => ':attribute must be a valid timezone.',
    'unique' => ':attribute has already been taken.',
    'uploaded' => ':attribute failed to upload.',
    'url' => ':attribute must be a valid URL.',
    'uuid' => ':attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'code' => __('code'),
        'confirmPassword' => __('confirm password'),
        'confirmNewPassword' => __('confirm new password'),
        'countryId' => __('country'),
        'currencyId' => __('currency'),
        'currentPassword' => __('current password'),
        'description' => __('description'),
        'dob' => __('dob'),
        'fee' => __('fee'),
        'file' => __('file'),
        'email' => __('email'),
        'gender' => __('gender'),
        'idNo' => __('id no'),
        'inventoryId' => __('inventory'),
        'invoiceId' => __('invoice'),
        'name' => __('name'),
        'newPassword' => __('new password'),
        'number' => __('phone number'),
        'orderId' => __('order'),
        'passportNo' => __('passport no'),
        'password' => __('password'),
        'phoneId' => __('phone number'),
        'point' => __('point'),
        'productId' => __('product'),
        'quantity' => __('quantity'),
        'referralCode' => __('referral code'),
        'socialId' => __('social id'),
        'socialPlatform' => __('social platform'),
        'stateId' => __('state'),
        'status' => __('status'),
        'symbol' => __('symbol'),
        'trackingNo' => __('tracking no'),
        'type' => __('type'),
        'unit' => __('unit'),
    ],

];
