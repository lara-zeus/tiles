<?php

namespace LaraZeus\Tiles\Concerns;

use Closure;

trait HasTile
{
    protected null | string | Closure $image = null;

    protected null | string | Closure $description = null;

    protected null | string | Closure $popover = null;

    public function image(null | string | Closure $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getImage(): null | string | Closure
    {
        return $this->evaluate($this->image);
    }

    public function description(null | string | Closure $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): null | string | Closure
    {
        return $this->evaluate($this->description);
    }

    public function popover(null | string | Closure $popover): static
    {
        $this->popover = $popover;

        return $this;
    }

    public function getPopover(): null | string | Closure
    {
        return $this->evaluate($this->popover);
    }
}
