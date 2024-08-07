<?php

namespace App\Controllers;

use App\Models\RatingViewModel;

class Home extends BaseController
{
    public function index()
    {
        $ratingViewModel = new RatingViewModel();
        $data['topThread'] = $ratingViewModel
            ->select('thread.title, rating_view.thread_id, rating_view.star_sum, rating_view.rating')
            ->join('thread', 'thread.id=rating_view.thread_id', 'left')
            ->orderBy('rating_view.rating', 'DESC')
            ->orderBy('rating_view.star_sum', 'DESC')
            ->get(5, 0);
        $data['title'] = 'Home';
        return view('home', $data);
    }
}
