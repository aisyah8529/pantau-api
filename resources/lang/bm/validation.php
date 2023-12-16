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

    'accepted' => ':attribute perlu diterima terlebih dahulu',
    'active_url' => ':attribute mengandungi URL yang tidak sah.',
    'after' => ':attribute perlu mengandungi tarikh selepas :date.',
    'after_or_equal' => ':attribute perlu mengandungi tarikh selepas atau sama dengan :date.',
    'alpha' => ':attribute hanya boleh mengandungi huruf.',
    'alpha_dash' => ':attribute hanya boleh mengandungi huruf, nombor, dan sengkang.',
    'alpha_num' => ':attribute hanya boleh mengandungi huruf dan nombor.',
    'array' => ':attribute perlu mengandungi elemen yang dipilih.',
    'before' => ':attribute perlu mengandungi tarikh sebelum :date.',
    'before_or_equal' => ':attribute perlu mengandungi tarikh sebelum atau sama dengan :date.',
    'between' => [
        'numeric' => ':attribute perlu mengandungi nilai di antara :min - :max.',
        'file' => ':attribute perlu mengandungi saiz di antara :min - :max kilobytes.',
        'string' => ':attribute perlu mengandungi huruf di antara :min - :max.',
        'array' => ':attribute perlu mengandungi elemen di antara :min - :max.',
    ],
    'boolean' => ':attribute perlu mengandungi nilai betul atau salah.',
    'confirmed' => ':attribute pengesahan tidak sepadan.',
    'current_password' => ':attribute salah.',
    'date' => ':attribute mempunyai tarikh yang tidak sah.',
    'date_equals' => ':attribute perlu mengandungi tarikh sama dengan :date.',
    'date_format' => ':attribute tidak sepadan dengan format :format.',
    'different' => ':attribute dan :other perlu mengandungi nilai yang berbeza.',
    'digits' => ':attribute perlu mengandungi :digits digit.',
    'digits_between' => ':attribute perlu mengandungi nilai di antara :min - :max digits.',
    'dimensions' => ':attribute mempunyai dimensi gambar yang tidak sah.',
    'distinct' => ':attribute mempunyai nilai yang berulang.',
    'email' => ':attribute perlu mengandungi alamat emel yang sah.',
    'ends_with' => ':attribute perlu berakhir dengaan salah satu nilai berikut: :values.',
    'enum' => ':attribute yang dipilih tidak sah.',
    'enum_key' => ':attribute yang dipilih tidak sah.',
    'enum_value' => ':attribute yang dipilih tidak sah.',
    'exists' => ':attribute tidak dijumpai.',
    'file' => ':attribute perlu sebagai fail.',
    'filled' => ':attribute perlu mempunyai nilai.',
    'gt' => [
        'numeric' => ':attribute perlu lebih besar daripada :value.',
        'file' => ':attribute perlu lebih besar daripada :value kilobytes.',
        'string' => ':attribute perlu lebih besar daripada :value karakter.',
        'array' => ':attribute perlu lebih banyak daripada :value item.',
    ],
    'gte' => [
        'numeric' => ':attribute perlu lebih besar daripada atau sama dengan :value.',
        'file' => ':attribute perlu lebih besar daripada atau sama dengan :value kilobytes.',
        'string' => ':attribute perlu lebih besar daripada atau sama dengan :value karakter.',
        'array' => ':attribute perlu mempunyai :value item atau lebih.',
    ],
    'image' => ':attribute perlu sebagai gambar.',
    'in' => ':attribute dipilih tidak sah.',
    'in_array' => ':attribute tidak ada dalam :other.',
    'integer' => ':attribute perlu sebagai nombor.',
    'ip' => ':attribute perlu sebagai alamat IP yang sah.',
    'ipv4' => ':attribute perlu sebagai alamat IPv4 yang sah.',
    'ipv6' => ':attribute perlu sebagai alamat IPv6 yang sah.',
    'json' => ':attribute perlu sebagai alamat JSON yang sah.',
    'lt' => [
        'numeric' => ':attribute perlu kurang daripada :value.',
        'file' => ':attribute perlu kurang daripada :value kilobytes.',
        'string' => ':attribute perlu kurang daripada :value karakter.',
        'array' => ':attribute perlu kurang daripada :value item.',
    ],
    'lte' => [
        'numeric' => ':attribute perlu kurang daripada atau sama dengan :value.',
        'file' => ':attribute perlu kurang daripada atau sama dengan :value kilobytes.',
        'string' => ':attribute perlu kurang daripada atau sama dengan :value karakter.',
        'array' => ':attribute tidak boleh melebihi daripada :value item.',
    ],
    'max' => [
        'numeric' => ':attribute tidak boleh lebih besar daripada :max.',
        'file' => ':attribute tidak boleh lebih besar daripada :max kilobytes.',
        'string' => ':attribute tidak boleh lebih besar daripada :max karakter.',
        'array' => ':attribute tidak boleh lebih banyak daripada :max item.',
    ],
    'mimes' => ':attribute perlu sebagai fail jenis: :values.',
    'mimetypes' => ':attribute perlu sebagai fail jenis: :values.',
    'min' => [
        'numeric' => ':attribute perlu sekurang-kurangnya :min.',
        'file' => ':attribute perlu sekurang-kurangnya :min kilobytes.',
        'string' => ':attribute perlu sekurang-kurangnya :min karakter.',
        'array' => ':attribute perlu sekurang-kurangnya :min item.',
    ],
    'multiple_of' => ':attribute perlu sebagai gandaan kepada :value',
    'not_in' => ':attribute yang dipilih tidak sah.',
    'not_regex' => ':attribute mengandungi format yang tidak sah.',
    'numeric' => ':attribute perlu sebagai nombor.',
    'password' => ':attribute salah.',
    'phone' => ':attribute tidak sah untuk negara ini.',
    'present' => ':attribute perlu diisi.',
    'regex' => ':attribute mempunyai format yang tidak sah',
    'required' => ':attribute perlu diisi.',
    'required_if' => ':attribute perlu diisi apabila :other ialah :value.',
    'required_unless' => ':attribute perlu diisi melainkan :other ialah dalam :values.',
    'required_with' => ':attribute perlu diisi apabila :values diisi.',
    'required_with_all' => ':attribute perlu diisi apabila :values diisi.',
    'required_without' => ':attribute perlu diisi apabila :values tidak diisi.',
    'required_without_all' => ':attribute perlu diisi apabila tiada salah antara :values diisi.',
    'same' => ':attribute dan :other perlu mempunyai nilai yang sama.',
    'size' => [
        'numeric' => ':attribute perlu mempunyai :size.',
        'file' => ':attribute perlu mempunyai :size kilobytes.',
        'string' => ':attribute perlu mempunyai :size karakter.',
        'array' => ':attribute perlu mengandungi :size item.',
    ],
    'starts_with' => ':attribute perlu bermula dengan salah satu nilai berikut: :values.',
    'string' => ':attribute perlu mengandungi huruf.',
    'timezone' => ':attribute perlu mengandungi zon yang sah.',
    'unique' => ':attribute telah berdaftar.',
    'uploaded' => ':attribute gagal dimuat naik.',
    'url' => ':attribute format tidak sah.',
    'uuid' => ':attribute perlu mengandungi UUID yang sah.',
    'identity' => ':attribute tidak sah.',

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
        'email' => __('email'),
        'fee' => __('fee'),
        'file' => __('file'),
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
