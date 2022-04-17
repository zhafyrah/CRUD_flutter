<h1>Form Tambah</h1>

<form action="/produk" method="POST">
    Nama : <input type="text" name="nama_produk" placeholder="Silahkan isi"/> <br>
    Detail : <input type="text" name="detail_produk" placeholder="Silahkan isi"/> <br>
    Harga : <input type="text" name="harga" placeholder="Silahkan isi"/> <br>
    Image URL : <input type="text" name="image_url"/> <br>

    @csrf
    <input type="submit" value="simpan">
</form>
