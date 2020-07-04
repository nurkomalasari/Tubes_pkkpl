@extends('sekertaris.master')
@section('content')

<div class="card border-light mb-3" style="max-width: 65rem;">
    <div class="card-header"></div>
    <div class="card-body">
        <form method="post" action="/pengarsipan/update/{{ $pengarsipan->id }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class=" form-group">
                <label for="nominal">Nama Berkas</label>
                <input type="text" class="form-control @error('namaberkas') is-invalid @enderror" name="namaberkas" placeholder="Masukan Nama Berkas" value="{{ $pengarsipan->namaberkas }}" >
                @error('namaberkas')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
            </div>
            <select class="custom-select @error('jenisArsip') is-invalid @enderror" name="jenisArsip" placeholder="Masukan Jenis Pengarsipan">
                Jenis Arsip
                <option value="1" {{ ($pengarsipan->jenisArsip == '1') ? 'selected' : '' }}>Surat</option>
                <option value="2" {{ ($pengarsipan->jenisArsip == '2') ? 'selected' : '' }}>Proposal</option>
                <option value="3" {{ ($pengarsipan->jenisArsip == '3') ? 'selected' : '' }}>Lainnya </option>
                @error('jenisArsip')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
            </select>
            {{-- <div class="form-group">
                <label for="jenis">Jenis Pemasukan</label>
                <input type="text" class="form-control " name="jenis_pemasukan" placeholder="Masukan keterangan" value="{{old('jenis_pemasukan')}}">

            </div> --}}
            <div class="form-group">
                <label for="jenis">Tanggal</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"  name="tanggal" placeholder="Masukan tanggal" value="{{ $pengarsipan->tanggal }}">
                @error('tanggal')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                
                <label for="inputfile">Upload Berkas</label>
                <input type="file" class="form-control @error('inputfile') is-invalid @enderror"  name="inputfile" placeholder="Masukan File" value="{{old('inputfile')}}">
                {{-- <input type="text" class="form-control" name="keterangan" placeholder="Masukan keterangan" value="{{ old('keterangan') }}"> --}}
                @error('inputfile')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            
            <button type="submit" class="btn btn-primary"> Submit</button>
           

        </form>
    </div>
</div>

@endsection