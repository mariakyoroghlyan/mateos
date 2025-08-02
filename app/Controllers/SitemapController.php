<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class SitemapController extends Controller
{
    public function index()
    {
        $pages = [
            base_url(),
            base_url('catalogs'),
            base_url('news'),
            base_url('agenda'),
            // Add other dynamic or static URLs here
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($pages as $url) {
            $xml .= '<url>';
            $xml .= '<loc>' . esc($url) . '</loc>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>0.8</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return response()
            ->setStatusCode(200)
            ->setContentType('application/xml')
            ->setBody($xml);
    }
}
