<?php

namespace LaraZeus\Tiles\Tables\Columns;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\Concerns;
use LaraZeus\Tiles\Concerns\HasTile;

class TileColumn extends Column
{
    use Concerns\HasIcon;
    use HasTile;

    protected string $view = 'zeus-tiles::components.tile';

    protected function setUp(): void
    {
        parent::setUp();

        $this->disabledClick();
    }
}
