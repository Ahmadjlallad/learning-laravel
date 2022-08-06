<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Throwable;

class Post
{

    public function __construct(public string $title, public string $excerpt, public string $date, public string $body, public string $slug)
    {
    }

    /**
     * @throws Throwable
     */
    public static function findOrFil(string $slug): Post
    {
        $post = static::find($slug);
        throw_if(!$post, new ModelNotFoundException);
        return $post;
    }

    public static function find(string $slug): Post|null
    {

        // there is multiple helpers about the file system
        // like
//        app_path();
//        base_path();
//        $path = resource_path("\posts\\$slug.html");
//        if (!file_exists($path)) {
//            // ddd('file dose not exist', $path);
//            // abort(404);
//            throw new ModelNotFoundException();
//        }
//        return cache()->remember("posts.$slug", 1200, static fn() => file_get_contents($path));
        return static::all()->firstWhere('slug', $slug);
    }

    public static function all(): Collection
    {
//        cache()->forget('key');
//        cache()->put('key', 'value');
//        cache(['key' => 'value'], new()->addSeconds(3));
//        cache('key');
        //
        return cache()->rememberForever('post.all', function () {
            return collect(File::files(resource_path("\posts")))->map(function ($file) {
                $doc = YamlFrontMatter::parseFile($file);
                return new Post(
                    title: $doc->matter('title'),
                    excerpt: $doc->matter('excerpt'),
                    date: $doc->matter('date'),
                    body: $doc->body(),
                    slug: $doc->matter('slug')
                );
            })->sortByDesc('date');
        });
    }
}
