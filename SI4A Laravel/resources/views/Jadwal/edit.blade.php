@extends('layout.main')
@section('title', 'Jadwal')
@section('content')
<div class="row">
    <div class="col-12">
        <!-- Default box -->
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Edit Jadwal</div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!--begin::Body-->
                <div class="card-body">
                    <div class="mb-3">
                        <label for="tahun_akademik" class="form-label">tahun akademik</label>
                        <input type="text" class="form-control" id="tahun_akademik" name="tahun_akademik" value="{{ old('tahun_akademik', $jadwal->tahun_akademik) }}">
                        @error('tahun_akademik')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kode_smt" class="form-label">Semester</label>
                        <input type="text" class="form-control" id="kode_smt" name="kode_smt" value="{{ old('kode_smt', $jadwal->kode_smt) }}">
                        @error('kode_smt')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" value="{{ old('kelas', $jadwal->kelas) }}">
                        @error('kelas')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="mata_kuliah_id" class="form-label">Mata Kuliah</label>
                        <select class="form-control" id="mata_kuliah_id" name="mata_kuliah_id">
                            @foreach($mata_kuliah as $item)
                                <option value="{{ $item->id }}" {{ (string) old('mata_kuliah_id', $jadwal->mata_kuliah_id) === (string) $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('mata_kuliah_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="dosen_id" class="form-label">Dosen</label>
                        <select class="form-control" id="dosen_id" name="dosen_id">
                            @foreach($dosen as $item)
                                <option value="{{ $item->id }}" {{ (string) old('dosen_id', $jadwal->dosen_id) === (string) $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('dosen_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sesi_id" class="form-label">Sesi</label>
                        <select class="form-control" id="sesi_id" name="sesi_id">
                            @foreach($sesi as $item)
                                <option value="{{ $item->id }}" {{ (string) old('sesi_id', $jadwal->sesi_id) === (string) $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('sesi_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                   
                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <!--end::Footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@endsection