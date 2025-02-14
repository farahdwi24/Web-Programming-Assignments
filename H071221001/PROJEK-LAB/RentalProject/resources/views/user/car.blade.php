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
</style>

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h1 class="text-center mb-5" style="color: white; background-color: rgb(113, 94, 68);
            border-radius: 7em;">Daftar Mobil</h1>
            @foreach ($cars as $car)
            <div class="card mb-5">
                <div class="card-body">
                  <h5 class="fw-bolder">{{ $car->nama_mobil }}</h5>
                  <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge badge-custom {{ $car->status == 'tersedia' ? 'bg-success' : 'bg-warning' }} text-white position-absolute"
                        style="top: 0; right: 0">
                        {{ $car->status }}
                    </div>
                    <!-- Product image-->
                    <img class="card-img-top" src="{{ Storage::url($car->gambar) }}" alt="{{ $car->nama_mobil }}"
                        width="100" height="500" />
                    <!-- Product details-->
                    <div class="card-body card-body-custom pt-4">
                        <div class="text-center">
                            <!-- Product name-->
                            {{-- <h5 class="fw-bolder">{{ $car->nama_mobil }}</h5> --}}
                            <!-- Product price-->
                            <div class="rent-price mb-3">
                                <span class="text-primary">Rp
                                    {{ number_format($car->harga_sewa, 0, ',', '.') }}/</span>day
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
                            @if ($car->status == 'tersedia')
                                <!-- Button Sewa dengan warna background biru -->
                                <a class="btn btn-primary mt-auto" href="{{ route('payment', ['car_slug' => $car->slug]) }}" style="background-color: rgb(196, 124, 0);">Sewa</a>
                            @else
                                <!-- Button Sewa dengan warna background abu-abu dan dinonaktifkan -->
                                <button class="btn btn-secondary mt-auto" disabled style="background-color: grey;">Sewa</button>
                            @endif
                            <!-- Button Detail dengan warna background hijau dan teks putih -->
                            <a class="btn btn-info mt-auto text-white" href="{{ route('user.detail', $car->slug) }}" style="background-color: rgb(196, 124, 0);">Detail</a>
                        </div>
                    </div>
                    
                </div>
                  {{-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p> --}}
                </div>
              </div>
                {{-- </div> --}}
                @endforeach
            </div>
        </div>
    </section>
@endsection
