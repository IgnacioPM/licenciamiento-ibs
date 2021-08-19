<?php

namespace Database\Factories;

use App\Models\Contrato;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContratoFactory extends Factory
{
    protected $model = Contrato::class;

    public function definition()
    {
        return [
			'tipo_contrato' => $this->faker->name,
        ];
    }
}
