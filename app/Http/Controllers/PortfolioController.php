<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $title = 'HASIL KERJA';

    $huruftimbul = Portfolio::where('nama_kategori', 'huruf timbul')->get();
    $neon = Portfolio::where('nama_kategori', 'neon box')->get();
    $reklame = Portfolio::where('nama_kategori', 'papan reklame')->get();
    $digital = Portfolio::where('nama_kategori', 'digital creative')->get();
    $iot = Portfolio::where('nama_kategori', 'iot')->get();
    $akrilik = Portfolio::where('nama_kategori', 'akrilik')->get();

    $search = Portfolio::latest();

    if (request('search')) {
        $search->where('judul_produk', 'like', '%' . request('search') . '%')
               ->orWhere('nama_kategori', 'like', '%' . request('search') . '%');
    }

    $portfolio = $search->get();

    return view('home.portfolio', compact(
        'title',
        'portfolio',
        'huruftimbul',
        'neon',
        'reklame',
        'digital',
        'iot',
        'akrilik'
    ));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('portfolio.detail-portfolio', [    		
    		'title' => 'Hasil Kerja',
          	'portfolio' => Portfolio::find($id)
    	]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
