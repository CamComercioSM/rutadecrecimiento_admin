<?php

namespace App\Nova\Actions;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class ExportarBancoRequisitosIndicadoresConvocatorias extends DownloadExcel
{
    use InteractsWithQueue, Queueable;

    public function name(){
        return 'Exportar Banco requisitos-indicadores convocatorias';
    }

    public function headings(): array {
        return [
            
            'Reqisito ID',
            'Nombre',
            'Indicador',
            
       
        ];
    }
    
    public function map($row): array {
        return [
            $row->requisito_id,
            $row->requisito_titulo,
            $row->indicador->indicador_nombre, // Acceder al nombre del indicador desde la relación
            
            
    
        ];
    }
}
