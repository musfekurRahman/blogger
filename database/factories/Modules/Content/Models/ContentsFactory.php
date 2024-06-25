<?php

namespace Database\Factories\Modules\Content\Models;

use App\Modules\Content\Models\Contents;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Contents>
 */
class ContentsFactory extends Factory
{
    protected $model = Contents::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'blogger_id' => $this->faker->numberBetween(1, 10),
            'headline' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(3, true),
            'priority' => $this->faker->numberBetween(1, 10),
            'categories' => json_encode($this->faker->words(2)),
            'total_comments' => $this->faker->numberBetween(0, 100),
            'total_hits' => $this->faker->numberBetween(0, 1000),
            'total_hosts' => $this->faker->numberBetween(0, 500),
            'author_name' => $this->faker->name,
            'is_pinned' => $this->faker->boolean,
            'status' => $this->faker->randomElement(['DRAFT','PUBLISH','PENDING']),
        ];
    }
}
