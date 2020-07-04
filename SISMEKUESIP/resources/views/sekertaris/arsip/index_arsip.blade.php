@extends('sekertaris.master')
@section('content')
<div class="card border-light mb-3" style="max-width: 65rem;">
    <div class="card-header"></div>
    <div class="card-body">
        <div class="tab-content">
            <div id="table-component" class="tab-pane tab-example-result fade show active" role="tabpanel" aria-labelledby="table-component-tab">
                <div>
                    <h3>Data Pengarsipan </h3>
                </div>

                <div>
                    <a href="/pengarsipanCreate" class="btn btn-outline-success" >+ Tambah data Pengarsipan</a>
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
                                <th scope="col">Nama Berkas</th>
                                <th scope="col">Jenis Arsip</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">File Arsip</th>
                                <th scope="col">Aksi</th>
                            </tr>

                        <tbody>
                            @foreach ( $pengarsipan as $arsip)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $arsip->namaberkas }}</td>
                        <td>{{ $arsip->jenisArsip }}</td>
                        <td>{{ $arsip->tanggal }}</td>
                        <td><a href="{{ asset('assets/'.$arsip->inputfile) }}">Download</a></td>


                        <td>

                            <a href="/pengarsipan/delete/{{ $arsip->id }}" class="btn btn-outline-danger">Delete</a>
                            <a href="/pengarsipan/edit/{{ $arsip->id }}" class="btn btn-outline-success">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                        </tbody>
                    </table>
                    <div class="paging">
                        {{ $pengarsipan->links() }}
                    </div>



                </div>
            </div>
        </div>
    </div>
  </div>

@endsection
