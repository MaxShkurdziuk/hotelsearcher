<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(Request $request)
    {
        DB::enableQueryLog();
        $query = Hotel::query()
            ->with(['user', 'services'])
            ->latest();

        if ($request->has('services')) {
            $query->whereHas('services', function ($q) use ($request) {
                $q->whereIn('services.id', $request->get('services'));
            });
        }

        if ($request->has('name')) {
            $search = '%' . $request->get('name') . '%';
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', $search);
            });
        }

        if ($request->has('country')) {
            $search = '%' . $request->get('country') . '%';
            $query->where(function ($q) use ($search) {
                $q->where('country', 'like', $search);
            });
        }

        if ($request->has('city')) {
            $search = '%' . $request->get('city') . '%';
            $query->where(function ($q) use ($search) {
                $q->where('city', 'like', $search);
            });
        }

        $hotels = $query
            ->paginate(5)
            ->appends($request->query());

        $services = Service::all();

        return view('welcome', compact('hotels', 'services'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }
}
