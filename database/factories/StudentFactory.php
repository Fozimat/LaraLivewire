<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'nim' => $this->faker->numberBetween(1000000, 1300000),
            'no_hp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->streetName()
        ];
    }
}
