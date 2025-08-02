<?php


namespace App\Controllers;

use CodeIgniter\Controller;

class LanguageController extends Controller
{
    public function switch($lang = 'nl')
    {
        $availableLanguages = ['en', 'hy', 'nl'];

        if (!in_array($lang, $availableLanguages)) {
            $lang = 'nl';
        }

        session()->set('site_lang', $lang);

// Get the previous URL
        $referrer = previous_url();

// Fallback to homepage if invalid or coming from language switch itself
        if (!$referrer || strpos($referrer, 'language/switch') !== false) {
            return redirect()->to(base_url('/'));
        }

        return redirect()->to($referrer);
    }
}
