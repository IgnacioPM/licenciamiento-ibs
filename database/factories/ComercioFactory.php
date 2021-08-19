<?php

namespace Database\Factories;

use App\Models\Comercio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ComercioFactory extends Factory
{
    protected $model = Comercio::class;

    public function definition()
    {
        return [
			'tipo_comercio' => $this->faker->name,
        ];
    }
}
