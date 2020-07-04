<?php

namespace Tests\Feature;

use App\Pengeluaran;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class PengeluaranTest extends TestCase
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
        $pengeluaran = Pengeluaran::create([
            'nominal_pengeluaran' => 100000,
            'jenis_pengeluaran' => 'shodaqoh',
            'tanggal' => '15-02-2020',
            'keterangan' => 'pengeluaran kas',
            'buktipengeluaran' => 'imge.jpg'

        ]);
        $this->assertDatabaseHas('pengeluarans', [
            'nominal_pengeluaran' => 100000,
            'jenis_pengeluaran' => 'shodaqoh',
            'tanggal' => '15-02-2020',
            'keterangan' => 'pengeluaran kas',
            'buktipengeluaran' => 'imge.jpg'
        ]);
    }

    public function test_destroy()
    {
        $pengeluaran = Pengeluaran::destroy(1);
        $this->assertDatabaseMissing('pengeluarans', [
            'id' => 1
        ]);
    }
    public function test_update()
    {
        $pengeluaran = Pengeluaran::create([
            'nominal_pengeluaran' => 100000,
            'jenis_pengeluaran' => 'shodaqoh',
            'tanggal' => '15-02-2020',
            'keterangan' => 'pengeluaran kas',
            'buktipengeluaran' => 'imge.jpg'

        ]);
        $pengeluaran = Pengeluaran::find(1);
        $pengeluaran->nominal_pengeluaran = 200000;
        $pengeluaran->jenis_pengeluaran = 'kas';
        $pengeluaran->tanggal = '16-03-2020';
        $pengeluaran->keterangan = 'kas-1';
        $pengeluaran->buktipengeluaran = 'img.jpg';
        $pengeluaran->save();

        $this->assertDatabaseHas('pengeluarans', [
            'nominal_pengeluaran' => 200000,
            'jenis_pengeluaran' => 'kas',
            'tanggal' => '16-03-2020',
            'keterangan' => 'kas-1',
            'buktipengeluaran' => 'img.jpg'

        ]);
    }
}
