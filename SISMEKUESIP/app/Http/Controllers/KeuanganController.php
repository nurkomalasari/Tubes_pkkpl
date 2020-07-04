<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemasukan;
use App\Pengeluaran;
use Excel;
use App\Exports\KeuanganReport;

class KeuanganController extends Controller
{
    public function index(){
        // $total_pemasukan = Pemasukan::sum('nominal_pemasukan');
        // $total_pengeluaran = Pengeluaran::sum('nominal_pengeluaran');
        // $bulan_ini = date('n');
        // $pemasukan_bulan_ini = Pemasukan::whereMonth('tanggal',$bulan_ini)->sum('nominal_pemasukan');
        // $pengeluaran_bulan_ini = Pengeluaran::whereMonth('tanggal',$bulan_ini)->sum('nominal_pengeluaran');
        // $saldo = $pemasukan_bulan_ini - $pengeluaran_bulan_ini;
        // $data = compact('total_pemasukan', 'total_pengeluaran', 'saldo');
        // return view('bendahara.keuangan', $data);

        $bulan_ini = date('n');
        $tahun_ini = date('Y');
        $data = [];

        ///// Pemasukan dan pengeluaran pertahun
        for ($i = 1; $i <= $bulan_ini; $i++){
            $pemasukan_bulan_ini = Pemasukan::whereYear('tanggal',$tahun_ini)->whereMonth('tanggal',$i)->sum('nominal_pemasukan');
            $pengeluaran_bulan_ini = Pengeluaran::whereYear('tanggal',$tahun_ini)->whereMonth('tanggal',$i)->sum('nominal_pengeluaran');
            $monthName = date('F', mktime(0, 0, 0, $i, 10));
            $data['pemasukan'][$monthName] = $pemasukan_bulan_ini;
            $data['pengeluaran'][$monthName] = $pengeluaran_bulan_ini;
            $data['saldo'][$monthName] = $pemasukan_bulan_ini - $pengeluaran_bulan_ini;
        }
        $tanggal = date('Y-m-d');
        $data['tanggal'] = $tanggal;
        // dd(array_keys($data['pemasukan'])[0]);
        return view('bendahara.keuangan', ['data' => $data]);
    }

    public function exportExcel(){
        $nama_file = 'Laporan_Keuangan_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new KeuanganReport, $nama_file);
    }
}
