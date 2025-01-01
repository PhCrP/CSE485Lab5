<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'title' => $this->faker->jobTitle,
            'academic_rank' => $this->faker->randomElement(['Professor', 'Associate Professor', 'None']),
            'degree' => $this->faker->randomElement(['PhD', 'Master', 'Bachelor', 'Diploma']),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->email,
            'department_id' => \App\Models\Department::factory(),
        ];
    }
}
