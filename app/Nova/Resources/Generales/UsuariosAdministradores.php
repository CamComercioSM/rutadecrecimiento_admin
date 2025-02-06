<?php

namespace App\Nova\Resources\Generales;

use App\Nova\Actions\ExportarUsuariosAdministradores;
use App\Nova\Resources\Resource;
use Benjacho\BelongsToManyField\BelongsToManyField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class UsuariosAdministradores extends Resource {
    public static $model = \App\Models\User::class;
    public static $title = 'name';
    public static $search = ['id', 'name', 'lastname', 'email'];

    public static function label() {
        return 'Administradores';
    }

    public static function singularLabel() {
        return 'Administrador';
    }

    public static function uriKey()
    {
        return 'administradores';
    }

    public function fields(Request $request) {
        return [
            Number::make('No documento', 'identification')
                ->rules('required')->sortable(),
                
            Text::make('Nombre (s)', 'name')
                ->rules('required', 'max:255')->sortable(),

            Text::make('Apellido (s)', 'lastname')
                ->rules('required', 'max:255')->sortable(),

            Text::make('Cargo', 'position')
                ->sortable()
                ->rules('required', 'max:255')->sortable(),

            Text::make('Email')
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}')->sortable(),

            Password::make('Contraseña', 'password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8')->sortable(),

            BelongsToManyField::make('Roles', 'roles', Role::class)->sortable()
        ];
    }

    public function actions(Request $request) {
        return [ 
            new ExportarUsuariosAdministradores()
        ];
    } 

    public static function indexQuery(NovaRequest $request, $query) {
       
        /** @var User $user */
        $user = Auth::user();

        if ($user->hasAnyRole(['superadmin'])) {
            return $query->whereHas('roles');
        }
        else
        if ($user->hasAnyRole(['cordinator'])) {

            return $query->whereHas('roles', function ($q) {
                $q->where('name', 'adviser');
            })->orwhere('id', Auth::id());
        }

        return false;
    }
}
