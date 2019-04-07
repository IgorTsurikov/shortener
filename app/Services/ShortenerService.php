<?php

namespace App\Services;

use App\Url;

class ShortenerService
{
    public function createShortUrl(string $originUrl): string
    {
        $alias = $this->getAlias($originUrl);

        $this->insertUrl($originUrl, $alias);

        return $this->buildUrl($alias);
    }

    private function getAlias(string $originUrl): string
    {
        return substr(md5($originUrl), 0, 5);
    }

    private function buildUrl(string $alias): string
    {
        return config('app.url') . '/' . $alias;
    }

    private function insertUrl(string $originUrl, string $alias): void
    {
        Url::create([
            'origin_url' => $originUrl,
            'short_url'  => $alias,
        ]);
    }
}