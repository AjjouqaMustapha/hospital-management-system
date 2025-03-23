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

    'accepted' => 'يجب قبول :attribute.',
    'active_url' => ':attribute ليس عنوان URL صالحًا.',
    'after' => ':attribute يجب أن يكون تاريخًا بعد :date.',
    'after_or_equal' => ':attribute يجب أن يكون تاريخًا بعد أو يساوي :date.',
    'alpha' => 'يجب أن لا يحتوي :attribute سوى على حروف.',
    'alpha_dash' => 'يجب أن لا يحتوي :attribute سوى على حروف وأرقام وشرطات.',
    'alpha_num' => 'يجب أن لا يحتوي :attribute سوى على حروف وأرقام.',
    'array' => 'يجب أن يكون :attribute مصفوفة.',
    'before' => ':attribute يجب أن يكون تاريخًا قبل :date.',
    'before_or_equal' => ':attribute يجب أن يكون تاريخًا قبل أو يساوي :date.',
    'between' => [
        'numeric' => 'يجب أن يكون :attribute بين :min و :max.',
        'file' => 'يجب أن يكون :attribute بين :min و :max كيلوبايت.',
        'string' => 'يجب أن يكون :attribute بين :min و :max حرفًا.',
        'array' => 'يجب أن يكون :attribute بين :min و :max عنصرًا.',
    ],
    'boolean' => 'يجب أن يكون حقل :attribute صحيحًا أو خطأ.',
    'confirmed' => 'تأكيد :attribute غير متطابق.',
    'date' => ':attribute ليس تاريخًا صالحًا.',
    'date_equals' => ':attribute يجب أن يكون تاريخًا يساوي :date.',
    'date_format' => ':attribute لا يتطابق مع الشكل :format.',
    'different' => ':attribute و :other يجب أن يكونا مختلفين.',
    'digits' => 'يجب أن يتكون :attribute من :digits أرقام.',
    'digits_between' => 'يجب أن يكون :attribute بين :min و :max رقمًا.',
    'dimensions' => 'الـ:attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'للحقل :attribute قيمة مُكررة.',
    'email' => 'يجب أن يكون :attribute عنوان بريد إلكتروني صالحًا.',
    'ends_with' => 'يجب أن ينتهي :attribute بأحد القيم التالية: :values',
    'exists' => ':attribute المحدد غير صالح.',
    'file' => 'الـ:attribute يجب أن يكون ملفًا.',
    'filled' => 'يجب أن يحتوي الحقل :attribute على قيمة.',
    'gt' => [
        'numeric' => 'يجب أن يكون :attribute أكبر من :value.',
        'file' => 'يجب أن يكون :attribute أكبر من :value كيلوبايت.',
        'string' => 'يجب أن يكون :attribute أكبر من :value حرفًا.',
        'array' => 'يجب أن يحتوي :attribute على أكثر من :value عنصر.',
    ],
    'gte' => [
        'numeric' => 'يجب أن يكون :attribute أكبر من أو يساوي :value.',
        'file' => 'يجب أن يكون :attribute أكبر من أو يساوي :value كيلوبايت.',
        'string' => 'يجب أن يكون :attribute أكبر من أو يساوي :value حرفًا.',
        'array' => 'يجب أن يحتوي :attribute على :value عنصر أو أكثر.',
    ],
    'image' => 'يجب أن يكون :attribute صورة.',
    'in' => ':attribute المحدد غير صالح.',
    'in_array' => 'حقل :attribute غير موجود في :other.',
    'integer' => 'يجب أن يكون :attribute عددًا صحيحًا.',
    'ip' => 'يجب أن يكون :attribute عنوان IP صالحًا.',
    'ipv4' => 'يجب أن يكون :attribute عنوان IPv4 صالحًا.',
    'ipv6' => 'يجب أن يكون :attribute عنوان IPv6 صالحًا.',
    'json' => 'يجب أن يكون :attribute نص JSON صالحًا.',
    'lt' => [
        'numeric' => 'يجب أن يكون :attribute أصغر من :value.',
        'file' => 'يجب أن يكون :attribute أصغر من :value كيلوبايت.',
        'string' => 'يجب أن يكون :attribute أصغر من :value حرفًا.',
        'array' => 'يجب أن يحتوي :attribute على أقل من :value عنصر.',
    ],
    'lte' => [
        'numeric' => 'يجب أن يكون :attribute أصغر من أو يساوي :value.',
        'file' => 'يجب أن يكون :attribute أصغر من أو يساوي :value كيلوبايت.',
        'string' => 'يجب أن يكون :attribute أصغر من أو يساوي :value حرفًا.',
        'array' => 'يجب ألا يحتوي :attribute على أكثر من :value عنصر.',
    ],
    'max' => [
        'numeric' => 'يجب ألا يكون :attribute أكبر من :max.',
        'file' => 'يجب ألا يكون حجم :attribute أكبر من :max كيلوبايت.',
        'string' => 'يجب ألا يكون :attribute أكبر من :max حرفًا.',
        'array' => 'يجب ألا يحتوي :attribute على أكثر من :max عنصر.',
    ],
    'mimes' => 'يجب أن يكون :attribute ملف من النوع: :values.',
    'mimetypes' => 'يجب أن يكون :attribute ملف من النوع: :values.',
    'min' => [
        'numeric' => 'يجب أن يكون :attribute على الأقل :min.',
        'file' => 'يجب أن يكون حجم :attribute على الأقل :min كيلوبايت.',
        'string' => 'يجب أن يكون :attribute على الأقل :min حرفًا.',
        'array' => 'يجب أن يحتوي :attribute على الأقل :min عنصرًا.',
    ],
    'not_in' => ':attribute المحدد غير صالح.',
    'not_regex' => 'صيغة :attribute غير صالحة.',
    'numeric' => 'يجب على :attribute أن يكون رقمًا.',
    'password' => 'كلمة المرور غير صحيحة.',
    'present' => 'يجب تقديم الحقل :attribute.',
    'regex' => 'صيغة :attribute غير صالحة.',
    'required' => 'حقل :attribute مطلوب.',
    'required_if' => 'حقل :attribute مطلوب عندما :other يكون :value.',
    'required_if_accepted' => 'حقل :attribute مطلوب عندما :other يكون مقبولًا.',
    'required_if_not' => 'حقل :attribute مطلوب عندما :other ليس :value.',
    'required_unless' => 'حقل :attribute مطلوب ما لم :other يكون في :values.',
    'required_with' => 'حقل :attribute مطلوب عند توفر :values.',
    'required_with_all' => 'حقل :attribute مطلوب عند توفر :values.',
    'required_without' => 'حقل :attribute مطلوب عند عدم توفر :values.',
    'required_without_all' => 'حقل :attribute مطلوب عند عدم توفر :values.',
    'same' => ':attribute و :other يجب أن يتطابقا.',
    'size' => [
        'numeric' => 'يجب أن يكون :attribute :size.',
        'file' => 'يجب أن يكون حجم :attribute :size كيلوبايت.',
        'string' => 'يجب أن يحتوي :attribute على :size حرفًا.',
        'array' => 'يجب أن يحتوي :attribute على :size عنصرًا.',
    ],
    'starts_with' => 'يجب أن يبدأ :attribute بأحد القيم التالية: :values',
    'string' => 'يجب أن يكون :attribute نصًا.',
    'timezone' => 'يجب أن يكون :attribute منطقة صالحة.',
    'unique' => ':attribute تم استخدامه بالفعل.',
    'uploaded' => 'فشل في تحميل :attribute.',
    'uppercase' => 'الـ:attribute يجب أن تكون كلمات كبيرة.',
    'url' => 'صيغة الرابط :attribute غير صالحة.',
    'uuid' => ':attribute يجب أن يكون UUID صالحًا.',

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
        'name' => 'الاسم',
        'email' => 'البريد الإلكتروني',
        'password' => 'كلمة المرور',
        'phone' => 'الهاتف',
        'address' => 'العنوان',
        'city' => 'المدينة',
        'country' => 'الدولة',
        
    ],

];
