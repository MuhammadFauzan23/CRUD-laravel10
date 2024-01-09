@extends('productPackage.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Informasi Produk
                </div>
                <div class="float-end">
                    <a href="{{ route('brand.index') }}" class="btn btn-primary btn-sm">&larr; Kembali</a>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Code:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $data_produk->code }}
                    </div>
                </div>

                <div class="row">
                    <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $data_produk->name }}
                    </div>
                </div>

                <div class="row">
                    <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Quantity:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $data_produk->quantity }}
                    </div>
                </div>

                <div class="row">
                    <label for="price" class="col-md-4 col-form-label text-md-end text-start"><strong>Price:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        Rp. {{ number_format($data_produk->price, 0, ',', '.') }}
                    </div>
                </div>

                <div class="row">
                    <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Description:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $data_produk->description }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection