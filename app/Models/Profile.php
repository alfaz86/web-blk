<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Profile extends Model implements HasMedia
{
    use CrudTrait, HasFactory, InteractsWithMedia, Notifiable, HasUuid;

    protected $fillable = ['organizational_structure', 'vission_and_mission'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('organizational_structure')
            ->acceptsMimeTypes(['image/png', 'image/jpeg', 'image/jpg'])
            ->singleFile();
    }

    public function organizationalStructureImage()
    {
        return $this->morphOne(\Spatie\MediaLibrary\MediaCollections\Models\Media::class, 'model')
            ->where('collection_name', 'organizational_structure');
    }
}
