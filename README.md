# Filament Goto Active Item

A Filament plugin that smoothly scrolls to the active navigation item in SPA mode, enhancing navigation experience by automatically highlighting and scrolling to the current section.

## Overview

When navigating between pages in SPA mode, this plugin automatically detects the active navigation item and smoothly scrolls it into view, ensuring users always know where they are in the navigation hierarchy.

## Features
- 🚀 Automatic scrolling to active navigation items
- 🎯 Smooth scroll animations
- ⚡ SPA mode optimized
- ⚙️ Highly configurable
- 🛠️ Easy to install and use (plug & play)

## Requirements

- PHP ^8.0
- Laravel ^10.0|^11.0
- Filament ^3.0

## Installation

You can install the package via composer:

```bash
composer require hoceineel/filament-goto-active-item
```

## Usage

Register the plugin in your Panel provider:

```php
use HoceineEl\GotoActiveItem\FilamentGotoActiveItemPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            FilamentGotoActiveItemPlugin::make()
        ]);
}
```

## Configuration

### Timeout

Control the delay before scrolling (allows time for DOM updates):

```php
FilamentGotoActiveItemPlugin::make()
    ->setTimeout(100) // milliseconds
```

### Offset

Adjust the scroll position offset from the top:

```php
FilamentGotoActiveItemPlugin::make()
    ->setOffset(250) // pixels
```

### Scroll Behavior

Customize the scroll animation:

```php
FilamentGotoActiveItemPlugin::make()
    ->setScrollBehavior('smooth') // 'smooth' or 'auto' 
```

## Full Configuration Example

```php
use HoceineEl\GotoActiveItem\FilamentGotoActiveItemPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            FilamentGotoActiveItemPlugin::make()
                ->setTimeout(100)
                ->setOffset(250)
                ->setScrollBehavior('smooth')
        ]);
}
```

## Support

If you discover any issues or have questions, please [create an issue](https://github.com/hoceineel/filament-goto-active-item/issues).

## Credits

- [Hoceine El Idrissi](https://github.com/hoceineel)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

