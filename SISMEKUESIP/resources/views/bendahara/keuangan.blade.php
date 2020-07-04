@extends('bendahara.master')
@section('content')
<div class="card border-light mb-3" style="max-width: 65rem;">
    <div class="card-header"></div>
    <div class="card-body">
        <div class="tab-content">
            <div id="table-component" class="tab-pane tab-example-result fade show active" role="tabpanel" aria-labelledby="table-component-tab">
                <div>
                    <h3>Laporan Tahunan Keuangan Masjid Jami'al-Muqoddimah</h3>
                </div>

                <div>
                    <a href="laporan/export-excel" class="btn btn-outline-success" >Download Laporan</a>
                    @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
                </div> <br>
                <div class="table-responsive">
                    <table class="table align-items-center">
                        
                            <tr class="table-success">
                                <th scope="col">Bulan</th>
                                <th scope="col">Pemasukan</th>
                                <th scope="col">Pengeluaran</th>
                                <th scope="col">Saldo</th>
                            </tr>
                        
                        <tbody>
                        @for ($i = 0; $i < count($data['pemasukan']); $i++)
                    <tr>
                    <td>{{ array_keys($data['pemasukan'])[$i] }}</td>
                    <td>{{ array_values($data['pemasukan'])[$i] }}</td>
                    <td>{{ array_values($data['pengeluaran'])[$i] }}</td>
                    <td>{{ array_values($data['saldo'])[$i] }}</td>
                    </tr>
                    @endfor
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
  </div>

@endsection