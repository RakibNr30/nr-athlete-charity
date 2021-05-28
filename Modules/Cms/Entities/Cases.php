<?php

namespace Modules\Cms\Entities;

use App\Models\BaseModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Cases extends BaseModel implements HasMedia
{
    use Sluggable, HasMediaTrait;

    protected $table = 'cases';

    protected $fillable = [
        'title',
        'slug',
        'area_id',
        'affected_people',
        'needed_money',
        'description',
        'author_id',
        'display_date',
        'status',
    ];

    protected $hidden = [];

    protected $appends = ['image', 'attachment'];

    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'area_id' => 'integer',
        'affected_people' => 'integer',
        'needed_money' => 'integer',
        'description' => 'string',
        'author_id' => 'integer',
        'display_date' => 'timestamp',
        'status' => 'integer',
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
        $media = $this->getMedia(config('core.media_collection.cases.image'));
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
        $media = $this->getMedia(config('core.media_collection.cases.attachment'));
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
            if ($this->hasMedia(config('core.media_collection.cases.image'))) {
                $this->clearMediaCollection(config('core.media_collection.cases.image'));
            }
            // upload new file to collection
            $this->addMediaFromRequest('image')
                ->toMediaCollection(config('core.media_collection.cases.image'));
        }

        // check for attachment
        if (request()->hasFile('attachment')) {
            // remove old file from collection
            if ($this->hasMedia(config('core.media_collection.cases.attachment'))) {
                $this->clearMediaCollection(config('core.media_collection.cases.attachment'));
            }
            // upload new file to collection
            $this->addMediaFromRequest('attachment')
                ->toMediaCollection(config('core.media_collection.cases.attachment'));
        }
    }

    public function area() {
        return $this->belongsTo(Country::class, 'area_id', 'id');
    }

    public function donations() {
        return $this->hasMany(Donation::class, 'case_id', 'id');
    }
}
