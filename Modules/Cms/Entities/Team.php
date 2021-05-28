<?php

namespace Modules\Cms\Entities;

use App\Models\BaseModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Team extends BaseModel implements hasMedia
{
    use hasMediaTrait;

    protected $table = 'teams';

    protected $fillable = [
        'name',
		'designation'
    ];

    protected $hidden = [];

    protected $appends = ['avatar'];

    protected $casts = [
        'name' => 'string',
		'designation' => 'string',
    ];

    // get avatar attribute
    public function getAvatarAttribute()
    {
        $media = $this->getMedia(config('core.media_collection.team.avatar'));
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
        // check for avatar
        if (request()->hasFile('avatar')) {
            // remove old file from collection
            if ($this->hasMedia(config('core.media_collection.team.avatar'))) {
                $this->clearMediaCollection(config('core.media_collection.team.avatar'));
            }
            // upload new file to collection
            $this->addMediaFromRequest('avatar')
                ->toMediaCollection(config('core.media_collection.team.avatar'));
        }
    }
}
