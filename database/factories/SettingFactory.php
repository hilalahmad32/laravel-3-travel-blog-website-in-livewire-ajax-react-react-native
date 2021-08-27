<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title"=>"Travel",
            "footer_title"=>"Travel",
            "footer_desc"=>"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem, impedit non architecto fugiat magni quod assumenda possimus deserunt hic debitis sunt tempore corporis excepturi incidunt accusantium ex labore! Qui, provident?",
            "footer_phone"=>"12345667",
            "footer_email"=>"ahilal204@gmail.com",
            "footer_location"=>"pakistan"
        ];
    }
}
