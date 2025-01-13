<?php

namespace App\Models;


class Post
{
    private static $blog_posts =  [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul_post_pertama",
            "author" => "Helmy",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam ipsa delectus quaerat error, officiis unde blanditiis 
    voluptatem maiores earum quasi, nihil quo. Earum saepe dolorum itaque dolores, molestiae dolorem. Maiores tempore iure cumque non nam. 
    Reprehenderit neque reiciendis officiis cum cumque omnis, rerum rem, quasi blanditiis obcaecati, similique maxime dolor beatae doloremque 
    itaque? Incidunt dicta nam quibusdam quod nisi. Alias, voluptatibus aut, itaque asperiores 
    adipisci saepe impedit pariatur quae nesciunt quisquam sed deleniti autem nam nobis molestiae vero quia architecto!"
        ],

        [
            "title" => "Judul Post Helmy  ",
            "slug" => "judul_post_kedua",
            "author" => "Kurniawan",
            "body" => "100 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam ipsa delectus quaerat error, officiis unde blanditiis 
        voluptatem maiores earum quasi, nihil quo. Earum saepe dolorum itaque dolores, molestiae dolorem. Maiores tempore iure cumque non nam. 
        Reprehenderit neque reiciendis officiis cum cumque omnis, rerum rem, quasi blanditiis obcaecati, similique maxime dolor beatae doloremque 
        itaque? Incidunt dicta nam quibusdam quod nisi. Alias, voluptatibus aut, itaque asperiores 
        adipisci saepe impedit pariatur quae nesciunt quisquam sed deleniti autem nam nobis molestiae vero quia architecto!"
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p["slug"] === $slug) {
        //         $post = $p;
        //     }
        // }
        return $posts->firstWhere('slug', $slug);
    }
}
