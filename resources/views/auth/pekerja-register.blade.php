@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrasi Pekerja') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('pekerja.register.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama"  required autocomplete="name" autofocus>

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nomorKTP" class="col-md-4 col-form-label text-md-right">{{ __('Nomor KTP') }}</label>

                            <div class="col-md-6">
                                <input id="nomorKTP" type="number" class="form-control @error('nomorKTP') is-invalid @enderror" name="nomorKTP" value="{{ old('nomorKTP') }}" required autocomplete="nomorKTP" autofocus>

                                @error('nomorKTP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="usia" class="col-md-4 col-form-label text-md-right">{{ __('Usia') }}</label>

                            <div class="col-md-6">
                                <input id="usia" type="number" class="form-control" name="usia" required autofocus>

                                @error('usia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon') }}</label>

                            <div class="col-md-6">
                                <input id="tel" type="number" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel" autofocus>

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="keahlian" class="col-md-4 col-form-label text-md-right">{{ __('Keahlian') }}</label>

                            <div class="col-md-6">
                                <textarea id="keahlian" rows="3" class="form-control @error('keahlian') is-invalid @enderror" name="keahlian" value="{{ old('keahlian') }}" required autocomplete="keahlian" autofocus></textarea>

                                @error('keahlian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kondisiKhusus" class="col-md-4 col-form-label text-md-right">{{ __('Kondisi Khusus') }}</label>

                            <div class="col-md-6">
                                <textarea id="kondisiKhusus" rows="2" class="form-control @error('kondisiKhusus') is-invalid @enderror" name="kondisiKhusus" value="{{ old('kondisiKhusus') }}" required autocomplete="kondisiKhusus" autofocus></textarea>

                                @error('kondisiKhusus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="agama" class="col-md-4 col-form-label text-md-right">{{ __('Agama') }}</label>

                            <div class="col-md-6">
                                <input id="agama" type="text" class="form-control @error('agama') is-invalid @enderror" name="agama" value="{{ old('agama') }}" required autocomplete="agama" autofocus>

                                @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenisPekerjaan" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Pekerjaan') }}</label>

                            <div class="col-md-6">
                                <select id="jenisPekerjaan" class="form-control @error('jenisPekerjaan') is-invalid @enderror" name="jenisPekerjaan" value="{{ old('jenisPekerjaan') }}" required autocomplete="jenisPekerjaan" autofocus>
                                    <option>pembantu</option>
                                    <option>babysitter</option>
                                    <option>perawat</option>
                                </select>
                                @error('jenisPekerjaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fotoKTP" class="col-md-4 col-form-label text-md-right">{{ __('Foto KTP') }}</label>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="file" name="fotoKTP" class="form-control">
                                </div>

                                @error('fotoKTP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fotoDiri" class="col-md-4 col-form-label text-md-right">{{ __('Foto Diri') }}</label>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="file" name="fotoDiri" class="form-control">
                                </div>

                                @error('fotoDiri')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Daftar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
