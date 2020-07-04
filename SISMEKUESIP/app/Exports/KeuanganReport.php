<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Pemasukan;
use App\Pengeluaran;
use App\Laporan;

class KeuanganReport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $bulan_ini = date('n');
        $tahun_ini = date('Y');
        $pemasukan_bulan_ini = Pemasukan::whereYear('tanggal',$tahun_ini)->whereMonth('tanggal',$bulan_ini)->sum('nominal_pemasukan');
        $pengeluaran_bulan_ini = Pengeluaran::whereYear('tanggal',$tahun_ini)->whereMonth('tanggal',$bulan_ini)->sum('nominal_pengeluaran');
        $saldo = $pemasukan_bulan_ini - $pengeluaran_bulan_ini;
        $detail = $tahun_ini."-".date('m');;
        $laporan = new Laporan;
        $laporan->pemasukan = $pemasukan_bulan_ini;
        $laporan->pengeluaran = $pengeluaran_bulan_ini;
        $laporan->saldo = $saldo;
        $laporan->detail = $detail;
        $laporan->save();
        ///// to do update DB

        $data = [];
        ///// Pemasukan dan pengeluaran pertahun
        for ($i = 1; $i <= $bulan_ini; $i++){
            $pemasukan_bulan_i = Pemasukan::whereYear('tanggal',$tahun_ini)->whereMonth('tanggal',$i)->sum('nominal_pemasukan');
            $pengeluaran_bulan_i = Pengeluaran::whereYear('tanggal',$tahun_ini)->whereMonth('tanggal',$i)->sum('nominal_pengeluaran');
            $monthName = date('F', mktime(0, 0, 0, $i, 10));
            $data['pemasukan'][$monthName] = $pemasukan_bulan_i;
            $data['pengeluaran'][$monthName] = $pengeluaran_bulan_i;
            $data['saldo'][$monthName] = $pemasukan_bulan_i - $pengeluaran_bulan_i;
        }
        $tanggal = date('Y-m-d');
        $data['tanggal'] = $tanggal;
        // dd(array_keys($data['pemasukan'])[0]);
        return view('bendahara.excel.index', ['data' => $data]);
    }
}
