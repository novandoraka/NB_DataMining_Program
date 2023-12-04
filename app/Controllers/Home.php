<?php

namespace App\Controllers;

ini_set('max_execution_time', 900);

use App\Models\ModelTampil;
use App\Models\ModelTampil2;
use App\Models\ModelTampil3;
use App\Models\ModelTampil4;
use App\Models\ModelJumlah;
use App\Models\ModelNaiveBayes;
use App\Models\modelAkurasi;
use App\Models\ModelNaiveBayesTesting;
use App\Models\ModelNBcadangan;
use App\Models\modelPerforma;
use CodeIgniter\Exceptions\AlertError;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use ZipStream\Bigint;

class Home extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelTampil = new ModelTampil();
        $this->ModelTampil2 = new ModelTampil2();
        $this->ModelTampil3 = new ModelTampil3();
        $this->ModelTampil4 = new ModelTampil4();
        $this->prediksi = new ModelTampil3();
        $this->ModelJumlah = new ModelJumlah();
    }

    public function index()
    {
        return view('welcome_message');
    }

    public function masuk()
    {
        $akurasi = new modelAkurasi();
        $data = [
            'dataAllKategori' => $this->ModelJumlah->tot_jum(),
            'data20' => $this->ModelJumlah->tot_tes20(),
            'hasiluji' => $akurasi->ujihitung80()
        ];
        return view('dashboard/index', $data);
    }

    public function dash2()
    {
        $modelTampil = new ModelTampil();
        $data = [
            'tampildata' => $modelTampil->findAll()
        ];
        return view('dashboard/dataset', $data);
    }

    public function dash3()
    {
        return view('dashboard/performance');
    }

    public function dash4()
    {
        return view('dashboard/prediction');
    }

    public function dash5()
    {
        $modelTampil2 = new ModelTampil2();
        $data = [
            'tampildatakedua' => $modelTampil2->findAll()
        ];
        return view('dashboard/transformasi', $data);
    }

    public function dash6()
    {
        return view('dashboard/hasil');
    }

    public function dash7()
    {
        $modelTampil4 = new ModelTampil4();
        $data = [
            'tampildatakeempat' => $modelTampil4->findAll()
        ];
        return view('dashboard/simpanprediksi', $data);
    }

    public function dashuser()
    {
        $akurasi = new modelAkurasi();
        $data = [
            'dataAllKategori' => $this->ModelJumlah->tot_jum(),
            'data20' => $this->ModelJumlah->tot_tes20(),
            'hasiluji' => $akurasi->ujihitung80()
        ];
        return view('dashboard/userdash', $data);
    }

    public function userpredik()
    {
        return view('dashboard/userprediksi');
    }

    public function tambahData()
    {
        $pengelolahan = $_POST['kelas'];
        $jenisus = $_POST['jenis'];
        $pegawai = $_POST['pegawai'];
        $luas = $_POST['luas'];
        $omset = $_POST['omset'];
        $berdiri = $_POST['berdiri'];
        $keputusan = $_POST['keputusan'];

        // $jumlaTenagaKerja =  $_POST['JTK'];
        $tahunConvert = isset($tahun);
        $tes = floatval('2021');
        // $tahun = floatval(date('Y', strtotime('2021')) - date('Y', strtotime($_POST['TH'])));
        $tahun = floatval($tes - $_POST['berdiri']);
        if ($tahun >= 5 && $tahun <= 10.6) {
            $tahunConvert = 'TH1';
        } elseif ($tahun > 10.6 &&  $tahun <= 16.2) {
            $tahunConvert = 'TH2';
        } elseif ($tahun > 16.2 &&  $tahun <= 21.8) {
            $tahunConvert = 'TH3';
        } elseif ($tahun > 21.8 &&  $tahun <= 27.4) {
            $tahunConvert = 'TH4';
        } elseif ($tahun > 27.4 &&  $tahun <= 33) {
            $tahunConvert = 'TH5';
        } elseif ($tahun > 33 &&  $tahun <= 38.6) {
            $tahunConvert = 'TH6';
        } elseif ($tahun > 38.6 &&  $tahun <= 44.2) {
            $tahunConvert = 'TH7';
        } elseif ($tahun > 44.2 &&  $tahun <= 49.8) {
            $tahunConvert = 'TH8';
        } elseif ($tahun > 49.8 &&  $tahun <= 55.4) {
            $tahunConvert = 'TH9';
        } elseif ($tahun > 55.4 &&  $tahun <= 61) {
            $tahunConvert = 'TH10';
        }

        $omset = intval($_POST['omset']);
        if ($omset >= 0 && $omset <= 300000000) {
            $omsetConvert = '1';
        } elseif ($omset > 300000000 && $omset <= 2500000000) {
            $omsetConvert = '2';
        } elseif ($omset > 2500000000) {
            $omsetConvert = '3';
        }

        $karyawan = intval($_POST['pegawai']);
        if ($karyawan >= 0 && $karyawan <= 20) {
            $karyawanConvert = 'KR1';
        } elseif ($karyawan > 20 && $karyawan <= 40) {
            $karyawanConvert = 'KR2';
        } elseif ($karyawan > 40 && $karyawan <= 60) {
            $karyawanConvert = 'KR3';
        } elseif ($karyawan > 60 && $karyawan <= 80) {
            $karyawanConvert = 'KR4';
        } elseif ($karyawan > 80 && $karyawan <= 100) {
            $karyawanConvert = 'KR5';
        } elseif ($karyawan > 100 && $karyawan <= 120) {
            $karyawanConvert = 'KR6';
        } elseif ($karyawan > 120 && $karyawan <= 140) {
            $karyawanConvert = 'KR7';
        } elseif ($karyawan > 140 && $karyawan <= 160) {
            $karyawanConvert = 'KR8';
        } elseif ($karyawan > 160 && $karyawan <= 180) {
            $karyawanConvert = 'KR9';
        } elseif ($karyawan > 180 && $karyawan <= 200) {
            $karyawanConvert = 'KR10';
        }

        $bangunanConvert = isset($luasbangunan);
        $luasbangunan = floatval($_POST['luas']);
        if ($luasbangunan >= 6 && $luasbangunan <= 65.4) {
            $bangunanConvert = 'LB1';
        } elseif ($luasbangunan >= 65.4 && $luasbangunan <= 124.8) {
            $bangunanConvert = 'LB2';
        } elseif ($luasbangunan > 124.8 && $luasbangunan <= 184.2) {
            $bangunanConvert = 'LB3';
        } elseif ($luasbangunan > 184.2 && $luasbangunan <= 243.6) {
            $bangunanConvert = 'LB4';
        } elseif ($luasbangunan > 243.6 && $luasbangunan <= 303) {
            $bangunanConvert = 'LB5';
        } elseif ($luasbangunan > 303 && $luasbangunan <= 362.4) {
            $bangunanConvert = 'LB6';
        } elseif ($luasbangunan > 362.4 && $luasbangunan <= 421.8) {
            $bangunanConvert = 'LB7';
        } elseif ($luasbangunan > 421.8 && $luasbangunan <= 481.2) {
            $bangunanConvert = 'LB8';
        } elseif ($luasbangunan > 481.2 && $luasbangunan <= 540.6) {
            $bangunanConvert = 'LB9';
        } elseif ($luasbangunan > 540.6 && $luasbangunan <= 600) {
            $bangunanConvert = 'LB10';
        }

        $data = [
            'pengelolahanusaha' => $pengelolahan,
            'jenisusaha' => $jenisus,
            'jumlahtenagakerja' => $pegawai,
            'luasbangunan' => $luas,
            'omset' => $omset,
            'tahunberdiri' => $berdiri,
            'keputusan' => $keputusan
        ];

        $datakedua = [
            'pengelolahan' => $pengelolahan,
            'jenis' => $jenisus,
            'tenagakerja' => $karyawanConvert,
            'bangunan' => $bangunanConvert,
            'pendapatan' => $omsetConvert,
            'berdiri' => $tahunConvert,
            'kep' => $keputusan,
        ];

        $this->ModelTampil->add($data);
        $this->ModelTampil2->add2($datakedua);

        return redirect()->to('/dataset');
    }

    public function import()
    {
        $naivebayes = new ModelNaiveBayes();

        $file = $this->request->getFile('file_excel');
        $ext = $file->getClientExtension();

        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $Spreadsheet = $render->load($file);
        $sheet = $Spreadsheet->getActiveSheet()->toArray();

        foreach ($sheet as $x => $excel) {
            if ($x == 0) {
                continue;
            }

            $olah = $this->ModelTampil->cekData($excel['1']);
            if ($excel['1'] == $olah) {
                continue;
            }

            $olah2 = $this->ModelTampil2->cekData2($excel['1']);
            if ($excel['1'] == $olah2) {
                continue;
            }

            // $data = [
            //     'pengelolahanusaha' => $excel['1'],
            //     'jenisusaha' => $excel['2'],
            //     'jumlahtenagakerja' => $excel['3'],
            //     'luasbangunan' => $excel['4'],
            //     'omset' => $excel['5'],
            //     'tahunberdiri' => $excel['6'],
            //     'keputusan' => $excel['7'],
            //     'keputusan_hasil' => $naivebayes->posteriorProbability($datakedua)
            // ];

            $kls = $excel['1'];
            $jns = $excel['2'];
            $keputusan = $excel['7'];

            $tahunTransfor = isset($thn);
            $tes = floatval('2021');
            // $thn = floatval(date('Y', strtotime('2021')) - date('Y', strtotime($excel['6'])));
            $thn = floatval($tes - $excel['6']);
            if ($thn >= 5 && $thn <= 10.73) {
                $tahunTransfor = 'TH1';
            } elseif ($thn > 10.73 &&  $thn <= 16.461) {
                $tahunTransfor = 'TH2';
            } elseif ($thn > 16.461 &&  $thn <= 22.192) {
                $tahunTransfor = 'TH3';
            } elseif ($thn > 22.192 &&  $thn <= 27.923) {
                $tahunTransfor = 'TH4';
            } elseif ($thn > 27.923 &&  $thn <= 33.654) {
                $tahunTransfor = 'TH5';
            } elseif ($thn > 33.654 &&  $thn <= 39.385) {
                $tahunTransfor = 'TH6';
            } elseif ($thn > 39.385 &&  $thn <= 45.116) {
                $tahunTransfor = 'TH7';
            } elseif ($thn > 45.116 &&  $thn <= 50.847) {
                $tahunTransfor = 'TH8';
            } elseif ($thn > 50.847 &&  $thn <= 56.578) {
                $tahunTransfor = 'TH9';
            } elseif ($thn > 56.578 &&  $thn <= 62.309) {
                $tahunTransfor = 'TH10';
            }

            $omset = intval($excel['5']);
            if ($omset >= 0 && $omset <= 300000000) {
                $omsetTransfor = '1';
            } elseif ($omset > 300000000 && $omset <= 2500000000) {
                $omsetTransfor = '2';
            } elseif ($omset > 2500000000) {
                $omsetTransfor = '3';
            }

            $karyawan = intval($excel['3']);
            if ($karyawan >= 0 && $karyawan <= 20.468) {
                $karyawanTransfor = 'KR1';
            } elseif ($karyawan > 20.468 && $karyawan <= 40.937) {
                $karyawanTransfor = 'KR2';
            } elseif ($karyawan > 40.937 && $karyawan <= 61.406) {
                $karyawanTransfor = 'KR3';
            } elseif ($karyawan > 61.406 && $karyawan <= 81.875) {
                $karyawanTransfor = 'KR4';
            } elseif ($karyawan > 81.875 && $karyawan <= 102.347) {
                $karyawanTransfor = 'KR5';
            } elseif ($karyawan > 102.347 && $karyawan <= 122.813) {
                $karyawanTransfor = 'KR6';
            } elseif ($karyawan > 122.813 && $karyawan <= 143.282) {
                $karyawanTransfor = 'KR7';
            } elseif ($karyawan >  143.282 && $karyawan <= 163.751) {
                $karyawanTransfor = 'KR8';
            } elseif ($karyawan > 163.751 && $karyawan <= 184.220) {
                $karyawanTransfor = 'KR9';
            } elseif ($karyawan > 184.220 && $karyawan <= 204.689) {
                $karyawanTransfor = 'KR10';
            }

            $luasbangunan = floatval($excel['4']);
            if ($luasbangunan >= 6 && $luasbangunan <= 66.791) {
                $bangunanTransfor = 'LB1';
            } elseif ($luasbangunan > 66.791 && $luasbangunan <= 127.583) {
                $bangunanTransfor = 'LB2';
            } elseif ($luasbangunan > 127.583 && $luasbangunan <= 188.375) {
                $bangunanTransfor = 'LB3';
            } elseif ($luasbangunan > 188.375 && $luasbangunan <= 249.167) {
                $bangunanTransfor = 'LB4';
            } elseif ($luasbangunan > 249.167 && $luasbangunan <= 309.95) {
                $bangunanTransfor = 'LB5';
            } elseif ($luasbangunan > 309.95 && $luasbangunan <= 370.751) {
                $bangunanTransfor = 'LB6';
            } elseif ($luasbangunan > 370.751 && $luasbangunan <= 431.543) {
                $bangunanTransfor = 'LB7';
            } elseif ($luasbangunan > 431.543 && $luasbangunan <= 492.335) {
                $bangunanTransfor = 'LB8';
            } elseif ($luasbangunan > 492.335 && $luasbangunan <= 553.127) {
                $bangunanTransfor = 'LB9';
            } elseif ($luasbangunan > 553.127 && $luasbangunan <= 613.919) {
                $bangunanTransfor = 'LB10';
            }

            // $datakedua = [
            //     'pengelolahan' => $excel['1'],
            //     'jenis' => $excel['2'],
            //     'tenagakerja' => $excel['3'],
            //     'bangunan' => $excel['4'],
            //     'pendapatan' => $excel['5'],
            //     'berdiri' => $excel['6'],
            //     'kep' => $excel['7'],
            // ];

            $datakedua = [
                'pengelolahan' => $kls,
                'jenis' => $jns,
                'tenagakerja' => $karyawanTransfor,
                'bangunan' => $bangunanTransfor,
                'pendapatan' => $omsetTransfor,
                'berdiri' => $tahunTransfor,
                'kep' => $keputusan,
            ];

            $data = [
                'pengelolahanusaha' => $excel['1'],
                'jenisusaha' => $excel['2'],
                'jumlahtenagakerja' => $excel['3'],
                'luasbangunan' => $excel['4'],
                'omset' => $excel['5'],
                'tahunberdiri' => $excel['6'],
                'keputusan' => $excel['7'],
            ];

            // $dataketiga = [
            //     'pengelolahan_testing' => $excel['1'],
            //     'jenis_testing' => $excel['2'],
            //     'karyawan_testing' => $excel['3'],
            //     'bangunan_testing' => $excel['4'],
            //     'omset_testing' => $excel['5'],
            //     'tahun_testing' => $excel['6'],
            //     'keputusan_testing' => $excel['7'],
            // ];

            $this->ModelTampil->add($data);
            $this->ModelTampil2->add2($datakedua);
            // $this->ModelTampil3->add3($dataketiga);
        }
        // session()->setFlashdata('pesan', 'Data Berhasil di Import!');
        return redirect()->to('/dataset');
    }


    public function simpanPrediksi()
    {
        $naivebayes = new ModelNaiveBayes();
        $kelas = $_POST['kls'];
        $jenisUsaha = $_POST['jusaha'];
        $tahun = $_POST['TH'];
        $bangunan = $_POST['LB'];
        $omset = $_POST['omset'];
        $karyawan = $_POST['JTK'];
        $keputusan = $_POST['kep'];

        $simpanhasil = [
            "pengelolahan" => $kelas,
            "jenis" => $jenisUsaha,
            "tenagakerja" =>  $karyawan,
            "bangunan" =>  $bangunan,
            "pendapatan" =>  $omset,
            "berdiri" => $tahun,
            "hasil_uji" => $keputusan
        ];

        //         $data = [
        //             'pengelolahan_testing' => $excel['1'],
        //             'jenis_testing' => $excel['2'],
        //             'karyawan_testing' => $excel['3'],
        //             'bangunan_testing' => $excel['4'],
        //             'omset_testing' => $excel['5'],
        //             'tahun_testing' => $excel['6'],
        //             'keputusan_testing' => $excel['7'],
        //             'hasil_testing' => $naivebayes->posteriorProbability($naivetesting)
        //         ];

        $this->ModelTampil4->add4($simpanhasil);

        return redirect()->to('/simpanprediksi');
    }



    public function Naive()
    {
        $naivebayes = new ModelNaiveBayes();

        // $kelas = $_POST['kls'];
        // $jenisUsaha = $_POST['jusaha'];
        // $tahunBer = $_POST['TH'];
        // $bangunan = $_POST['LB'];
        // $omset = $_POST['omset'];
        // $karyawan = $_POST['JTK'];


        $kelas = $_POST['kls'];
        $jenisUsaha = $_POST['jusaha'];
        // $jumlaTenagaKerja =  $_POST['JTK'];
        $tahunConvert = isset($tahun);
        $tes = floatval('2021');
        // $tahun = floatval(date('Y', strtotime('2021')) - date('Y', strtotime($_POST['TH'])));
        $tahun = floatval($tes - $_POST['TH']);
        if ($tahun >= 5 && $tahun <= 10.73) {
            $tahunConvert = 'TH1';
        } elseif ($tahun > 10.73 &&  $tahun <= 16.461) {
            $tahunConvert = 'TH2';
        } elseif ($tahun > 16.461 &&  $tahun <= 22.192) {
            $tahunConvert = 'TH3';
        } elseif ($tahun > 22.192 &&  $tahun <= 27.923) {
            $tahunConvert = 'TH4';
        } elseif ($tahun > 27.923 &&  $tahun <= 33.654) {
            $tahunConvert = 'TH5';
        } elseif ($tahun > 33.654 &&  $tahun <= 39.385) {
            $tahunConvert = 'TH6';
        } elseif ($tahun > 39.385 &&  $tahun <= 45.116) {
            $tahunConvert = 'TH7';
        } elseif ($tahun > 45.116 &&  $tahun <= 50.847) {
            $tahunConvert = 'TH8';
        } elseif ($tahun > 50.847 &&  $tahun <= 56.578) {
            $tahunConvert = 'TH9';
        } elseif ($tahun > 56.578 &&  $tahun <= 62.309) {
            $tahunConvert = 'TH10';
        }

        $omset = intval($_POST['omset']);
        if ($omset >= 0 && $omset <= 300000000) {
            $omsetConvert = '1';
        } elseif ($omset > 300000000 && $omset <= 2500000000) {
            $omsetConvert = '2';
        } elseif ($omset > 2500000000) {
            $omsetConvert = '3';
        }

        $karyawan = intval($_POST['JTK']);
        if ($karyawan >= 0 && $karyawan <= 20.468) {
            $karyawanConvert = 'KR1';
        } elseif ($karyawan > 20.468 && $karyawan <= 40.937) {
            $karyawanConvert = 'KR2';
        } elseif ($karyawan > 40.937 && $karyawan <= 61.406) {
            $karyawanConvert = 'KR3';
        } elseif ($karyawan > 61.406 && $karyawan <= 81.875) {
            $karyawanConvert = 'KR4';
        } elseif ($karyawan > 81.875 && $karyawan <= 102.347) {
            $karyawanConvert = 'KR5';
        } elseif ($karyawan > 102.347 && $karyawan <= 122.813) {
            $karyawanConvert = 'KR6';
        } elseif ($karyawan > 122.813 && $karyawan <= 143.282) {
            $karyawanConvert = 'KR7';
        } elseif ($karyawan >  143.282 && $karyawan <= 163.751) {
            $karyawanConvert = 'KR8';
        } elseif ($karyawan > 163.751 && $karyawan <= 184.220) {
            $karyawanConvert = 'KR9';
        } elseif ($karyawan > 184.220 && $karyawan <= 204.689) {
            $karyawanConvert = 'KR10';
        }

        $luasbangunan = floatval($_POST['LB']);
        if ($luasbangunan >= 6 && $luasbangunan <= 66.791) {
            $bangunanConvert = 'LB1';
        } elseif ($luasbangunan > 66.791 && $luasbangunan <= 127.583) {
            $bangunanConvert = 'LB2';
        } elseif ($luasbangunan > 127.583 && $luasbangunan <= 188.375) {
            $bangunanConvert = 'LB3';
        } elseif ($luasbangunan > 188.375 && $luasbangunan <= 249.167) {
            $bangunanConvert = 'LB4';
        } elseif ($luasbangunan > 249.167 && $luasbangunan <= 309.95) {
            $bangunanConvert = 'LB5';
        } elseif ($luasbangunan > 309.95 && $luasbangunan <= 370.751) {
            $bangunanConvert = 'LB6';
        } elseif ($luasbangunan > 370.751 && $luasbangunan <= 431.543) {
            $bangunanConvert = 'LB7';
        } elseif ($luasbangunan > 431.543 && $luasbangunan <= 492.335) {
            $bangunanConvert = 'LB8';
        } elseif ($luasbangunan > 492.335 && $luasbangunan <= 553.127) {
            $bangunanConvert = 'LB9';
        } elseif ($luasbangunan > 553.127 && $luasbangunan <= 613.919) {
            $bangunanConvert = 'LB10';
        }

        // $data = [
        //     "pengelolahanusaha" => $kelas,
        //     "jenisusaha" => $jenisUsaha,
        //     "jumlahtenagakerja" =>  $karyawanConvert,
        //     "luasbangunan" =>  $bangunanConvert,
        //     "omset" =>  $omsetConvert,
        //     "tahunberdiri" => $tahunConvert,
        // ];
        $data = [
            "pengelolahan" => $kelas,
            "jenis" => $jenisUsaha,
            "tenagakerja" =>  $karyawanConvert,
            "bangunan" =>  $bangunanConvert,
            "pendapatan" =>  $omsetConvert,
            "berdiri" => $tahunConvert,
        ];

        // <-- data prediksi ke database -->
        // $dataprediksi = [
        //     'pengelolahan_testing' => $_POST['kls'],
        //     'jenis_testing' => $_POST['jusaha'],
        //     'karyawan_testing' => $_POST['JTK'],
        //     'bangunan_testing' => $_POST['LB'],
        //     'omset_testing' => $_POST['omset'],
        //     'tahun_testing' => $_POST['TH'],
        //     'hasil_testing' => $naivebayes->posteriorProbability($data)
        // ];

        // $this->prediksi->add3($dataprediksi);

        $tesdata = [
            'hasil' => $naivebayes->posteriorProbability($data),
            'hasil2' => $naivebayes->tampilHitung(),
            'hasil3' => $naivebayes->tampilKelas(),
            'hasil4' => $naivebayes->tampilProbab(),
            'atribut' => $naivebayes->getAtribut(),
            'hitungProb' => $naivebayes->getProb(),
            'hitungProb2' => $naivebayes->getProb2(),
        ];


        // $dataempat = [
        //     "pengelolahan" => $kelas,
        //     "jenis" => $jenisUsaha,
        //     "tenagakerja" =>  $karyawan,
        //     "bangunan" =>  $bangunan,
        //     "pendapatan" =>  $omset,
        //     "berdiri" => $tahunBer,
        //     "hasil_uji" => $naivebayes->posteriorProbability($data)
        // ];
        // $this->ModelTampil4->add4($dataempat);

        // dd($naivebayes->getProb());
        return view('dashboard/hasil', $tesdata);
        // return redirect()->route('/');
    }

    public function NaiveUser()
    {
        $naivebayes = new ModelNaiveBayes();
        $kelas = $_POST['kls'];
        $jenisUsaha = $_POST['jusaha'];
        // $jumlaTenagaKerja =  $_POST['JTK'];
        $tahunConvert = isset($tahun);
        $tes = floatval('2021');
        // $tahun = floatval(date('Y', strtotime('2021')) - date('Y', strtotime($_POST['TH'])));
        $tahun = floatval($tes - $_POST['TH']);
        if ($tahun >= 5 && $tahun <= 10.73) {
            $tahunConvert = 'TH1';
        } elseif ($tahun > 10.73 &&  $tahun <= 16.461) {
            $tahunConvert = 'TH2';
        } elseif ($tahun > 16.461 &&  $tahun <= 22.192) {
            $tahunConvert = 'TH3';
        } elseif ($tahun > 22.192 &&  $tahun <= 27.923) {
            $tahunConvert = 'TH4';
        } elseif ($tahun > 27.923 &&  $tahun <= 33.654) {
            $tahunConvert = 'TH5';
        } elseif ($tahun > 33.654 &&  $tahun <= 39.385) {
            $tahunConvert = 'TH6';
        } elseif ($tahun > 39.385 &&  $tahun <= 45.116) {
            $tahunConvert = 'TH7';
        } elseif ($tahun > 45.116 &&  $tahun <= 50.847) {
            $tahunConvert = 'TH8';
        } elseif ($tahun > 50.847 &&  $tahun <= 56.578) {
            $tahunConvert = 'TH9';
        } elseif ($tahun > 56.578 &&  $tahun <= 62.309) {
            $tahunConvert = 'TH10';
        }

        $omset = intval($_POST['omset']);
        if ($omset >= 0 && $omset <= 300000000) {
            $omsetConvert = '1';
        } elseif ($omset > 300000000 && $omset <= 2500000000) {
            $omsetConvert = '2';
        } elseif ($omset > 2500000000) {
            $omsetConvert = '3';
        }

        $karyawan = intval($_POST['JTK']);
        if ($karyawan >= 0 && $karyawan <= 20.468) {
            $karyawanConvert = 'KR1';
        } elseif ($karyawan > 20.468 && $karyawan <= 40.937) {
            $karyawanConvert = 'KR2';
        } elseif ($karyawan > 40.937 && $karyawan <= 61.406) {
            $karyawanConvert = 'KR3';
        } elseif ($karyawan > 61.406 && $karyawan <= 81.875) {
            $karyawanConvert = 'KR4';
        } elseif ($karyawan > 81.875 && $karyawan <= 102.347) {
            $karyawanConvert = 'KR5';
        } elseif ($karyawan > 102.347 && $karyawan <= 122.813) {
            $karyawanConvert = 'KR6';
        } elseif ($karyawan > 122.813 && $karyawan <= 143.282) {
            $karyawanConvert = 'KR7';
        } elseif ($karyawan >  143.282 && $karyawan <= 163.751) {
            $karyawanConvert = 'KR8';
        } elseif ($karyawan > 163.751 && $karyawan <= 184.220) {
            $karyawanConvert = 'KR9';
        } elseif ($karyawan > 184.220 && $karyawan <= 204.689) {
            $karyawanConvert = 'KR10';
        }

        $luasbangunan = floatval($_POST['LB']);
        if ($luasbangunan >= 6 && $luasbangunan <= 66.791) {
            $bangunanConvert = 'LB1';
        } elseif ($luasbangunan > 66.791 && $luasbangunan <= 127.583) {
            $bangunanConvert = 'LB2';
        } elseif ($luasbangunan > 127.583 && $luasbangunan <= 188.375) {
            $bangunanConvert = 'LB3';
        } elseif ($luasbangunan > 188.375 && $luasbangunan <= 249.167) {
            $bangunanConvert = 'LB4';
        } elseif ($luasbangunan > 249.167 && $luasbangunan <= 309.95) {
            $bangunanConvert = 'LB5';
        } elseif ($luasbangunan > 309.95 && $luasbangunan <= 370.751) {
            $bangunanConvert = 'LB6';
        } elseif ($luasbangunan > 370.751 && $luasbangunan <= 431.543) {
            $bangunanConvert = 'LB7';
        } elseif ($luasbangunan > 431.543 && $luasbangunan <= 492.335) {
            $bangunanConvert = 'LB8';
        } elseif ($luasbangunan > 492.335 && $luasbangunan <= 553.127) {
            $bangunanConvert = 'LB9';
        } elseif ($luasbangunan > 553.127 && $luasbangunan <= 613.919) {
            $bangunanConvert = 'LB10';
        }

        // $data = [
        //     "pengelolahanusaha" => $kelas,
        //     "jenisusaha" => $jenisUsaha,
        //     "jumlahtenagakerja" =>  $karyawanConvert,
        //     "luasbangunan" =>  $bangunanConvert,
        //     "omset" =>  $omsetConvert,
        //     "tahunberdiri" => $tahunConvert,
        // ];
        $data = [
            "pengelolahan" => $kelas,
            "jenis" => $jenisUsaha,
            "tenagakerja" =>  $karyawanConvert,
            "bangunan" =>  $bangunanConvert,
            "pendapatan" =>  $omsetConvert,
            "berdiri" => $tahunConvert,
        ];

        // <-- data prediksi ke database -->
        // $dataprediksi = [
        //     'pengelolahan_testing' => $_POST['kls'],
        //     'jenis_testing' => $_POST['jusaha'],
        //     'karyawan_testing' => $_POST['JTK'],
        //     'bangunan_testing' => $_POST['LB'],
        //     'omset_testing' => $_POST['omset'],
        //     'tahun_testing' => $_POST['TH'],
        //     'hasil_testing' => $naivebayes->posteriorProbability($data)
        // ];

        // $this->prediksi->add3($dataprediksi);

        $tesdata = [
            'hasil' => $naivebayes->posteriorProbability($data),
            'hasil2' => $naivebayes->tampilHitung(),
            'hasil3' => $naivebayes->tampilKelas(),
            'hasil4' => $naivebayes->tampilProbab(),
            'atribut' => $naivebayes->getAtribut(),
            'hitungProb' => $naivebayes->getProb(),
            'hitungProb2' => $naivebayes->getProb2(),
        ];
        // dd($naivebayes->getProb());
        return view('dashboard/userhasil', $tesdata);
        // return redirect()->route('/');
    }

    public function delete()
    {
        $this->ModelTampil->emptyTable('data_umkm');
        return redirect()->to('/dataset');
    }

    public function delete2()
    {
        $this->ModelTampil2->emptyTable('data_transfomasi');
        return redirect()->to('/transformasi');
    }

    public function delete3()
    {
        $this->ModelTampil4->emptyTable('hasil_prediksi');
        return redirect()->to('/simpanprediksi');
    }

    // public function isitesting()
    // {
    //     $naivebayes = new ModelNBcadangan();

    //     $file = $this->request->getFile('file_excel');
    //     $ext = $file->getClientExtension();

    //     if ($ext == 'xls') {
    //         $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
    //     } else {
    //         $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    //     }

    //     $Spreadsheet = $render->load($file);
    //     $sheet = $Spreadsheet->getActiveSheet()->toArray();

    //     foreach ($sheet as $x => $excel) {
    //         if ($x == 0) {
    //             continue;
    //         }

    //         $olah = $this->ModelTampil3->cekData($excel['1']);
    //         if ($excel['1'] == $olah) {
    //             continue;
    //         }

    //         $kls = $excel['1'];
    //         $jns = $excel['2'];
    //         $keputusan = $excel['7'];

    //         $tahunTransfor = isset($thn);
    //         $tes = floatval('2021');
    //         // $thn = floatval(date('Y', strtotime('2021')) - date('Y', strtotime($excel['6'])));
    //         $thn = floatval($tes - $excel['6']);
    //         if ($thn >= 5 && $thn <= 10.73) {
    //             $tahunTransfor = 'TH1';
    //         } elseif ($thn > 10.73 &&  $thn <= 16.461) {
    //             $tahunTransfor = 'TH2';
    //         } elseif ($thn > 16.461 &&  $thn <= 22.192) {
    //             $tahunTransfor = 'TH3';
    //         } elseif ($thn > 22.192 &&  $thn <= 27.923) {
    //             $tahunTransfor = 'TH4';
    //         } elseif ($thn > 27.923 &&  $thn <= 33.654) {
    //             $tahunTransfor = 'TH5';
    //         } elseif ($thn > 33.654 &&  $thn <= 39.385) {
    //             $tahunTransfor = 'TH6';
    //         } elseif ($thn > 39.385 &&  $thn <= 45.116) {
    //             $tahunTransfor = 'TH7';
    //         } elseif ($thn > 45.116 &&  $thn <= 50.847) {
    //             $tahunTransfor = 'TH8';
    //         } elseif ($thn > 50.847 &&  $thn <= 56.578) {
    //             $tahunTransfor = 'TH9';
    //         } elseif ($thn > 56.578 &&  $thn <= 62.309) {
    //             $tahunTransfor = 'TH10';
    //         }

    //         $omset = intval($excel['5']);
    //         if ($omset >= 0 && $omset <= 300000000) {
    //             $omsetTransfor = '1';
    //         } elseif ($omset > 300000000 && $omset <= 2500000000) {
    //             $omsetTransfor = '2';
    //         } elseif ($omset > 2500000000) {
    //             $omsetTransfor = '3';
    //         }

    //         $karyawan = intval($excel['3']);
    //         if ($karyawan >= 0 && $karyawan <= 20.468) {
    //             $karyawanTransfor = 'KR1';
    //         } elseif ($karyawan > 20.468 && $karyawan <= 40.937) {
    //             $karyawanTransfor = 'KR2';
    //         } elseif ($karyawan > 40.937 && $karyawan <= 61.406) {
    //             $karyawanTransfor = 'KR3';
    //         } elseif ($karyawan > 61.406 && $karyawan <= 81.875) {
    //             $karyawanTransfor = 'KR4';
    //         } elseif ($karyawan > 81.875 && $karyawan <= 102.347) {
    //             $karyawanTransfor = 'KR5';
    //         } elseif ($karyawan > 102.347 && $karyawan <= 122.813) {
    //             $karyawanTransfor = 'KR6';
    //         } elseif ($karyawan > 122.813 && $karyawan <= 143.282) {
    //             $karyawanTransfor = 'KR7';
    //         } elseif ($karyawan >  143.282 && $karyawan <= 163.751) {
    //             $karyawanTransfor = 'KR8';
    //         } elseif ($karyawan > 163.751 && $karyawan <= 184.220) {
    //             $karyawanTransfor = 'KR9';
    //         } elseif ($karyawan > 184.220 && $karyawan <= 204.689) {
    //             $karyawanTransfor = 'KR10';
    //         }

    //         $luasbangunan = floatval($excel['4']);
    //         if ($luasbangunan >= 6 && $luasbangunan <= 66.791) {
    //             $bangunanTransfor = 'LB1';
    //         } elseif ($luasbangunan > 66.791 && $luasbangunan <= 127.583) {
    //             $bangunanTransfor = 'LB2';
    //         } elseif ($luasbangunan > 127.583 && $luasbangunan <= 188.375) {
    //             $bangunanTransfor = 'LB3';
    //         } elseif ($luasbangunan > 188.375 && $luasbangunan <= 249.167) {
    //             $bangunanTransfor = 'LB4';
    //         } elseif ($luasbangunan > 249.167 && $luasbangunan <= 309.95) {
    //             $bangunanTransfor = 'LB5';
    //         } elseif ($luasbangunan > 309.95 && $luasbangunan <= 370.751) {
    //             $bangunanTransfor = 'LB6';
    //         } elseif ($luasbangunan > 370.751 && $luasbangunan <= 431.543) {
    //             $bangunanTransfor = 'LB7';
    //         } elseif ($luasbangunan > 431.543 && $luasbangunan <= 492.335) {
    //             $bangunanTransfor = 'LB8';
    //         } elseif ($luasbangunan > 492.335 && $luasbangunan <= 553.127) {
    //             $bangunanTransfor = 'LB9';
    //         } elseif ($luasbangunan > 553.127 && $luasbangunan <= 613.919) {
    //             $bangunanTransfor = 'LB10';
    //         }

    //         $naivetesting = [
    //             'pengelolahan' => $kls,
    //             'jenis' => $jns,
    //             'tenagakerja' => $karyawanTransfor,
    //             'bangunan' => $bangunanTransfor,
    //             'pendapatan' => $omsetTransfor,
    //             'berdiri' => $tahunTransfor,
    //             // 'kep' => $keputusan,
    //         ];

    //         $data = [
    //             'pengelolahan_testing' => $excel['1'],
    //             'jenis_testing' => $excel['2'],
    //             'karyawan_testing' => $excel['3'],
    //             'bangunan_testing' => $excel['4'],
    //             'omset_testing' => $excel['5'],
    //             'tahun_testing' => $excel['6'],
    //             'keputusan_testing' => $excel['7'],
    //             'hasil_testing' => $naivebayes->posteriorProbability($naivetesting)
    //         ];

    //         $this->ModelTampil3->add3($data);
    //     }
    // }

    public function naiveTesting80()
    {
        $modelTampil = new ModelTampil();
        $modTampil = new ModelTampil3();
        $akurasi = new modelAkurasi();
        $tesdata = [
            'limit2' => $modTampil->findAll(91, 364),
            'hasiluji' => $akurasi->ujihitung80()
        ];
        return view('dashboard/perform', $tesdata);
    }

    public function naiveTesting60()
    {
        $modelTampil = new ModelTampil();
        $modTampil = new ModelTampil3();
        $akurasi = new modelAkurasi();
        $tesdata = [
            // 'limit' => $modelTampil->findAll(273),
            'limit2' => $modTampil->findAll(182, 273),
            'hasiluji' => $akurasi->ujihitung60()
        ];
        // }
        return view('dashboard/perform', $tesdata);
    }

    public function naiveTesting70()
    {
        $modelTampil = new ModelTampil();
        $modTampil = new ModelTampil3();
        $akurasi = new modelAkurasi();
        $tesdata = [
            // 'limit' => $modelTampil->findAll(318),
            'limit2' => $modTampil->findAll(137, 318),
            'hasiluji' => $akurasi->ujihitung70()
        ];
        // }
        return view('dashboard/perform', $tesdata);
    }

    public function naiveTesting90()
    {
        $modelTampil = new ModelTampil();
        $modTampil = new ModelTampil3();
        $akurasi = new modelAkurasi();
        $tesdata = [
            // 'limit' => $modelTampil->findAll(409),
            'limit2' => $modTampil->findAll(46, 409),
            'hasiluji' => $akurasi->ujihitung90()
        ];
        // }
        return view('dashboard/perform', $tesdata);
    }


    public function k1()
    {
        $akurasi = new modelAkurasi();
        $cek = [
            'lihat' => $akurasi->totK1(),
            'l' => $akurasi->jumlahSamaK1(),
            'll' => $akurasi->ujihitungK1()
        ];
        // dd($akurasi->jumlahSamaK1());
        dd($akurasi->ujihitungK1());

        // $kfold = new ModelNaiveBayesTesting();
        // return $kfold->getKfoldTraining();

        // <-- proses menguji k1-k5 -->
        // $dataTesting = $kfold->getTestingData();
        // foreach ($dataTesting as $key => $value) {
        //     $kfold->kfoldOperation($value);
        // }

        // <-- memasukkan data uji k1-k5 -->
        // $tesuji = new modelAkurasi();
        // return $tesuji->transport();
    }
}
