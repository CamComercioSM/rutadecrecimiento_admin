<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class ExportarPreguntasBaseDiagnosticos extends DownloadExcel
{
    use InteractsWithQueue, Queueable;

    public function name(){
        return 'Exportar Preguntas base de diagnósticos';
    }

    public function headings(): array {
        return [
            'pregunta_id',
            'Nombre',
            
            
       
        ];
    }
    
    public function map($row): array {
        return [
            $row->pregunta_id,
            $row->pregunta_titulo,
                        
    
        ];
    }
}
