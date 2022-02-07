<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 20) -> make() -> each(function($post) {

            $category = Category::inRandomOrder() -> limit(1) -> first();
            $post -> test() -> associate($category);

            $post -> save();
        });
    }
}