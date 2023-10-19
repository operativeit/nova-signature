# Laravel Nova 4 Signature

This [Nova](https://nova.laravel.com/) field lets you save a signature as a field for your resource.
It's based on the work of [lab404/nova-signature](https://packagist.org/packages/lab404/nova-signature) that works only with Nova 3 as fare as I know.

![signature 1](https://github.com/operativeit/nova-signature/assets/188766/0d46c72d-987d-4d3c-a0cf-5edcdd18efb8)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/operativeit/nova-signature.svg?style=flat-square)](https://packagist.org/packages/operativeit/nova-signature)
[![Total Downloads](https://img.shields.io/packagist/dt/operativeit/nova-signature.svg?style=flat-square)](https://packagist.org/packages/operativeit/nova-signature)
![GitHub forks](https://img.shields.io/github/forks/operativeit/nova-signature)
![GitHub issues](https://img.shields.io/github/issues/operativeit/nova-signature)
[![License](https://img.shields.io/packagist/l/operativeit/nova-signature)](https://github.com/operativeit/nova-signature/blob/master/LICENSE.md)

Behind the scenes [WangShayne/vue3-signature](https://github.com/WangShayne/vue3-signature) is used.

Note that vue3-signature doesn't expose all signature pad components so to get it working with our component it was required to patch library to propagate "begin" and "end" event to parent component as I was unable to use a watcher as in the previous version [WangShayne/vue3-signature](https://github.com/WangShayne/vue3-signature).

Here our patched fork [operativeit/vue3-signature](https://github.com/operativeit/vue3-signature).

## Installation

`composer require eom-plus/nova-signature`

## Usage

In your nova resource make the field `Eom\NovaSignature\NovaSignature`.
This field fits perfectly with a `TEXT` column and can be used both for resources and actions.

```php
use EomPlus\NovaSignature\Signature;

// ...

public function fields()
{
    return [
        // ...
        Signature::make('Signature'),
        // ...
    ];
}
```

## Configuration

Showed example values are the default ones.

```php
Signature::make('Signature')
    ->color('black') // (string) Any css compatible value: "red", "rgb(0, 0, 0)", ...
    ->bgColor('white') // (string) Same as 'color'
    ->width('100%') // (string) Any css compatible value: "100%", "200px", ...
    ->height('250px') // (string) Same as 'width'
```

### Validation

You can use the `signature` validation rules to check if the signature is valid.
We also provide the `validSignature` method that adds `nullable` and `signature` rules.

```php
// With validSignature() 
Signature::make('Signature')
    ->validSignature() // 'nullable' and 'signature' rules

// Your own rules
Signature::make('Signature')
    ->rules('signature', ...) 
```

## ⭐️ Show Your Support

Please give a ⭐️ if this project helped you!

### Other Packages You Might Like

- [Nova Rating Field](https://github.com/operativeit/nova-rating-field) - A Star rating Nova 4 field to use in your Laravel Nova apps.
- [Nova Feedback Field](https://github.com/operativeit/nova-feedback-field) - An Emoji feedback Nova 4 field to use in your Laravel Nova apps.
- [Nova Input Group](https://github.com/operativeit/nova-input-group) - A Laravel Nova 4 text field formatted as input group
- [Nova Signature](https://github.com/operativeit/nova-signature) - A Laravel Nova 4 signature pad
 
Take a look to our Github repositories as we have a lot of forked nova components with fixes that are still not merge into main owner branch.

## License

The MIT License (MIT). Please see [License File](https://github.com/operativeit/nova-signature/blob/master/LICENSE.md) for more information.

