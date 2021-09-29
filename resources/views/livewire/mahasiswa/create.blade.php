@section('title', 'Tambah Mahasiswa')
<div class="container">
    <form wire:submit.prevent="store">
        <div class="mt-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" wire:model="nama">
            @error('nama')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="mt-3">
            <label class="form-label">NIM</label>
            <input type="text" class="form-control @error('nim') is-invalid @enderror" wire:model="nim">
            @error('nim')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="mt-3">
            <label class="form-label">No Hp</label>
            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" wire:model="no_hp">
            @error('no_hp')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="mt-3">
            <label class="form-label">Alamat</label>
            <textarea class="form-control @error('alamat') is-invalid @enderror" rows="3"
                wire:model="alamat"></textarea>
            @error('alamat')
            <span class="invalid-feedback">
                {{ $message }}
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>