<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array_tag = config("tag");

        foreach ($array_tag as $tag) {
            $new_tag = new Tag();
            $new_tag->fill($tag);
            $new_tag->save();
        }
    }
}
