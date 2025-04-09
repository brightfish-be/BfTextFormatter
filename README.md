# Format text the Brightfish way

[![Tests](https://github.com/brightfish-be/TextFormatter/actions/workflows/run-tests.yml/badge.svg)](https://github.com/brightfish-be/TextFormatter/actions/workflows/run-tests.yml)


```
src/                                                                                                                                                                                                                                
├── BaseFormatter.php
├── CampaignNameFormatter.php
├── CinemaNameFormatter.php
├── CompanyNameFormatter.php
├── MovieTitleFormatter.php
├── PersonNameFormatter.php
└── VatNumberFormatter.php
```

## Installation

You can install the package via composer:

```bash
# first add new private repository - you will need a GitHub token
composer config repositories.repo-name vcs https://github.com/brightfish-be/TextFormatter
# now require the private package
composer require brightfish/textformatter
```

> When you need to access _private_ GitHub repositories as well, go to:
https://github.com/settings/tokens/new?scopes=repo&description=Composer+on+BFLR-PFORRET22+(date))
>
> Note that such tokens have broad read/write permissions on your behalf, even if not needed by Composer.
Tokens will be stored in plain text in "$HOME/.config/composer/auth.json" for future use by Composer.

## Usage

```php
$formatter = new Brightfish\TextFormatter();

// format VAT numbers
echo $formatter->formatVatNumber('BE0123.456.789'); // BE0123456789;
echo $formatter->formatVatNumber('FR123.456.789');  // FR123456789;
echo $formatter->formatVatNumber('123.456.789');    // BE0123456789;
echo $formatter->formatVatNumber('123-456-789');    // BE0123456789;
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.


## Credits

- [Peter Forret @ BF](https://github.com/brightfish)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
