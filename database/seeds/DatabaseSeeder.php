<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $users = factory(App\User::class, 20)->create();

        $nationalities = factory(App\Nationality::class, 10)->create();

        $producers = factory(\App\Producer::class, 10)->create();

        $categories = factory(\App\Category::class, 10)->create();

        $nationalities->each(function (App\Nationality $nationality) use ($nationalities, $users, $categories, $producers) {
            $contributes = factory(\App\Contribute::class, 20)->create([
                "nationality_id" => $nationality->id,
            ]);


            $users->each(function (\App\User $user) use ($nationality, $users, $categories, $producers, $contributes) {
                $films = factory(\App\Film::class, 2)->create(['user_id' => $user->id, 'nationality_id' => $nationality->id]);

                $films->each(function (\App\Film $film) use ($user, $categories, $producers, $contributes) {
                    $reviews = factory(\App\Review::class, 2)->create([
                        'user_id' => $user->id,
                        'film_id' => $film->id,
                    ]);


                    $film->categories()->sync($categories->random(3));
                    $film->actors()->sync($contributes->random(10));
                    $film->directors()->sync($contributes->random(2));
                    $film->producers()->sync($producers->random(1));
                });
            });
        });
    }
}
