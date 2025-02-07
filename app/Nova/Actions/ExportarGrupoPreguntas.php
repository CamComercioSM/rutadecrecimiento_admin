<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class ExportarGrupoPreguntas extends DownloadExcel
{
    use InteractsWithQueue, Queueable;

    public function name(){
        return 'Exportar Programas';
    }

    public function headings(): array {
        return [
            
            'preguntagrupo_id',
            'Nombre',
            
            
       
        ];
    }
    
    public function map($row): array {
        return [
            $row->preguntagrupo_id,
            $row->preguntagrupo_nombre,
            
            
    
        ];
    }
}
