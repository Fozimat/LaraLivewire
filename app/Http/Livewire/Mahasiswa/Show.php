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

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function destroy()
    {
        $student = Student::findOrFail($this->deleteId);
        $student->delete();
        return redirect('/mahasiswa')->with('sukses', 'Data berhasil dihapus');
    }
}
