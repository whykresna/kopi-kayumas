<div class="modal fade" tabindex="-1" role="dialog" id="create-user">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.pengguna.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select id="role" class="form-control" name="role">
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">
                            {{ $errors->first('role') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('username') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
