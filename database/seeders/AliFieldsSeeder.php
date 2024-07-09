<?php

namespace Database\Seeders;

use App\Models\AliField;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class AliFieldsSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Default aliexpress fields
        |--------------------------------------------------------------------------
        | aliexpress doc page: https://business.aliexpress.ru/docs/local-create-products
        */
        $fields = config('aliexpress.fields');

        foreach ($fields as $key => $field) {

            AliField::query()->updateOrCreate([
                'name' => $key,
            ], [
                'description'   => $field['description'],
                'type'          => $field['type'],
                'value'         => (isset($field['value'])) ? json_encode($field['value']) : null,
                'is_required'   => $field['required'],
                'created_by'    => null,
            ]);
        }
    }
}
