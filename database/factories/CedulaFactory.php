<?php

namespace Database\Factories;

use App\Models\Cedula;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CedulaFactory extends Factory
{
    protected $model = Cedula::class;

    public function definition()
    {
        return [
			'tipo_cliente' => $this->faker->name,
        ];
    }
}
