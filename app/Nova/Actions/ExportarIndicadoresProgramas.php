<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class ExportarIndicadoresProgramas extends DownloadExcel
{
    use InteractsWithQueue, Queueable;

    public function name(){
        return 'Exportar Indicadores de programas';
    }

    public function headings(): array {
        return [
            
            'Nombre',
            
       
        ];
    }
    
    public function map($row): array {
        return [
            $row->indicador_nombre,
            
            
    
        ];
    }
}
