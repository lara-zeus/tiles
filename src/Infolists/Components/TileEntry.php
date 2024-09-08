<?php

namespace LaraZeus\Tiles\Infolists\Components;

use Filament\Infolists\Components\Concerns\HasIcon;
use Filament\Infolists\Components\Entry;
use LaraZeus\Tiles\Concerns\HasTile;

class TileEntry extends Entry
{
    use HasIcon;
    use HasTile;

    protected string $view = 'zeus-tiles::components.tile';
}
