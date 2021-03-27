<?php

namespace Database\Factories;

use App\Models\alumnos;
use Illuminate\Database\Eloquent\Factories\Factory;

class alumnosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = alumnos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->name,
            'apellido_paterno'=>$this->faker->lastName,
            'apellido_materno'=>$this->faker->lastName,
            'id_grupo'=>$this->faker->text,
            'fecha_nacimiento'=>now(),
            // 'fecha_nacimiento'=>$this->faker->datetime(),
            'observacion'=>$this->faker->text,
            'correo'=>$this->faker->unique()->safeEmail,
            'equipo'=>$this->faker->text
            //
        ];
    }
}
