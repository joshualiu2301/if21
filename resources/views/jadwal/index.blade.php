@extends('main')

@section('title', 'jadwal')
@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Jadwal</h3>
            <div class="card-tools">
                <button
                type="button"
                class="btn btn-tool"
                data-lte-toggle="card-collapse"
                title="Collapse"
                >
                <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                </button>
                <button
                type="button"
                class="btn btn-tool"
                data-lte-toggle="card-remove"
                title="Remove"
                >
                <i class="bi bi-x-lg"></i>
                </button>
            </div>
            </div>
            <div class="card-body">
                <a href="{{ route('jadwal.create') }}" class="btn btn-sm btn-primary"><i class="bi bi-file-earmark-plus-fill"></i> Tambah</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Tahun Akademik</th>
                            <th>Semester</th>
                            <th>MataKuliah</th>
                            <th>Dosen</th>
                            <th>Sesi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $item)
                        <tr>
                            <td>{{ $item->kelas ?? null }}</td>
                            <td>{{ $item->tahun_akademik ?? null }}</td>
                            <td>{{ $item->kode_smt ?? null }}</td>
                            <td>{{ $item->mataKuliah->nama ?? null }}</td>
                            <td>{{ $item->dosen->name ?? null }}</td>
                            <td>{{ $item->sesi->nama ?? null}}</td>
                            <td>
                                <a href="{{ route('jadwal.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-fill"></i></a>
                                <form method="POST" action="{{ route('jadwal.destroy', $item->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger btn-rounded show_confirm"
                                    data-toggle="tooltip" title='Delete'
                                    data-nama='{{ $item->nama }}'><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">Footer</div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        </div>
    </div>
    <!--end::Row-->
@endsection
