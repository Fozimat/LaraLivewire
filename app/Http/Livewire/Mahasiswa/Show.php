<?php

namespace App\Http\Livewire\Mahasiswa;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $students = Student::latest()->paginate(5);
        return view('livewire.mahasiswa.show', compact(['students']));
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('/mahasiswa')->with('sukses', 'Data berhasil dihapus');
    }
}
