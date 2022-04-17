<h1>Form Edit</h1>

<form action="/produk/{{ $produk->id }}" method="POST">
    @method('PUT')

    Nama : <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" /> <br>
    Detail : <input type="text" name="detail_produk" value="{{ $produk->detail_produk }}" /> <br>
    Harga : <input type="text" name="harga" value="{{ $produk->harga }}" /> <br>
    Image URL : <input type="text" name="image_url" value="{{ $produk->image_url }}" /> <br>

    @csrf
    <input type="submit" value="simpan">
</form>
