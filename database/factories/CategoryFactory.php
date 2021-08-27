<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "category_name"=>$this->faker->name(),
            "image"=>"https://images.unsplash.com/photo-1530789253388-582c481c54b0?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTF8fHRyYXZlbHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
            "posts"=>rand(1,5),
        ];
    }
}
