@extends('productPackage.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
        @endif

        <div class="card">
            <div class="card-header">Tabel Produk</div>
            <div class="card-body">
                <a href="{{ route('brand.create') }}" class="btn btn-success btn-sm mt-1 mb-2"><i class="bi bi-plus-circle"></i> Tambah Produk</a>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($list_data_produk as $produk)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $produk->code }}</td>
                            <td>{{ $produk->name }}</td>
                            <td>{{ $produk->quantity }}</td>
                            <td>Rp. {{ number_format($produk->price, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('brand.destroy', $produk->id) }}" method="post">
                                    <!-- @csrf -->
                                    @method('DELETE')

                                    <a href="{{ route('brand.show', $produk->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                                    <a href="{{ route('brand.edit', $produk->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <td colspan="6">
                            <span class="text-danger">
                                <strong>Produk Kosong</strong>
                            </span>
                        </td>
                        @endforelse
                    </tbody>
                </table>

                {{ $list_data_produk->links() }}

            </div>
        </div>
    </div>
</div>

@endsection