@extends('user.main')
@section('content')
<style>
    .card {
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: rgba(0, 123, 255, 0.8);
        color: white;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        padding: 20px;
    }

    header {
        background-color: rgba(118, 118, 118, 0.5);
        padding: 20px;
    }
</style>
    <header class="">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Pembayaran</h1>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">

            @if (session()->has('message'))
                <div class="alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-lg-8 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Formulir Pemesanan</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('payment.store', ['car_slug' => $car->slug]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <p class="card-text">Nama Mobil: {{ $car->nama_mobil }}</p>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama lengkap</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Isikan Nama lengkap" required />
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="number" name="nik" class="form-control" placeholder="Isikan NIK" required />
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal Booking</label>
                                    <input type="date" name="tanggal" class="form-control" placeholder="Isikan Tanggal Booking"
                                        required />
                                </div>
                                <div class="mb-3">
                                    <label for="gambar_payment" class="form-label">Foto Pembayaran</label>
                                    <input type="file" class="form-control" name="gambar_payment" required />
                                </div>
                                <div class="mb-3">
                                    <label for="foto_ktp" class="form-label">Foto KTP</label>
                                    <input type="file" class="form-control" name="foto_ktp" required />
                                </div>
                                <div class="mb-3">
                                    <label for="driver" class="form-label">Sewa Driver</label>
                                    <select name="driver" class="form-control" required>
                                        <option value="0">Tidak</option>
                                        @foreach ($drivers as $driver)
                                            <option value="{{ $driver->id }}">{{ $driver->nama_driver }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    @if ($payment && $payment->status === 'menunggu')
                                        <button type="button" class="btn btn-primary" disabled>
                                            Sedang Diproses
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-primary">
                                            Bayar
                                        </button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
@endsection