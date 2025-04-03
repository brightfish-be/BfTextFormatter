# Format text the Brightfish way

[![Tests](https://github.com/brightfish-be/TextFormatter/actions/workflows/run-tests.yml/badge.svg)](https://github.com/brightfish-be/TextFormatter/actions/workflows/run-tests.yml)


This is where your description should go. Try and limit it to a paragraph or two. Consider adding a small example.



## Installation

You can install the package via composer:

```bash
composer require brightfish/textformatter
```

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

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Credits

- [Peter Forret @ BF](https://github.com/brightfish)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
