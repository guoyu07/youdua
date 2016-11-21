<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['社会', '娱乐', '科技', '体育', '汽车', '财经', '搞笑', '故事'];
        $categories = [];
        foreach($names as $name) {
            $categories[] = [
                'name' => $name,
                'created_at' => \Carbon\Carbon::now()->format("Y-m-d H:i:s"),
                'updated_at' => \Carbon\Carbon::now()->format("Y-m-d H:i:s"),
            ];
        }

        DB::table('categories')->insert($categories);
    }
}
