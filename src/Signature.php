<?php

namespace EomPlus\NovaSignature;

use Laravel\Nova\Fields\Field;

class Signature extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-signature';

    public function color(string $color): self
    {
        return $this->withMeta(['color' => $color]);
    }

    public function bgColor(string $color): self
    {
        return $this->withMeta(['bgColor' => $color]);
    }

    public function height(string $height): self
    {
        return $this->withMeta(['height' => $height]);
    }

    public function asSvg(): self
    {
        return $this->withMeta(['format' => 'image/svg+xml' ]);
    }

    public function asJpg(): self
    {
        return $this->withMeta(['format' => 'image/jpg' ]);
    }

    public function width(string $width): self
    {
        return $this->withMeta(['width' => $width]);
    }

    public function validSignature(): self
    {
        $this->rules([
            'nullable',
            'signature'
        ]);

        return $this;
    }

}
