<div>
    <div class="container" style="margin-top: 120px">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h5 class="text-center"> <i class="fa fa-user-circle"></i> REGISTER</h5>
                        <hr>
                        <form wire:submit.prevent="register">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold"><i class="fa fa-envelope"></i> EMAIL</label>
                                <input type="text" wire:model.lazy="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Alamat Email">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold"><i class="fa fa-user"></i> USERNAME</label>
                                <input type="text" wire:model.lazy="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Username">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold"><i class="fa fa-key"></i> PASSWORD</label>
                                <input type="text" wire:model.lazy="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="password">
                                @error('Password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                            <hr>
                            <p class="text-center">Sudah punya akun? Silahkan <a href="/login">Login Disini!</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>