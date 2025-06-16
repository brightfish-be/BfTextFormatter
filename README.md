# Format text the Brightfish way

[![Tests](https://github.com/brightfish-be/TextFormatter/actions/workflows/run-tests.yml/badge.svg)](https://github.com/brightfish-be/TextFormatter/actions/workflows/run-tests.yml)


```
├── BaseFormatter.php
├── CampaignNameFormatter.php
├── CinemaNameFormatter.php
├── CompanyNameFormatter.php
├── CountryNameFormatter.php
├── MovieTitleFormatter.php
├── PersonNameFormatter.php
└── VatNumberFormatter.php
```

## Installation

You can install the package via composer:

```bash
composer require brightfish/bf-text-formatter
```

## Usage

### BaseFormatter

```php
// generic text formatter
use Brightfish\TextFormatter\BaseFormatter;

$formatter = new BaseFormatter;
$formatter->uppercaseWords(['cia', 'fbi', 'nsa']);
$formatter->lowercaseWords(['in', 'a', 'the']);
$formatter->removeWords(['draft', 'void', 'obsolete']);
$result = $formatter->clean("The dog in the house"); // the Dog in the House

$formatter = (new BaseFormatter)->setForceTransliterate(true);
```

### CampaignNameFormatter

```php
use Brightfish\TextFormatter\CampaignNameFormatter;

$formatter = new CampaignNameFormatter();
```

### CinemaNameFormatter

```php
use Brightfish\TextFormatter\CinemaNameFormatter;

$formatter = new CinemaNameFormatter();
$result = $formatter->format("pathe charleroi");    // Pathé Charleroi
```

### CompanyNameFormatter

```php
use Brightfish\TextFormatter\CompanyNameFormatter;

$formatter = new CompanyNameFormatter();
```

### MovieTitleFormatter

```php
use Brightfish\TextFormatter\MovieTitleFormatter;

$formatter = new MovieTitleFormatter();
```

### PersonNameFormatter

```php
use Brightfish\TextFormatter\PersonNameFormatter;

$formatter = new PersonNameFormatter();
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
