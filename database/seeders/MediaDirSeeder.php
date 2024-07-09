<?php

namespace Database\Seeders;

use App\Models\CardProduct;
use App\Models\Media;
use App\Models\MediaDir;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class MediaDirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo 'Создание корневой директории 1/5' . PHP_EOL;

        $chkHomeDir = MediaDir::query()->where('name', 'Home')->first()->id;

        if($chkHomeDir){
            MediaDir::query()->insertOrIgnore([
                [
                    'name' => 'Home',
                    'description' => '',
                    'slug' => Str::slug('Home', '_'),
                    'parent_id' => null,
                    'count' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => null,
                ]
            ]);
        }

        echo 'Создание базовых дочерних директорий 2/5' . PHP_EOL;

        MediaDir::query()->insertOrIgnore([
            [
                'name' => 'Документы',
                'description' => '',
                'slug' => Str::slug('Документы', '_'),
                'parent_id' => MediaDir::query()->where('name', 'Home')->first()->id,
                'count' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Фото',
                'description' => '',
                'slug' => Str::slug('Фото', '_'),
                'parent_id' => MediaDir::query()->where('name', 'Home')->first()->id,
                'count' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ],
            [
                'name' => 'Видео',
                'description' => '',
                'slug' => Str::slug('Видео', '_'),
                'parent_id' => MediaDir::query()->where('name', 'Home')->first()->id,
                'count' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ]
        ]);

        echo 'Создание директорий брендов 3/5' . PHP_EOL;

        $photoDir = MediaDir::query()->where('name', 'Фото')->first()->id;

        $cardProductsBrands = CardProduct::query()->distinct('brand_name')
            ->pluck('brand_name')->each(function ($brandName) use($photoDir){
                MediaDir::query()->insertOrIgnore([
                    [
                        'name' => $brandName,
                        'description' => '',
                        'slug' => Str::slug($brandName, '_'),
                        'parent_id' => $photoDir,
                        'count' => 0,
                        'created_at' => now(),
                        'updated_at' => now(),
                        'deleted_at' => null,
                    ]
                ]);
            })->count();

        MediaDir::query()->where('name', 'Фото')->first()->update([
            'count' => $cardProductsBrands
        ]);

        echo 'Создание директорий артикулов 4/5' . PHP_EOL;

        $cardProductHasMediaIds = [];
        CardProduct::each(function ($cardProduct) use(&$cardProductHasMediaIds){
            if($cardProduct->hasMedia('cp_collection_' . $cardProduct->id)){
                $parentDir = MediaDir::where('name', $cardProduct->brand_name)->first();

                if($parentDir){
                    MediaDir::query()->insertOrIgnore([
                        [
                            'name' => $cardProduct->article,
                            'description' => '',
                            'slug' => Str::slug($cardProduct->article, '_'),
                            'parent_id' => $parentDir->id,
                            'count' => 0,
                            'created_at' => now(),
                            'updated_at' => now(),
                            'deleted_at' => null,
                        ]
                    ]);

                    $parentDir->update([
                        'count' => $parentDir->count + 1,
                    ]);

                    $cardProductHasMediaIds[] = $cardProduct->id;
                }
            }
        });

        echo 'Привязывание файлов к директориям 5/5' . PHP_EOL;

        CardProduct::whereIn('id', $cardProductHasMediaIds)
            ->each(function ($cardProduct){
                $mediaAll = $cardProduct->getMedia('cp_collection_' . $cardProduct->id);

                foreach($mediaAll as $media){
                    $mediaDir = MediaDir::query()->where('name', $cardProduct->article)->first();

                    Media::find($media->id)->mediaDir()->attach($mediaDir->id, [
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    $mediaDir->update([
                        'count' => $mediaDir->count + 1,
                    ]);
                }
            });

        echo 'Завершено 5/5' . PHP_EOL;
    }
}
