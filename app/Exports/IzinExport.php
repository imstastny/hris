<?php

namespace App\Exports;

use App\Models\Izin;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\withHeadings;
use Maatwebsite\Excel\Concerns\withMapping;

class IzinExport implements FromCollection, withMapping, withHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Izin::with('user')->get();
    }
    public function map($izin): array
    {
        return [
            $izin->user->name,
            $izin->user->nik,
            $izin->user->role->nama,
            $izin->user->divisi->nama,
            Carbon::parse($izin->created_at)->toFormattedDateString(),
            Carbon::parse($izin->tgl_izin)->toFormattedDateString(),
            $izin->wkt_mulai,
            $izin->wkt_selesai,
            $izin->acc_mandiv->nama,
            $izin->acc_hrd->nama,
        ];
    }
    public function headings(): array
    {
        return [
            'Nama',
            'Jabatan',
            'Divisi',
            'Mengajukan',
            'Tanggal Izin',
            'Mulai',
            'Selesai',
            'Acc Mandiv',
            'Acc HRD'
        ];
    }
}
