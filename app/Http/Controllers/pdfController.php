<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;

class pdfController extends Controller
{
  function generate()
  {

    $products =Product::all();

    $data = [
     "products"=>$products
    ];
    $pdf = Pdf::loadView('invoice', ["products"=>$products]);
    return $pdf->stream();

  }
}
