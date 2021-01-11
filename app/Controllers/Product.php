<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Product extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Our Product',
            'product' => $this->productModel->getProduct()
        ];


        return view('product/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Produk',
            'product' => $this->productModel->getProduct($slug)
        ];

        if (empty($data['product'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama produk ' . $slug . ' tidak ditemukan.');
        }

        return view('product/detail', $data);
    }
}
