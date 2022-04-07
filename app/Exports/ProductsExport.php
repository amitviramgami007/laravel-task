<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Product;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductsExport implements FromCollection, ShouldAutoSize, WithHeadings, WithEvents, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Product Name',
            'Price',
            'Image',
            'Created At',
            'Updated At',
            'Created By',
            'Updated By',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event)
            {
                $event->sheet->getStyle('A1:H1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
            },
        ];
    }

    public function map($product): array
    {
        return [
            $product->id,
            $product->product_name,
            $product->price,
            $product->image,
            Carbon::parse($product->created_at)->format('d-m-Y H:i:s'),
            Carbon::parse($product->updated_at)->format('d-m-Y H:i:s'),
            getUserName($product->created_by),
            getUserName($product->updated_by),
        ];
    }
}
