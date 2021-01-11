<?php

namespace App\Controllers;

// Sementara
use App\Models\ProductModel;
// End Sementara

class Pages extends BaseController
{
    // Sementara
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }
    // End Sementara
    public function index()
    {
        $data = [
            'title' => 'Home | Cleanella',
            // Sementara
            'product' => $this->productModel->getProduct()
            // End Sementara
        ];

        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us'
        ];

        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jln. jalan',
                    'kota' => 'Kabupaten Sukabumi'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jln. Jalan Jalan',
                    'kota' => 'Kabupaten Bogor'
                ]
            ]
        ];

        return view('pages/contact', $data);
    }

    //--------------------------------------------------------------------

}
