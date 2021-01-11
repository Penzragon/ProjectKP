<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Admin extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'product' => $this->productModel->getProduct()
        ];

        return view('admin/dashboard', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/create', $data);
    }

    public function save()
    {
        // Validasi Input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} produk harus diisi.'
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]|max_size[gambar,5120]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar produk terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'mime_in' => 'File yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('create')->withInput()->with('validation', $validation);
            return redirect()->to('create')->withInput();
        }

        // Ambil Gambar
        $fileGambar = $this->request->getFile('gambar');

        // Pemindahan File ke Folder img
        $fileGambar->move('img');

        // Pengambilan Nama File
        $namaGambar = $fileGambar->getName();

        $slug = url_title($this->request->getVar('nama'), '-', true);

        $this->productModel->save([
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'gambar' => $namaGambar,
            'deskripsi' => $this->request->getVar('deskripsi')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil ditambahkan.');

        return redirect()->to('dashboard');
    }

    public function hapus()
    {
        $data = [
            'title' => 'Hapus Produk',
            'product' => $this->productModel->getProduct()
        ];

        return view('admin/delete', $data);
    }

    public function delete($id)
    {
        // Cari Gambar Berdasarkan id
        $product = $this->productModel->find($id);

        // Hapus Gambar
        unlink('img/' . $product['gambar']);

        $this->productModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil dihapus.');

        return redirect()->to('/admin/dashboard');
    }

    public function ubah()
    {
        $data = [
            'title' => 'Edit Produk',
            'product' => $this->productModel->getProduct()
        ];

        return view('admin/edit', $data);
    }

    public function form_ubah($slug)
    {
        $data = [
            'title' => 'Form Edit Produk',
            'product' => $this->productModel->getProduct($slug),
            'validation' => \Config\Services::validation()
        ];

        return view('admin/ubah', $data);
    }

    public function update($id)
    {
        // Validasi Input
        if (!$this->validate([
            'gambar' => [
                'rules' => 'max_size[gambar,5120]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'File yang anda pilih bukan gambar',
                    'mime_in' => 'File yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/admin/form_ubah/' . $this->request->getVar('slug'))->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');

        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            // Ambil Gambar
            $fileGambar = $this->request->getFile('gambar');

            // Pemindahan File ke Folder img
            $fileGambar->move('img');

            // Pengambilan Nama File
            $namaGambar = $fileGambar->getName();

            // Hapus Gambar Lama
            unlink('img/' . $this->request->getVar('gambarLama'));
        }

        $slug = url_title($this->request->getVar('nama'), '-', true);

        $this->productModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'gambar' => $namaGambar,
            'deskripsi' => $this->request->getVar('deskripsi')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil diubah.');

        return redirect()->to('/admin/dashboard');
    }
}
