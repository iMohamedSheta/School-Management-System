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

    'accepted' => 'يجب قبول حقل :attribute',
    'accepted_if' => 'حقل :attribute مقبول في حال ما إذا كان :other يساوي :value.',
    'active_url' => 'حقل :attribute لا يُمثّل رابطًا صحيحًا',
    'after' => 'يجب على حقل :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal' => 'حقل :attribute يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha' => 'يجب أن لا يحتوي حقل :attribute سوى على حروف',
    'alpha_dash' => 'يجب أن لا يحتوي حقل :attribute على حروف، أرقام ومطّات.',
    'alpha_num' => 'يجب أن يحتوي :attribute على حروفٍ وأرقامٍ فقط',
    'array' => 'يجب أن يكون حقل :attribute ًمصفوفة',
    'ascii' => 'يجب ان يحتوي :attribute علي احرف ابجدية رقمية ورموز احادية البايت فقط.',
    'before' => 'يجب على حقل :attribute أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal' => 'حقل :attribute يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date',
    'between' => [
        'array' => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max',
        'file' => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'string' => 'يجب أن يكون عدد حروف النّص :attribute بين :min و :max',
    ],
    'boolean' => 'يجب أن تكون قيمة حقل :attribute إما true أو false ',
    'confirmed' => 'حقل التأكيد غير مُطابق للحقل :attribute',
    'current_password' => 'كلمة المرور غير صحيحة',
    'date' => 'حقل :attribute ليس تاريخًا صحيحًا',
    'date_equals' => 'لا يساوي حقل :attribute مع :date.',
    'date_format' => 'لا يتوافق حقل :attribute مع الشكل :format.',
    'decimal' => 'يجب ان يحتوي حقل :attribute علي :decimal اماكن عشرية.',
    'declined' => 'يجب رفض حقل :attribute',
    'declined_if' => 'حقل :attribute مرفوض في حال ما إذا كان :other يساوي :value.',
    'different' => 'يجب أن يكون حقلان :attribute و :other مُختلفان',
    'digits' => 'يجب أن يحتوي حقل :attribute على :digits رقمًا/أرقام',
    'digits_between' => 'يجب أن يحتوي حقل :attribute بين :min و :max رقمًا/أرقام',
    'dimensions' => 'الـ :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'للحقل :attribute قيمة مُكرّرة.',
    'doesnt_end_with' => 'حقل :attribute يجب ألا ينتهي بواحدة من القيم التالية: :values.',
    'doesnt_start_with' => 'حقل :attribute يجب ألا يبدأ بواحدة من القيم التالية: :values.',
    'email' => 'يجب أن يكون :attribute عنوان بريد إلكتروني صحيح البُنية',
    'ends_with' => 'الـ :attribute يجب ان ينتهي بأحد القيم التالية :value.',
    'enum' => 'حقل :attribute غير صحيح',
    'exists' => 'حقل :attribute لاغٍ',
    'file' => 'الـ :attribute يجب أن يكون من ملفا.',
    'filled' => 'حقل :attribute إجباري',
    'gt' => [
        'array' => 'الـ :attribute يجب ان يحتوي علي اكثر من :value عناصر/عنصر.',
        'file' => 'الـ :attribute يجب ان يكون اكبر من :value كيلو بايت.',
        'numeric' => 'الـ :attribute يجب ان يكون اكبر من :value.',
        'string' => 'الـ :attribute يجب ان يكون اكبر من :value حروفٍ/حرفًا.',
    ],
    'gte' => [
        'array' => 'الـ :attribute يجب ان يحتوي علي :value عناصر/عنصر او اكثر.',
        'file' => 'الـ :attribute يجب ان يكون اكبر من او يساوي :value كيلو بايت.',
        'numeric' => 'الـ :attribute يجب ان يكون اكبر من او يساوي :value.',
        'string' => 'الـ :attribute يجب ان يكون اكبر من او يساوي :value حروفٍ/حرفًا.',
    ],
    'image' => 'يجب أن يكون حقل :attribute صورةً',
    'in' => 'حقل :attribute لاغٍ',
    'in_array' => 'حقل :attribute غير موجود في :other.',
    'integer' => 'يجب أن يكون حقل :attribute عددًا صحيحًا',
    'ip' => 'يجب أن يكون حقل :attribute عنوان IP ذا بُنية صحيحة',
    'ipv4' => 'يجب أن يكون حقل :attribute عنوان IPv4 ذا بنية صحيحة.',
    'ipv6' => 'يجب أن يكون حقل :attribute عنوان IPv6 ذا بنية صحيحة.',
    'json' => 'يجب أن يكون حقل :attribute نصا من نوع JSON.',
    'lowercase' => 'حقل :attribute يجب ان يتكون من حروف صغيرة',
    'lt' => [
        'array' => 'الـ :attribute يجب ان يحتوي علي اقل من :value عناصر/عنصر.',
        'file' => 'الـ :attribute يجب ان يكون اقل من :value كيلو بايت.',
        'numeric' => 'الـ :attribute يجب ان يكون اقل من :value.',
        'string' => 'الـ :attribute يجب ان يكون اقل من :value حروفٍ/حرفًا.',
    ],
    'lte' => [
        'array' => 'الـ :attribute يجب ان يحتوي علي اكثر من :value عناصر/عنصر.',
        'file' => 'الـ :attribute يجب ان يكون اقل من او يساوي :value كيلو بايت.',
        'numeric' => 'الـ :attribute يجب ان يكون اقل من او يساوي :value.',
        'string' => 'الـ :attribute يجب ان يكون اقل من او يساوي :value حروفٍ/حرفًا.',
    ],
    'mac_address' => 'يجب أن يكون حقل :attribute عنوان MAC ذا بنية صحيحة.',
    'max' => [
        'array' => 'يجب أن لا يحتوي حقل :attribute على أكثر من :max عناصر/عنصر.',
        'file' => 'يجب أن لا يتجاوز حجم الملف :attribute :max كيلوبايت',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية أو أصغر لـ :max.',
        'string' => 'يجب أن لا يتجاوز طول نص :attribute :max حروفٍ/حرفًا',
    ],
    'max_digits' => 'حقل :attribute يجب ألا يحتوي أكثر من :max أرقام.',
    'mimes' => 'يجب أن يكون حقل ملفًا من نوع : :values.',
    'mimetypes' => 'يجب أن يكون حقل ملفًا من نوع : :values.',
    'min' => [
        'array' => 'يجب أن يحتوي حقل :attribute على الأقل على :min عُنصرًا/عناصر',
        'file' => 'يجب أن يكون حجم الملف :attribute على الأقل :min كيلوبايت',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية أو أكبر لـ :min.',
        'string' => 'يجب أن يكون طول نص :attribute على الأقل :min حروفٍ/حرفًا',
    ],
    'min_digits' => 'حقل :attribute يجب أن يحتوي :min أرقام على الأقل.',
    'missing' => 'حقل :attribute يجب ان بكون مفقودًا .',
    'missing_if' => 'حقل :attribute يجب ان يكون مفقودًا عندما :other هو :value.',
    'missing_unless' => 'حقل :attribute يجب ان يكون مفقودًا مالم يكن :other هو :value.',
    'missing_with' => 'يجب ان يكون حقل :attribute مفقودًا عندما تكون :values موجودة.',
    'missing_with_all' => 'يجب ان يكون حقل :attribute مفقودًا عندما تكون :values موجودة.',
    'multiple_of' => 'حقل :attribute يجب أن يكون من مضاعفات :value.',
    'not_in' => 'حقل :attribute لاغٍ',
    'not_regex' => 'حقل :attribute نوعه لاغٍ',
    'numeric' => 'يجب على حقل :attribute أن يكون رقمًا',
    'password' => [
        'letters' => 'يجب ان يشمل حقل :attribute على حرف واحد على الاقل.',
        'mixed' => 'يجب ان يشمل حقل :attribute على حرف واحد بصيغة كبيرة على الاقل وحرف اخر بصيغة صغيرة.',
        'numbers' => 'يجب ان يشمل حقل :attribute على رقم واحد على الاقل.',
        'symbols' => 'يجب ان يشمل حقل :attribute على رمز واحد على الاقل.',
        'uncompromised' => 'حقل :attribute تبدو غير آمنة. الرجاء اختيار قيمة اخرى.',
    ],
    'present' => 'يجب تقديم حقل :attribute',
    'prohibited' => 'حقل :attribute محظور',
    'prohibited_if' => 'حقل :attribute محظور في حال ما إذا كان :other يساوي :value.',
    'prohibited_unless' => 'حقل :attribute محظور في حال ما لم يكون :other يساوي :value.',
    'prohibits' => 'حقل :attribute يحظر :other من اي يكون موجود',
    'regex' => 'صيغة حقل :attribute .غير صحيحة',
    'required' => 'حقل :attribute مطلوب.',
    'required_array_keys' => 'حقل :attribute يجب ان يحتوي علي مدخلات للقيم التالية :values.',
    'required_if' => 'حقل :attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => 'حقل :attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with' => 'حقل :attribute إذا توفّر :values.',
    'required_with_all' => 'حقل :attribute إذا توفّر :values.',
    'required_without' => 'حقل :attribute إذا لم يتوفّر :values.',
    'required_without_all' => 'حقل :attribute إذا لم يتوفّر :values.',
    'same' => 'يجب أن يتطابق حقل :attribute مع :other',
    'size' => [
        'array' => 'يجب أن يحتوي حقل :attribute على :size عنصرٍ/عناصر بالظبط',
        'file' => 'يجب أن يكون حجم الملف :attribute :size كيلوبايت',
        'numeric' => 'يجب أن تكون قيمة حقل :attribute مساوية لـ :size',
        'string' => 'يجب أن يحتوي النص :attribute على :size حروفٍ/حرفًا بالظبط',
    ],
    'starts_with' => 'حقل :attribute يجب ان يبدأ بأحد القيم التالية: :values.',
    'string' => 'يجب أن يكون حقل :attribute نصآ.',
    'timezone' => 'يجب أن يكون :attribute نطاقًا زمنيًا صحيحًا',
    'unique' => 'قيمة حقل :attribute مُستخدمة من قبل',
    'uploaded' => 'فشل في تحميل الـ :attribute',
    'uppercase' => 'يجب ان يكون :attribute من نوع الاحرف الكبيرة',
    'url' => 'صيغة الرابط :attribute غير صحيحة',
    'ulid' => 'يجب ان يكون حقل :attribute ULID صالحًا',
    'uuid' => 'حقل :attribute يجب ان ايكون رقم UUID صحيح.',

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
        'name'                  => 'الاسم',
        'username'              => 'اسم المُستخدم',
        'email'                 => 'البريد الالكتروني',
        'first_name'            => 'الاسم',
        'last_name'             => 'اسم العائلة',
        'password'              => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'city'                  => 'المدينة',
        'country'               => 'الدولة',
        'address'               => 'العنوان',
        'phone'                 => 'الهاتف',
        'mobile'                => 'الجوال',
        'age'                   => 'العمر',
        'sex'                   => 'الجنس',
        'gender'                => 'النوع',
        'day'                   => 'اليوم',
        'month'                 => 'الشهر',
        'year'                  => 'السنة',
        'hour'                  => 'ساعة',
        'minute'                => 'دقيقة',
        'second'                => 'ثانية',
        'content'               => 'المُحتوى',
        'description'           => 'الوصف',
        'excerpt'               => 'المُلخص',
        'date'                  => 'التاريخ',
        'time'                  => 'الوقت',
        'available'             => 'مُتاح',
        'size'                  => 'الحجم',
        'price'                 => 'السعر',
        'desc'                  => 'نبذه',
        'title'                 => 'العنوان',
        'q'                     => 'البحث',
        'link'                  => ' ',
        'slug'                  => ' ',
    ],

];
