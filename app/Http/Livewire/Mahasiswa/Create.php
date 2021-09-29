<?php

namespace App\Http\Livewire\Mahasiswa;

use App\Models\Student;
use Livewire\Component;

class Create extends Component
{
    public $nama, $nim, $no_hp, $alamat;

    protected $rules = [
        'nama' => 'required|min:3|string',
        'nim' => 'required|numeric',
        'no_hp' => 'required|min:10|numeric',
        'alamat' => 'required|min:20',
    ];

    protected $messages = [
        'required' => ':attribute tidak boleh kosong',
        'integer' => ':attribute harus angka',
        'numeric' => ':attribute harus angka',
        'string' => ':attribute harus string'
    ];

    public function store()
    {
        $this->validate();

        Student::create([
            'nama' => $this->nama,
            'nim' => $this->nim,
            'no_hp' => $this->no_hp,
            'alamat' => $this->alamat
        ]);

        return redirect('/mahasiswa')->with('sukses', 'Data berhasil disimpan');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.mahasiswa.create');
    }
}
