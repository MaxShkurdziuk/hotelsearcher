<?php

namespace App\Http\Controllers;

use App\Http\Requests\Review\CreateRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function addReview()
    {
        return view('reviews.add');
    }

    public function add(CreateRequest $request)
    {
        $data = $request->validated();
        $user = $request->user();

        $review = new Review($data, $user);

        $review->save();

        session()->flash('success', 'Review added successfully!');
        return redirect()->route('hotels.list');
    }

    public function list(Request $request)
    {
        $reviews = Review::query()->paginate(5);

        return view('reviews.list', ['reviews' => $reviews]);
    }

    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }
}
