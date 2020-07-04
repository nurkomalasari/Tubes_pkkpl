@extends('bendahara.master')
@section('content')

<div class="card border-light mb-3" style="max-width: 65rem;">
    <div class="card-header"></div>
    <div class="card-body">
        <form method="post" action="/pengeluaran/update/{{ $pengeluaran->id }}">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class=" form-group">
                <label for="nominal">Nominal pengeluaran</label>
                <input type="number" class="form-control" name="nominal_pengeluaran" placeholder="Masukan nominal pengeluaran"value="{{ old('nominal_pengeluaran') }}" >
                
            </div>
            <div class="form-group">
                <label for="jenis">Jenis pengeluaran</label>
                <input type="text" class="form-control " name="jenis_pengeluaran" placeholder="Masukan keterangan" value="{{old('jenis_pengeluaran')}}">

            </div>
            <div class="form-group">
                <label for="jenis">Tanggal</label>
                <input type="date" class="form-control"  name="tanggal" placeholder="Masukan tanggal" value="{{old('tanggal')}}">

            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" name="keterangan" placeholder="Masukan keterangan" value="{{ old('keterangan') }}">
            </div>
            <div class="form-group">
                <label for="keterangan">Bukti Pengeluaran</label>
                <input type="file" class="form-control" name="keterangan" placeholder="Masukan keterangan" value="{{ old('keterangan') }}">
                
            </div>
            <button type="submit" class="btn btn-primary"> Submit</button>
           

        </form>
    </div>
</div>

@endsection