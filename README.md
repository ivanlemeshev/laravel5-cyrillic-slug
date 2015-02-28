# Laravel 5 Cyrillic Slug

## Supported Alphabets
    * Russian
    * Kazakh
    * Ukrainian

## Installation

You should install this package through Composer.

Edit your project's `composer.json` file to require `ivanlemeshev/laravel5-cyrillic-slug`.

    "require": {
        "ivanlemeshev/laravel5-cyrillic-slug": "1.0.0"
    },

Next, update Composer from the Terminal:
    `composer update`

Once this operation completes, the final step is to add the service provider.
Open `app/config/app.php`, and add a new item to the providers array.

  `'IvanLemeshev\Laravel5CyrillicSlug\SlugServiceProvider',`

And add a new item to the aliases array.

  `'Slug' => 'IvanLemeshev\Larave5lCyrillicSlug\SlugFacade',`

Usage
-------
Call of the method: `Slug::make($text)`

Call of the method with specific separator: `Slug::make($text, '_')`.
