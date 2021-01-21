<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subject' => $this->faker->word,
            'description' => $this->faker->sentence,
            'user_name' => $this->faker->name,
            'user_email' => $this->faker->randomElement(['kevin@mailinator.com','ken@mailinator.com','patel@mailinator.com','mak@mailinator.com','makwana@mailinator.com']),
            'status' => 0,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ];
    }
}
