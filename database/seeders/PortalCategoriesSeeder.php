<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortalCategoriesSeeder extends Seeder
{
    public function run() : void
    {
        // Запчасти и ТО (2 вложенности).
        $categoryOne = $this->checkExistsCategory($this->abselpartsParentCategoryOne());
        $this->checkChildrenCategory($categoryOne->id);
        // Антифризы (1 вложенности).
        $this->checkExistsCategory($this->abselpartsParentCategoryTwo());
        // Электрооборудование автомобиля. Электропроводка (3 влженности )
        $categoryThree = $this->checkExistsCategory($this->parentCategoryThree());
        $this->childrenCategoryThree($categoryThree->id);
        // Двигатель. Моторная группа
        $categoryFourth =  $this->checkExistsCategory($this->parentCategoryFourth());
        $this->childrenCategoryFourth($categoryFourth->id);
        // Дополнительные узлы и системы автомобиля
        $categoryFive = $this->checkExistsCategory($this->parentCategoryFive());
        $this->childrenCategoryFive($categoryFive->id);
        // Рулевое управление
        $categorySix = $this->checkExistsCategory($this->parentCategorySix());
        $this->childrenCategorySix($categorySix->id);
        // Сцепление. Трансмиссия
        $categorySeven = $this->checkExistsCategory($this->parentCategorySeven());
        $this->childrenCategorySeven($categorySeven->id);
        // Топливная система
        $categoryEight = $this->checkExistsCategory($this->parenCategoryEight());
        $this->childrenCategoryEight($categoryEight->id);
        // Тормозная система
        $categoryNine = $this->checkExistsCategory($this->parentCategoryNine());
        $this->childrenCategoryNine($categoryNine->id);
        // Узлы и детали шасси
        $categoryTen = $this->checkExistsCategory($this->parentCategoryTen());
        $this->childrenCategoryTen($categoryTen->id);
        // Универсальные детали
        $categoryTwelve = $this->checkExistsCategory($this->parentCategoryTwelve());
        $this->childrenCategoryTwelve($categoryTwelve->id);
    }

    public function abselpartsParentCategoryOne()
    {
        return [
            'name'          => 'Запчасти для ТО',
            'slug'          => Str::slug('Запчасти для ТО', '_'),
            'parent_id'     => 0,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];
    }

    public function checkChildrenCategory(int $parentCategoryID) : void
    {
        $childCategoriesOne = [
            [
                'name'          => 'Фильтр масляный',
                'slug'          => Str::slug('Фильтр маслянный', '_'),
                'parent_id'     => $parentCategoryID,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ], [
                'name'          => 'Фильтр топливный',
                'slug'          => Str::slug('Фильтр топливный', '_'),
                'parent_id'     => $parentCategoryID,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ], [
                'name'          => 'Фильтр воздушный',
                'slug'          => Str::slug('Фильтр воздушный', '_'),
                'parent_id'     => $parentCategoryID,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ], [
                'name'          => 'Фильтр салона',
                'slug'          => Str::slug('Фильтр салона', '_'),
                'parent_id'     => $parentCategoryID,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],[
                'name'          => 'Колодки тормозные',
                'slug'          => Str::slug('Колодки тормозные', '_'),
                'parent_id'     => $parentCategoryID,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
        ];

        foreach ($childCategoriesOne as $category) {
            $this->checkExistsCategory($category);
        }
    }

    public function abselpartsParentCategoryTwo() : array
    {
        return [
            'name'          => 'Антифризы',
            'slug'          => Str::slug('Антифризы', '_'),
            'parent_id'     => 0,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];
    }

    public function parentCategoryThree() : array
    {
        return [
            'name'          => 'Электрооборудование автомобиля. Электропроводка',
            'slug'          => Str::slug('Электрооборудование автомобиля. Электропроводка', '_'),
            'parent_id'     => 0,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];
    }

    public function childrenCategoryThree(int $parentId)
    {
        $chCategory = [
            'name'          => 'Узлы и детали генератора',
            'slug'          => Str::slug('Электрооборудование автомобиля. Электропроводка', '_'),
            'parent_id'     => $parentId,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];
        $childCategory = $this->checkExistsCategory($chCategory);
        $this->subChildrenCategoryThree($childCategory->id);
    }

    public function subChildrenCategoryThree(int $parentID)
    {
        $category = [
            'name'          => 'Обгонные муфты генератора',
            'slug'          => Str::slug('Электрооборудование автомобиля. Электропроводка', '_'),
            'parent_id'     => $parentID,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];
        $this->checkExistsCategory($category);
    }

    public function parentCategoryFourth() : array
    {
        return [
            'name'          => 'Двигатель. Моторная группа',
            'slug'          => Str::slug('Электрооборудование автомобиля. Электропроводка', '_'),
            'parent_id'     => 0,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];
    }

    public function childrenCategoryFourth($parentID)
    {
        $categories = [
            [
                'name'          => 'Ремни и цепи ГРМ',
                'slug'          => Str::slug('Ремни и цепи ГРМ', '_'),
                'parent_id'     => $parentID,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],[
                'name'          => 'Приводные ремни. Элементы ременных передач',
                'slug'          => Str::slug('Приводные ремни. Элементы ременных передач', '_'),
                'parent_id'     => $parentID,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],[
                'name'          => 'Система смазки двигателя',
                'slug'          => Str::slug('Система смазки двигателя', '_'),
                'parent_id'     => $parentID,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],[
                'name'          => 'Ремни и цепи ГРМ',
                'slug'          => Str::slug('Ремни и цепи ГРМ', '_'),
                'parent_id'     => $parentID,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],[
                'name'          => 'Детали ГРМ',
                'slug'          => Str::slug('Детали ГРМ', '_'),
                'parent_id'     => $parentID,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],[
                'name'          => 'Детали поршневой группы. КШМ',
                'slug'          => Str::slug('Детали поршневой группы. КШМ', '_'),
                'parent_id'     => $parentID,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],[
                'name'          => 'Крепления и элементы подвески двигателя',
                'slug'          => Str::slug('Крепления и элементы подвески двигателя', '_'),
                'parent_id'     => $parentID,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
        ];

        $checked = [];
        foreach ($categories as $category) {
            $checked[] = $this->checkExistsCategory($category);
        }
        $this->subChildCategoryFourth($checked);
    }

    public function subChildCategoryFourth($subChildrenCategories)
    {
        foreach ($subChildrenCategories as $subParentCategory)

            if ($subParentCategory->name == 'Ремни и цепи ГРМ') {
                $one = [
                    [
                        'name'          => 'Ролики натяжные ремня ГРМ',
                        'slug'          => Str::slug('Ролики натяжные ремня ГРМ', '_'),
                        'parent_id'     => $subParentCategory->id,
                        'description'   => 'Структура дерева ABSELPARTS',
                        'created_at'    => now(),
                        'updated_at'    => now(),
                        'created_by'    => User::query()->first()?->id,
                    ],
                    [
                        'name'          => 'Комплекты ремня ГРМ',
                        'slug'          => Str::slug('Комплекты ремня ГРМ', '_'),
                        'parent_id'     => $subParentCategory->id,
                        'description'   => 'Структура дерева ABSELPARTS',
                        'created_at'    => now(),
                        'updated_at'    => now(),
                        'created_by'    => User::query()->first()?->id,
                    ],
                    [
                        'name'          => 'Ролики направляющие ремня ГРМ',
                        'slug'          => Str::slug('Ролики направляющие ремня ГРМ', '_'),
                        'parent_id'     => $subParentCategory->id,
                        'description'   => 'Структура дерева ABSELPARTS',
                        'created_at'    => now(),
                        'updated_at'    => now(),
                        'created_by'    => User::query()->first()?->id,
                    ],
                ];

                foreach ($one as $cat) {
                    $this->checkExistsCategory($cat);
                }
            }

        if ($subParentCategory->name == 'Приводные ремни. Элементы ременных передач') {
            $one = [
                [
                    'name'          => 'Натяжитель приводного ремня',
                    'slug'          => Str::slug('Натяжитель приводного ремня', '_'),
                    'parent_id'     => $subParentCategory->id,
                    'description'   => 'Структура дерева ABSELPARTS',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                    'created_by'    => User::query()->first()?->id,
                ],
                [
                    'name'          => 'Ролики натяжные приводных ремней',
                    'slug'          => Str::slug('Ролики натяжные приводных ремней', '_'),
                    'parent_id'     => $subParentCategory->id,
                    'description'   => 'Структура дерева ABSELPARTS',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                    'created_by'    => User::query()->first()?->id,
                ],
                [
                    'name'          => 'Ролики направляющие приводных ремней',
                    'slug'          => Str::slug('Ролики направляющие приводных ремней', '_'),
                    'parent_id'     => $subParentCategory->id,
                    'description'   => 'Структура дерева ABSELPARTS',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                    'created_by'    => User::query()->first()?->id,
                ],
            ];
            foreach ($one as $cat) {
                $this->checkExistsCategory($cat);
            }
        }

        if ($subParentCategory->name == 'Система смазки двигателя') {
            $one = [
                'name'          => 'Фильтры масла',
                'slug'          => Str::slug('Фильтры масла', '_'),
                'parent_id'     => $subParentCategory->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ];
            $this->checkExistsCategory($one);
        }

        if ($subParentCategory->name == 'Детали ГРМ') {
            $one = [
                'name'          => 'Шестерни распредвала',
                'slug'          => Str::slug('Шестерни распредвала', '_'),
                'parent_id'     => $subParentCategory->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ];
            $this->checkExistsCategory($one);
        }

        if ($subParentCategory->name == 'Детали поршневой группы. КШМ') {
            $one = [
                'name'          => 'Шестерни коленвала',
                'slug'          => Str::slug('Шестерни коленвала', '_'),
                'parent_id'     => $subParentCategory->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ];
            $this->checkExistsCategory($one);
        }

        if ($subParentCategory->name == 'Крепления и элементы подвески двигателя') {
            $one = [
                'name'          => 'Опоры двигателя',
                'slug'          => Str::slug('Опоры двигателя', '_'),
                'parent_id'     => $subParentCategory->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ];
            $this->checkExistsCategory($one);
        }

    }

    public function parentCategoryFive() : array
    {
        return [
            'name'         => 'Дополнительные узлы и системы автомобиля',
            'slug'         => Str::slug('Дополнительные узлы и системы автомобиля', '_'),
            'parent_id'    => 0,
            'description'  => 'Структура дерева ABSELPARTS',
            'created_at'   => now(),
            'updated_at'   => now(),
            'created_by'   => User::query()->first()?->id,
        ];
    }

    public function childrenCategoryFive(int $parentID)
    {
        $one = [
            'name'          => 'Шестерни распредвала',
            'slug'          => Str::slug('Шестерни распредвала', '_'),
            'parent_id'     => $parentID,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];
        $category = $this->checkExistsCategory($one);

        $two = [
            'name'          => 'Фильтры салонные',
            'slug'          => Str::slug('Фильтры салонные', '_'),
            'parent_id'     => $category->id,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];
        $this->checkExistsCategory($two);
    }

    public function parentCategorySix() : array
    {
        return [
            'name'          => 'Рулевое управление',
            'slug'          => Str::slug('Рулевое управление', '_'),
            'parent_id'     => 0,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];
    }

    public function childrenCategorySix(int $parentID)
    {
        $child = [
            'name'          => 'Рулевые рычаги и тяги',
            'slug'          => Str::slug('Рулевые рычаги и тяги', '_'),
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];

        $childCat = $this->checkExistsCategory($child);

        $subChildrenCategories = [
            [
                'name'          => 'Маятниковые рычаги',
                'slug'          => Str::slug('Маятниковые рычаги', '_'),
                'description'   => 'Структура дерева ABSELPARTS',
                'parent_id'     => $childCat->id,
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
            [
                'name'          => 'Рулевые тяги',
                'slug'          => Str::slug('Рулевые тяги', '_'),
                'parent_id'     => $childCat->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
            [
                'name'          => 'Рулевые наконечники',
                'slug'          => Str::slug('Рулевые наконечники', '_'),
                'parent_id'     => $childCat->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
            [
                'name'          => 'Детали рулевых механизмов',
                'slug'          => Str::slug('Детали рулевых механизмов', '_'),
                'parent_id'     => $childCat->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
        ];

        foreach ($subChildrenCategories as $category) {
            $this->checkExistsCategory($category);
        }
    }

    public function parentCategorySeven() : array
    {
        return [
            'name'          => 'Сцепление. Трансмиссия',
            'slug'          => Str::slug('Сцепление. Трансмиссия', '_'),
            'parent_id'     => 0,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];
    }

    public function childrenCategorySeven(int $parentID)
    {
        $one = [
            'name'          => 'Крепления и опоры узлов трансмиссии',
            'slug'          => Str::slug('Крепления и опоры узлов трансмиссии', '_'),
            'parent_id'     => $parentID,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];

        $category = $this->checkExistsCategory($one);

        $subChildrenCategory = [
            'name'          => 'Опоры КПП',
            'slug'          => Str::slug('Крепления и опоры узлов трансмиссии', '_'),
            'parent_id'     => $category->id,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];

        $this->checkExistsCategory($subChildrenCategory);
    }

    public function parenCategoryEight() : array
    {
        return [
            'name'          => 'Топливная система',
            'slug'          => Str::slug('Топливная система', '_'),
            'parent_id'     => 0,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];
    }

    public function childrenCategoryEight(int $parentID): void
    {
        $one = [
            'name'          => 'Фильтрующие элементы топливной системы',
            'slug'          => Str::slug('Фильтрующие элементы топливной системы', '_'),
            'parent_id'     => $parentID,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];

        $category = $this->checkExistsCategory($one);

        $subChildrenCategory = [
            [
                'name'          => 'Фильтры топлива',
                'slug'          => Str::slug('Фильтры топлива', '_'),
                'parent_id'     => $category->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
            [
                'name'          => 'Фильтры воздуха',
                'slug'          => Str::slug('Фильтры топлива', '_'),
                'parent_id'     => $category->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
        ];

        foreach ($subChildrenCategory as $cat) {
            $this->checkExistsCategory($cat);
        }
    }

    public function parentCategoryNine() : array
    {
        return [
            'name'          => 'Тормозная система',
            'slug'          => Str::slug('Тормозная система', '_'),
            'parent_id'     => 0,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];
    }

    public function childrenCategoryNine(int $parentID): void
    {
        $one = [
            [
                'name'          => 'Детали дисковых тормозов',
                'slug'          => Str::slug('Детали дисковых тормозов', '_'),
                'parent_id'     => $parentID,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
            [
                'name'          => 'Тормозные колодки',
                'slug'          => Str::slug('Тормозные колодки', '_'),
                'parent_id'     => $parentID,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
        ];

        $checked = [];
        foreach ($one as $category) {
            $checked[] = $this->checkExistsCategory($category);
        }

        foreach ($checked as $check)
        {
            if ($check->name == 'Детали дисковых тормозов') {
                $subChildren = [
                    'name'          => 'Тормозные диски',
                    'slug'          => Str::slug('Тормозные диски', '_'),
                    'parent_id'     => $check->id,
                    'description'   => 'Структура дерева ABSELPARTS',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                    'created_by'    => User::query()->first()?->id,
                ];

                $this->checkExistsCategory($subChildren);
            }
            if ($check->name == 'Тормозные колодки') {
                $subChildren = [
                    'name'          => 'Колодки тормозные дисковые',
                    'slug'          => Str::slug('Колодки тормозные дисковые', '_'),
                    'parent_id'     => $check->id,
                    'description'   => 'Структура дерева ABSELPARTS',
                    'created_at'    => now(),
                    'updated_at'    => now(),
                    'created_by'    => User::query()->first()?->id,
                ];

                $this->checkExistsCategory($subChildren);
            }
        }
    }

    public function parentCategoryTen() : array
    {
        return [
            'name'          => 'Узлы и детали шасси',
            'slug'          => Str::slug('Узлы и детали шасси', '_'),
            'parent_id'     => 0,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];
    }

    public function childrenCategoryTen(int $parentID): void
    {
        $one = [
            'name'          => 'Детали подвески',
            'slug'          => Str::slug('Детали подвески', '_'),
            'parent_id'     => $parentID,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];

        $checkOne = $this->checkExistsCategory($one);

        $childOne = [
            [
                'name'          => 'Втулки стабилизатора',
                'slug'          => Str::slug('Втулки стабилизатора', '_'),
                'parent_id'     => $checkOne->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
            [
                'name'          => 'Стойки стабилизатора',
                'slug'          => Str::slug('Стойки стабилизатора', '_'),
                'parent_id'     => $checkOne->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
            [
                'name'          => 'Рычаги подвески',
                'slug'          => Str::slug('Рычаги подвески', '_'),
                'parent_id'     => $checkOne->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
            [
                'name'          => 'Шаровые опоры',
                'slug'          => Str::slug('Шаровые опоры', '_'),
                'parent_id'     => $checkOne->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
        ];
        foreach ($childOne as $cat) {
            $this->checkExistsCategory($cat);
        }

        $two = [
            'name'          => 'Сайлентблоки',
            'slug'          => Str::slug('Сайлентблоки', '_'),
            'parent_id'     => $parentID,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];

        $check = $this->checkExistsCategory($two);

        $subTwo = [
            [
                'name'          => 'Сайлентблоки рессор',
                'slug'          => Str::slug('Сайлентблоки рессор', '_'),
                'parent_id'     => $check->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
            [
                'name'          => 'Сайлентблоки рычагов подвески',
                'slug'          => Str::slug('Сайлентблоки рычагов подвески', '_'),
                'parent_id'     => $check->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
            [
                'name'          => 'Сайлентблоки балки моста',
                'slug'          => Str::slug('Сайлентблоки балки моста', '_'),
                'parent_id'     => $check->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
        ];

        foreach ($subTwo as $cat) {
            $this->checkExistsCategory($cat);
        }

        $three = [
            'name'          => 'Детали подвески',
            'slug'          => Str::slug('Детали подвески', '_'),
            'parent_id'     => $parentID,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];

        $check = $this->checkExistsCategory($three);

        $subThree = [
            [
                'name'          => 'Втулки стабилизатора',
                'slug'          => Str::slug('Втулки стабилизатора', '_'),
                'parent_id'     => $check->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
            [
                'name'          => 'Стойки стабилизатора',
                'slug'          => Str::slug('Стойки стабилизатора', '_'),
                'parent_id'     => $check->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
            [
                'name'          => 'Рычаги подвески',
                'slug'          => Str::slug('Рычаги подвески', '_'),
                'parent_id'     => $check->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
            [
                'name'          => 'Шаровые опоры',
                'slug'          => Str::slug('Шаровые опоры', '_'),
                'parent_id'     => $check->id,
                'description'   => 'Структура дерева ABSELPARTS',
                'created_at'    => now(),
                'updated_at'    => now(),
                'created_by'    => User::query()->first()?->id,
            ],
        ];

        foreach ($subThree as $cat) {
            $this->checkExistsCategory($cat);
        }

        $four = [
            'name'          => 'Крепления и опоры элементов подвески',
            'slug'          => Str::slug('Крепления и опоры элементов подвески', '_'),
            'parent_id'     => $parentID,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];

        $check = $this->checkExistsCategory($four);

        $subFour = [
            'name'          => 'Опоры амортизаторов',
            'slug'          => Str::slug('Опоры амортизаторов', '_'),
            'parent_id'     => $check->id,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];

        $this->checkExistsCategory($subFour);

        $five = [
            'name'          => 'Амортизаторные стойки. Комплектующие стоек',
            'slug'          => Str::slug('Амортизаторные стойки. Комплектующие стоек', '_'),
            'parent_id'     => $parentID,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];

        $check = $this->checkExistsCategory($five);

        $subFive = [
            'name'          => 'Чашки опоры амортизатора',
            'slug'          => Str::slug('Чашки опоры амортизатора', '_'),
            'parent_id'     => $check->id,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];

        $this->checkExistsCategory($subFive);
    }

    public function parentCategoryEleven() : array
    {
        return [
            'name'          => 'Универсальные детали',
            'slug'          => Str::slug('Универсальные детали', '_'),
            'parent_id'     => 0,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];
    }

    public function childrenCategoryEleven(int $parentID): void
    {
        $one = [
            'name'          => 'Универсальные детали',
            'slug'          => Str::slug('Универсальные детали', '_'),
            'parent_id'     => $parentID,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];

        $check = $this->checkExistsCategory($one);

        $subOne = [
            'name'          => 'Болты',
            'slug'          => Str::slug('Болты', '_'),
            'parent_id'     => $check->id,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];

        $this->checkExistsCategory($subOne);
    }

    public function parentCategoryTwelve(): array
    {
        return [
            'name'          => 'Электрооборудование автомобиля. Электропроводка',
            'slug'          => Str::slug('Электрооборудование автомобиля. Электропроводка', '_'),
            'parent_id'     => 0,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];
    }

    public function childrenCategoryTwelve(int $parentID): void
    {
        $one = [
            'name'          => 'Узлы и детали генератора',
            'slug'          => Str::slug('Узлы и детали генератора', '_'),
            'parent_id'     => $parentID,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];

        $check = $this->checkExistsCategory($one);

        $subOne = [
            'name'          => 'Обгонные муфты генератора',
            'slug'          => Str::slug('Обгонные муфты генератора', '_'),
            'parent_id'     => $check->id,
            'description'   => 'Структура дерева ABSELPARTS',
            'created_at'    => now(),
            'updated_at'    => now(),
            'created_by'    => User::query()->first()?->id,
        ];

        $this->checkExistsCategory($subOne);
    }

    public function checkExistsCategory(array $category): object
    {
        $data = Category::query()->where('name', 'like', $category['name'])->first();
        if (!$data) {
            Category::query()->insert($category);
            $data = Category::query()->where('name', 'like', $category['name'])->first();
        }
        return $data;
    }
}
