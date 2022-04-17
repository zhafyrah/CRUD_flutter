<html>

<head>
    <title>Produk</title>
    <link rel="stylesheet" type="text/css" href="produk/style.css">
</head>

<body>
    <center>
        <h1>List Produk</h1>
    </center>
    <table cellspacing='1' cellpadding='5'>
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Detail Produk</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            {{-- <tr>
                <td>Sepatu</td>
                <td>Berwarna merah, ukuran kaki dewasa : 40 Cm</td>
                <td>Rp. 250.000</td>
            </tr> --}}

            @foreach ($produk as $produkModel)
                <tr>
                    <td>{{ $produkModel->nama_produk }}</td>
                    <td>{{ $produkModel->detail_produk }}</td>
                    <td>{{ $produkModel->harga }}</td>
                    <td>
                        <a href="/produk/{{ $produkModel->id }}/edit">edit</a>
                    </td>
                    <td>
                        <form action="/produk/{{ $produkModel->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delete">
                        </form>
                    </td>
                </tr>
            @endforeach

            {{-- @foreach ($produk as $produkModel)
                <tr>
                    <td>Topi</td>
                    <td>Berwarna hijau</td>
                    <td>Rp. 50.000</td>
                </tr>
            @endforeach --}}
        </tbody>

        <a href="/produk/tambah">Tambah</a>
    </table>
</body>


{{-- ----------------STYLE---------------- --}}
<style>
    h1 {
        font-family: sans-serif;
    }

    table {
        font-family: Arial, Helvetica, sans-serif;
        color: #666;
        text-shadow: 1px 1px 0px #fff;
        background: #eaebec;
        border: #ccc 1px solid;
    }

    table th {
        padding: 15px 35px;
        border-left: 1px solid #e0e0e0;
        border-bottom: 1px solid #e0e0e0;
        background: #ededed;
    }

    table th:first-child {
        border-left: none;
    }

    table tr {
        text-align: center;
        padding-left: 20px;
    }

    table td:first-child {
        text-align: left;
        padding-left: 20px;
        border-left: 0;
    }

    table td {
        padding: 15px 35px;
        border-top: 1px solid #ffffff;
        border-bottom: 1px solid #e0e0e0;
        border-left: 1px solid #e0e0e0;
        background: #fafafa;
        background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
        background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
    }

    table tr:last-child td {
        border-bottom: 0;
    }

    table tr:last-child td:first-child {
        -moz-border-radius-bottomleft: 3px;
        -webkit-border-bottom-left-radius: 3px;
        border-bottom-left-radius: 3px;
    }

    table tr:last-child td:last-child {
        -moz-border-radius-bottomright: 3px;
        -webkit-border-bottom-right-radius: 3px;
        border-bottom-right-radius: 3px;
    }

    table tr:hover td {
        background: #f2f2f2;
        background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
        background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
    }

</style>

</html>
