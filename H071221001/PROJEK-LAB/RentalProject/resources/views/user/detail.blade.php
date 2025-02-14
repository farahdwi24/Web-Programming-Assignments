@extends('user.main')
@section('content')
<style>
    .card {
        background-color: rgba(255, 255, 255, 0.8);
        /* RGBA dengan tingkat transparansi 0.8 */
        border-radius: 10px;
        /* Tambahkan border-radius untuk memberikan sudut yang sedikit melengkung */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* Tambahkan box-shadow untuk efek bayangan */
    }

    .card-header {
        background-color: rgba(0, 123, 255, 0.8);
        /* Ubah warna header card sesuai kebutuhan */
        color: white;
        /* Ubah warna teks header card sesuai kebutuhan */
        border-radius: 10px 10px 0 0;
        /* Terapkan border-radius hanya pada sudut atas card header */
    }

    .card-body {
        padding: 20px;
        /* Tambahkan padding pada card body */
    }

    /* Tambahkan gaya untuk header transparan */
    header {
        background-color: rgba(118, 118, 118, 0.5);
        /* Atur nilai transparansi sesuai kebutuhan */
        padding: 20px;
        /* Sesuaikan padding sesuai kebutuhan */
    }
</style>
    <header class="">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder" style="color: white">Detail Mobil</h1>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{ Storage::url($car->gambar) }}" alt="{{ $car->nama_mobil }}" />
                        <!-- Product details-->
                        <div class="card-body card-body-custom pt-4">
                            <div>
                                <!-- Product name-->
                                <h3 class="fw-bolder text-primary">Deskripsi</h3>
                                <p>
                                    {{ $car->deskripsi }}
                                </p>
                                <div class="mobil-info-list border-top pt-4">
                                    <ul class="list-unstyled">
                                        <li>
                                            @if ($car->p3k)
                                                <i class="ri-checkbox-circle-line"></i>
                                                <span>P3K</span>
                                            @else
                                            <i class="ri-close-circle-line text-secondary"></i>
                                                <span>P3K</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if ($car->charger)
                                                <i class="ri-checkbox-circle-line"></i>
                                                <span>CHARGER</span>
                                            @else
                                            <i class="ri-close-circle-line text-secondary"></i>
                                                <span>CHARGER</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if ($car->audio)
                                                <i class="ri-checkbox-circle-line"></i>
                                                <span>Audio</span>
                                            @else
                                            <i class="ri-close-circle-line text-secondary"></i>
                                                <span>Audio</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if ($car->ac)
                                                <i class="ri-checkbox-circle-line"></i>
                                                <span>AC</span>
                                            @else
                                            <i class="ri-close-circle-line text-secondary"></i>
                                                <span>AC</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card">
                        <!-- Product details-->
                        <div class="card-body card-body-custom pt-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="fw-bolder">{{ $car->nama_mobil }}</h5>
                                    <div class="rent-price mb-3">
                                        <span style="font-size: 1rem" class="text-primary">Rp
                                            {{ number_format($car->harga_sewa, 0, ',', '.') }}/</span>day
                                    </div>
                                </div>
                                <ul class="list-unstyled list-style-group">
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <span>Bahan Bakar</span>
                                        <span style="font-weight: 600">{{ $car->bahan_bakar }}</span>
                                    </li>
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <span>Jumlah Kursi</span>
                                        <span style="font-weight: 600">{{ $car->jumlah_kursi }}</span>
                                    </li>
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <span>Transmisi</span>
                                        <span style="font-weight: 600">{{ $car->transmisi }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer border-top-0 bg-transparent">
                            <div class="text-center">
                                <div class="text-center">
                                    @if ($car->status == 'tersedia')
                                        <a class="btn btn-primary mt-auto" href="{{ route('payment', ['car_slug' => $car->slug]) }}">Sewa</a>
                                    @else
                                        <button class="btn btn-secondary mt-auto" disabled>Sewa</button>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
