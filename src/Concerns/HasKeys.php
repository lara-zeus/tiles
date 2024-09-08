<?php

namespace LaraZeus\Tiles\Concerns;

use Closure;

trait HasKeys
{
    protected null | string | Closure $imageKey = null;

    public function imageKey(null | string | Closure $imageKey): static
    {
        $this->imageKey = $imageKey;

        return $this;
    }

    public function getImageKey(): null | string | Closure
    {
        return $this->evaluate($this->imageKey);
    }

    protected null | string | Closure $titleKey = null;

    public function titleKey(null | string | Closure $titleKey): static
    {
        $this->titleKey = $titleKey;

        return $this;
    }

    public function getTitleKey(): null | string | Closure
    {
        return $this->evaluate($this->titleKey);
    }

    protected null | string | Closure $descriptionKey = null;

    public function descriptionKey(null | string | Closure $descriptionKey): static
    {
        $this->descriptionKey = $descriptionKey;

        return $this;
    }

    public function getDescriptionKey(): null | string | Closure
    {
        return $this->evaluate($this->descriptionKey);
    }
}
