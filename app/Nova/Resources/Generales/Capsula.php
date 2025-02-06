<?php

namespace App\Nova\Resources\Generales;

use App\Nova\Resources\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Capsula extends Resource 
{
    public static $model = \App\Models\Capsula::class;
    public static $title = 'id';
    public static $search = ['capsula_id', 'nombre', 'descripcion'];

    public static function label() {
        return 'Capsulas';
    }

    public function fields(Request $request) {
        return [
            ID::make('capsula_id')->sortable(),

            Image::make('Imagen', 'imagen')
                ->disk('public')->path('storage/capsules'),

            Text::make('Nombre', 'nombre')
                ->rules('required')->sortable(),

            Textarea::make('Descripción', 'descripcion'),

            Text::make('URL Video', 'url_video')->sortable(),
        ];
    }
}
