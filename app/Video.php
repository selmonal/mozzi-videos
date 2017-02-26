<?php

namespace App;

use Alaouy\Youtube\Facades\Youtube;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['user'];

    /**
     * Create a video from youtube video info.
     *
     * @param stdClass $info
     *
     * @return Video
     */
    public static function fromYoutubeInfo($info)
    {
        return static::create([
            'title'        => $info->snippet->title,
            'description'  => $info->snippet->description,
            'thumbnail'    => $info->snippet->thumbnails->high->url,
            'src_video_id' => $info->id,
            'user_id'      => 1,
        ]);
    }

    /**
     * Create a video from youtube id.
     *
     * @param string $id
     *
     * @return Video
     */
    public static function fromYoutubeId($id)
    {
        $info = Youtube::getVideoInfo($id);

        return static::fromYoutubeInfo($info);
    }

    /**
     * Create a video from youtube url.
     *
     * @param string $id
     *
     * @return Video
     */
    public static function fromYoutubeUrl($url)
    {
        $videoId = Youtube::parseVidFromURL($url);

        return static::fromYoutubeId($videoId);
    }

    /**
     * @param Builder $query
     * @param string  $q
     */
    public function scopeSearch(Builder $query, $q)
    {
        return $query->where(function (Builder $query) use ($q) {
            return $query
                ->where('title', 'like', "%{$q}%")
                ->where('description', 'like', "%{$q}%");
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function incrementViewsCount()
    {
        $this->views_count++;

        $this->save();
    }
}
