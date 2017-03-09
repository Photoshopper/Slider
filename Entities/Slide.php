<?php

namespace Modules\Slider\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Page\Entities\Page;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\App;

class Slide extends Model
{
    use Translatable;

    protected $table = 'slider__slides';
    public $translatedAttributes = [
        'title',
        'text',
        'uri',
        'url'
    ];
    protected $fillable = [
        'slider_id',
        'page_id',
        'target',
        'image',
        'weight',
        'published'
    ];

    /**
     * @var string
     */
    private $linkUrl;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * Get the slide url
     *
     * @return string
     */
    public function getUrl()
    {
        if(!empty($this->page_id)) {
            $this->linkUrl = URL::route('page', ['uri' => $this->page->slug]);
        } elseif(!empty($this->uri)) {
            $this->linkUrl = '/' . App::getLocale() . '/' . $this->uri;
        } elseif(!empty($this->url)) {
            $this->linkUrl = $this->url;
        }

        return $this->linkUrl;
    }
}
