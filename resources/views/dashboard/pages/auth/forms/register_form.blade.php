

<div class="card-body">
    <form action="{{ route('register.custom') }}" method="POST">
        @csrf
        {{-- <div class="form-group mb-3">
            <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                required autofocus>
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group mb-3">
            <input type="text" placeholder="Email" id="email_address" class="form-control"
                name="email" required autofocus>
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group mb-3">
            <input type="password" placeholder="Password" id="password" class="form-control"
                name="password" required>
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="form-group mb-3">
            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember Me</label>
            </div>
        </div>
        <div class="d-grid mx-auto">
            <button type="submit" class="btn btn-dark btn-block">Sign up</button>
        </div>
    </form>



        <form amethod="POST" action="{{ route('registered') }}">
                                @csrf--}}
            <div class="input-group mb-3">
              <input type="text" class="form-control" required name="name" value="{{ old('name') }}" placeholder="Full name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-user"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror"
            name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </span>
                    @enderror
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
            </div>

            <div class="input-group mb-3">
                {{-- <label for="is_admin" class="col-md-4 col-form-label text-md-end">{{ __('role id') }}</label> --}}
                    <select id="is_admin" type="text" class="form-control" name="is_admin" >
                        <option selected="" disabled="">نوع المستخدم</option>
                        <option value="0">عميل</option>
                        <option value="1"> موظف</option>
                    </select>

                    @error('is_admin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>


            <div class="input-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" id="password-confirm"
                name="password_confirmation" class="form-control" placeholder="Retype password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                    <label for="agreeTerms">
                    I agree to the <a href="#">terms</a>
                    </label>
                    </div>
                </div>

                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>

            </div>
        </form>
