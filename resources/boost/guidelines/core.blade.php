## Lara Zeus Tiles (`lara-zeus/tiles`)

Collection of Filament UI components (`TileLayout`, `TileSelect`, `TileColumn`, `TileEntry`) to display media/avatar + title + description + optional popover/tooltip/icon tiles.

### Key Classes & Traits
- Form Layout Field: `LaraZeus\Tiles\Forms\Components\TileLayout` (extends `Filament\Forms\Components\Field`, uses `HasTile`, `HasTooltip`, supports `->icon(...)`)
- Form Select: `LaraZeus\Tiles\Forms\Components\TileSelect` (extends `Filament\Forms\Components\Select`, uses `LaraZeus\Tiles\Concerns\HasKeys`: `->model(...)`, `->titleKey(...)`, `->imageKey(...)`, `->descriptionKey(...)`)
- Table Column: `LaraZeus\Tiles\Tables\Columns\TileColumn` (extends `Filament\Tables\Columns\Column`, uses `HasTile`, `HasIcon`, calls `$this->disabledClick()`)
- Infolist Entry: `LaraZeus\Tiles\Infolists\Components\TileEntry` (extends `Filament\Infolists\Components\Entry`, uses `HasTile`, `HasIcon`)
- Traits: `LaraZeus\Tiles\Concerns\HasTile` (`image()`, `description()`, `popover()`), `LaraZeus\Tiles\Concerns\HasKeys` (`imageKey()`, `titleKey()`, `descriptionKey()`)
- ServiceProvider: `LaraZeus\Tiles\TilesServiceProvider` (package name `zeus-tiles`, registers `zeus-tiles` views)

### Rules & Pitfalls
- Not a panel plugin: there is no `Plugin` class to register on `Panel`.
- Add `./vendor/lara-zeus/tiles/resources/views/**/*.blade.php` to your Filament theme's Tailwind `content` paths so tile utility classes are compiled.
- `TileSelect` queries `$component->getModel()` directly and uses `->allowHtml()->native(false)`; when making it `searchable()`, configure searchable columns via `->searchable(['name', 'email'])` (used by `getSearchColumns()`), and always set `->model()`, `->titleKey()`, `->imageKey()`, `->descriptionKey()`.
- `TileColumn` calls `$this->disabledClick()` in `setUp()` to allow clicking the tile to toggle its popover without triggering row clicks.
