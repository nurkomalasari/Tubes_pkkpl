@extends('bendahara.master')
@section('content')
<div class="card border-light mb-3" style="max-width: 65rem;">
    <div class="card-header"></div>
    <div class="card-body">
        <div class="tab-content">
            <div id="table-component" class="tab-pane tab-example-result fade show active" role="tabpanel" aria-labelledby="table-component-tab">
                <div>
                    <h3>Data Pemasukan </h3>
                </div>

                <div>
                    <a href="/pemasukanCreate" class="btn btn-outline-success" >+ Tambah data pemasukan</a>
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
                                <th scope="col">Nominal pemasukan</th>
                                <th scope="col">Jenias Pemasukan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>

                        <tbody>
                            @foreach ( $pemasukan as $msk)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $msk->nominal_pemasukan }}</td>
                        <td>{{ $msk->jenis_pemasukan }}</td>
                        <td>{{ $msk->tanggal }}</td>
                        <td>{{ $msk->keterangan }}</td>


                        <td>

                            <a href="/pemasukan/delete/{{ $msk->id }}" class="btn btn-outline-danger">Delete</a>
                            <a href="/pemasukan/edit/{{ $msk->id }}" class="btn btn-outline-success">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                        </tbody>
                    </table>
                    <div class="paging">
                        {{ $pemasukan->links() }}
                    </div>



                </div>
            </div>
        </div>
    </div>
  </div>

@endsection
