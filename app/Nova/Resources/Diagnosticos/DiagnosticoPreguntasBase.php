<?php

namespace App\Nova\Resources\Diagnosticos;
use App\Nova\Actions\ExportarPreguntasBaseDiagnosticos;
use App\Nova\Resources\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;

class DiagnosticoPreguntasBase extends Resource
{
    public static $model = \App\Models\DiagnosticoPregunta::class;
    public static $title = 'pregunta_titulo';
    public static $search = [
        'pregunta_id', 'pregunta_titulo'
    ];

    public static function label() {
        return 'Preguntas base de diagnósticos';
    }

    public static function singularLabel(){
        return 'Pregunta base de diagnóstico';
    }
    
    public function fields(Request $request) {
        return [
            ID::make('pregunta_id')->sortable(),

            Text::make('Nombre', 'pregunta_titulo')
                ->rules('required')->sortable(),

            Select::make('Grupo', 'preguntagrupo_id')
                ->hideFromIndex()
                ->options(\App\Models\PreguntaGrupo::pluck('preguntagrupo_nombre', 'preguntagrupo_id')->toArray())
                ->displayUsingLabels()
                ->rules('required')->sortable(),

            Select::make('Tipo', 'preguntatipo_id')
                ->hideFromIndex()
                ->options(\App\Models\PreguntaTipo::pluck('preguntatipo_nombre', 'preguntatipo_id')->toArray())
                ->displayUsingLabels()
                ->rules('required'),

            Select::make('Dimensión', 'preguntadimension_id')
                ->hideFromIndex()
                ->options(\App\Models\PreguntaDimension::pluck('preguntadimension_nombre', 'preguntadimension_id')->toArray())
                ->displayUsingLabels()
                ->rules('required'),
            
            Number::make('Nivel de porcentaje', 'pregunta_porcentaje')->rules('required')
                ->min(0)
                ->max(100)
                ->help('Recuerde que la sumataria de los niveles de todas preguntas de la misma dimension debe ser 100%')->sortable(),

            HasMany::make('Opciones', 'opciones', PreguntaOpcionBase::class)
                ->canSee(function () {return $this->tipo && $this->tipo->preguntatipo_opciones; }),
        ];
    }

    public static function indexQuery(Request $request, $query)
    {
        return $query->whereNull('diagnostico_id');
    }
    public function actions(Request $request) {
        return [ 
            new ExportarPreguntasBaseDiagnosticos(),
            
        ];
    } 
    public static function uriKey()
    {
        return 'diagnostico-preguntas-base';
    }
}
