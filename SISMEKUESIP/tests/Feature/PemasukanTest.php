<?php

namespace Tests\Feature;

use App\Pemasukan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class PemasukanTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_store()
    {
        $pemasukan = Pemasukan::create([
            'nominal_pemasukan' => 100000,
            'jenis_pemasukan' => 'kas',
            'tanggal' => '15-02-2020',
            'keterangan' => 'pemasukan kas'


        ]);
        $this->assertDatabaseHas('pemasukans', [
            'nominal_pemasukan' => 100000,
            'jenis_pemasukan' => 'kas',
            'tanggal' => '15-02-2020',
            'keterangan' => 'pemasukan kas'

        ]);
    }

    public function test_destroy()
    {
        $pemasukan = Pemasukan::destroy(1);
        $this->assertDatabaseMissing('pemasukans', [
            'id' => 1
        ]);
    }
    public function test_update()
    {
        $pemasukan = Pemasukan::create([
            'nominal_pemasukan' => 100000,
            'jenis_pemasukan' => 'shodaqoh',
            'tanggal' => '15-02-2020',
            'keterangan' => 'pemasukan kas'


        ]);
        $pemasukan = Pemasukan::find(1);
        $pemasukan->nominal_pemasukan = 200000;
        $pemasukan->jenis_pemasukan = 'kas';
        $pemasukan->tanggal = '16-03-2020';
        $pemasukan->keterangan = 'kas-1';
        $pemasukan->save();

        $this->assertDatabaseHas('pemasukans', [
            'nominal_pemasukan' => 200000,
            'jenis_pemasukan' => 'kas',
            'tanggal' => '16-03-2020',
            'keterangan' => 'kas-1'

        ]);
    }
}
