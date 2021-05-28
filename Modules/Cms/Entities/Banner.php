<?php

namespace Modules\Cms\Entities;

use App\Models\BaseModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Banner extends BaseModel implements HasMedia
{
    use HasMediaTrait;

    protected $table = 'banners';

    protected $fillable = [
        'tag_line',
        'title',
        'brief_description',
        'button_one',
        'button_one_link',
        'button_two',
        'button_two_link',
    ];

    protected $hidden = [];

    protected $appends = ['avatar_one', 'avatar_two'];

    protected $casts = [
        'tag_line' => 'string',
        'title' => 'string',
        'brief_description' => 'string',
        'button_one' => 'string',
        'button_one_link' => 'string',
        'button_two' => 'string',
        'button_two_link' => 'string',
    ];

    public function getAvatarOneAttribute()
    {
        $media = $this->getMedia(config('core.media_collection.banner.avatar_one'));
        if (isset($media[0])) {
            return json_decode(json_encode([
                'file_name' => $media[0]->file_name,
                'file_url' => $media[0]->getUrl()
            ]));
        }
        return null;
    }

    public function getAvatarTwoAttribute()
    {
        $media = $this->getMedia(config('core.media_collection.banner.avatar_two'));
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
        // check for avatar_one
        if (request()->hasFile('avatar_one')) {
            // remove old file from collection
            if ($this->hasMedia(config('core.media_collection.banner.avatar_one'))) {
                $this->clearMediaCollection(config('core.media_collection.banner.avatar_one'));
            }
            // upload new file to collection
            $this->addMediaFromRequest('avatar_one')
                ->toMediaCollection(config('core.media_collection.banner.avatar_one'));
        }

        // check for avatar_two
        if (request()->hasFile('avatar_two')) {
            // remove old file from collection
            if ($this->hasMedia(config('core.media_collection.banner.avatar_two'))) {
                $this->clearMediaCollection(config('core.media_collection.banner.avatar_two'));
            }
            // upload new file to collection
            $this->addMediaFromRequest('avatar_two')
                ->toMediaCollection(config('core.media_collection.banner.avatar_two'));
        }
    }
}
