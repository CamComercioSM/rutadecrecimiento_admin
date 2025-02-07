<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class ExportarEtapas extends DownloadExcel
{
    use InteractsWithQueue, Queueable;

    public function name(){
        return 'Exportar Etapas';
    }

    public function headings(): array {
        return [
            'ID',
            'Nombre',
            
            
       
        ];
    }
    
    public function map($row): array {
        return [
            $row->etapa_id,
            $row->name,
            
            
    
        ];
    }
}
