<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LegalPage;

class LegalPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Privacy Policy
        LegalPage::create([
            'type' => 'privacy_policy',
            'title' => 'Privacy Policy',
            'subtitle' => 'How we collect, use, and protect your personal information',
            'content' => '<h1>Privacy Policy</h1>
<p><strong>Last updated:</strong> ' . date('F j, Y') . '</p>

<h2>1. Information We Collect</h2>
<p>We collect information you provide directly to us, such as when you create an account, make a booking, or contact us for support.</p>

<h3>Personal Information</h3>
<ul>
    <li>Name and contact information</li>
    <li>Payment information</li>
    <li>Booking preferences</li>
    <li>Communication history</li>
</ul>

<h3>Automatically Collected Information</h3>
<ul>
    <li>Device information</li>
    <li>Usage data</li>
    <li>Cookies and similar technologies</li>
</ul>

<h2>2. How We Use Your Information</h2>
<p>We use the information we collect to:</p>
<ul>
    <li>Provide and maintain our services</li>
    <li>Process your bookings and payments</li>
    <li>Send you important updates and notifications</li>
    <li>Improve our services and user experience</li>
    <li>Comply with legal obligations</li>
</ul>

<h2>3. Information Sharing</h2>
<p>We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except as described in this policy.</p>

<h2>4. Data Security</h2>
<p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p>

<h2>5. Your Rights</h2>
<p>You have the right to:</p>
<ul>
    <li>Access your personal information</li>
    <li>Correct inaccurate information</li>
    <li>Request deletion of your information</li>
    <li>Opt-out of marketing communications</li>
</ul>

<h2>6. Contact Us</h2>
<p>If you have any questions about this Privacy Policy, please contact us at privacy@genesisaccommodation.com</p>',
            'is_active' => true,
            'last_updated' => now()
        ]);

        // Create Terms & Conditions
        LegalPage::create([
            'type' => 'terms_conditions',
            'title' => 'Terms & Conditions',
            'subtitle' => 'Terms of service and conditions for using our platform',
            'content' => '<h1>Terms & Conditions</h1>
<p><strong>Last updated:</strong> ' . date('F j, Y') . '</p>

<h2>1. Acceptance of Terms</h2>
<p>By accessing and using Genesis Accommodation services, you accept and agree to be bound by these Terms and Conditions.</p>

<h2>2. Service Description</h2>
<p>Genesis Accommodation provides accommodation booking services, connecting travelers with quality hostels and accommodation providers.</p>

<h2>3. User Accounts</h2>
<p>To use certain features of our service, you must create an account. You are responsible for:</p>
<ul>
    <li>Maintaining the confidentiality of your account</li>
    <li>All activities that occur under your account</li>
    <li>Providing accurate and complete information</li>
</ul>

<h2>4. Booking and Payment</h2>
<h3>4.1 Booking Process</h3>
<ul>
    <li>Bookings are subject to availability</li>
    <li>Prices are subject to change without notice</li>
    <li>Payment is required at the time of booking</li>
</ul>

<h3>4.2 Cancellation Policy</h3>
<ul>
    <li>Cancellations must be made within the specified timeframe</li>
    <li>Refund policies vary by accommodation provider</li>
    <li>Administrative fees may apply</li>
</ul>

<h2>5. User Conduct</h2>
<p>You agree not to:</p>
<ul>
    <li>Use our services for any unlawful purpose</li>
    <li>Interfere with the proper functioning of our services</li>
    <li>Attempt to gain unauthorized access to our systems</li>
    <li>Provide false or misleading information</li>
</ul>

<h2>6. Limitation of Liability</h2>
<p>Genesis Accommodation is not liable for:</p>
<ul>
    <li>Indirect, incidental, or consequential damages</li>
    <li>Loss of profits, data, or business opportunities</li>
    <li>Issues arising from accommodation provider services</li>
</ul>

<h2>7. Intellectual Property</h2>
<p>All content, trademarks, and intellectual property on our platform are owned by Genesis Accommodation or our licensors.</p>

<h2>8. Privacy</h2>
<p>Your privacy is important to us. Please review our Privacy Policy to understand how we collect and use your information.</p>

<h2>9. Modifications</h2>
<p>We reserve the right to modify these terms at any time. Continued use of our services constitutes acceptance of modified terms.</p>

<h2>10. Governing Law</h2>
<p>These terms are governed by the laws of the jurisdiction in which Genesis Accommodation operates.</p>

<h2>11. Contact Information</h2>
<p>For questions about these Terms & Conditions, please contact us at legal@genesisaccommodation.com</p>',
            'is_active' => true,
            'last_updated' => now()
        ]);
    }
}
