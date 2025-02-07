<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class ExportarDimensionPreguntas extends DownloadExcel
{
    use InteractsWithQueue, Queueable;

    public function name(){
        return 'Exportar Dimensiones de preguntas';
    }

    public function headings(): array {
        return [
            
            'preguntaDimension_id',
            'Nombre',
            
            
       
        ];
    }
    
    public function map($row): array {
        return [
            $row->preguntadimension_id,
            $row->preguntadimension_nombre,
            
            
    
        ];
    }
}
