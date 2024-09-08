---
title: Usage
weight: 3
---

## Form Layout

to use the tiles as a Form Layout, usefull to show `Created By` in edit page

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

```php
TileColumn::make('name')
    ->icon('tabler-dots-vertical')
    ->description(fn(User $record) => $record->email)
    ->popover(fn(User $record) => view('filament.hooks.user-popover', ['record' => $record]))
    ->tooltip(fn(User $record) => $record->id)
    ->image(fn(User $record) => $record->profile_photo_url),
```

## infolist entry:

show the user info in the infolist with avatar and description

```php
TileEntry::make('name')
    ->icon('tabler-dots-vertical')
    ->description(fn(User $record) => $record->email)
    ->popover(fn(User $record) => view('filament.hooks.user-popover', ['record' => $record]))
    ->tooltip(fn(User $record) => $record->id)
    ->image(fn(User $record) => $record->profile_photo_url),
```
