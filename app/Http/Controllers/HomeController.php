<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Services;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\Profil;
use App\Models\SocialMedia;
use App\Models\TermCondition;

class HomeController extends Controller
{
    public function index()
    {
      	$title = "Jasa Akrilik dan Neon Box - Purbalingga";
        $services = DB::table('services')->paginate(3);
        $sosmed = SocialMedia::all();
        $portfolio = Portfolio::paginate(3);
        $profil = About::first();
        return view('home.index', ['title' => $title, 'services' => $services, 'sosmed' => $sosmed, 'portfolio' => $portfolio, 'profil' => $profil]);
    }
    public function services()
    {
        return view('home/services', [
            "title" => "LAYANAN",
            'services' => Services::get(),
        ]);
    }
    public function portfolio()
{
    $title = 'HASIL KERJA';

    // Ambil data terbaru dari Portfolio
    $query = Portfolio::latest();

    // Jika ada parameter pencarian, lakukan filter
    if (request('search')) {
        $query->where('judul_portfolio', 'like', '%' . request('search') . '%');
    }

    // Ambil hasil query
    $portfolio = $query->get();

    // Kirim data ke view
    return view('home.portfolio', [
        'title' => $title,
        'portfolio' => $portfolio
    ]);
}

    public function talk()
    {
        return view('home/lets-talk', [
            "title" => "KONTAK",
            "contact" => Contact::all()
        ]);
    }
    public function product()
    {
        return view('home/product', [
            "title" => "PRODUK",
            "products" => Product::all(),
        ]);
    }
    public function profile()
    {
        return view('about/profile', [
            "title" => "Mekar Akrilik Purbalingga",
            "profil" => About::first()
        ]);
    }
    public function team()
    {
        return view('about/team', [
            "title" => "TIM",
        ]);
    }
    public function workphase()
    {
        return view('about/work-phase', [
            "title" => "FASE KERJA",
        ]);
    }
    public function sow()
    {
        return view('about/sow', [
            "title" => "LINGKUP PEKERJAAN",
        ]);
    }
    public function faq()
    {
        return view('about/faq', [
            "title" => "RUANG PERTANYAAN",
            'faqs' => Faq::all(),
            'social' => SocialMedia::get(),
        ]);
    }

  	public function termscondition()
    {
        $data = TermCondition::first();
        return view('home/syaratkondisi', [
            "title" => "Syarat Kondisi",
            "data" => $data,
        ]);
    }

    public function getServices()
    {
        $data = Services::select('judul_service', 'slug')->get();
        return response()->json($data);
    }

    public function category($nama)
    {
        $data = Product::with('category', 'subcategory')
    ->whereHas('category', function ($query) use ($nama) {
        $query->where('nama', $nama);
    })
    ->get();


        return response()->json($data);
    }
}
