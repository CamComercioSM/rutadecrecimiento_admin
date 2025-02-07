<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class ExportarProgramas extends DownloadExcel
{
    use InteractsWithQueue, Queueable;

    public function name(){
        return 'Exportar Programas';
    }

    public function headings(): array {
        return [
            
            'Nombre',
            'Duración',
            
       
        ];
    }
    
    public function map($row): array {
        return [
            $row->nombre,
            $row->duracion,
            
            
    
        ];
    }
}
