<?php

namespace Database\Seeders;

use App\Enums\Attribute\AttributeBelongEnum;
use App\Enums\Attribute\AttributeTypeEnum;
use App\Models\AliField;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\OzonField;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UpdateAttributeSeeder extends Seeder
{
    public function run(): void
    {
        if (Attribute::query()->count() > 0) {
            Attribute::query()->truncate();
        }
        if (OzonField::query()->count() > 0) {
            OzonField::query()->whereIn('id', OzonField::query()->select('id')->pluck('id')->toArray())->delete();
        }
        if (AliField::query()->count() > 0) {
            AliField::query()->whereIn('id', AliField::query()->select('id')->pluck('id')->toArray())->delete();
        }

        $this->call(AliFieldsSeeder::class);
        $this->call(OzonFieldsSeeder::class);

        $aliFields  = AliField::query()->select('id', 'name', 'value', 'type', 'description', 'is_required')->get();
        $ozonFields = OzonField::query()->select('id', 'name', 'value', 'type', 'description', 'is_required')->get();

        $this->handCompareAllAttributes($aliFields, $ozonFields);
    }

    public function handCompareAllAttributes($aliFields, $ozonFields): void
    {
        $categories = Category::query()
            ->where('parent_id', '=', 0)
            ->with([
                'children' => fn ($q) => $q->with([
                    'children' => fn ($q) => $q->select('id', 'parent_id', 'name')
                ])->select('id', 'parent_id', 'name')
            ])->select('id', 'parent_id', 'name')->orderBy('parent_id')
            ->get();

        $data = [
            'category id' => [
                'is_required'   => true,
                'description'   => 'Категория КТ, укажите категорию из списка.',
                'type'          => AttributeTypeEnum::SELECT,
                'belong'        => AttributeBelongEnum::PRODUCT_INFORMATION,
                'value'         => collect($categories)->toArray(),
                'ozon_field_id' => null,
                'ali_field_id'  => null
            ],
            'name'          => [
                'is_required'   => true,
                'description'   => 'Наименование номенклатуры, кт товара. До 250 символов',
                'type'          => AttributeTypeEnum::STRING,
                'belong'        => AttributeBelongEnum::PRODUCT_INFORMATION,
                'value'         => null,
                'ozon_field_id' => $ozonFields->where('name', 'name')->first()?->id,
                'ali_field_id'  => $aliFields->where('name', 'multi_language_subject_list[subject]')->first()?->id,
            ],
            'description'   => [
                'is_required'   => true,
                'description'   => 'Описание товара с номенклатуры.',
                'type'          => AttributeTypeEnum::TEXT,
                'belong'        => AttributeBelongEnum::PRODUCT_INFORMATION,
                'value'         => null,
                'ozon_field_id' => null,
                'ali_field_id'  => $aliFields->where('name', 'multi_language_description_list[web]')->first()?->id,
            ],
            'brand name'    => [
                'is_required'   => true,
                'description'   => 'Бренд товара.',
                'belong'        => AttributeBelongEnum::PRODUCT_INFORMATION,
                'type'          => AttributeTypeEnum::READONLY,
                'value'         => null,
                'ozon_field_id' => null,
                'ali_field_id'  => null,
            ],
            'barcode'       => [
                'is_required'   => false,
                'description'   => 'Штрихкод.',
                'belong'        => AttributeBelongEnum::PRODUCT_INFORMATION,
                'type'          => AttributeTypeEnum::STRING,
                'value'         => null,
                'ozon_field_id' => $ozonFields->where('name', 'barcode')->first()?->id,
                'ali_field_id'  => $aliFields->where('name', 'sku_info_list[sku_code]')->first()?->id,
            ],
            'article'       => [
                'is_required'   => true,
                'description'   => 'Артикул товара.',
                'belong'        => AttributeBelongEnum::PRODUCT_INFORMATION,
                'type'          => AttributeTypeEnum::READONLY,
                'value'         => null,
                'ozon_field_id' => $ozonFields->where('name', 'offer_id')->first()?->id,
                'ali_field_id'  => $aliFields->where('name', 'sku_info_list[sku_code]')->first()?->id,
            ],
            'expiration date' => [
                'is_required'   => false,
                'description'   => 'Укажите срок годности, сроки службы, гарантийные сроки.',
                'type'          => AttributeTypeEnum::STRING,
                'belong'        => AttributeBelongEnum::PRODUCT_INFORMATION,
                'value'         => null,
                'ozon_field_id' => null,
                'ali_field_id'  => null,
            ],
            'original price'         => [
                'is_required'   => true,
                'description'   => 'Исходная цена.',
                'type'          => AttributeTypeEnum::READONLY,
                'belong'        => AttributeBelongEnum::PRODUCT_INFORMATION,
                'value'         => null,
                'ozon_field_id' => null,
                'ali_field_id'  => null,
            ],
//            'price'         => [
//                'is_required'   => false,
//                'description'   => 'Текущая цена товара.',
//                'type'          => AttributeTypeEnum::FLOAT,
//                'belong'        => AttributeBelongEnum::PRODUCT_INFORMATION,
//                'value'         => null,
//                'ozon_field_id' => $ozonFields->where('name', 'price')->first()?->id,
//                'ali_field_id'  => $aliFields->where('name', 'sku_info_list[price]')->first()?->id,
//            ],
//            'old price'     => [
//                'is_required'   => false,
//                'description'   => 'Цена товара, без скидок, цена перечеркнутая в КТ.',
//                'type'          => AttributeTypeEnum::FLOAT,
//                'belong'        => AttributeBelongEnum::PRODUCT_INFORMATION,
//                'value'         => null,
//                'ozon_field_id' => $ozonFields->where('name', 'old_price')->first()?->id,
//                'ali_field_id'  => $aliFields->where('name', 'sku_info_list[discount_price]')->first()?->id,
//            ],
//            'premium price' => [
//                'is_required'   => false,
//                'description'   => 'Цена для клиентов с подпиской Ozon Premium.',
//                'type'          => AttributeTypeEnum::FLOAT,
//                'belong'        => AttributeBelongEnum::PRODUCT_INFORMATION,
//                'value'         => null,
//                'ozon_field_id' => $ozonFields->where('name', 'old_price')->first()?->id,
//                'ali_field_id'  => null,
//            ],
            'vat'     => [
                'is_required'   => true,
                'description'   => 'Ставка НДС для товара: 0 — не облагается НДС, 0.1 — 10%, 0.2 — 20%.',
                'type'          => AttributeTypeEnum::SELECT,
                'belong'        => AttributeBelongEnum::PRODUCT_INFORMATION,
                'value'         => [
                    ['id' => "0", 'name' => 'не облагается НДС'],
                    ['id' => "0.1", 'name' => '10%'],
                    ['id' => "0.2", 'name' => '20%']
                ],
                'ozon_field_id' => $ozonFields->where('name', 'vat')->first()?->id,
                'ali_field_id'  => null,
            ],
            'currency code' => [
                'is_required'   => true,
                'description'   => 'Валюта ваших цен. Переданное значение должно совпадать с валютой, которая установлена в настройках личного кабинета. По умолчанию передаётся RUB — российский рубль.',
                'type'          => AttributeTypeEnum::SELECT,
                'belong'        => AttributeBelongEnum::AUTODETECT,
                'value'         => [
                    ['id' => 'RUB', 'name' => 'российский рубль'],
                    ['id' => 'BYN', 'name' => 'белорусский рубль'],
                    ['id' => 'KZT', 'name' => 'тенге'],
                    ['id' => 'EUR', 'name' => 'евро'],
                    ['id' => 'USD', 'name' => 'доллар США'],
                    ['id' => 'CNY', 'name' => 'юань']
                ],
                'ozon_field_id' => $ozonFields->where('name', 'currency_code')->first()?->id,
                'ali_field_id'  => null
            ],
//            'pdf_list'      => [
//                'is_required'   => false,
//                'description'   =>  'Список PDF-файлов. \n
//                     index -  integer \<int64\> Индекс документа в хранилище, который задаёт порядок. \n
//                     name - string Название файла. \n
//                     src_url - string Адрес файла.',
//                'type'          => AttributeTypeEnum::STRING,
//                'belong'        => AttributeBelongEnum::MEDIA_SECTION,
//                'value'         => null,
//                'ozon_field_id' => $ozonFields->where('name', 'pdf_list')->first()?->id,
//                'ali_field_id'  => null
//            ],
            'service type'  => [
                'is_required'   => true,
                'description'   =>  "Default: \"IS_CODE_SERVICE\"
                    Тип сервиса. Передайте одно из значений в верхнем регистре:
                    IS_CODE_SERVICE,
                    IS_NO_CODE_SERVICE",
                'type'          => AttributeTypeEnum::SELECT,
                'belong'        => AttributeBelongEnum::AUTODETECT,
                'value'         => [
                    ['id' => 'IS_CODE_SERVICE', 'name' => 'IS_CODE_SERVICE'],
                    ['id' => 'IS_NO_CODE_SERVICE', 'name' => 'IS_NO_CODE_SERVICE']
                ],
                'ozon_field_id' => $ozonFields->where('name', 'service_type')->first()?->id,
                'ali_field_id'  => null
            ],
            'language' => [
                'is_required'   => true,
                'description'   => 'Язык карточки товара по умолчанию. Передайте значение ru.',
                'type'          => AttributeTypeEnum::STRING,
                'belong'        => AttributeBelongEnum::AUTODETECT,
                'value'         => [
                    ['id' => 'ru', 'name' => 'RU']
                ],
                'ozon_field_id' => null,
                'ali_field_id'  => $aliFields->where('name', 'language')->first()?->id,
            ],
            'inventory'     => [
                'is_required'   => true,
                'description'   => 'Oстаток товара на складе от 1 до 999999.',
                'type'          => AttributeTypeEnum::INTEGER,
                'belong'        => AttributeBelongEnum::AUTODETECT,
                'value'         => null,
                'ozon_field_id' => null,
                'ali_field_id'  => $aliFields->where('name', 'sku_info_list[inventory]')->first()?->id,
            ],

//            DIMENSIONS_WEIGHT (габариты и вес)
            'weight unit' => [
                'is_required'   => true,
                'description'   => 'Единица измерения веса (ozon). g — граммы, kg — килограммы, lb — фунты. По умолчанию указывайте вес в граммах. Введенные значения будут конвертироваться в граммы.',
                'type'          => AttributeTypeEnum::SELECT,
                'belong'        => AttributeBelongEnum::AUTODETECT,
                'value'         => [
                    ['id' => 'g', 'name' => 'граммы'],
                    ['id' => 'kg', 'name' => 'килограммы'],
                    ['id' => 'lb', 'name' => 'фунты']
                ],
                'ozon_field_id' => $ozonFields->where('name', 'weight_unit')->first()?->id,
                'ali_field_id'  => null
            ],
            'dimension unit' => [
                'is_required'   => true,
                'description'   => 'Единица измерения габаритов (ozon): mm -миллиметры, cm - сантиметры, in -дюймы. \n По умолчанию все размеры конвертируются в миллиметры.',
                'type'          => AttributeTypeEnum::SELECT,
                'belong'        => AttributeBelongEnum::AUTODETECT,
                'value'         => [
                    ['id' => 'mm', 'name' => 'миллиметры'],
                    ['id' => 'cm', 'name' => 'сантиметры'],
                    ['in' => 'cm', 'name' => 'дюймы'],
                ],
                'ozon_field_id' => $ozonFields->where('name', 'dimension_unit')->first()?->id,
                'ali_field_id'  => null
            ],
            'size length'   => [
                'is_required'   => true,
                'description'   => 'Длина товара (mm).',
                'type'          => AttributeTypeEnum::FLOAT,
                'belong'        => AttributeBelongEnum::DIMENSIONS_WEIGHT,
                'value'         => null,
                'ozon_field_id' => $ozonFields->where('name', 'depth')->first()?->id,
                'ali_field_id'  => $aliFields->where('name', 'package_length')->first()?->id,
            ],
            'size height'   => [
                'is_required'   => true,
                'description'   => 'Высота товара (mm).',
                'type'          => AttributeTypeEnum::FLOAT,
                'belong'        => AttributeBelongEnum::DIMENSIONS_WEIGHT,
                'value'         => null,
                'ozon_field_id' => $ozonFields->where('name', 'height')->first()?->id,
                'ali_field_id'  => $aliFields->where('name', 'package_height')->first()?->id,
            ],
            'size width'    => [
                'is_required'   => true,
                'description'   => 'Ширина товара (mm).',
                'type'          => AttributeTypeEnum::FLOAT,
                'belong'        => AttributeBelongEnum::DIMENSIONS_WEIGHT,
                'value'         => null,
                'ozon_field_id' => $ozonFields->where('name', 'width')->first()?->id,
                'ali_field_id'  => $aliFields->where('name', 'package_width')->first()?->id,
            ],
            'net weight'    => [
                'is_required'   => true,
                'description'   => 'Вес нетто товара (гр). Укажите вес в граммах.',
                'type'          => AttributeTypeEnum::FLOAT,
                'belong'        => AttributeBelongEnum::DIMENSIONS_WEIGHT,
                'value'         => null,
                'ozon_field_id' => $ozonFields->where('name', 'weight')->first()?->id,
                'ali_field_id'  => $aliFields->where('name', 'weight')->first()?->id,
            ],
            'volume'        => [
                'is_required'   => false,
                'description'   => 'Объем товара (м3). default(0.000)',
                'type'          => AttributeTypeEnum::FLOAT,
                'belong'        => AttributeBelongEnum::DIMENSIONS_WEIGHT,
                'value'         => null,
                'ozon_field_id' => null,
                'ali_field_id'  => null,
            ],
            'volume liters' => [
                'is_required'   => false,
                'description'   => 'Объем в литрах.',
                'type'          => AttributeTypeEnum::FLOAT,
                'belong'        => AttributeBelongEnum::DIMENSIONS_WEIGHT,
                'value'         => null,
                'ozon_field_id' => null,
                'ali_field_id'  => null,
            ],
            'volume weight' => [
                'is_required'   => false,
                'description'   => 'Объемный вес.',
                'type'          => AttributeTypeEnum::FLOAT,
                'belong'        => AttributeBelongEnum::DIMENSIONS_WEIGHT,
                'value'         => null,
                'ozon_field_id' => null,
                'ali_field_id'  => null,
            ],
            'product unit'  => [
                'is_required'   => true,
                'description'   => "Единица измерения товара. Пара, упаĸовĸа/упаĸовĸи, штуĸа/штуĸи, комплеĸт/ĸомплеĸты, квадратный метр.",
                'type'          => AttributeTypeEnum::SELECT,
                'belong'        => AttributeBelongEnum::DIMENSIONS_WEIGHT,
                'value'         => [
                    ['id' => '100000013', 'name' => 'пара'],
                    ['id' => '100000014', 'name' => 'упаĸовĸа/упаĸовĸи'],
                    ['id' => '100000015', 'name' => 'штуĸа/штуĸи'],
                    ['id' => '100000017', 'name' => 'ĸомплеĸт/ĸомплеĸты'],
                    ['id' => '100000019', 'name' => 'ĸвадратный метр']
                ],
                'ozon_field_id' => null,
                'ali_field_id'  => $aliFields->where('name', 'product_unit')->first()?->id,
            ],

//            MEDIA
//            'preview image' => [
//                'is_required'   => false,
//                'description'   => 'Изображение товара превью',
//                'type'          => AttributeTypeEnum::FILE,
//                'belong'        => AttributeBelongEnum::MEDIA_SECTION,
//                'value'         => null,
//                'ozon_field_id' => null,
//                'ali_field_id'  => null,
//            ],
            'images' => [
                'is_required'   => true,
                'description'   => 'Массив изображений. До 15 штук. Изображения показываются на сайте в таком же порядке, как в массиве.
                    Если не передать значение primary_image, первое изображение в массиве будет главным для товара.
                    Если вы передали значение primary_image, передайте до 14 изображений. Если параметр primary_image пустой, передайте до 15 изображений.
                    Формат: адрес ссылки на изображение в общедоступном облачном хранилище. Формат изображения по ссылке — JPG или PNG.',
                'type'          => AttributeTypeEnum::FILE,
                'belong'        => AttributeBelongEnum::MEDIA_SECTION,
                'value'         => null,
                'ozon_field_id' => $ozonFields->where('name', 'images')->first()?->id,
                'ali_field_id'  => $aliFields->where('name', 'main_image_urls_list')->first()?->id,
            ],

//          UNDEFINED
            'freight template id[aliexpress]' => [
                'is_required'   => true,
                'description'   => 'Идентификатор шаблона доставки. Подключается в магазине продавца. Загружается из магазина продовца.',
                'type'          => AttributeTypeEnum::INTEGER,
                'belong'        => AttributeBelongEnum::UNDEFINED,
                'value'         => null,
                'ozon_field_id' => null,
                'ali_field_id'  => $aliFields->where('name', 'freight_template_id')->first()?->id,
            ]
        ];

        $attributes = [];
        foreach ($data as $key => $field) {
            Attribute::query()->updateOrCreate([
                'name'          => $key
            ], [
                'slug'          => Str::slug($key, '_'),
                'description'   => $field['description'],
                'type'          => $field['type'],
                'value'         => $field['value'], //(is_object($field['value'])) ? $field['value'] : collect($field['value']),//json_encode($field['value'], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES),
                'belong'        => $field['belong'],
                'is_required'   => $field['is_required'],
                'ozon_field_id' => $field['ozon_field_id'] ?? null,
                'ali_field_id'  => $field['ali_field_id'] ?? null,
            ]);
        }

//        DB::table('attributes')->insert($attributes);
    }
}
