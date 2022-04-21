import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:online_shop/screens/home_page.dart';
import 'package:http/http.dart' as http;

class EditProduk extends StatelessWidget {
  final Map Produk;

  EditProduk({required this.Produk});
  final _formKey = GlobalKey<FormState>();
  TextEditingController _nameController = TextEditingController();
  TextEditingController _detailController = TextEditingController();
  TextEditingController _hargaController = TextEditingController();
  TextEditingController _imageUrlController = TextEditingController();
  Future updateProduk() async {
    final response = await http.put(
        Uri.parse(
            "http://192.168.2.8:8000/api/produk/" + Produk['id'].toString()),
        body: {
          "nama_produk": _nameController.text,
          "detail_produk": _detailController.text,
          "harga": _hargaController.text,
          "image_url": _imageUrlController.text,
        });
    print('status code edit : ${response.statusCode} ');
    return json.decode(response.body);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          title: Text('Edit Produk'),
        ),
        body: Form(
            key: _formKey,
            child: Column(
              children: [
                TextFormField(
                  controller: _nameController..text = Produk['nama_produk'],
                  decoration: InputDecoration(labelText: "Nama"),
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return "Masukkan nama produk";
                    }
                  },
                ),
                TextFormField(
                  controller: _detailController..text = Produk['detail_produk'],
                  decoration: InputDecoration(labelText: "Detail Produk"),
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return "Masukkan detail produk";
                    }
                  },
                ),
                TextFormField(
                  controller: _hargaController..text = Produk['harga'],
                  decoration: InputDecoration(labelText: "Harga"),
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return "Masukkan harga produk";
                    }
                  },
                ),
                TextFormField(
                  controller: _imageUrlController..text = Produk['image_url'],
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
                      print("Edit");
                      if (_formKey.currentState!.validate()) {
                        updateProduk().then((value) {
                          Navigator.push(
                              context,
                              MaterialPageRoute(
                                  builder: (context) => HomePage()));
                          ScaffoldMessenger.of(context).showSnackBar(SnackBar(
                              content: Text("produk berhasil diubah")));
                        });
                      }
                    },
                    child: Text('Upadate'))
              ],
            )));
  }
}
