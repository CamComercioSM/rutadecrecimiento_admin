<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class ExportarTipoPreguntas extends DownloadExcel
{
    use InteractsWithQueue, Queueable;

    public function name(){
        return 'Exportar Tipos de preguntas';
    }

    public function headings(): array {
        return [
            
            'preguntatipo_id',
            'Nombre',
            
            
       
        ];
    }
    
    public function map($row): array {
        return [
            $row->preguntatipo_id,
            $row->preguntatipo_nombre,
            
            
    
        ];
    }
}
