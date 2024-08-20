<div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <h1>SELECT2 Livewire</h1>
                <hr>

                {{-- <form action="" wire:submit.prevent='store' method="POST" class="{{ $createForm ? 'd-block' : 'd-none' }}" >
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" wire:model='name' class="form-control @error('name') is-invalid @enderror" placeholder="Name...">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" wire:model='email' class="form-control @error('email') is-invalid @enderror" placeholder="Email...">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role">Role</label>
                        <div wire:ignore>
                            <select wire:model='role' name="role" id="role" class="select2 form-select @error('role') is-invalid @enderror">
                                <option value="">-- Pilih Role --</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        @error('role')
                            <div class="invalid-feedback d-block">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" name="password" id="password" wire:model='password' class="form-control @error('password') is-invalid @enderror" placeholder="********">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                <button class="btn btn-danger" wire:click='batal'>Batal</button> --}}

                <a href="javascript:void(0)" class="btn btn-success" wire:click='create' id="btn-tambah-user"><i class="fas fa-plus me-2"></i> Tambah User</a>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $u)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->role }}</td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak Ada Data Tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('livewire.userModal')

    @push('script')
        <script>
            $('#btn-tambah-user').on('click', function () {
                $('#select2-role-container').attr('title', '-- Pilih Role --');
                $('#select2-role-container').html('-- Pilih Role --');
                $('#modal-tambah-user').modal('show');
            });

            $('.select2').select2({
                theme: 'bootstrap-5'
            });

            $('#role').on('change', function(e) {
                var data = $('#role').select2("val");
                @this.set('role', data);
            });
       </script>
    @endpush
</div>
