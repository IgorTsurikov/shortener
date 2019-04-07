<?php

namespace App\Http\Controllers;

use App\Services\ShortenerService;
use App\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShortenerController extends Controller
{
    /**
     * @var ShortenerService
     */
    private $shortenerService;

    public function __construct(ShortenerService $shortenerService)
    {
        $this->shortenerService = $shortenerService;
    }

    public function create()
    {
        return view('shortener-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'origin_url' => 'required|unique:urls,origin_url',
        ]);

        $shortUrl = $this->shortenerService->createShortUrl($request->origin_url);

        return redirect()->back()->with('message', $shortUrl);
    }

    public function redirectToOrigin($url)
    {
        $originUrl = Url::where('short_url', $url)->pluck('origin_url')->first();

        return Redirect::to($originUrl);
    }
}
