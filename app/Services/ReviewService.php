<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Hotel;
use App\Models\Review;
use App\Models\User;

class ReviewService
{
    public function create(array $data, User $user, string $hotel): Review
    {
        $review = new Review($data);
        $review->user()->associate($user);
        $review->hotel()->associate($hotel);
        $review->save();

        return $review;
    }

    public function delete(Review $review): void
    {
        $review->delete();
    }
}
