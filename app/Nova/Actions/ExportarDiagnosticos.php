<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class ExportarDiagnosticos extends DownloadExcel
{
    use InteractsWithQueue, Queueable;

    public function name(){
        return 'Exportar Diagnosticos';
    }

    public function headings(): array {
        return [
            'Requisito ID',
            'Nombre',
            
       
        ];
    }
    
    public function map($row): array {
        return [
            $row->diagnostico_id,
            $row->diagnostico_nombre,
            
            
    
        ];
    }
}
