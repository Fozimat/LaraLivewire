@section('title', 'Halaman Mahasiswa')

<div class="container">
    <h1 class="mt-3 text-center">Halaman mahasiswa</h1>
    <a href="/mahasiswa/create" class="btn btn-primary mb-3">Tambah mahasiswa</a>
    <input wire:model="search" type="search" class="form-control mb-3"
        placeholder="Cari mahasiswa berdasarkan nama atau NIM...">
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
                    <button type="button" wire:click="deleteId({{ $student->id }})" class="btn btn-danger"
                        data-bs-toggle="modal" data-bs-target="#hapusData">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $students->links() }}
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="hapusData" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="destroy()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>