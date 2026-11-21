<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageReceived;
use App\Models\Article;
use App\Models\ContactMessage;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\HeroStat;
use App\Models\PortfolioCategory;
use App\Models\PortfolioProject;
use App\Models\PricingPlan;
use App\Models\Service;
use App\Models\ShowreelItem;
use App\Models\SiteSetting;
use App\Models\Subscriber;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\TickerItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class HomeController extends Controller
{
    private function getCommonData(): array
    {
        return [
            'settings' => SiteSetting::getSettings(),
            'services' => Service::where('is_active', true)->orderBy('sort_order')->get(),
            'categories' => PortfolioCategory::orderBy('sort_order')->get(),
            'projects' => PortfolioProject::with('category')->where('is_active', true)->orderBy('sort_order')->get(),
            'team' => TeamMember::where('is_active', true)->orderBy('sort_order')->get(),
            'plans' => PricingPlan::where('is_active', true)->orderBy('sort_order')->get(),
            'testimonials' => Testimonial::where('is_active', true)->orderBy('sort_order')->get(),
            'faqs' => Faq::where('is_active', true)->orderBy('sort_order')->get(),
            'articles' => Article::where('is_published', true)->orderByDesc('published_at')->get(),
            'heroStats' => HeroStat::where('is_active', true)->orderBy('sort_order')->get(),
            'tickerItems' => TickerItem::where('is_active', true)->orderBy('sort_order')->get(),
            'features' => Feature::where('is_active', true)->orderBy('sort_order')->get(),
            'showreelItems' => ShowreelItem::where('is_active', true)->orderBy('sort_order')->get(),
        ];
    }

    public function index(): View
    {
        return view('pages.index', $this->getCommonData());
    }

    public function about(): View
    {
        return view('pages.about', $this->getCommonData());
    }

    public function services(): View
    {
        return view('pages.services', $this->getCommonData());
    }

    public function portfolio(): View
    {
        return view('pages.portfolio', $this->getCommonData());
    }

    public function team(): View
    {
        return view('pages.team', $this->getCommonData());
    }

    public function pricing(): View
    {
        return view('pages.pricing', $this->getCommonData());
    }

    public function blog(): View
    {
        return view('pages.blog', $this->getCommonData());
    }

    public function contact(): View
    {
        return view('pages.contact', $this->getCommonData());
    }

    public function submitContact(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:150',
            'service_of_interest' => 'nullable|string|max:150',
            'budget' => 'nullable|string|max:100',
            'message' => 'required|string|max:5000',
        ]);

        $contactMessage = ContactMessage::create($validated);

        try {
            $settings = SiteSetting::getSettings();
            $recipient = !empty($settings->contact_email) ? $settings->contact_email : 'info@aise-digital.com';
            Mail::to($recipient)->send(new ContactMessageReceived($contactMessage));
        } catch (\Throwable $e) {
            Log::error('Contact form email failed to send: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Thank you! Your message has been received. Our team will contact you within 24 hours.'
        ]);
    }

    public function submitNewsletter(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|email|max:150',
        ]);

        Subscriber::firstOrCreate(['email' => $validated['email']]);

        return response()->json([
            'success' => true,
            'message' => 'Thank you for subscribing to our newsletter!'
        ]);
    }
}
