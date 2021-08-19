<?php

namespace Database\Factories;

use App\Models\Capacitacion;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CapacitacionFactory extends Factory
{
    protected $model = Capacitacion::class;

    public function definition()
    {
        return [
			'tipo_capacitacion' => $this->faker->name,
        ];
    }
}
