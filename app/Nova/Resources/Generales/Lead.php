<?php

namespace App\Nova\Resources\Generales;

use App\Nova\Actions\ExportLeads;
use App\Nova\Resources\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;

class Lead extends Resource {
    use HasSortableRows;

    public static $model = \App\Models\Lead::class;
    public static $title = 'id';
    public static $search = ['id', 'name', 'document', 'email'];

    public static function label() {
        return 'Leads';
    }

    public function fields(Request $request) {
        return [
            Select::make('Tipo', 'type')
                ->options([
                    0 => 'Idea de negocio',
                    1 => 'Empresa sin registrar',
                ])->displayUsingLabels()->sortable(),

            Text::make('Nombre y apellido', 'name')->sortable(),

            Text::make('Documento', 'document')->sortable(),

            Text::make('Email', 'email')->sortable(),

            Text::make('Celular', 'phone')->sortable(),

            Textarea::make('Descripción', 'description'),
          
            Textarea::make('Direccion', 'address'),
        ];
    }

    public function actions(Request $request) {
        return [
            new ExportLeads(),
        ];
    }
}
