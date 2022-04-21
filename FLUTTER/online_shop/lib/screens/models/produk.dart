// To parse this JSON data, do
//
//     final produk = produkFromJson(jsonString);

import 'dart:convert';

List<Produk> produkFromJson(String str) =>
    List<Produk>.from(json.decode(str).map((x) => Produk.fromJson(x)));

String produkToJson(Produk data) => json.encode(data.toJson());

class Produk {
  Produk({
    this.namaProduk,
    this.detailProduk,
    this.harga,
    this.imageUrl,
  });

  String? namaProduk;
  String? detailProduk;
  String? harga;
  String? imageUrl;

  factory Produk.fromJson(Map<String, dynamic> json) => Produk(
        namaProduk: json["nama_produk"],
        detailProduk: json["detail_produk"],
        harga: json["harga"],
        imageUrl: json["image_url"],
      );

  Map<String, dynamic> toJson() => {
        "nama_produk": namaProduk,
        "detail_produk": detailProduk,
        "harga": harga,
        "image_url": imageUrl,
      };
}
