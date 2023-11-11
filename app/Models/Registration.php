<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Registration extends Model implements HasMedia
{
    use CrudTrait, HasFactory, InteractsWithMedia, Notifiable, HasUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'number',
        'address',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('ktp_image')
            ->acceptsMimeTypes(['image/png', 'image/jpeg', 'image/jpg'])
            ->singleFile();

        $this->addMediaCollection('kk_image')
            ->acceptsMimeTypes(['image/png', 'image/jpeg', 'image/jpg'])
            ->singleFile();
    }

    
    public function ktpImage()
    {
        return $this->morphOne(\Spatie\MediaLibrary\MediaCollections\Models\Media::class, 'model')
            ->where('collection_name', 'ktp_image');
    }

    
    public function kkImage()
    {
        return $this->morphOne(\Spatie\MediaLibrary\MediaCollections\Models\Media::class, 'model')
            ->where('collection_name', 'kk_image');
    }
}
