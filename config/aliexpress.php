<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Aliexpress marketplace credentials.
    |--------------------------------------------------------------------------
    |
    */
    'credentials' => [
        'x-auth-token' => env('ALIEXPRESS_TOKEN'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Default aliexpress fields
    |--------------------------------------------------------------------------
    */
    'fields' => [

        'package_type' => [
            'type'          => 'boolean',
            'required'      => false,
            'description'   => 'Метод продаж: true - лотами, false - поштучно.'
        ],
//        'lot_num'   => [
//            'type'          => 'string',
//            'required'      => false,
//            'description'   => 'Количество товара в лоте. Обязательный параметр, если выбран метод продаж лотами (package_type: true).'
//        ],
        "multi_language_subject_list[subject]"        => [
            'type'          => 'string',
            'required'      => true,
            'description'   => 'Наименование, заголовок'
        ],
        "multi_language_description_list[language]"     => [
            'type'          => 'int',
            'required'      => false,
            'description'   => 'Язык описания товара. Для русского и английского есть автоперевод: если не передать описание на каком-то из этих языков, система добавит описание, переведённое автоматически.',
            'value'         => [
                'tr' => 'турецкий',
                'ru' => 'русский', // по умолчанию.
                'en' => 'английский',
            ]
        ],
        "multi_language_description_list[web]"      => [
            'type'          => 'string',
            'required'      => true,
            'description'   => 'Описание товара на сайте, можно передать HTML разметку или просто текст.'
        ],
        "multi_language_description_list[mobile]"   => [
            'type'          => 'string',
            'required'      => false,
            'description'   => 'Описание товара в мобильном приложении, можно передать HTML разметку или просто текст.'
        ],
        'package_height' => [
            'type'          => 'int',
            'required'      => true,
            'description'   => 'Высота упаковки в сантиметрах. Может принимать значение от 1 до 700 см.'
        ],
        'package_length' => [
            'type'          => 'int',
            'required'      => true,
            'description'   => 'Длина упаковки в сантиметрах. Может принимать значение от 1 до 700 см.'
        ],
        'package_width' => [
            'type'          => 'int',
            'required'      => true,
            'description'   => 'Ширина упаковки в сантиметрах. Может принимать значение от 1 до 700 см.'
        ],
        'weight' => [
            'type'          => 'string',
            'required'      => true,
            'description'   => 'Вес товара в упаковке (используется для расчёта доставки). Может принимать значение от 0,01 до 700 кг.'
        ],
        'product_unit' => [
            'type'          => 'select',
            'required'      => true,
            'description'   => "Единица измерения товара.
                100000013 — пара, 100000014 — упаĸовĸа/упаĸовĸи, 100000015 — штуĸа/штуĸи, 100000017 — ĸомплеĸт/ĸомплеĸты, 100000019 — ĸвадратный метр.",
            'value'         => [
                '100000013' => 'пара',
                '100000014' => 'упаĸовĸа/упаĸовĸи',
                '100000015' => 'штуĸа/штуĸи',
                '100000017' => 'ĸомплеĸт/ĸомплеĸты',
                '100000019' => 'ĸвадратный метр'
            ]
        ],
        'shipping_lead_time' => [
            'type'          => 'int',
            'required'      => false,
            'description'   => "Время на отправку заказа (время, за которое вы обязуетесь ввести трек-номер, если у вас своя логистика).,Значение от 1 до 30. Рекомендуем указывать не больше 5.,* Для FBS AliExpress и Почты России трек-номер генерируется автоматически. * Для FBA AliExpress укажите любое значение, оно автоматически заменится на 30."
        ],
        'bulk_discount' => [
            'type'          => 'int',
            'required'      => false,
            'description'   => "Процент скидки для оптовой покупки. Значение от 1 до 99.  Обязательно к заполнению если заполнен bulk_order."
        ],
        'bulk_order' => [
            'type'          => 'int',
            'required'      => false,
            'description'   => "Минимальное количество заказов для оптовой покупки. Значение от 2 до 100 000. Обязательно если выставлено значение: если заполнено bulk_discount."
        ],
        'language' => [
            'type'          => 'string',
            'required'      => true,
            'description'   => "Язык карточки товара по умолчанию. Передайте значение ru."
        ],
        'main_image_urls_list' => [
            'type'          => 'array',
            'required'      => true,
            'description'   => "Массив ссылок на основные изображения товара. Все ссылки должны быть прямыми, то есть вести на изображение на вашем сервере или на CDN AliExpress. От 1 до 6 ссылок. Формат — JPEG или PNG."
        ],
        // Массив вариаций (SKU) товара.
        'sku_info_list[sku_code]' => [
            'type'          => 'string',
            'required'      => true,
            'description'   => "Артикул или штрихкод вариации в вашей системе (задайте своё значение)."
        ],
        'sku_info_list[price]' => [
            'type'          => 'string',
            'required'      => true,
            'description'   => "Основная цена товара от 1 до 999999."
        ],
        'sku_info_list[discount_price]' => [
            'type'          => 'string',
            'required'      => false,
            'description'   => "Цена со скидкой."
        ],
        'sku_info_list[inventory]' => [
            'type'          => 'int',
            'required'      => true,
            'description'   => "Oстаток товара на складе от 1 до 999999."
        ],
        'sku_info_list[sku_image_url]' => [
            'type'          => 'object',
            'required'      => true,
            'description'   => "Ссылка на изображение атрибута вариации товара, для характеристик, у которых параметр has_customized_pic: true. (используется с атрибутами категории)"
        ],
        'sku_info_list[tnved_codes]' => [
            'type'          => 'object',
            'required'      => false,
            'description'   => "Классификатор товаров из товарной номенĸлатуры внешнеэĸономичесĸой деятельности, обязательный для некоторых категорий товаров. (используется с атрибутами категории)"
        ],
        'sku_info_list[gtin]' => [
            'type'          => 'object',
            'required'      => false,
            'description'   => "Глобальный номер товарной продуĸции в единой международной базе товаров GS1, для автоматического получения ТНВЭД или ОКПД2. (используется с атрибутами категории)"
        ],
        'sku_info_list[okpd2_codes]' => [
            'type'          => 'object',
            'required'      => false,
            'description'   => "Общероссийсĸий ĸлассифиĸатор продуĸции по видам эĸономичесĸой деятельности. Для товаров, производимых в РФ. (используется с атрибутами категории)"
        ],
    ],
];
