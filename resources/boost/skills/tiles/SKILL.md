---
name: zeus-tiles
description: Render media-and-text tile fields, searchable selects, table columns, and infolist entries in Filament using lara-zeus/tiles.
---

# Lara Zeus Tiles (`lara-zeus/tiles`)

## Overview & Requirements
- **Package**: `lara-zeus/tiles` (Free / MIT)
- **Requirements**: PHP `^8.2`, `filament/filament` `^5.0`
- **Purpose**: Provides Filament Form, Table, and Infolist components to display rich tiles with an image/avatar, title, description, icon, tooltip, and popover.

## Installation
```bash
composer require lara-zeus/tiles
```

## Configuration & Migrations
No migrations or config publishing required (`TilesServiceProvider` only registers views under `zeus-tiles`).
If using a custom Filament theme, add the package views to `tailwind.config.js`:
```js
content: [
    './vendor/lara-zeus/tiles/resources/views/**/*.blade.php',
]
```

## Filament Panel Registration
No panel plugin registration required; import and use the components directly in your Filament schemas and tables.

## Core Usage & Examples

### Form `TileLayout`
```php
use LaraZeus\Tiles\Forms\Components\TileLayout;

TileLayout::make('name')
    ->columnSpanFull()
    ->label('Created By')
    ->icon('tabler-dots-vertical')
    ->description(fn (User $record) => $record->email)
    ->popover(fn (User $record) => view('filament.hooks.user-popover', ['record' => $record]))
    ->tooltip(fn (User $record) => $record->id)
    ->image(fn (User $record) => $record->profile_photo_url);
```

### Form `TileSelect`
```php
use LaraZeus\Tiles\Forms\Components\TileSelect;

TileSelect::make('user_id')
    ->model(User::class)
    ->titleKey('name')
    ->imageKey('profile_photo_url')
    ->descriptionKey('email')
    ->searchable(['name', 'email'])
    ->label('User');
```

### Table `TileColumn`
```php
use LaraZeus\Tiles\Tables\Columns\TileColumn;

TileColumn::make('name')
    ->icon('tabler-dots-vertical')
    ->description(fn (User $record) => $record->email)
    ->popover(fn (User $record) => view('filament.hooks.user-popover', ['record' => $record]))
    ->tooltip(fn (User $record) => $record->id)
    ->image(fn (User $record) => $record->profile_photo_url);
```

### Infolist `TileEntry`
```php
use LaraZeus\Tiles\Infolists\Components\TileEntry;

TileEntry::make('name')
    ->icon('tabler-dots-vertical')
    ->description(fn (User $record) => $record->email)
    ->popover(fn (User $record) => view('filament.hooks.user-popover', ['record' => $record]))
    ->tooltip(fn (User $record) => $record->id)
    ->image(fn (User $record) => $record->profile_photo_url);
```

## Common Pitfalls & Anti-Patterns
- **Missing `TileSelect` keys or model**: `TileSelect::getCleanOptionString()` accesses `$model->{$title}`, `$model->{$description}`, and `$model->{$image}`; set `model()`, `titleKey()`, `imageKey()`, and `descriptionKey()`.
- **Search without columns**: `TileSelect::getSearchResultsUsing()` loops over `Arr::wrap($component->getSearchColumns())`; pass columns to `->searchable(['name', 'email'])` rather than bare `->searchable()`.
- **Row click conflicts**: `TileColumn` calls `$this->disabledClick()` in `setUp()` so popover toggles work cleanly without triggering table record URLs.
