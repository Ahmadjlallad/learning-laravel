<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string $excerpt
 * @property string $body
 * @property string|null $slug
 * @property int $category_id
 * @property int $user_id
 * @property string|null $published_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \App\Models\User $author
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @method static \Database\Factories\PostFactory factory(...$parameters)
 * @method static Builder|Post filter(array $filters)
 * @method static Builder|Post newModelQuery()
 * @method static Builder|Post newQuery()
 * @method static Builder|Post query()
 * @method static Builder|Post whereBody($value)
 * @method static Builder|Post whereCategoryId($value)
 * @method static Builder|Post whereCreatedAt($value)
 * @method static Builder|Post whereExcerpt($value)
 * @method static Builder|Post whereId($value)
 * @method static Builder|Post wherePublishedAt($value)
 * @method static Builder|Post whereSlug($value)
 * @method static Builder|Post whereTitle($value)
 * @method static Builder|Post whereUpdatedAt($value)
 * @method static Builder|Post whereUserId($value)
 * @mixin Eloquent
 * @noinspection PhpFullyQualifiedNameUsageInspection
 * @noinspection PhpUnnecessaryFullyQualifiedNameInspection
 */
class Post extends Model
{
    use HasFactory;

    // for mass assignment you can spicily which filed or column can be mass assignment
    protected $fillable = ['title', 'excerpt'];
    // the which property or column can't be mass assignment
    protected $guarded = ['id'];

    protected $with = ['category', 'author'];

    final public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    final public function author(): BelongsTo // laravel will assume this is relation name user_id or pass a foreign ID
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    final function scopeFilter(Builder $query, array $filters): Builder
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) => $query->where(fn($query) => $query->where('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('body', 'like', '%' . $filters['search'] . '%'))
        );
//        $query
//            ->when($filters['category'] ?? false, fn($query, $category) => $query
//                ->whereExists(fn($query) => $query->from('categories')
//                    ->whereColumn('categories.id', 'posts.category_id')
//                    ->where('categories.slug', $category))
//            );
        $query
            ->when($filters['category'] ?? false, fn(Builder $query, $category) => $query
                ->whereHas('category', fn(Builder $query) => $query->where('slug', $category))
            );
        $query
            ->when($filters['author'] ?? false, fn(Builder $query, $author) => $query
                ->whereHas('author', fn(Builder $query) => $query->where('username', $author))
            );

        return $query;
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
