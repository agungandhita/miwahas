@extends('layouts.backend.app')

@section('title')
    Form Pendaftaran
@endsection

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2>Form Pendaftaran PPDB Mi.Wachid Hasjim Surabaya</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action=" {{url('ppdb/form-pendaftaran', Auth::id())}} " method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Lengkap</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value=" {{$user->name}} " placeholder="Nama Lengkap" />
                                        @error('name')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Email Address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value=" {{$user->email}}" placeholder="Email Address" />
                                        @error('email')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Panggilan</label>
                                        <input type="text" class="form-control @error('nama_panggilan') is-invalid @enderror" name="nama_panggilan" value=" {{$user->muridDetail->nama_panggilan}} "/>
                                        @error('nama_panggilan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">NIK</label>
                                        <input type="number" min="0" class="form-control @error('nik') is-invalid @enderror" name="nik" value=" {{$user->muridDetail->nik}} " />
                                        @error('nik')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control" id="">
                                            <option value="laki-laki" {{ $user->muridDetail->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                            <option value="perempuan" {{ $user->muridDetail->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                              

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tempat Lahir</label>
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value=" {{$user->muridDetail->tempat_lahir}} "/>
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Lahir</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_lahir') is-invalid @enderror" id="fp-default" name="tgl_lahir" value=" {{$user->muridDetail->tgl_lahir}} "/>
                                        @error('tgl_lahir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Anak Ke</label>
                                        <input type="number" min="1" class="form-control  @error('anak_ke') is-invalid @enderror" id="fp-default" name="anak_ke" value=" {{$user->muridDetail->anak_ke}} "/>
                                        @error('anak_ke')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Jumlah Saudara Kandung</label>
                                        <input type="number" min="1" class="form-control  @error('jumlah_saudara') is-invalid @enderror" id="fp-default" name="jumlah_saudara" value=" {{$user->muridDetail->jumlah_saudara}} "/>
                                        @error('jumlah_saudara')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">No Telp</label>
                                        <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" value=" {{$user->muridDetail->telp}} "/>
                                        @error('telp')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">No WhatsApp</label>
                                        <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value=" {{$user->muridDetail->whatsapp}} "/>
                                        @error('whatsapp')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Agama</label>
                                        <select name="agama" class="form-control @error('agama') is-invalid @enderror">
                                            <option value="">-- Pilih --</option>
                                            <option value="Islam" {{$user->muridDetail->agama == 'Islam' ? 'selected' : ''}}>Islam</option>
                                            <option value="Kristen Katolik" {{$user->muridDetail->agama == 'Krtisten Katolik' ? 'selected' : ''}}>Kristen Katolik</option>
                                            <option value="Kristen Protestan" {{$user->muridDetail->agama == 'Kristen Protestan' ? 'selected' : ''}}>Kristen Protestan</option>
                                            <option value="Hindu" {{$user->muridDetail->agama == 'Hindu' ? 'selected' : ''}}>Hindu</option>
                                            <option value="Budha" {{$user->muridDetail->agama == 'Budha' ? 'selected' : ''}}>Budha</option>
                                            <option value="Konghucu" {{$user->muridDetail->agama == 'Konghucu' ? 'selected' : ''}}>Konghucu</option>
                                        </select>
                                        @error('agama')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lulusan Dari TK/RA</label>
                                        <input type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" name="asal_sekolah" value=" {{$user->muridDetail->asal_sekolah}} "/>
                                        @error('asal_sekolah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Kewarganegaraan</label>
                                        <input type="text" class="form-control @error('kewarganegaraan') is-invalid @enderror" name="kewarganegaraan" value=" {{$user->muridDetail->kewarganegaraan}} "/>
                                        @error('kewarganegaraan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Alamat Tinggal Sekarang</label>
                                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="30" rows="3"> {{$user->muridDetail->alamat}}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Alamat Sesuai Kartu Keluarga</label>
                                        <textarea name="alamat_kk" class="form-control @error('alamat_kk') is-invalid @enderror" cols="30" rows="3"> {{$user->muridDetail->alamat_kk}}</textarea>
                                        @error('alamat_kk')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="/home" class="btn btn-warning">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection