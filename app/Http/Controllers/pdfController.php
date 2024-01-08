<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class pdfController extends Controller
{
  function generate()
  {
    $data = [
        "message"=>"my pdf"
    ];

    $pdf = Pdf::loadView('invoice', $data);
    return $pdf->stream();

  }
}
