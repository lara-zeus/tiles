<?php

namespace LaraZeus\Tiles\Tables\Columns;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\Concerns\HasIcon;
use LaraZeus\Tiles\Concerns\HasTile;

class TileColumn extends Column
{
    use HasIcon;
    use HasTile;

    protected string $view = 'zeus-tiles::components.tile';

    protected function setUp(): void
    {
        parent::setUp();

        $this->disabledClick();
    }
}
