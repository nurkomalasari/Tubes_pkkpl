@extends('bendahara.master')
@section('content')

<div class="card border-light mb-3" style="max-width: 65rem;">
    <div class="card-header"></div>
    <div class="card-body">
        <form method="post" action="/pemasukanAdd">
            {{ csrf_field() }}
            <div class=" form-group">
                <label for="nominal">Nominal Pemasukan</label>
                <input type="number" class="form-control" name="nominal_pemasukan" placeholder="Masukan nominal Pemasukan"value="{{ old('nominal_pemasukan') }}" >

            </div>
            <select class="custom-select" name="jenis_pemasukan" placeholder="Masukan Jenis Pemasukan">
                <label for="jenis">Jenis Pemasukan</label>
                <option value="1">Kas</option>


            </select>
            {{-- <div class="form-group">
                <label for="jenis">Jenis Pemasukan</label>
                <input type="text" class="form-control " name="jenis_pemasukan" placeholder="Masukan keterangan" value="{{old('jenis_pemasukan')}}">

            </div> --}}
            <div class="form-group">
                <label for="jenis">Tanggal</label>
                <input type="date" class="form-control"  name="tanggal" placeholder="Masukan tanggal" value="{{old('tanggal')}}">

            </div>
            <div class="form-group">

                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" rows="10" name="keterangan"> </textarea>
                {{-- <input type="text" class="form-control" name="keterangan" placeholder="Masukan keterangan" value="{{ old('keterangan') }}"> --}}


            </div>

            <button type="submit" class="btn btn-primary"> Submit</button>


        </form>
    </div>
</div>

@endsection
