<?php namespace IvanLemeshev\Laravel5CyrillicSlug;

use Illuminate\Support\Facades\Facade;

class SlugFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'slug';
    }
}
