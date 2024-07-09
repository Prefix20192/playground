<?php

namespace Database\Seeders;

use App\Models\Calculator;
use App\Models\CalculatorType;
use App\Models\CalculatorTypeRange;
use App\Models\Marketplace;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CalculatorOzonSeeder extends Seeder
{
    public function run(): void
    {
        $ozonDefault  = $this->defaultOzonCalculator();
        $this->defaultCalculatorTypes($ozonDefault->id);

        $ozonOversize = $this->oversizeOzonCalculator();
        $this->oversizeCalculatorTypes($ozonOversize->id);
    }


    public function defaultOzonCalculator(): Builder|Model
    {
        $name = "Озон калькулятор";
        return Calculator::query()->create([
            "is_oversize"       => false,
            'is_active'         => true,
            'interest'          => 10,
            'name'              => $name,
            'slug'              => Str::slug($name, '_'),
            "marketplace_id"    => Marketplace::query()->where('name', 'like', "ozon%")->first()->id,
            'created_by'        => User::query()->where('email', 'like', 'example%')->first()->id,
        ]);
    }


    public function defaultCalculatorTypes($calcID): void
    {
        $types = [
            [
                "name_expense"  => "комиссия площадки",
                "type_expense"  => "interest",
                "expense_value" => 10,
            ], [
                "name_expense"  => "компенсация возвратов",
                "type_expense"  => "interest",
                "expense_value" => 2.2,
            ], [
                "name_expense"  => "эквайринг",
                "type_expense"  => "interest",
                "expense_value" => 1.5,
            ], [
                "name_expense"  => "обработка отправлении",
                "type_expense"  => "rate",
                "expense_value" => 10,
            ], [
                "name_expense"      => "логистика",
                "type_expense"      => "interest",
                "expense_value"     => 5,
                "condition_type"    => "volume_weight",
                "condition_min"     => 0,
                "condition_max"     => 1,
                "ctr" => [
                    "min" => 43,
                    "max" => 125,
                ],
            ], [
                "name_expense"      => "логистика",
                "type_expense"      => "interest",
                "expense_value"     => 6,
                "condition_type"    => "volume_weight",
                "condition_min"     => 1,
                "condition_max"     => 10,
                "ctr" => [
                    "min" => 135,
                    "max" => 425,
                ],
            ], [
                "name_expense"      => "логистика",
                "type_expense"      => "interest",
                "expense_value"     => 7,
                "condition_type"    => "volume_weight",
                "condition_min"     => 10,
                "condition_max"     => 25,
                "ctr" => [
                    "min" => 370,
                    "max" => 700,
                ]
            ], [
                "name_expense"      => "последняя миля",
                "type_expense"      => "interest",
                "expense_value"     => 5.5,
                "condition_type"    => "value",
                "condition_min"     => 20,
                "condition_max"     => 500
            ]
        ];

        $this->saveTypes($types, $calcID);
    }

    /**
     * @return Builder|Model
     */
    public function oversizeOzonCalculator(): Builder|Model
    {
        $name = "Озон КГТ калькулятор";
        return Calculator::query()->create([
            "is_oversize"       => true,
            'is_active'         => true,
            'interest'          => 10,
            'name'              => $name,
            'slug'              => Str::slug($name, '_'),
            "marketplace_id"    => Marketplace::query()->where('name', 'like', "ozon%")->first()->id,
            'created_by'        => User::query()->where('email', 'like', 'example%')->first()->id,
        ]);
    }

    public function oversizeCalculatorTypes($calcID): void
    {
        $types = [
            [
                "name_expense" => "Комиссия площадки",
                "type_expense" => "interest",
                "expense_value" => 10,
            ], [
                "name_expense" => "Компенсация возвратов",
                "type_expense" => "interest",
                "expense_value" => 2.2,
            ], [
                "name_expense" => "эквайринг",
                "type_expense" => "interest",
                "expense_value" => 1.5,
            ], [
                "name_expense" => "логистика",
                "type_expense" => "interest",
                "expense_value" => 7,
                "condition_type" => "value",
                "condition_min" => 1100,
                "condition_max" => 1950,
                ]
            ];
        $this->saveTypes($types, $calcID);
    }

    public function saveTypes(array $types, $calcID): void
    {
        foreach ($types as $type) {
            $calc = CalculatorType::query()->create([
                "calculator_id"     => $calcID,
                "name_expense"      => $type['name_expense'],
                "type_expense"      => $type['type_expense'],
                "value_expense"     => $type['expense_value'],
                "condition_type"    => (isset($type['condition_type'])) ? $type['condition_type'] : null,
                "condition_min"     => (isset($type['condition_min'])) ? $type['condition_min'] : null,
                "condition_max"     => (isset($type['condition_max'])) ? $type['condition_max'] : null,
            ]);
            if (isset($type['ctr'])) {
                CalculatorTypeRange::query()->create([
                    'calculator_type_id'    => $calc->id,
                    'range_min'             => $type['ctr']['min'],
                    'range_max'             => $type['ctr']['max'],
                ]);
            }
        }
    }
}
