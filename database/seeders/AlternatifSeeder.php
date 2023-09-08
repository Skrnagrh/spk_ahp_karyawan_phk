<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use Illuminate\Database\Seeder;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ['nik' => '11261', 'nama' => 'DANDI'],
            ['nik' => '41015', 'nama' => 'YUSUF'],
            ['nik' => '41016', 'nama' => 'FEBRI ASNADI' ],
            ['nik' => '113362', 'nama' => 'RAHMANI' ],
            ['nik' => '33007', 'nama' => 'NASIRUDIN' ],
            ['nik' => '33008', 'nama' => 'MISBAK' ],
            ['nik' => '33009', 'nama' => 'KHAERUDIN'],
            ['nik' => '33010', 'nama' => 'BAHAUDIN' ],
            ['nik' => '33011', 'nama' => 'DODO SABDA' ],
            ['nik' => '33012', 'nama' => 'SAMSUL HIDAYAT' ],
            ['nik' => '33013', 'nama' => 'HAERUDIN BAHRI' ],
            ['nik' => '33014', 'nama' => 'SANTOSO'],
            ['nik' => '33015', 'nama' => 'SAMSURI' ],
            ['nik' => '33016', 'nama' => 'TAJULALAB' ],
            ['nik' => '33017', 'nama' => 'HUDRI' ],
            ['nik' => '33018', 'nama' => 'DARUSMAN' ],
            ['nik' => '33019', 'nama' => 'ATOR' ],
            ['nik' => '113706', 'nama' => 'AANG NUH' ],
            ['nik' => '33021', 'nama' =>'HERU' ],
            ['nik' => '33022', 'nama' =>'AAN ANUGRAH' ],
            
            // ['nik' => '33023', 'nama' =>'ISMATULLAH' ],
            // ['nik' => '41017', 'nama' =>'MARWANDI' ],
            // ['nik' => '35029', 'nama' =>'FRANS SUBAGYO' ],
            // ['nik' => '35033', 'nama' =>'ABDUL BASUT' ],
            // ['nik' => '35034', 'nama' =>'IMATDUDIN' ],
            // ['nik' => '35058', 'nama' =>'SUROSO' ],
            // ['nik' => '35035', 'nama' =>'DEDI' ],
            // ['nik' => '35005', 'nama' =>'DIDI SUFARDI' ],
            // ['nik' => '35006', 'nama' =>'MUNTAHA' ],
            // ['nik' => '35013', 'nama' =>'SAFRUJI' ],
            // ['nik' => '35039', 'nama' =>'MUSTOFA' ],
            // ['nik' => '35003', 'nama' =>'PANJI PEREDITA' ],
            // ['nik' => '35004', 'nama' =>'AS ARI' ],
            // ['nik' => '35008', 'nama' =>'SAIFUL BAHRI' ],
            // ['nik' => '35040', 'nama' =>'M. FAJAR PRATAMA' ],
            // ['nik' => '35023', 'nama' =>'ADE SUPRIYADI' ],
            // ['nik' => '35010', 'nama' =>'BURHANUDIN' ],
            // ['nik' => '35807', 'nama' =>'JOHAN W' ],
            // ['nik' => '35808', 'nama' =>'AGUS N' ],
            // ['nik' => '35809', 'nama' => 'JUMINTA' ],
            // ['nik' => '35901', 'nama' => 'FIRDAUS' ],
            // ['nik' => '3243', 'nama' => 'DIDI SUFARDI'],
            // ['nik' => '4412', 'nama' => 'REY'],
            // ['nik' => '4411', 'nama' => 'FIKRI RAHMAN'],
            // ['nik' => '4409', 'nama' => 'HASAN'],
            // ['nik' => '1095	', 'nama' => 'RONI'],
            // ['nik' => '90027', 'nama' => 'SUWARNO'],
            // ['nik' => '90007', 'nama' => 'JAHUDI'],
            // ['nik' => '90014', 'nama' => 'BERNAS SUHENDRA'],
            // ['nik' => '90032', 'nama' => 'RUSADI'],
            // ['nik' => '90030', 'nama' => 'ABU HASAN'],
            // ['nik' => '90020', 'nama' => 'ROHMAN'],
            // ['nik' => '90043', 'nama' => 'SARTONI'],
            // ['nik' => '90042', 'nama' => 'BAMBANG'],
            // ['nik' => '90015', 'nama' => 'MUSA'],
            // ['nik' => '33024', 'nama' => 'AHMAD SOBRI'],
            // ['nik' => '33025', 'nama' => 'SUHANDI'],
            // ['nik' => '33026', 'nama' => 'HIKMATULLAH'],
            // ['nik' => '33027', 'nama' => 'NAJIULLAH'],
            // ['nik' => '33028', 'nama' => 'MUKSIN HIDAYAT'],
            // ['nik' => '33029', 'nama' => 'TUBAGUS SAFATULLAH'],
            // ['nik' => '33030', 'nama' => 'MUHTAR'],
            // ['nik' => '4807	', 'nama' => 'DWI PUTRA'],
            // ['nik' => '1450	', 'nama' => 'SUPRIYATNA'],
            // ['nik' => '41018', 'nama' => 'WARTIM'],
            // ['nik' => '41019', 'nama' => 'ROMDANI'],
            // ['nik' => '41020', 'nama' => 'MUSA'],
            // ['nik' => '41021', 'nama' => 'ROYANI'],
            // ['nik' => '41022', 'nama' => 'YANTO'],
            // ['nik' => '41023', 'nama' => 'ISMAIL MALIK'],
            // ['nik' => '41024', 'nama' => 'FERDI MALIK'],
            // ['nik' => '41025', 'nama' => 'JAKARIYA'],
            // ['nik' => '41027', 'nama' => 'SARIF HIDYAT'],
            // ['nik' => '41028', 'nama' => 'ANAS NASUHA'],
            // ['nik' => '32478', 'nama' => 'ODIH'],
            // ['nik' => '32489', 'nama' => 'MAMAN'],
            // ['nik' => '32476', 'nama' => 'RIKI SUSANTO'],
            // ['nik' => '41017', 'nama' => 'DIKA SAPUTRA'],
            // ['nik' => '41082', 'nama' => 'ANGGA PRATAMA'],
            // ['nik' => '41097', 'nama' => 'SOLIHIN'],
            // ['nik' => '42678', 'nama' => 'TORI NUGRAHA'],
            // ['nik' => '42656', 'nama' => 'DANI MURDANI'],
            // ['nik' => '42674', 'nama' => 'SUBANDI'],

        ];


        foreach ($data as $key => $item) {
            Alternatif::create([
                'nik' => $item['nik'],
                'nama' => $item['nama'],

            ]);
        }
    }
}
