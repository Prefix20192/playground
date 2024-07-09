<?php

return [
    /*
    |--------------------------------------------------------------------------
    | OZON marketplace credentials.
    |--------------------------------------------------------------------------
    */
    'credentials' => [
        'Client-Id'     => env('OZON_CLIENT_ID'),
        'Api-Key'       => env('OZON_API_KEY'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Default ozon attribute fields
    |--------------------------------------------------------------------------
    */
    'fields' => [
        "name" => [
            'type'          => 'string',
            'required'      => true,
            'description'   => 'Название товара. До 500 символов.'
        ],
        "offer_id" => [
            'type'          => 'string',
            'required'      => true,
            'description'   => "Идентификатор товара в системе продавца — артикул. Максимальная длина строки — 50 символов"
        ],
        "barcode" => [
            'type'          => 'string',
            'required'      => false,
            'description'   => 'Штрихкод товара.'
        ],
        "depth" => [
            'type'          => 'int',
            'required'      => true,
            'description'   => 'Глубина упаковки.'
        ],
        "height" => [
            'type'          => 'int',
            'required'      => true,
            'description'   => 'Высота упаковки.'
        ],
        "width" => [
            'type'          => 'int',
            'required'      => true,
            'description'   => 'Ширина упаковки.'
        ],
        "weight_unit" => [
            'type'          => 'select',
            'required'      => true,
            'description'   => 'Единица измерения веса. g — граммы, kg — килограммы, lb — фунты.',
            'value'         => [
                'g'     => 'граммы',
                'kg'    => 'килограммы',
                'lb'    => 'фунты'
            ]
        ],
        "weight" => [
            'type'          => 'int',
            'required'      => true,
            'description'   => 'Вес товара в упаковке. Предельное значение — 1000 килограммов или конвертированная величина в других единицах измерения.'
        ],
        "dimension_unit" => [
            'type'          => 'select',
            'required'      => true,
            'description'   => 'Единица измерения габаритов: mm -миллиметры, cm - сантиметры, in -дюймы',
            'value'         => [
                'mm'     => 'миллиметры',
                'cm'     => 'сантиметры',
                'in'     => 'дюймы'
            ]
        ],
        "color_image" => [
            'type'          => 'string',
            'required'      => false,
            'description'   => 'Маркетинговый цвет. Формат: адрес ссылки на изображение в общедоступном облачном хранилище. Формат изображения по ссылке — JPG.'
        ],
        "primary_image" => [
            'type'          => 'string',
            'required'      => false,
            'description'   => 'Ссылка на главное изображение товара.'
        ],
        "images" =>  [
            'type'          => 'string',
            'required'      => true,
            'description'   => 'Массив изображений. До 15 штук. Изображения показываются на сайте в таком же порядке, как в массиве.
            Если не передать значение primary_image, первое изображение в массиве будет главным для товара.
            Если вы передали значение primary_image, передайте до 14 изображений. Если параметр primary_image пустой, передайте до 15 изображений.
            Формат: адрес ссылки на изображение в общедоступном облачном хранилище. Формат изображения по ссылке — JPG или PNG.'
        ],
        "images360" => [
            'type'          => 'string',
            'required'      => false,
            'description'   => 'Массив изображений 360. До 70 штук. \n
            *Формат: адрес ссылки на изображение в общедоступном облачном хранилище. Формат изображения по ссылке — JPG.'
        ],
        "price" => [
            'type'          => 'string',
            'required'      => true,
            'description'   => 'Цена товара с учётом скидок, отображается на карточке товара. Если на товар нет скидок, укажите значение old_price в этом параметре.'
        ],
        "old_price" => [
            'type'          => 'string',
            'required'      => false,
            'description'   => 'Цена до скидок (будет зачёркнута на карточке товара). Указывается в рублях. Разделитель дробной части — точка, до двух знаков после точки.

            Если вы раньше передавали old_price, то при обновлении price также обновите old_price'
        ],
        "premium_price" => [
            'type'          => 'float',
            'required'      => false,
            'description'   => 'Цена для клиентов с подпиской Ozon Premium.'
        ],
        "pdf_list" => [
            'type'          => 'array',
            'required'      => false,
            'description'   => 'Список PDF-файлов. \n
             index -  integer \<int64\> Индекс документа в хранилище, который задаёт порядок. \n
             name - string Название файла. \n
             src_url - string Адрес файла.'
        ],

        "vat" => [
            'type'          => 'select',
            'required'      => true,
            'description'   => 'Ставка НДС для товара: 0 — не облагается НДС, 0.1 — 10%, 0.2 — 20%',
            'value'         => [
                '0'      => 'не облагается НДС',
                '0.1'    => '10%',
                '0.2'    => '20%'
            ]
        ],
        "currency_code" => [
            'type'          => 'select',
            'required'      => false,
            'description'   => 'Валюта ваших цен. Переданное значение должно совпадать с валютой, которая установлена в настройках личного кабинета. По умолчанию передаётся RUB — российский рубль.',
            'value'         => [
                'RUB' => 'российский рубль',
                'BYN' => 'белорусский рубль',
                'KZT' => 'тенге',
                'EUR' => 'евро',
                'USD' => 'доллар США',
                'CNY' => 'юань'
            ]
        ],
        "service_type" => [
            'type'          => 'select',
            'required'      => true,
            'description'   => "Default: \"IS_CODE_SERVICE\"
            Тип сервиса. Передайте одно из значений в верхнем регистре:
            IS_CODE_SERVICE,
            IS_NO_CODE_SERVICE",
            'value'         => [
                'IS_CODE_SERVICE'       => 'IS_CODE_SERVICE',
                'IS_NO_CODE_SERVICE'    => 'IS_NO_CODE_SERVICE'
            ]
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Ozon список финансовых отчётов.
    |--------------------------------------------------------------------------
    */
    // Компенсация и прочие начисления.
    'finance_details_other_enum' => [
        'MarketplaceRedistributionOfAcquiringOperation'         => 'оплата эквайринга',
        'MarketplaceSellerCompensationLossOfGoodsOperation'     => 'компенсация за уничтоженный товар',
        'MarketplaceSellerCorrectionOperation '                 => 'корректировка стоимости услуг',
        'OperationCorrectionSeller'                             => 'инвентаризация взаиморасчётов',
        'OperationMarketplaceWithHoldingForUndeliverableGoods'  => 'компенсация за недовложение товаров',
        'OperationClaim '                                       => 'начисления по претензиям',
        'MarketplaceSellerCompensationOperation'                => 'компенсация площадки'
    ],

    //  Расходы на услуги
    'finance_details_service_enum' => [
        'MarketplaceServiceItemOtherMarketAndTechService'           => 'иные маркетинговые и технические услуги',
        'MarketplaceReturnStorageServiceAtThePickupPointFbsItem'    => 'краткосрочное размещение возврата FBS',
        'MarketplaceSaleReviewsItem'                                => 'приобретение отзывов на платформе',
        'MarketplaceServicePremiumCashbackIndividualPoints'         => 'услуга продвижения «Бонусы продавца»',
        'MarketplaceServiceStockDisposal'                           => 'утилизация со стока',
        'MarketplaceReturnDisposalServiceFbsItem'                   => 'утилизация FBS',
        'MarketplaceServiceItemFlexiblePaymentSchedule'             => 'услуга «Гибкий график выплат»',
        'MarketplaceServiceProcessingSpoilage'                      => 'обработка брака',
        'MarketplaceServiceProcessingIdentifiedSurplus'             => 'обработка опознанных излишков',
        'MarketplaceServiceProcessingIdentifiedDiscrepancies'       => 'бронирование места для размещения на складе',
        'MarketplaceServiceItemInternetSiteAdvertising'             => 'реклама на сайте Ozon',
        'MarketplaceServiceItemPremiumSubscribtion'                 => 'премиум-подписка',
        'MarketplaceAgencyFeeAggregator3PLGlobalItem'               => 'агентское вознаграждение Ozon',
        'MarketplaceServiceItemDefectRateDetailed'                  => 'подробная информация о проценте дефектов элементов услуг',
        'MarketplaceServiceItemPremiumPlusSubscribtion'             => 'подписка на сервис Premium Plus',
        'MarketplaceServiceItemVideoCover'                          => 'живая обложка сервисного пункта'
    ],

    // Плата за возвраты и отмены.
    'finance_details_return_enum' => [
        'MarketplaceServiceItemReturnAfterDelivToCustomer'  => 'обработка возвратов',
        'MarketplaceServiceItemReturnPartGoodsCustomer'     => 'обработка частичного невыкупа',
        'MarketplaceServiceItemReturnNotDelivToCustomer'    => 'обработка отменённых и невостребованных товаров',
        'MarketplaceServiceItemReturnFlowLogistic'          => 'обратная логистика',
        'MarketplaceServiceItemRedistributionReturnsPVZ'    => 'перераспределение возврат PVZ'
    ],
    // Заказы
    'finance_details_delivery_enum' => [
        'MarketplaceServiceItemDirectFlowLogisticSum'       => 'логистика',
        'MarketplaceServiceItemDirectFlowLogisticDC'        => 'логистика РЦ',
        'MarketplaceServiceItemDropoff'                     => 'обработка отправления Drop-off',
        'MarketplaceServiceItemDirectFlowTrans'             => 'магистраль',
        'MarketplaceServiceDCFlowTrans'                     => 'магистраль РЦ',
        'MarketplaceServiceItemFulfillment'                 => 'сборка заказа',
        'MarketplaceServiceItemDelivToCustomer'             => 'последняя миля'

    ],

    /*
    |--------------------------------------------------------------------------
    | Ozon: Ценовые индексы товара...
    |--------------------------------------------------------------------------
    */
    'price_indexes' => [
        'external_index_data'   => [
            'description'   => 'Цена товара у конкурентов на других площадках',
            'values'        => [
                'minimal_price'             => 'Минимальная цена товара у конкурентов на другой площадке',
                'minimal_price_currency'    => 'Валюта цены',
                'price_index_value'         => 'Значение индекса цены'
            ]
        ],
        'ozon_index_data'       => [
            'description'   => 'Цена товара у конкурентов на Ozon',
            'values'        => [
                'minimal_price'             => 'Минимальная цена',
                'minimal_price_currency'    => 'Валюта цены',
                'price_index_value'         => 'Значение индекса цены',
            ]

        ],
        'price_index'           => [
            'description'   => 'Итоговый ценовой индекс товара',
            'values'        => [
                'WITHOUT_INDEX' => 'без индекса',
                'PROFIT'        => 'выгодный',
                'AVG_PROFIT'    => 'умеренный',
                'NON_PROFIT'    => 'невыгодный'
            ]
        ],
        'self_marketplaces_index_data' => [
            'description'   => 'Цена вашего товара на других площадках',
            'values'        => [
                'minimal_price'             => 'Минимальная цена вашего товара на других площадках',
                'minimal_price_currency'    => 'Валюта цены',
                'price_index_value'         => 'Значение индекса цены',
            ]
        ]
    ],
    // Маркетинговые акции продавца.
    'marketing_actions' => [
        'actions' => [
            'title'     => [
                'description' => 'Название акции продавца.',
            ],
            'date_to'   => [
                'description' => 'Дата и время окончания акции продавца.'
            ],
            'date_from' => [
                'description' => 'Дата и время начала акции продавца.'
            ],
            'discount_value' => [
                'description' => 'Скидка по акции продавца.'
            ]
        ],
        'current_period_to'     => [
            'description' => 'Дата и время окончания текущего периода по всем действующим акциям.'
        ],
        'ozon_actions_exist'    => [
            'description'   => 'Если к товару может быть применена акция за счёт Ozon — true'
        ],
        'current_period_from'   => [
            'description'   => 'Дата и время начала текущего периода по всем действующим акциям.'
        ]
    ]
];
