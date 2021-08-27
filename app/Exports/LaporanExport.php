<?php

namespace App\Exports;
use App\Hasil_Temuan;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
        // protected $id;

        // function __construct($id)
        // {
        //     $this->id = $id;
        // }

        /**
         * @return \Illuminate\Support\Collection
         */

        public function collection()
        {

            $item = Hasil_Temuan::with('tindaklanjut')
                ->get();

            return $item;
        }

        /**
         * @return array
         */
        public function map($item): array
        {

            // $items = [];
            // foreach($loans as $item){
                // array_push($items, $item->name);


            return [

                    $item->id,
                    $item->tanggal,
                    $item->nomor_temuan,
                    $item->konstruksi,
                    $item->jadwal->penyulang,
                    $item->detail_temuan,
                    $item->section,
                    $item->alamat_temuan,
                    $item->koordinat,
                    $item->potensi_bahaya,
                    '-',
                    $item->tindaklanjut->sosialisasi->tanggal,
                    $item->tindaklanjut->sosialisasi->detail,
                    '-',
                    $item->tindaklanjut->upaya->tanggal,
                    $item->tindaklanjut->upaya->detail,
                    '-',
                    $item->tindaklanjut->status,
                    $item->tindaklanjut->keterangan_tindak_lanjut,







            ];
        // }
        }

        /**
         * @return array
         */
        public function headings(): array
        {
            return [
                'No',
                'Tanggal',
                'Nomor Temuan',
                'Konstruksi',
                'Penyulang',
                'Detail Temuan',
                'Section',
                'Alamat',
                'Koordinat',
                'Potensi Bahaya',
                'Evidence',
                'Tanggal',
                'Detail',
                'Evidence',
                'Tanggal',
                'Detail',
                'Evidence',
                'Status',
                'Keterangan',




            ];
        }
    }


