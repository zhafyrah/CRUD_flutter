import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:online_shop/screens/home_page.dart';
import 'package:http/http.dart' as http;
import 'package:online_shop/screens/models/produk.dart';

class TambahProduk extends StatefulWidget {
  @override
  State<TambahProduk> createState() => _TambahProdukState();
}

class _TambahProdukState extends State<TambahProduk> {
  final _formKey = GlobalKey<FormState>();

  TextEditingController _nameController = TextEditingController();

  TextEditingController _detailController = TextEditingController();

  TextEditingController _hargaController = TextEditingController();

  TextEditingController _imageUrlController = TextEditingController();

  Future<bool?> saveProduk(Produk data) async {
    try {
      final url = "http://192.168.2.8:8000/api/produk";
      final response = await http.post(Uri.parse(url),
          body: produkToJson(data),
          headers: {'content-type': 'application/json'});
      // print('body : ${response.body}');
      print('status code save : ${response.statusCode}');
      if (response.statusCode == 201) {
        return true;
      } else {
        return false;
      }
      // return json.decode(response.body);
    } catch (e) {
      print("Error Save : $e");
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          title: Text('Tambah Produk'),
        ),
        body: Form(
            key: _formKey,
            child: Column(
              children: [
                TextFormField(
                  controller: _nameController,
                  decoration: InputDecoration(labelText: "Nama"),
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return "Masukkan nama produk";
                    }
                  },
                ),
                TextFormField(
                  decoration: InputDecoration(labelText: "Detail Produk"),
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return "Masukkan detail produk";
                    }
                  },
                ),
                TextFormField(
                  controller: _hargaController,
                  decoration: InputDecoration(labelText: "Harga"),
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return "Masukkan harga produk";
                    }
                  },
                ),
                TextFormField(
                  controller: _imageUrlController,
                  decoration: InputDecoration(labelText: "Image_url"),
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return "Masukkan link produk";
                    }
                  },
                ),
                SizedBox(
                  height: 20,
                ),
                ElevatedButton(
                    onPressed: () {
                      Produk newProduk = Produk(
                          namaProduk: _nameController.text,
                          detailProduk: _detailController.text,
                          harga: _hargaController.text,
                          imageUrl: _imageUrlController.text);
                      if (_formKey.currentState!.validate()) {
                        print(newProduk.namaProduk);
                        saveProduk(newProduk).then((berhasil) {
                          print("Value Input : $berhasil");
                          if (berhasil!) {
                            Navigator.push(
                                context,
                                MaterialPageRoute(
                                    builder: (context) => HomePage()));
                            ScaffoldMessenger.of(context).showSnackBar(SnackBar(
                                content: Text("produk berhasil ditambah")));
                          } else {
                            ScaffoldMessenger.of(context).showSnackBar(SnackBar(
                                content: Text("produk gagal ditambah")));
                          }
                        });
                      }
                    },
                    child: Text('Simpan'))
              ],
            )));
  }
}
