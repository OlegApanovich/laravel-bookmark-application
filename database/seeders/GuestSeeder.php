<?php

namespace Database\Seeders;

use App\Models\Bookmark;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Auth::user();

        $cooking = Category::create([
            'user_id' => $user->id,
            'name' => 'Cooking',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $sport = Category::create([
            'user_id' => $user->id,
            'name' => 'Sport',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $programing = Category::create([
            'user_id' => $user->id,
            'name' => 'Programing',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $pizza = Category::create([
            'user_id' => $user->id,
            'parent_id' => $cooking->id,
            'name' => 'Pizza',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $pasta = Category::create([
            'user_id' => $user->id,
            'parent_id' => $cooking->id,
            'name' => 'Pasta',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $football = Category::create([
            'user_id' => $user->id,
            'parent_id' => $sport->id,
            'name' => 'Football',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $tennis = Category::create([
            'user_id' => $user->id,
            'parent_id' => $sport->id,
            'name' => 'Tennis',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $php = Category::create([
            'user_id' => $user->id,
            'parent_id' => $programing->id,
            'name' => 'PHP',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $javascript = Category::create([
            'user_id' => $user->id,
            'parent_id' => $programing->id,
            'name' => 'Javascript',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $go = Category::create([
            'user_id' => $user->id,
            'parent_id' => $programing->id,
            'name' => 'Go',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $laravel = Category::create([
            'user_id' => $user->id,
            'parent_id' => $php->id,
            'name' => 'Laravel',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $symphony = Category::create([
            'user_id' => $user->id,
            'parent_id' => $php->id,
            'name' => 'Symphony',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Bookmark::create([
            'user_id' => $user->id,
            'url' => 'https://www.simplyrecipes.com/recipes/homemade_pizza/',
            'description' => 'Homemade Pizza & Pizza Dough',
            'category_id' => $pizza->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Bookmark::create([
            'user_id' => $user->id,
            'url' => 'https://tasty.co/recipe/pizza-dough',
            'description' => 'Homemade Pizza & Pizza Dough',
            'category_id' => $pizza->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Bookmark::create([
            'user_id' => $user->id,
            'url' => 'https://www.gimmesomeoven.com/homemade-pasta/',
            'description' => 'HOMEMADE PASTA',
            'category_id' => $pasta->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Bookmark::create([
            'user_id' => $user->id,
            'url' => 'https://www.delish.com/cooking/recipe-ideas/g3176/weeknight-pasta-dinners/',
            'description' => '78 Easy Pasta Dinners That Will Make Planning Weeknight Dinners SO Simple',
            'category_id' => $pasta->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Bookmark::create([
            'user_id' => $user->id,
            'url' => 'https://www.uefa.com/uefaeuro-2020/fixtures-results/#/md/33673',
            'description' => 'Fixtures & results',
            'category_id' => $football->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Bookmark::create([
            'user_id' => $user->id,
            'url' => 'https://www.uefa.com/uefaeuro-2020/fixtures-results/#/md/33673',
            'description' => 'Fixtures & results',
            'category_id' => $football->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Bookmark::create([
            'user_id' => $user->id,
            'url' => 'https://www.rfi.fr/en/sports/20210317-european-football-chiefs-say-they-want-fans-at-postponed-euro-2020-coronavirus',
            'description' => 'European football chiefs say they want fans at postponed Euro 2020',
            'category_id' => $football->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Bookmark::create([
            'user_id' => $user->id,
            'url' => 'https://www.atptour.com/en/tournaments/wimbledon/540/overview',
            'description' => 'History And Tradition At Wimbledon',
            'category_id' => $tennis->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Bookmark::create([
            'user_id' => $user->id,
            'url' => 'https://www.historic-uk.com/CultureUK/The-History-of-the-Wimbledon-Tennis-Championships/',
            'description' => 'The History of the Wimbledon Tennis Championships',
            'category_id' => $tennis->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Bookmark::create([
            'user_id' => $user->id,
            'url' => 'https://hackernoon.com/solid-principles-simple-and-easy-explanation-f57d86c47a7f',
            'description' => 'Describe SOLID principles',
            'category_id' => $php->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Bookmark::create([
            'user_id' => $user->id,
            'url' => '	https://sourcemaking.com',
            'description' => 'design patterns',
            'category_id' => $php->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Bookmark::create([
            'user_id' => $user->id,
            'url' => 'https://developer.mozilla.org/en-US/docs/Web/JavaScript',
            'description' => 'tutorial',
            'category_id' => $javascript->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Bookmark::create([
            'user_id' => $user->id,
            'url' => 'https://yalantis.com/blog/why-use-go/',
            'description' => 'Why Use the Go Language for Your Project?',
            'category_id' => $go->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Bookmark::create([
            'user_id' => $user->id,
            'url' => 'https://www.itsolutionstuff.com/laravel-tutorial',
            'description' => 'Tutorials',
            'category_id' => $laravel->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Bookmark::create([
            'user_id' => $user->id,
            'url' => '	https://www.codecheef.org/article/user-roles-and-permissions-tutorial-in-laravel-without-packages',
            'description' => 'Custom role and permissions tutorial',
            'category_id' => $laravel->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Bookmark::create([
            'user_id' => $user->id,
            'url' => 'https://en.wikipedia.org/wiki/Symfony',
            'description' => '',
            'category_id' => $symphony->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
