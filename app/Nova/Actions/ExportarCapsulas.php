<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class ExportarCapsulas extends DownloadExcel
{
    use InteractsWithQueue, Queueable;

    public function name(){
        return 'Exportar Capsulas';
    }

    public function headings(): array {
        return [
            'capsula_id',
            'Nombre',
            
            
       
        ];
    }
    
    public function map($row): array {
        return [
            $row->capsula_id,
            $row->nombre,
            
            
    
        ];
    }
}
