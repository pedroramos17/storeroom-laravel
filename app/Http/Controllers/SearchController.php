<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Tag;

class SearchController extends Controller
{
  public function index(): View
  {
    return view('search.index');
  }
}
