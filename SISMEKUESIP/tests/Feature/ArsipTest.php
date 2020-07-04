<?php

namespace Tests\Feature;

use App\Arsip;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArsipTest extends TestCase
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
        $pengarsipan = Arsip::create([
            'namaberkas' => 'Surat Masuk',
            'jenisArsip' => 'Surat',
            'tanggal' => '17-07-2020',
            'inputfile' => 'word.pdf'


        ]);

        $this->assertDatabaseHas('arsips', [
            'namaberkas' => 'Surat Masuk',
            'jenisArsip' => 'Surat',
            'tanggal' => '17-07-2020',
            'inputfile' => 'word.pdf'
        ]);
    }
    public function test_destroy()
    {
        $pengarsipan = Arsip::destroy(1);
        $this->assertDatabaseMissing('arsips', [
            'id' => 1
        ]);
    }

    public function test_update()
    {
        $pengarsipan = Arsip::create([
            'namaberkas' => 'Surat Masuk',
            'jenisArsip' => 'Surat',
            'tanggal' => '2020-03-16',
            'inputfile' => 'word.pdf'
        ]);

        $pengarsipan = Arsip::find(1);
        $pengarsipan->namaberkas = 'proposal kegiatan';
        $pengarsipan->jenisArsip = 'proposal';
        $pengarsipan->tanggal = '2020-07-03';
        $pengarsipan->inputfile = 'proposal.docs';
        $pengarsipan->save();

        $this->assertDatabaseHas('arsips', [
            'namaberkas' => 'proposal kegiatan',
            'jenisArsip' => 'proposal',
            'tanggal' => '2020-07-03',
            'inputfile' => 'proposal.docs'
        ]);
    }
}
