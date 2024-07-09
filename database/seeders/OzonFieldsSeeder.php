<?php

namespace Database\Seeders;


use App\Models\OzonField;
use Illuminate\Database\Seeder;

class OzonFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fields = config('ozon.fields');

        foreach ($fields as $key => $field) {
            OzonField::query()->updateOrCreate([
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
