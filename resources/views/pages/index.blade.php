<x-app-layout>

    @slot('content')

    @section('title')Dashboard @endsection

    <h4 class="m-4 text-capitalize">Dashboard {{ auth()->user()->name }}</h4>
    <hr>

    <div class="card m-3">
        <div class="row">
            <div class="col-md-6">
                <div class="row mx-2 my-3 align-item-center justify-content-center">
                    <div class="col-md-12 col-lg-6 my-2">
                        <a href="../alternatif" class="text-primary">
                            <div class="border px-3 py-4 bg-body-tertiary rounded" style="height: 100%">
                                <div class="row justify-content-between">
                                    <div class="col-md-6 col-sm-12 text-center mb-2">
                                        <button type="button" class="btn btn-primary">
                                            <i class="material-icons">person_outline</i>
                                        </button>
                                    </div>
                                    <div class="col-md-6 col-sm-12 text-center pt-1">
                                        <h3 class="text-sm mb-0 text-capitalize">Alternatif</h3>
                                        <p class="text-sm mb-0 text-capitalize">{{ $alternatif }} Karyawan</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12 col-lg-6 my-2">
                        <a href="../kriteria" class="text-primary">
                            <div class="border px-3 py-4 bg-body-tertiary rounded" style="height: 100%">
                                <div class="row justify-content-between">
                                    <div class="col-md-6 col-sm-12 text-center mb-2">
                                        <button type="button" class="btn btn-primary">
                                            <i class="material-icons">storage</i>
                                        </button>
                                    </div>
                                    <div class="col-md-6 col-sm-12 text-center pt-1">
                                        <h3 class="text-sm mb-0 text-capitalize">Kriteria</h3>
                                        <p class="text-sm mb-0 text-capitalize">{{ $kriteria }} Kriteria</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12 col-lg-6 my-2">
                        <a href="../subkriteria" class="text-primary">
                            <div class="border px-3 py-4 bg-body-tertiary rounded" style="height: 100%">
                                <div class="row justify-content-between">
                                    <div class="col-md-6 col-sm-12 text-center mb-2">
                                        <button type="button" class="btn btn-primary">
                                            <i class="material-icons">storage</i>
                                        </button>
                                    </div>
                                    <div class="col-md-6 col-sm-12 text-center pt-1">
                                        <h3 class="text-sm mb-0 text-capitalize">Subkriteria</h3>
                                        <p class="text-sm mb-0 text-capitalize">{{ $subkriteria }} Subkriteria</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12 col-lg-6 my-2">
                        <a href="../perhitungan_subkriteria/prangkingan" class="text-primary">
                            <div class="border px-3 py-4 bg-body-tertiary rounded" style="height: 100%">
                                <div class="row justify-content-between">
                                    <div class="col-md-6 col-sm-12 text-center mb-2">
                                        <button type="button" class="btn btn-primary">
                                            <i class="material-icons">calculate</i>
                                        </button>
                                    </div>
                                    <div class="col-md-6 col-sm-12 text-center pt-1">
                                        <h3 class="text-sm mb-0 text-capitalize">Prangkingan</h3>
                                        <p class="text-sm mb-0 text-capitalize">Lihat Hasil</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="/dashboard/bg-removebg-preview.png" class="img-fluid">
            </div>
        </div>
    </div>




    @endslot

</x-app-layout>