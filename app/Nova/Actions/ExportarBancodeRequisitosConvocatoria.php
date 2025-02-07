<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class ExportarBancodeRequisitosConvocatoria extends DownloadExcel
{
    use InteractsWithQueue, Queueable;

    public function name(){
        return 'Exportar Banco de requisitos de convocatoria';
    }

    public function headings(): array {
        return [
            'Requisito ID',
            'Nombre',
       
        ];
    }
    
    public function map($row): array {
        return [
            $row->requisito_id,
            $row->requisito_titulo,
    
        ];
    }
}
