<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string $excerpt
 * @property string $body
 * @property string|null $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $published_at
 * @property int $category_id
 * @property-read Category|null $category
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
 * @mixin Eloquent
 */
class Post extends Model
{
    use HasFactory;

    // for mass assignment you can spicily which filed or column can be mass assignment
    protected $fillable = ['title', 'excerpt'];
    // the which property or column can't be mass assignment
    protected $guarded = ['id'];

    final public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
