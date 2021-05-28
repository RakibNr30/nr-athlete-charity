<?php

namespace Modules\Cms\Entities;

use App\Models\BaseModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class News extends BaseModel implements HasMedia
{
    use Sluggable, HasMediaTrait;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'author_id',
        'display_date',
    ];

    protected $hidden = [];

    protected $appends = ['image', 'attachment'];

    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'description' => 'string',
        'author_id' => 'integer',
        'display_date' => 'timestamp',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getImageAttribute()
    {
        $media = $this->getMedia(config('core.media_collection.news.image'));
        if (isset($media[0])) {
            return json_decode(json_encode([
                'file_name' => $media[0]->file_name,
                'file_url' => $media[0]->getUrl()
            ]));
        }
        return null;
    }

    public function getAttachmentAttribute()
    {
        $media = $this->getMedia(config('core.media_collection.news.attachment'));
        if (isset($media[0])) {
            return json_decode(json_encode([
                'file_name' => $media[0]->file_name,
                'file_url' => $media[0]->getUrl()
            ]));
        }
        return null;
    }

    public function uploadFiles()
    {
        // check for image
        if (request()->hasFile('image')) {
            // remove old file from collection
            if ($this->hasMedia(config('core.media_collection.news.image'))) {
                $this->clearMediaCollection(config('core.media_collection.news.image'));
            }
            // upload new file to collection
            $this->addMediaFromRequest('image')
                ->toMediaCollection(config('core.media_collection.news.image'));
        }

        // check for attachment
        if (request()->hasFile('attachment')) {
            // remove old file from collection
            if ($this->hasMedia(config('core.media_collection.news.attachment'))) {
                $this->clearMediaCollection(config('core.media_collection.news.attachment'));
            }
            // upload new file to collection
            $this->addMediaFromRequest('attachment')
                ->toMediaCollection(config('core.media_collection.news.attachment'));
        }
    }
}
