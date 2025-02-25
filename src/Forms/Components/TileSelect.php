<?php

namespace LaraZeus\Tiles\Forms\Components;

use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use LaraZeus\Tiles\Concerns\HasKeys;

class TileSelect extends Select
{
    use HasKeys;

    protected function setUp(): void
    {
        parent::setUp();

        $this
            ->allowHtml()
            ->native(false)
            ->options(function (TileSelect $component) {
                return $component->getModel()::query()
                    ->get()
                    ->mapWithKeys(function ($item) use ($component) {
                        return [$item->getKey() => static::getCleanOptionString($item, $component)];
                    })
                    ->toArray();
            })
            ->getSearchResultsUsing(function (string $search, TileSelect $component) {
                $searchColumns = Arr::wrap($component->getSearchColumns());
                $query = $component->getModel()::query();
                foreach ($searchColumns as $searchColumn) {
                    $query = $query->orWhere($searchColumn, 'like', "%{$search}%");
                }
                $query = $query
                    ->get()
                    ->mapWithKeys(function ($item) use ($component) {
                        return [$item->getKey() => static::getCleanOptionString($item, $component)];
                    })
                    ->toArray();

                return $query;
            })
            ->getOptionLabelUsing(function (string $value, TileSelect $component): string {
                $item = $component->getModel()::find($value);

                return static::getCleanOptionString($item, $component);
            });
    }

    public static function getCleanOptionString(Model $model, TileSelect $component): string
    {
        $image = $component->getImageKey();
        $title = $component->getTitleKey();
        $description = $component->getDescriptionKey();

        return view('zeus-tiles::components.select-tile')
            ->with('title', $model->{$title})
            ->with('description', $model->{$description})
            ->with('image', $model->{$image})
            ->render();
    }
}
