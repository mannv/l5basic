<?php

namespace Modules\Backend\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Backend\Entities\Language;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            [
                'id' => 1,
                'code' => 'us',
                'name' => 'English US'
            ],
            [
                'id' => 2,
                'code' => 'uk',
                'name' => 'English UK'
            ]
        ];
        foreach ($languages as $language) {
            Language::create($language);
        }
    }
}
