<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class News extends Model implements HasMedia
{
    use CrudTrait, HasFactory, InteractsWithMedia, Notifiable, HasUuid;

    protected $fillable = ['title', 'slug', 'thumbnail', 'content', 'created_by'];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('news_thumbnail')
            ->acceptsMimeTypes(['image/png', 'image/jpeg', 'image/jpg'])
            ->singleFile();
    }

    public function newsThumbnail()
    {
        return $this->morphOne(\Spatie\MediaLibrary\MediaCollections\Models\Media::class, 'model')
            ->where('collection_name', 'news_thumbnail');
    }
}
