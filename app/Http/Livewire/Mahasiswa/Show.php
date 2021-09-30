<?php

namespace App\Http\Livewire\Mahasiswa;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public $search;
    protected $queryString = ['search'];

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $students = $this->search === null ? Student::latest()->paginate(5) : Student::where('nama', 'like', '%' . $this->search . '%')->orWhere('nim', 'like', '%' . $this->search . '%')->latest()->paginate(5);
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
