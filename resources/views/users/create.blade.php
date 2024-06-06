@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add User')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0"><font color= #212529>{{ __('Profile User') }}</font></h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('User Information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="text" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirmation Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Konfirmasi Password') }}" value="" required>
                                </div>
                                <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Role') }}</label>
                                     <select name="role" class="form-control" style="width:276" required>
                                        <option value="">----- Select -----</option>
                                        <option value="Admin">Admin</option>
                                        <option value="PIC">PIC</option>
                                        <option value="ICO">ICO</option>
                                     </select>
                                    @if ($errors->has('role'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('site1') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Site 1') }}</label>
                                    <input type="text" name="site1" id="input-site1" class="form-control form-control-alternative{{ $errors->has('site1') ? ' is-invalid' : '' }}" placeholder="{{ __('Site 1') }}" value="{{ old('site1') }}" required autofocus>

                                    @if ($errors->has('site1'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('site1') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('site2') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Site 2') }}</label>
                                    <input type="text" name="site2" id="input-site2" class="form-control form-control-alternative{{ $errors->has('site2') ? ' is-invalid' : '' }}" placeholder="{{ __('Site 2') }}" value="{{ old('site2') }}" required autofocus>

                                    @if ($errors->has('site2'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('site2') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('site3') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Site 3') }}</label>
                                    <input type="text" name="site3" id="input-site3" class="form-control form-control-alternative{{ $errors->has('site3') ? ' is-invalid' : '' }}" placeholder="{{ __('Site 3') }}" value="{{ old('site3') }}" required autofocus>

                                    @if ($errors->has('site3'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('site3') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('site4') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Site 4') }}</label>
                                    <input type="text" name="site4" id="input-site4" class="form-control form-control-alternative{{ $errors->has('site4') ? ' is-invalid' : '' }}" placeholder="{{ __('Site 4') }}" value="{{ old('site4') }}" required autofocus>

                                    @if ($errors->has('site4'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('site4') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('site5') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Site 5') }}</label>
                                    <input type="text" name="site5" id="input-site5" class="form-control form-control-alternative{{ $errors->has('site5') ? ' is-invalid' : '' }}" placeholder="{{ __('Site 5') }}" value="{{ old('site5') }}" required autofocus>

                                    @if ($errors->has('site5'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('site5') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('site6') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Site 6') }}</label>
                                    <input type="text" name="site6" id="input-site6" class="form-control form-control-alternative{{ $errors->has('site6') ? ' is-invalid' : '' }}" placeholder="{{ __('Site 6') }}" value="{{ old('site6') }}" required autofocus>

                                    @if ($errors->has('site6'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('site6') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('site7') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Site 7') }}</label>
                                    <input type="text" name="site7" id="input-site7" class="form-control form-control-alternative{{ $errors->has('site7') ? ' is-invalid' : '' }}" placeholder="{{ __('Site 7') }}" value="{{ old('site7') }}" required autofocus>

                                    @if ($errors->has('site7'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('site7') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('site8') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Site 8') }}</label>
                                    <input type="text" name="site8" id="input-site8" class="form-control form-control-alternative{{ $errors->has('site8') ? ' is-invalid' : '' }}" placeholder="{{ __('Site 8') }}" value="{{ old('site8') }}" required autofocus>

                                    @if ($errors->has('site8'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('site8') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('site9') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Site 9') }}</label>
                                    <input type="text" name="site9" id="input-site9" class="form-control form-control-alternative{{ $errors->has('site9') ? ' is-invalid' : '' }}" placeholder="{{ __('Site 9') }}" value="{{ old('site9') }}" required autofocus>

                                    @if ($errors->has('site9'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('site9') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('site10') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Site 10') }}</label>
                                    <input type="text" name="site10" id="input-site10" class="form-control form-control-alternative{{ $errors->has('site10') ? ' is-invalid' : '' }}" placeholder="{{ __('Site 10') }}" value="{{ old('site10') }}" required autofocus>

                                    @if ($errors->has('site10'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('site10') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
