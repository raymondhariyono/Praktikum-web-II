<?php
namespace App\Models;

use CodeIgniter\Model;

class BiodataModel extends Model
{
    public function getData()
    {
        return [
            'nama' => 'Raymond hariyono',
            'nim' => '2310817210007'
        ];
    }

    public function getProfil()
    {
        return [
            'gambar' => 'raymond.jpg',
            'nama' => 'Raymond Hariyono',
            'nim' => '2310817210007',
            'prodi' => 'Teknologi Informasi',
            'hobi' => 'Membaca, Nonton Anime, melukis',
            'skill' => 'bangun pagi, bermain magic chess'
        ];
    }
}