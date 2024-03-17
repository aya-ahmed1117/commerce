


<form amethod="POST" action="{{ route('register') }}">
                        @csrf
    <div class="input-group mb-3">
      <input type="text" class="form-control"  name="name" value="{{ old('name') }}" placeholder="Full name">

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
      {{-- <input type="email" class="form-control" placeholder="Email"> --}}
      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
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

    <div class="row mb-3">
        <label for="is_admin" class="col-md-4 col-form-label text-md-end">{{ __('role id') }}</label>

        <div class="col-md-6">
            <select id="is_admin" type="text" class="form-control @error('is_admin') is-invalid @enderror"
            name="is_admin" value="{{ old('is_admin') }}">
                <option selected="" value="" disabled="">نوع المستخدم</option>
                <option value="0">عميل</option>
                <option value="1"> موظف</option>
            </select>

            @error('is_admin')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="input-group mb-3">
      {{-- <input type="password" class="form-control" placeholder="Password"> --}}

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
      <!-- /.col -->
      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block">Register</button>
      </div>
      <!-- /.col -->
    </div>
  </form>
