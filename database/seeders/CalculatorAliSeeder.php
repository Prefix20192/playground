<?php

namespace Database\Seeders;

use App\Models\Calculator;
use App\Models\CalculatorType;
use App\Models\CalculatorTypeRange;
use App\Models\Marketplace;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CalculatorAliSeeder extends Seeder
{
    public function run(): void
    {
        $aliDefaultCalculator = $this->defaultAliCalculator();
        $this->defaultCalculatorTypes($aliDefaultCalculator->id);

        $aliOversizeCalculator = $this->oversizeAliCalculator();
        $this->oversizeCalculatorTypes($aliOversizeCalculator->id);
    }

    public function oversizeCalculatorTypes($calcID): void
    {
        $types = [
            [
                "name_expense" => "Комиссия площадки",
                "type_expense" => "interest",
                "expense_value" => 8
            ], [
                "name_expense" => "Компенсация возвратов",
                "type_expense" => "interest",
                "expense_value" => 2,
            ], [
                "name_expense" => "Стоимость забора КГТ",
                "type_expense" => "rub_kg",
                "expense_value" => 10,
            ], [
                "name_expense" => "Тариф от веса",
                "type_expense" => "rate",
                "expense_value" => 1200,
                "condition_type" => "weight",
                "condition_min" => 20,
                "condition_max" => 40,
            ], [
                "name_expense" => "Тариф от веса",
                "type_expense" => "rate",
                "expense_value" => 1700,
                "condition_type" => "weight",
                "condition_min" => 40,
                "condition_max" => 60,
            ], [
                "name_expense" => "тариф от веса",
                "type_expense" => "rate",
                "expense_value" => 2500,
                "condition_type" => "weight",
                "condition_min" => 60,
                "condition_max" => 150,
            ]
        ];
        $this->saveTypes($types, $calcID);
    }

    public function oversizeAliCalculator(): Builder|Model
    {
        $name = 'Ali КГТ калькулятор';
        return Calculator::query()->create([
            "is_oversize"       => true,
            'is_active'         => true,
            'interest'          => 10,
            'name'              => $name,
            'slug'              => Str::slug($name, '_'),
            "marketplace_id"    => Marketplace::query()->where('name', 'like', "ali%")->first()->id,
            'created_by'        => User::query()->where('email', 'like', 'example%')->first()->id,
        ]);

    }

    public function defaultAliCalculator(): Builder|Model
    {
        $name = 'Ali калькулятор по умолчанию';
        return Calculator::query()->create([
            "is_oversize"       => false,
            'is_active'         => true,
            'interest'          => 10,
            'name'              => $name,
            'slug'              => Str::slug($name, '_'),
            "marketplace_id"    => Marketplace::query()->where('name', 'like', "ali%")->first()->id,
            'created_by'        => User::query()->where('email', 'like', 'example%')->first()->id,
        ]);
    }

    public function defaultCalculatorTypes($calcID): void
    {
        $types = [
            [
                "name_expense" => "Комиссия площадки",
                "type_expense" => "interest",
                "expense_value" => 8,
            ], [
                "name_expense"      => "тариф от веса",
                "type_expense"      => "rate",
                "expense_value"     => 160,
                "condition_type"    => "weight",
                "condition_min"     => 0,
                "condition_max"     => 2
            ], [
                "name_expense"      => "тариф от веса",
                "type_expense"      => "rate",
                "expense_value"     => 360,
                "condition_type"    => "weight",
                "condition_min"     => 2,
                "condition_max"     => 5,
            ], [
                "name_expense"      => "тариф от веса",
                "type_expense"      => "rate",
                "expense_value"     => 660,
                "condition_type"    => "weight",
                "condition_min"     => 5,
                "condition_max"     => 20,
            ], [
                "name_expense"      => "компенсация возвратов",
                "type_expense"      => "interest",
                "expense_value"     => 2.2
            ]
        ];
        $this->saveTypes($types, $calcID);
    }

    public function saveTypes(array $types, int $calcID): void
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


