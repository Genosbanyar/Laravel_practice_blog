<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Mail;
use App\Mail\StoreMail;

class Post extends Model
{

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    protected static function booted(): void
    {
        static::created(function ($post) {
            Mail::to("banyar@gmail.com")->send(new StoreMail($post));
        });
        static::updated(function ($post) {
            Mail::to("banyar@gmail.com")->send(new StoreMail($post));
        });
    }

    protected $guarded = [];
    protected $table = 'posts';
}
