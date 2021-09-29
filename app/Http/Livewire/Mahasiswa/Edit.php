<?php

namespace App\Http\Livewire\Mahasiswa;

use App\Models\Student;
use Livewire\Component;

class Edit extends Component
{
    public $studentId, $nama, $nim, $no_hp, $alamat;

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

    public function update()
    {
        $this->validate();

        $student = Student::findOrFail($this->studentId);

        $student->update([
            'nama' => $this->nama,
            'nim' => $this->nim,
            'no_hp' => $this->no_hp,
            'alamat' => $this->alamat
        ]);

        return redirect('/mahasiswa')->with('sukses', 'Data berhasil diedit');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($id)
    {
        $student = Student::findOrFail($id);
        $this->studentId = $student->id;
        $this->nama = $student->nama;
        $this->nim = $student->nim;
        $this->no_hp = $student->no_hp;
        $this->alamat = $student->alamat;
    }

    public function render()
    {
        return view('livewire.mahasiswa.edit');
    }
}
