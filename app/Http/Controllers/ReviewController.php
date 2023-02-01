<?php

namespace App\Http\Controllers;

use App\Http\Requests\Review\CreateRequest;
use App\Models\Hotel;
use App\Models\Review;
use App\Services\ReviewService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct(private ReviewService $reviewService)
    {
    }

    public function addReview()
    {
        return view('reviews.add');
    }

    public function add(CreateRequest $request)
    {
        $data = $request->validated();
        $user = $request->user();
        $hotel = $request->get('hotel');

        $review = $this->reviewService->create($data, $user, $hotel);

        session()->flash('success', 'Review was add successfully!');
        return redirect()->route('hotels.list', ['review' => $review->id]);
    }

    public function delete(Review $review)
    {
        $review->delete();

        session()->flash('success', 'Review was delete successfully!');
        return redirect()->route('reviews.list');
    }

    public function list(Request $request)
    {
        $hotels = Hotel::all();
        $reviews = Review::query()->paginate(5);

        return view('reviews.list', ['reviews' => $reviews], ['hotels' => $hotels]);
    }

    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }
}
