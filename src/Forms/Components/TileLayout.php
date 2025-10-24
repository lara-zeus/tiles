<?php

namespace LaraZeus\Tiles\Forms\Components;

use Closure;
use Filament\Forms\Components\Field;
use Filament\Support\Concerns\HasTooltip;
use LaraZeus\Tiles\Concerns\HasTile;

class TileLayout extends Field
{
    use HasTile;
    use HasTooltip;

    protected string $view = 'zeus-tiles::components.tile';

    protected string | Closure | null $icon = null;

    public function icon(string | Closure | null $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function getIcon(): string | Closure | null
    {
        return $this->evaluate($this->icon);
    }
}
