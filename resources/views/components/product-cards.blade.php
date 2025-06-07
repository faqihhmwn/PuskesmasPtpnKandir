@php
    $products = [
        ['id' => 1, 'title' => 'Produk 1', 'image' => 'images/gambar1.jpg', 'desc' => 'Deskripsi produk pertama.'],
        ['id' => 2, 'title' => 'Produk 2', 'image' => 'images/gambar2.jpg', 'desc' => 'Deskripsi produk kedua.'],
        ['id' => 3, 'title' => 'Produk 3', 'image' => 'images/gambar3.jpg', 'desc' => 'Deskripsi produk ketiga.'],
        ['id' => 4, 'title' => 'Produk 4', 'image' => 'images/gambar1.jpg', 'desc' => 'Deskripsi produk keempat.'],
        ['id' => 5, 'title' => 'Produk 5', 'image' => 'images/gambar2.jpg', 'desc' => 'Deskripsi produk kelima.'],
        ['id' => 6, 'title' => 'Produk 6', 'image' => 'images/gambar3.jpg', 'desc' => 'Deskripsi produk keenam.'],
    ];
@endphp

<div class="container mt-4">
    <h1 class="mb-4">Product</h1>

    @foreach (collect($products)->chunk(3) as $chunk)
        <div class="row mb-4">
            @foreach ($chunk as $product)
                <div class="col-md-4 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset($product['image']) }}" class="card-img-top" alt="{{ $product['title'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['title'] }}</h5>
                            <p class="card-text">{{ $product['desc'] }}</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{ $product['id'] }}">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

    {{-- Modals --}}
    @foreach ($products as $product)
        <div class="modal fade" id="modal{{ $product['id'] }}" tabindex="-1" aria-labelledby="modalLabel{{ $product['id'] }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel{{ $product['id'] }}">Detail {{ $product['title'] }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset($product['image']) }}" class="img-fluid" alt="{{ $product['title'] }}">
                        <p class="mt-2">{{ $product['desc'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
