@section('title', 'Halaman Mahasiswa')

<div class="container">
    <h1 class="mt-3 text-center">Halaman mahasiswa</h1>
    <a href="/mahasiswa/create" class="btn btn-primary mb-3">Tambah mahasiswa</a>
    @if(session('sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('sukses') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">No Hp</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = ($students->currentPage() - 1) * $students->perPage() + 1;
            @endphp
            @foreach ($students as $student)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $student->nama }}</td>
                <td>{{ $student->nim }}</td>
                <td>{{ $student->no_hp }}</td>
                <td>{{ $student->alamat }}</td>
                <td><a href="{{ route('mahasiswa.edit', $student->id) }}" class="btn btn-success">Edit</a> |
                    <button wire:click="destroy({{ $student->id }})" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $students->links() }}
</div>