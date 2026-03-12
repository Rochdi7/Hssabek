<?php

namespace Database\Factories;

use App\Models\System\UserInvitation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserInvitationFactory extends Factory
{
    protected $model = UserInvitation::class;

    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'token' => Str::random(64),
            'expires_at' => now()->addDays(7),
        ];
    }

    public function accepted(): static
    {
        return $this->state([
            'accepted_at' => now(),
        ]);
    }
}
