<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\LegalPage;

class LegalPageController extends Controller
{
    /**
     * Display the privacy policy page
     */
    public function privacyPolicy()
    {
        $privacyPolicy = LegalPage::getPrivacyPolicy();

        if (!$privacyPolicy) {
            abort(404, 'Privacy Policy not found');
        }

        return view('frontend.legal.privacy-policy', compact('privacyPolicy'));
    }

    /**
     * Display the terms and conditions page
     */
    public function termsConditions()
    {
        $termsConditions = LegalPage::getTermsConditions();

        if (!$termsConditions) {
            abort(404, 'Terms & Conditions not found');
        }



        return view('frontend.legal.terms-conditions', compact('termsConditions'));
    }
}
