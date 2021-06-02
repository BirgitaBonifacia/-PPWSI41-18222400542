<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function insert()
    {
        $result = DB::insert('insert into mahasiswas (npm, nama_mahasiswa, tempat_lahir, tanggal_lahir
        alamat, created_at) values (?, ?, ?, ?, ?, ?', ['1822240054', 'Birgita Bonifacia','Palembang','2000-07-03',
        'Jl Talang Keramat', now()]);
        dump($result);
        
    }

    public function update()
    {
        $result = DB::update('update mahasiswas set nama_mahasiswa = "Birgita", updated_at = now() where npm =?',['1822240054']);
        dump($result);
    }

    public function delete()
    {
        $result = DB::delete('delete from mahasiswas where npm = ?', ['1822240054']);
        dump($result);
    }

    public function select()
    {
        $result = DB::select('select * from mahasiswas');
        //dump($result);
        return view ('mahasiswa.index', ['all-mahasiswa' => $result, 'kampus' => $kampus])
    }

    public function insertQb()
    {
        $result = DB::table('mahasiswas')- insert(
            [
                'npm' => '1822240054',
                'nama_mahasiswa' => 'Birgita Bonifacia',
                'tempat_lahir' => 'Palembang',
                'tanggal_lahir' => '2000-07-03',
                'alamat' => 'Jl Talang Keramat',
                'created_at' => now()

            ]
            );
            dump($result);
    }

    public function updateQb()
    {
        $result = DB::table('mahasiswas')
        -> where('npm', '1822240054')
        -> update(
            [
                'nama_mahasiswa' => 'Birgita Bonifacia',
                'updated_at' => now()
            ]
        
            );
            dump($result);
        
    }

    public function updateQb()
    {
        $result = DB::table('mahasiswas')
        -> where('npm', '1822240054')
        -> delete();
            dump($result);
    }

    public function selectQb()
    {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::table('mahasiswas')->get();
        -> where('npm', '1822240054')
        return view('mahasiswa.index', ['allmahasiswa'=> $result, 'kampus' =>$kampus]);
    }

    public function insertElq()
    {
        $mahasiswa = new Mahasiswa;
        $mahasiswa ->npm ='1822240054';
        $mahasiswa ->nama_mahasiswa ='Birgita Bonifacia';
        $mahasiswa ->tempat_lahir='Palembang';
        $mahasiswa ->tanggal_lahir ='2000-07-03';
        $mahasiswa ->alamat ='Jl Talang Keramat';
        $mahasiswa ->save();
        dump($mahasiswa);
    }

    public function updateElq()
    {
        $mahasiswa = Mahasiswa::where('npm', '1822240054')->first();
        $mahasiswa ->nama_mahasiswa ='Birgita Bonifacia';
        $mahasiswa ->save();
        dump($mahasiswa);
    }

    public function deleteElq()
    {
        $mahasiswa = Mahasiswa::where('npm', '1822240054')->first();
        $mahasiswa ->delete();
        dump($mahasiswa);
    }

    public function SelectElq()
    {
        $kampus = "Universitas Multi Data Palembang"
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', ['allmahasiswa' => $mahasiswa, 'kampus' => $kampus])
        dump($mahasiswa);
    }




