---
title: Usage
weight: 3
---

## Form Layout

to use the tiles as a Form Layout, useful to show information like `Created By` in edit page:

@blade
<x-auto-screenshot name="tiles/form-layout" alt="using tiles component in forms" />
@endblade

```php
TileLayout::make('name')
    ->columnSpanFull()
    ->label('Created By')
    ->icon('tabler-dots-vertical')
    ->description(fn(User $record) => $record->email)
    ->popover(fn(User $record) => view('filament.hooks.user-popover', ['record' => $record]))
    ->tooltip(fn(User $record) => $record->id)
    ->image(fn(User $record) => $record->profile_photo_url),
```

## Forms Select:

use the tile select component to list users with avatar, or products with its image

@blade
<x-auto-screenshot name="tiles/form-select" alt="using tiles component in forms" />
@endblade

```php
TileSelect::make('billable_id')
    ->model(User::class)
    ->titleKey('name')
    ->imageKey('profile_photo_url')
    ->descriptionKey('email')
    ->label('User'),
```

## Table Column:

show the user info in the table with avatar and description

@blade
<x-auto-screenshot name="tiles/table-column" alt="using tiles component in table column" />
@endblade

```php
TileColumn::make('name')
    ->icon('tabler-dots-vertical')
    ->description(fn(User $record) => $record->email)
    ->popover(fn(User $record) => view('filament.hooks.user-popover', ['record' => $record]))
    ->tooltip(fn(User $record) => $record->id)
    ->image(fn(User $record) => $record->profile_photo_url),
```

## Infolist Entry:

show the user info in the infolist with avatar and description

@blade
<x-auto-screenshot name="tiles/infolist-entry" alt="using tiles component in infolist entry" />
@endblade

```php
TileEntry::make('name')
    ->icon('tabler-dots-vertical')
    ->description(fn(User $record) => $record->email)
    ->popover(fn(User $record) => view('filament.hooks.user-popover', ['record' => $record]))
    ->tooltip(fn(User $record) => $record->id)
    ->image(fn(User $record) => $record->profile_photo_url),
```
