# A trait to make Eloquent models translatable

[![Latest Version on Packagist](https://img.shields.io/packagist/v/typicms/translatable.svg?style=flat-square)](https://packagist.org/packages/typicms/translatable)
[![MIT Licensed](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/typicms/translatable/run-tests.yml)

This project is based on spatie/laravel-translatable, it resolves inconsistencies that have arisen over time in the initial project. 

This package contains a trait `HasTranslations` to make Eloquent models translatable. Translations are stored as json. There is no extra table needed to hold them.

```php
use Illuminate\Database\Eloquent\Model;
use TypiCMS\Translatable\HasTranslations;

class NewsItem extends Model
{
    use HasTranslations;
    
    // ...
}
```

After the trait is applied on the model you can do these things:

```php
$newsItem = new NewsItem;
$newsItem
   ->setTranslation('name', 'en', 'Name in English')
   ->setTranslation('name', 'nl', 'Naam in het Nederlands')
   ->save();

$newsItem->name; // Returns 'Name in English' given that the current app locale is 'en'
$newsItem->getTranslation('name', 'nl'); // returns 'Naam in het Nederlands'

app()->setLocale('nl');

$newsItem->name; // Returns 'Naam in het Nederlands'

// If you want to query records based on locales, you can use the `whereLocale` and `whereLocales` methods.

NewsItem::whereLocale('name', 'en')->get(); // Returns all news items with a name in English

NewsItem::whereLocales('name', ['en', 'nl'])->get(); // Returns all news items with a name in English or Dutch
```

## Testing

```bash
composer test
```

## Security

If you've found a bug regarding security please mail [sdebacker@gmail.com](mailto:sdebacker@gmail.com) instead of using the issue tracker.

## Credits

- [Freek Van der Herten](https://github.com/freekmurze)
- [Sebastian De Deyne](https://github.com/sebastiandedeyne)
- [All Contributors](../../contributors)

We got the idea to store translations as json in a column from [Mohamed Said](https://github.com/themsaid). Parts of the readme of [his multilingual package](https://github.com/themsaid/laravel-multilingual) were used in this readme.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
