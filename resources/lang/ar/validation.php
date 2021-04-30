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

    'accepted' => ' :attribute يجب قبوله.',
    'active_url' => ' :attribute ليس عنوان URL صالحًا.',
    'after' => ' :attribute must be a date after :date.',
    'after_or_equal' => ' :attribute يجب أن يكون تاريخًا بعد أو يساوي :date.',
    'alpha' => ' :attribute قد تحتوي على أحرف فقط.',
    'alpha_dash' => ' :attribute قد تحتوي فقط على أحرف وأرقام وشرطات وشرطات سفلية.',
    'alpha_num' => ' :attribute قد تحتوي فقط على أحرف وأرقام.',
    'array' => ' :attribute يجب أن يكون مصفوفة.',
    'before' => ' :attribute يجب أن يكون تاريخ قبل :date.',
    'before_or_equal' => ' :attribute يجب أن يكون تاريخًا قبل أو يساوي :date.',
    'between' => [
        'numeric' => ' :attribute يجب ان يكون وسطا :min و :max.',
        'file' => ' :attribute يجب ان يكون وسطا :min و :max كيلو بايت.',
        'string' => ' :attribute يجب ان يكون وسطا :min و :max احرف.',
        'array' => ' :attribute يجب أن يكون بين :min و :max عنصر.',
    ],
    'boolean' => ' :attribute يجب أن يكون الحقل صحيحًا أو خطأ.',
    'confirmed' => ' :attribute التأكيد غير متطابق.',
    'date' => ' :attribute هذا ليس تاريخ صحيح.',
    'date_equals' => ' :attribute يجب أن يكون تاريخًا مساويًا لـ :date.',
    'date_format' => ' :attribute لا يتطابق مع الشكل :format.',
    'different' => ' :attribute و :other يجب أن يكونو مختلفين.',
    'digits' => ' :attribute يجب أن يكون :digits رقم.',
    'digits_between' => ' :attribute يجب ان يكون وسطا :min و :max رقم.',
    'dimensions' => ' :attribute أبعاد الصورة غير صالحة.',
    'distinct' => ' :attribute الحقل له قيمة مكررة.',
    'email' => ' :attribute يجب أن يكون عنوان بريد إلكتروني صالح.',
    'ends_with' => ' :attribute يجب أن ينتهي بأحد following: :values.',
    'exists' => ' اختيارك :attribute ليس صحيح.',
    'file' => ' :attribute يجب أن يكون ملف.',
    'filled' => ' :attribute يجب أن يكون للحقل قيمة.',
    'gt' => [
        'numeric' => ' :attribute يجب أن يكون أكبر من :value.',
        'file' => ' :attribute يجب أن يكون أكبر من :value كيلو بايت.',
        'string' => ' :attribute يجب أن يكون أكبر من :value حرف.',
        'array' => ' :attribute يجب أن يكون أكثر من :value items.',
    ],
    'gte' => [
        'numeric' => ' :attribute يجب أن يكون أكبر من أو يساوي :value.',
        'file' => ' :attribute يجب أن يكون أكبر من أو يساوي :value كيلو بايت.',
        'string' => ' :attribute يجب أن يكون أكبر من أو يساوي :value حرف.',
        'array' => ' :attribute يجب أن يحتوي :value عنصر أو أكثر.',
    ],
    'image' => ' :attribute يجب أن يكون صورة.',
    'in' => ' اختيارك ل :attribute ليس صحيح.',
    'in_array' => ' :attribute الحقل غير موجود في :other.',
    'integer' => ' :attribute يجب أن يكون صحيحا.',
    'ip' => ' :attribute يجب أن يكون عنوان IP صالحًا.',
    'ipv4' => ' :attribute يجب أن يكون عنوان IPv4 صالحًا.',
    'ipv6' => ' :attribute يجب أن يكون عنوان IPv6 صالحًا.',
    'json' => ' :attribute يجب أن تكون سلسلة JSON صالحة.',
    'lt' => [
        'numeric' => ' :attributeيجب أن يكون أقل من :value.',
        'file' => ' :attributeيجب أن يكون أقل من :value كيلو بايت.',
        'string' => ' :attributeيجب أن يكون أقل من :value حرف.',
        'array' => ' :attributeيجب أن يكون أقل من :value عنصر.',
    ],
    'lte' => [
        'numeric' => ' :attribute يجب أن يكون أصغر من أو يساوي  :value.',
        'file' => ' :attribute يجب أن يكون أصغر من أو يساوي  :value كيلو بايت.',
        'string' => ' :attribute يجب أن يكون أصغر من أو يساوي  :value حرف.',
        'array' => ' :attribute must not have more than :value عنصر.',
    ],
    'max' => [
        'numeric' => ' :attribute قد لا يكون أكبر من :max.',
        'file' => ' :attribute قد لا يكون أكبر من :max كيلو بايت.',
        'string' => ' :attribute قد لا يكون أكبر من :max حرف.',
        'array' => ' :attribute قد لا يكون أكثر من :max عنصر.',
    ],
    'mimes' => ' :attribute يجب أن يكون ملف type: :values.',
    'mimetypes' => ' :attribute يجب أن يكون ملف type: :values.',
    'min' => [
        'numeric' => ' :attribute لا بد أن يكون على الأقل :min.',
        'file' => ' :attribute لا بد أن يكون على الأقل :min كيلو بايت.',
        'string' => ' :attribute لا بد أن يكون على الأقل :min حرف.',
        'array' => ' :attribute يجب أن يكون على الأقل :min عنصر.',
    ],
    'not_in' => ' اختيارك :attribute ليس صحيح.',
    'not_regex' => ' :attribute هذا الشكل غير صحيح .',
    'numeric' => ' :attribute يجب أن يكون رقم.',
    'password' => ' الرقم السري غير صحيح.',
    'present' => ' :attribute يجب أن يكون الحقل موجودًا.',
    'regex' => ' :attribute هذا الشكل غير صحيح.',
    'required' => ':attribute مطلوب .',
    'required_if' => ' :attribute أن يكون الحقل موجودًا. :other - :value.',
    'required_unless' => ' :attribute الحقل مطلوب ما لم يكن :other في :values.',
    'required_with' => ' :attribute الحقل مطلوب عندما :values يكون موجود.',
    'required_with_all' => ' :attribute الحقل مطلوب عندما :values بكون موجود.',
    'required_without' => ' :attribute الحقل مطلوب عندما :values لا يكون موجود.',
    'required_without_all' => ' :attribute الحقل مطلوب عندما  :values غير موجود.',
    'same' => ' :attribute و :other يجب أن تتطابق.',
    'size' => [
        'numeric' => ' :attribute يجب أن يكون :size.',
        'file' => ' :attribute يجب أن يكون :size كيلو بايت.',
        'string' => ' :attribute يجب أن يكون :size حرف.',
        'array' => ' :attribute يجب ان يحتوي علي  :size عنصر.',
    ],
    'starts_with' => ' :attribute يجب أن تبدأ بأحد following: :values.',
    'string' => ' :attribute يجب أن يكون نص.',
    'timezone' => ' :attribute يجب أن تكون منطقة صالحة.',
    'unique' => ' :attribute لقد اتخذت بالفعل.',
    'uploaded' => ' :attribute فشل الرفع.',
    'url' => ' :attribute غير صحيح.',
    'uuid' => ' :attribute يجب أن يكون UUID صالحًا.',

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
      'email' => 'البريد الإلكتروني',
      'phone' => 'الهاتف',
      'name_en' => 'الإسم باللغة الإنجليزية',
      'name_ar' => 'الاسم باللغة العربيه',
      'name' => 'الاسم',
      'password' =>'الرقم السري',
      'phone_number' =>'رقم الهاتف',
      'phone_1' =>'رقم الهاتف',
      'phone_2' =>'رقم الهاتف ',
      'gender' =>'الجنس',
      'governorate' => 'اسم المحافظه',
      'birthday' =>'العمر',
      'image' =>'الصورة',
      'valid' =>'تفعيل',
      'profile_pic' => 'الصورة' ,
      'clinic_images' => 'صور العيادة' ,
      'bio_ar' => 'نبذه تعريفية باللغة العربية',
      'bio_en' => 'نبذه تعريفيه باللغة الإنجليزية' ,
      'clinic_info_ar' => 'بيانات العيادة باللغة العربية' ,
      'clinic_info_en' => 'بيانات العيادة باللغة الإنجليزية' ,
      'clinic_service_en' => 'خدمات العيادة باللغة الإنجليزية' ,
      'clinic_service_ar' => 'خدمات العيادة باللغة العربية' ,
      'address_en' => 'العنوان باللغة الانجليزية' ,
      'address_ar' => 'العنوان باللغة العربية' ,
      'lat' => 'خط الطول' ,
      'long' => 'خط العرض' ,
      'price' => 'السعر' ,
      'overal_rate' => 'متوسط التقييمات' ,
      'count_watched' => 'عداد المشاهدات' ,
      'reset_code' => 'اعادة تعيين الكود' ,
      'from_date' => 'من تاريخ' ,
      'to_date' => 'الي تاريخ' ,
      'notified' => 'تنبيه' ,
      'active' => 'التفعيل' ,
      'valid' => 'التأكيد' ,
      'valid_code' => 'كود التأكيد' ,
      'is_emergenc' => 'حالة الطوارئ' ,
      'status' => 'الحالة' ,
      'type' => 'النوع' ,
      'reject_reason' => 'سبب الرفض' ,
      'city_id' => 'المحافظة' ,
      'district_id' => 'المدينة' ,
      'specialize_id' => 'التخصص' ,
      'title_id' => 'اللقب' ,
      'promoted_from' => 'تاريخ بدئ الاعلان' ,
      'promoted_to' => 'تاريخ انتهاء الاعلان' ,
      'image' => 'الصوره' ,
      'doctor_id' => 'الدكتور' ,
      'code' => 'الكود' ,
      'added_date' => 'اضافة التاريخ' ,
      'user_id' => 'المستخدم' ,
      'rate' => 'التقييم' ,
      'description' => 'الوصف' ,
      'title_ar' => 'العنوان باللغة العربية' ,
      'title_en' => 'العنوان باللغة الإنجليزية' ,
      'description_en' => 'الوصف باللغة الانجليزية' ,
      'description_ar' => 'الوصف باللغة العربية' ,
      'discount' => 'الخصم' ,
      'discount_pic' => 'صورة الخصم' ,
      'main_pic' => 'الصورة الرئيسية' ,
      'images' => 'الصور' ,
      'from_date' => 'من تاريخ' ,
      'to_date' => 'الي تاريخ' ,
      'watched' => 'المشاهدات' ,
      'highlighted' => 'مميز' ,
      'active' => 'نشط' ,
      'app_name_ar' => 'اسم التطبيق باللغة العربية' ,
      'app_name_en' => 'اسم التطبيق باللغة الإنجليزية' ,
      'app_description_en' => 'وصف التطبيق باللغة الانجليزية' ,
      'app_description_ar' => 'وصف التطبيق باللغة العربية' ,
      'app_logo' => 'اللوجو' ,
      'mobile' => 'الموبيل' ,
      'app_address_en' => 'العنوان باللغة الانجليزية' ,
      'app_address_ar' => 'العنوان باللغة العربية' ,
      'app_email' => 'البريد الالكتروني' ,
      'app_facebook' => 'لينك الفيسبوك' ,
      'app_linkedin' => 'لينك لينكد ان' ,
      'app_twitter' => 'لينك تويتر' ,
      'app_instgram' => 'لينك انستاجرام' ,
      'body_en' => 'الوصف باللغة الانجليزية' ,
      'body_ar' => 'الوصف باللغة العربية' ,
      'slug' => 'اختصار العنوان' ,
      'long' => 'خط الطول' ,
      'organization_id' => 'المؤسسة' ,
      'count_of_doctors' => 'عدد الدكاترة' ,
      'image_web_ar' => 'الصورة علي الموقع باللغة العربية' ,
      'image_web_en' => 'الصورة علي الموقع باللغة الإنجليزية' ,
      'image_mob_ar' => 'الصورة علي الموبيل باللغة العربية ' ,
      'image_mob_en' => 'الصورة علي الموبيل باللغة الإنجليزية' ,
      'insurance_companie_id' => 'شركة التأمين' ,
      'doctor_meshmesh_id' => 'الدكتور' ,
      'org_service_id' => 'خدمة المؤسسة' ,
      'coach_id ' => 'اسم المدرب' ,
      'branch_id ' => 'اسم الفرع' ,
      'notes' => 'حقل الملاحظات',
      'duration' => 'مدة التنفيذ',
    ],
];
