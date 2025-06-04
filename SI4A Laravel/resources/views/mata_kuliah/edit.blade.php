@extends('layout.main')
@section('title', 'Mata Kuliah')
@section('content')
<div class="row">
    <div class="col-12">
        <!-- Default box -->
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Edit Mata Kuliah</div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form action="{{ route('mata_kuliah.update', $mata_kuliah->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!--begin::Body-->
                <div class="card-body">
                    <div class="mb-3">
                        <label for="kode_mk" class="form-label">Kode Mk</label>
                        <input type="text" class="form-control" id="kode_mk" name="kode_mk" value="{{ old('kode_mk', $mata_kuliah->kode_mk) }}">
                        @error('kode_mk')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $mata_kuliah->nama) }}">
                        @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="prodi_id" class="form-label">Program Studi</label>
                        <select class="form-control" id="prodi_id" name="prodi_id">
                            @foreach($prodi as $item)
                                <option value="{{ $item->id }}" {{ (string) old('prodi_id', $mata_kuliah->prodi_id) === (string) $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('prodi_id')
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