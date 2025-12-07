@extends('admin.layouts.app')
@section('title', 'Edit user')
@section('content')

    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit User</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Edit User</h1>
                <p class="mb-0">Form untuk edit user.</p>
            </div>
            <div>
                <a href="{{ route('user.index') }}" class="btn btn-primary"><i class="far fa-question-circle me-1"></i>
                    Kembali</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card border-0 shadow components-section">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('user.update', $dataUser->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">

                            <div class="col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" id="name" name="name"
                                        value="{{ old('name', $dataUser->name) }}" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" id="email" name="email"
                                        value="{{ old('email', $dataUser->email) }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password <small
                                            class="text-muted">(Opsional)</small></label>
                                    <input type="password" id="password" name="password" value=""
                                        class="form-control" placeholder="Kosongkan jika tetap">
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        value="" class="form-control" placeholder="Ulangi password baru">
                                </div>

                                <div class="mb-3">
                                    <label>Pilih Role</label>
                                    <select name="role" class="form-control" required>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}"
                                                {{ $dataUser->hasRole($role->name) ? 'selected' : '' }}>
                                                {{ ucfirst($role->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-12">
                                <div class="mb-3">
                                    <label for="avatar" class="form-label fw-bold">Foto Profil</label>

                                    <div class="card shadow-sm mb-2">
                                        <div class="card-body text-center p-3">
                                            @if ($dataUser->avatar)
                                                <img src="{{ asset('storage/' . $dataUser->avatar) }}" alt="Foto User"
                                                    class="img-fluid rounded mb-2"
                                                    style="max-height: 150px; object-fit: cover;">
                                                <p class="small text-muted mb-0">Foto saat ini</p>
                                            @else
                                                <div class="bg-light rounded d-flex align-items-center justify-content-center mb-2"
                                                    style="height: 150px;">
                                                    <span class="text-muted">Belum ada foto</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <input type="file" id="avatar" name="avatar" class="form-control">
                                    <div class="form-text text-muted">
                                        Biarkan kosong jika tidak ingin mengubah foto. <br>
                                        Format: JPG, PNG, JPEG. Maks: 2MB.
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-info"><i class="fas fa-save me-1"></i> Simpan
                                Perubahan</button>
                            <a href="{{ route('user.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
