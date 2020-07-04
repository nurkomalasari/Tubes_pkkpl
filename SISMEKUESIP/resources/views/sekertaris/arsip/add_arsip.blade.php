@extends('sekertaris.master')
@section('content')

<div class="card border-light mb-3" style="max-width: 65rem;">
    <div class="card-header"></div>
    <div class="card-body">
        <form method="post" action="/pengarsipanAdd" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class=" form-group">
                <label for="namaberkas">Nama Berkas</label>
                <input type="text" class="form-control @error('namaberkas') is-invalid @enderror" name="namaberkas" placeholder="Masukan Nama Berkas" value="{{ old('namaberkas') }}" >
                @error('namaberkas')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
            </div>
            <select class="custom-select @error('jenisArsip') is-invalid @enderror" name="jenisArsip" placeholder="Masukan Jenis Pengarsipan">
                Jenis Arsip
                <option value="1">Surat</option>
                <option value="2">Proposal</option>
                <option value="3">Lainya </option>
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
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"  name="tanggal" placeholder="Masukan tanggal" value="{{old('tanggal')}}">
                @error('tanggal')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                
                <label for="inputfile">Upload Berkas</label>
                <input type="file" class="form-control @error('inputfile') is-invalid @enderror"  name="inputfile" placeholder="Masukan File" value="{{old('inputfile')}}">
                @error('inputfile')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                {{-- <input type="text" class="form-control" name="keterangan" placeholder="Masukan keterangan" value="{{ old('keterangan') }}"> --}}
                

            </div>
            
            <button type="submit" class="btn btn-primary"> Submit</button>
           

        </form>
    </div>
</div>

@endsection