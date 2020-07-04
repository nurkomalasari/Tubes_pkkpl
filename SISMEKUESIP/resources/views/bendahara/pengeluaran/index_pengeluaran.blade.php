@extends('bendahara.master')
@section('content')
<div class="card border-light mb-3" style="max-width: 65rem;">
    <div class="card-header"></div>
    <div class="card-body">
        <div class="tab-content">
            <div id="table-component" class="tab-pane tab-example-result fade show active" role="tabpanel" aria-labelledby="table-component-tab">
                <div>
                    <h3>Data Pengeluaran </h3>
                </div>

                <div>
                    <a href="/pengeluaranCreate" class="btn btn-outline-success" >+ Tambah data Pengeluaran</a>
                    @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
                </div> <br>
                <div class="table-responsive">
                    <table class="table align-items-center">

                            <tr class="table-success">
                                <th scope="col">#</th>
                                <th scope="col">Nominal pengeluaran</th>
                                <th scope="col">Jenis pengeluaran</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">keterangan</th>
                                <th scope="col">Bukti Pengeluaran</th>
                                <th scope="col">Aksi</th>
                            </tr>

                        <tbody>
                            @foreach ( $pengeluaran as $p)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $p->nominal_pengeluaran }}</td>
                        <td>{{ $p->jenis_pengeluaran }}</td>
                        <td>{{ $p->tanggal }}</td>
                        <td>{{ $p->keterangan }}</td>
                        <td><img src="{{ asset ($p->buktipengeluaran) }}"  class="img-fluid" style="width:100px"></td>


                        <td>
                            <a href="/pengeluaran/delete/{{ $p->id }}" class="btn btn-outline-danger">Delete</a>
                            <a href="/pengeluaran/edit/{{ $p->id }}" class="btn btn-outline-success">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                        </tbody>
                    </table>
                    <div class="paging">
                        {{ $pengeluaran->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

@endsection
