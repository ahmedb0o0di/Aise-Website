<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\HeroStat;
use App\Models\PortfolioCategory;
use App\Models\PortfolioProject;
use App\Models\PricingPlan;
use App\Models\Service;
use App\Models\ShowreelItem;
use App\Models\SiteSetting;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\TickerItem;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User for Dashboard
        User::firstOrCreate(
            ['email' => 'admin@astra.com'],
            [
                'name' => 'Admin Astra',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Site Settings
        SiteSetting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Astra Intelligence Services Egypt',
                'tagline' => 'We Transform Bold Ideas Into Strategic Digital Experiences',
                'meta_description' => 'Astra Intelligence Services — We transform bold ideas into strategic digital experiences that drive real, measurable growth.',
                'logo_dark' => 'assets/images/logo.png',
                'logo_light' => 'assets/images/logo-white.png',
                'favicon' => 'favicon.png',
                'contact_email' => 'info@aise-digital.com',
                'contact_email_secondary' => 'sales@aise-digital.com',
                'contact_phone' => '+20 12 20093835',
                'contact_phone_secondary' => '+20 10 91494251',
                'contact_address' => 'Oasis C21, El Ahiaa, Hurghada, Red Sea',
                'google_map_link' => 'https://maps.app.goo.gl/JpUVm3qvSJLryCnj8',
                'google_map_embed' => 'https://maps.google.com/maps?q=27.3211575,33.6996941&hl=en&z=15&output=embed',
                'business_hours' => 'Sunday - Thursday from 10:00 am - 07:00 pm',
                'twitter_url' => 'https://twitter.com',
                'linkedin_url' => 'https://linkedin.com',
                'instagram_url' => 'https://instagram.com',
                'facebook_url' => 'https://facebook.com',
                'dribbble_url' => 'https://dribbble.com',
                'youtube_url' => 'https://youtube.com',

                'hero_badge' => 'Award-Winning Digital Agency',
                'hero_title' => 'We Transform Bold Ideas Into Digital Growth',
                'hero_description' => 'By immersing ourselves in your brand, we challenge the ordinary and turn bold ideas into strategic digital experiences that drive real, measurable growth.',
                'hero_video_url' => 'https://www.youtube.com/watch?v=RXv_uIN6e-Y',

                'about_badge' => 'About Astra Intelligence',
                'about_title' => 'Pioneering Next-Gen <span>Digital Intelligence</span>',
                'about_description_1' => 'Established in 2025, Astra Intelligence Services Egypt (AISE) was founded to redefine how modern organizations leverage technology, security, and digital intelligence. We blend strategic foresight with advanced software engineering — delivering enterprise platforms, ERP architectures, and AI-driven growth solutions tailored for ambitious brands.',
                'about_description_2' => 'Headquartered in Egypt, our multidisciplinary team of engineers, intelligence strategists, and digital architects operates at the cutting edge of innovation, empowering our partners to operate with speed, security, and measurable market impact.',
                'about_experience_years' => '2025',
                'about_clients_count' => '50+',
                'about_satisfaction_rate' => '99%',
                'about_image' => 'assets/images/about/about-img.jpg',

                'cta_badge' => 'Ready to Grow?',
                'cta_title' => "Let's Work Together & Build Something Great",
                'cta_description' => 'Join forward-thinking organizations that trust Astra to drive their digital growth and strategic intelligence. Start your consultation today.',
                'cta_button_text' => 'Start Free Consultation',
                'cta_button_link' => '#contact',

                'footer_about' => 'Astra Intelligence Services Egypt delivers strategic security consulting, intelligence solutions, and advanced digital capabilities.',
                'footer_copyright' => '© 2026 Astra Intelligence Services Egypt. All rights reserved.',
            ]
        );

        // 3. Hero Statistics
        $stats = [
            ['number' => '250', 'suffix' => '+', 'label' => 'Projects Done', 'sort_order' => 1],
            ['number' => '98', 'suffix' => '%', 'label' => 'Client Satisfaction', 'sort_order' => 2],
            ['number' => '12', 'suffix' => '+', 'label' => 'Years Experience', 'sort_order' => 3],
            ['number' => '40', 'suffix' => '+', 'label' => 'Awards Won', 'sort_order' => 4],
        ];
        foreach ($stats as $s) {
            HeroStat::firstOrCreate(['label' => $s['label']], $s);
        }

        // 4. Ticker Items
        $tickers = [
            'Digital Marketing', 'Brand Strategy', 'SEO Optimization', 'Social Media',
            'Web Design', 'Content Creation', 'Performance Marketing', 'UI/UX Design'
        ];
        foreach ($tickers as $i => $text) {
            TickerItem::firstOrCreate(['text' => $text], ['sort_order' => $i + 1]);
        }

        // 5. Features
        $features = [
            [
                'title' => 'Strategy-First',
                'description' => 'Every campaign begins with deep research and a clear strategic blueprint tailored to your goals.',
                'icon' => 'fas fa-bullseye',
                'sort_order' => 1,
            ],
            [
                'title' => 'Data-Driven',
                'description' => 'We leverage analytics and insights to make informed decisions that consistently outperform benchmarks.',
                'icon' => 'fas fa-chart-line',
                'sort_order' => 2,
            ],
            [
                'title' => 'Creative Excellence',
                'description' => 'Our designers craft visually stunning experiences that capture attention and inspire meaningful action.',
                'icon' => 'fas fa-palette',
                'sort_order' => 3,
            ],
            [
                'title' => 'Rapid Growth',
                'description' => 'From launch to scale, we implement proven growth frameworks that accelerate business momentum.',
                'icon' => 'fas fa-rocket',
                'sort_order' => 4,
            ],
        ];
        foreach ($features as $f) {
            Feature::firstOrCreate(['title' => $f['title']], $f);
        }

        // 6. Services (11 services)
        $services = [
            [
                'title' => 'Web Design & Development',
                'slug' => 'web-design-development',
                'icon' => 'fas fa-code',
                'short_description' => 'Bespoke, high-performance web applications built for speed, security, and measurable conversion growth across all digital touchpoints.',
                'full_description' => 'We engineer custom web platforms tailored to your business model. From complex multi-vendor e-commerce ecosystems to institutional e-learning management systems and scalable custom CMS architectures, our web solutions deliver uncompromising speed, SEO-first code, and seamless responsiveness.',
                'tags' => ['E-Commerce', 'E-Learning', 'Custom CMS'],
                'included_features' => [
                    ['title' => 'E-Commerce Platforms', 'desc' => 'High-conversion online stores with custom gateways, ERP sync, inventory tracking, and seamless checkout.'],
                    ['title' => 'E-Learning Systems (LMS)', 'desc' => 'Scalable educational portals with student progress dashboards, video streaming, quizzes, and automated certifications.'],
                    ['title' => 'Custom CMS Architecture', 'desc' => 'Intuitive, modular administrative panels giving your team total editorial autonomy without developer dependence.']
                ],
                'sort_order' => 1,
            ],
            [
                'title' => 'ERP Systems Development',
                'slug' => 'erp-systems-development',
                'icon' => 'fas fa-network-wired',
                'short_description' => 'Tailor-made Enterprise Resource Planning systems engineered to unify your departments, eliminate operational bottlenecks, and automate business processes.',
                'full_description' => 'We architect end-to-end ERP platforms built precisely around your operational blueprint. By connecting supply chains, finance, HR, inventory, and analytics into a unified cloud interface, our ERP solutions eliminate departmental silos and supercharge operational speed.',
                'tags' => ['Custom ERPs', 'Workflow Automation', 'Data Integration'],
                'included_features' => [
                    ['title' => 'Custom Architecture', 'desc' => 'Designed from scratch around your specific business logic and industry compliance standards.'],
                    ['title' => 'Cross-Department Automation', 'desc' => 'Automated invoicing, payroll, real-time inventory adjustments, and automated reporting pipelines.'],
                    ['title' => 'Executive Dashboards', 'desc' => 'Real-time financial telemetry, predictive operational insights, and role-based data isolation.']
                ],
                'sort_order' => 2,
            ],
            [
                'title' => 'CRM Systems Development',
                'slug' => 'crm-systems-development',
                'icon' => 'fas fa-users-cog',
                'short_description' => 'Strategic Customer Relationship Management platforms designed to accelerate sales cycles, automate lead pipelines, and build lasting client loyalty.',
                'full_description' => 'Transform how your sales, account management, and support teams engage with prospects and customers. Our custom CRM platforms eliminate lead leakage, automate deal pipelines, and surface actionable relationship insights.',
                'tags' => ['Lead Pipelines', 'Sales Automation', 'Customer 360°'],
                'included_features' => [
                    ['title' => 'Visual Pipeline Tracking', 'desc' => 'Custom multi-stage deal pipelines with automated stage triggers and deal value projections.'],
                    ['title' => 'Omnichannel Communications', 'desc' => 'Consolidated email, WhatsApp, and call logs directly inside every customer profile.'],
                    ['title' => 'Smart Automation Triggers', 'desc' => 'Automated follow-ups, renewal reminders, SLA tracking, and assignment round-robins.']
                ],
                'sort_order' => 3,
            ],
            [
                'title' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'icon' => 'fas fa-mobile-alt',
                'short_description' => 'Intuitive, high-performance mobile applications built natively and cross-platform for iOS, Android, and Windows handheld ecosystems.',
                'full_description' => 'We create polished, high-speed mobile applications designed for addictive user engagement and zero downtime. Whether customer-facing consumer apps or internal field-force enterprise tools, we develop with flutter, react native, and native swift/kotlin.',
                'tags' => ['iOS Apps', 'Android Apps', 'Windows Mobile'],
                'included_features' => [
                    ['title' => 'Native iOS & Android Engineering', 'desc' => 'Pixel-perfect UI built to platform human interface and material guidelines.'],
                    ['title' => 'Offline-Capable Synchronization', 'desc' => 'Resilient local databases with background syncing when network connectivity restores.'],
                    ['title' => 'Push & Geofencing Automation', 'desc' => 'Context-aware notifications that engage users at the optimal moment.']
                ],
                'sort_order' => 4,
            ],
            [
                'title' => 'Desktop Applications',
                'slug' => 'desktop-applications',
                'icon' => 'fas fa-desktop',
                'short_description' => 'High-speed, resource-efficient desktop software developed for Windows, macOS, and Linux to power mission-critical offline and enterprise workflows.',
                'full_description' => 'When your organization requires direct hardware access, ultra-low latency, or total offline capability, we build native desktop software that runs natively across Windows, macOS, and Linux workstations.',
                'tags' => ['Windows Apps', 'macOS & Linux', 'Offline-First'],
                'included_features' => [
                    ['title' => 'Cross-Platform Workstation Apps', 'desc' => 'Unified performance across modern operating systems with native UI integrations.'],
                    ['title' => 'Local Hardware & Peripheral Sync', 'desc' => 'Integration with POS terminals, scanners, thermal printers, and biometric devices.'],
                    ['title' => 'Enterprise Security Architecture', 'desc' => 'Local database encryption, air-gapped deployment capability, and automated silent updater.']
                ],
                'sort_order' => 5,
            ],
            [
                'title' => 'AI Education & Training',
                'slug' => 'ai-education-training',
                'icon' => 'fas fa-brain',
                'short_description' => 'Practical, hands-on artificial intelligence education, corporate generative AI workshops, and strategic institutional upskilling programs.',
                'full_description' => 'Empower your workforce to navigate and harness the artificial intelligence revolution. Our workshops provide actionable workflows, ethical guidelines, and custom tool integration for enterprise teams.',
                'tags' => ['AI Literacy', 'GenAI Workshops', 'Team Upskilling'],
                'included_features' => [
                    ['title' => 'Corporate Generative AI Workshops', 'desc' => 'Hands-on prompt engineering, workflow automation, and custom LLM tool stacks.'],
                    ['title' => 'Department-Specific Playbooks', 'desc' => 'Tailored training modules for marketing, legal, software engineering, and HR.'],
                    ['title' => 'Enterprise Governance & Security', 'desc' => 'Data privacy protocols, copyright risk management, and responsible AI policies.']
                ],
                'sort_order' => 6,
            ],
            [
                'title' => 'Social Media Management',
                'slug' => 'social-media-management',
                'icon' => 'fas fa-hashtag',
                'short_description' => 'End-to-end social media growth: strategic post creation, data-backed scheduling, and 24/7 proactive community moderation across all channels.',
                'full_description' => 'Build a commanding brand voice that commands audience loyalty. From bespoke high-aesthetic visual content to viral short-form video scripting and proactive community engagement.',
                'tags' => ['Post Creation', 'Smart Scheduling', '24/7 Moderation'],
                'included_features' => [
                    ['title' => 'Creative Content Production', 'desc' => 'Carousels, Reels, TikToks, and infographics engineered for viral discoverability.'],
                    ['title' => 'Strategic Cadence Scheduling', 'desc' => 'Algorithmic timing models tailored to peak audience engagement windows.'],
                    ['title' => 'Active Community Care', 'desc' => 'Fast comment responses, DM lead triage, and proactive reputation management.']
                ],
                'sort_order' => 7,
            ],
            [
                'title' => 'Digital Advertising',
                'slug' => 'digital-advertising',
                'icon' => 'fas fa-bullhorn',
                'short_description' => 'High-ROI paid advertising campaigns across Google, Meta, TikTok, and LinkedIn engineered to maximize sales, qualified leads, and brand reach.',
                'full_description' => 'We engineer performance marketing campaigns with obsessive attention to cost per acquisition (CPA) and return on ad spend (ROAS). Combining multi-angle creative testing with precise audience modeling.',
                'tags' => ['Google Ads (PPC)', 'Meta & TikTok Ads', 'High-ROAS Scaling'],
                'included_features' => [
                    ['title' => 'Search & Shopping PPC', 'desc' => 'Capturing high-intent buyers at the bottom of the funnel across Google and Bing.'],
                    ['title' => 'Social Paid Funnels', 'desc' => 'Multi-tier retargeting funnels across Instagram, Facebook, TikTok, and LinkedIn.'],
                    ['title' => 'Real-Time ROAS Telemetry', 'desc' => 'Live conversion tracking, attribution modeling, and automated budget scaling.']
                ],
                'sort_order' => 8,
            ],
            [
                'title' => 'SEO - GEO - AEO Optimization',
                'slug' => 'seo-geo-aeo-optimization',
                'icon' => 'fas fa-search',
                'short_description' => 'Complete search dominance: traditional SEO, Generative Engine Optimization (GEO for ChatGPT/Perplexity), and Answer Engine Optimization (AEO).',
                'full_description' => 'Search is undergoing its biggest transformation in 25 years. We ensure your brand dominates traditional search results while establishing verified presence inside modern AI engines.',
                'tags' => ['SEO (Google)', 'GEO (AI Search)', 'AEO (Answer Engines)'],
                'included_features' => [
                    ['title' => 'Traditional Technical SEO', 'desc' => 'Core Web Vitals tuning, semantic schema markup, and authoritative backlink acquisition.'],
                    ['title' => 'GEO (Generative Engine Optimization)', 'desc' => 'Structuring entity data to be cited by ChatGPT, Perplexity, Claude, and Gemini.'],
                    ['title' => 'AEO (Voice & Direct Answers)', 'desc' => 'Optimizing question-based intent for featured snippets and voice search assistants.']
                ],
                'sort_order' => 9,
            ],
            [
                'title' => 'Video Creation & Media Production',
                'slug' => 'video-creation-media-production',
                'icon' => 'fas fa-video',
                'short_description' => 'Cinematic corporate video production, promotional showreels, dynamic motion graphics, and high-converting video creative that commands attention.',
                'full_description' => 'Video is the highest-converting medium on the internet. Our in-house production crew delivers broadcast-grade corporate storytelling, cinematic commercial showreels, and dynamic 3D motion graphics.',
                'tags' => ['Media Production', 'Showreels', 'Motion Graphics'],
                'included_features' => [
                    ['title' => 'Cinematic Commercial Production', 'desc' => 'Full-lifecycle 4K/6K production: scriptwriting, casting, cinematography, and grading.'],
                    ['title' => 'Motion Graphics & 3D Visuals', 'desc' => 'High-impact product animations, brand logo reveals, and explanatory graphics.'],
                    ['title' => 'Social-First Video Cutdowns', 'desc' => 'High-velocity 9:16 vertical cuts optimized for Reels, Shorts, and TikTok ads.']
                ],
                'sort_order' => 10,
            ],
            [
                'title' => 'Commercial Printing Services',
                'slug' => 'commercial-printing-services',
                'icon' => 'fas fa-print',
                'short_description' => 'Top-tier commercial printing and physical branding collateral: corporate stationery, custom luxury packaging, large-format event signage, and promotional items.',
                'full_description' => 'Tangible brand experiences leave an enduring impression. We provide high-end commercial print production with premium paper stocks, specialty finishes, and flawless color matching.',
                'tags' => ['Corporate Stationery', 'Packaging Design', 'Large Format Print'],
                'included_features' => [
                    ['title' => 'Corporate Collateral & Stationery', 'desc' => 'Luxury foil-stamped business cards, embossed letterheads, and stitched brochures.'],
                    ['title' => 'Custom Retail Packaging', 'desc' => 'Die-cut boxes, branded tape, tissue paper, and sustainable packaging solutions.'],
                    ['title' => 'Large-Format Event Signage', 'desc' => 'Exhibition booth wraps, backlit banners, step-and-repeats, and directional signage.']
                ],
                'sort_order' => 11,
            ],
        ];
        foreach ($services as $svc) {
            Service::create($svc);
        }

        // 7. Showreel Items
        $showreelItems = [
            'Digital Marketing', 'Brand Identity', 'Web Design', 'SEO Strategy',
            'Social Media', 'Content Creation', 'Performance Marketing'
        ];
        foreach ($showreelItems as $idx => $txt) {
            ShowreelItem::create(['text' => $txt, 'sort_order' => $idx + 1]);
        }

        // 8. Portfolio Categories & Projects
        $categories = [
            'branding' => 'Branding',
            'social' => 'Social Media',
            'digital' => 'Digital / SEO',
            'web' => 'Web Design',
        ];
        $catModels = [];
        foreach ($categories as $slug => $name) {
            $catModels[$slug] = PortfolioCategory::create(['name' => $name, 'slug' => $slug]);
        }

        $projects = [
            [
                'portfolio_category_id' => $catModels['web']->id,
                'title' => 'SC DMC (Scandia) - Global Travel Platform & Brand Identity',
                'slug' => 'sc-dmc-global-travel-platform',
                'image' => 'assets/images/portfolio/scdmc.jpg',
                'client' => 'SC DMC (Scandia Travel Group)',
                'year' => '2026',
                'services_provided' => 'Website Design & Development, Company Identity (Logo, Colors, Fonts), Data Creation',
                'overview' => 'Full-spectrum digital architecture, multilingual data creation, and corporate brand identity for SC DMC (Scandia) — a premier global Destination Management Company delivering ground handling, contracting, and curated travel experiences for international tour operators and travel agencies.',
                'challenges' => 'Establishing a distinguished Scandinavian brand presence with a high-performance web platform, presenting comprehensive international destination inventories, and providing seamless corporate communication across multiple global markets.',
                'solution' => 'Engineered an ultra-fast, responsive web portal with intuitive destination showcases and booking inquiry pipelines. Formulated a cohesive corporate brand identity including custom logo design, color harmony, typography standards, and complete structured data creation.',
                'results' => 'Launched an enterprise-class global travel hub with sub-second loading speeds, exceptional mobile responsiveness, and an authoritative visual identity reinforcing international trade confidence.',
                'live_url' => 'https://www.scdmc.com/en/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 0,
            ],
            [
                'portfolio_category_id' => $catModels['web']->id,
                'title' => 'Top Marine - Red Sea Diving & Yachting Digital Platform',
                'slug' => 'top-marine-red-sea-platform',
                'image' => 'assets/images/portfolio/topmarine.jpg',
                'client' => 'Top Marine Diving & Sea Trips',
                'year' => '2026',
                'services_provided' => 'Website Design & Development, Brand Identity (Logo, Colors, Fonts), Multilingual Data Creation',
                'overview' => 'Comprehensive digital architecture, brand identity formulation, and multilingual online booking portal for Top Marine — Hurghada\'s premier marine exploration provider specializing in certified scuba diving expeditions, yacht charters, and curated Red Sea boat excursions.',
                'challenges' => 'Top Marine required an internationally competitive digital presence capable of showcasing high-volume marine adventure itineraries, providing seamless mobile reservations for multi-national travelers (English, German, Russian), and projecting an elite maritime safety standard.',
                'solution' => 'Architected a high-performance web platform featuring interactive trip catalogs, instant inquiry gateways, and multi-currency trip booking workflows. Formulated a cohesive marine brand identity system with refined typography, oceanic color harmony, and rich multimedia content architecture.',
                'results' => 'Delivered a 3x increase in direct international tour bookings, lightning-fast mobile performance under 1 second, and prominent organic search rankings across Red Sea diving queries.',
                'live_url' => 'https://topmarine-redsea.com/en/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'portfolio_category_id' => $catModels['web']->id,
                'title' => 'Catch Your Trip - Global Travel & Tour Booking Platform',
                'slug' => 'catch-your-trip-platform',
                'image' => 'assets/images/portfolio/catchyourtrip.jpg',
                'client' => 'Catch Your Trip Travel Agency',
                'year' => '2026',
                'services_provided' => 'Website Design & Development, Brand Identity (Logo, Colors, Fonts), Multilingual Data Creation',
                'overview' => 'Full-scale digital architecture, booking ecosystem, and modern brand identity formulation for Catch Your Trip — an international travel agency delivering curated cultural expeditions, Red Sea marine excursions, desert safaris, and historical tours across Egypt.',
                'challenges' => 'Catch Your Trip required an intuitive, high-converting digital storefront capable of managing dynamic excursion catalogs, providing fast multi-language mobile reservations for global tourists, and conveying authentic travel expertise.',
                'solution' => 'Engineered an ultra-fast web booking portal with categorized excursion listings, interactive itinerary galleries, and instant inquiry checkout funnels. Formulated a vibrant brand identity with oceanic and sky-blue color palettes, modern typography, and comprehensive multilingual travel content.',
                'results' => 'Achieved rapid direct tour bookings, sub-second page loads across mobile devices, and high search visibility for popular Egyptian travel experiences.',
                'live_url' => 'https://catchyour-trip.com/en/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'portfolio_category_id' => $catModels['web']->id,
                'title' => 'Kiko Sharm - Excursions & Tour Booking Platform',
                'slug' => 'kiko-sharm-platform',
                'image' => 'assets/images/portfolio/kikosharm.jpg',
                'client' => 'Kiko Sharm Tours & Excursions',
                'year' => '2026',
                'services_provided' => 'Website Design & Development, Brand Identity (Logo, Colors, Fonts), Multilingual Data Creation',
                'overview' => 'Comprehensive digital architecture, tour reservation engine, and vibrant brand identity formulation for Kiko Sharm — a leading excursion operator in Sharm El Sheikh specializing in Sinai desert safaris, quad biking, Ras Mohammad & Tiran Island sea voyages, and historical cultural tours across Egypt.',
                'challenges' => 'Kiko Sharm needed a dynamic, highly responsive booking platform to cater to international European and global tourists, providing effortless excursion discovery, clear multilingual itineraries, and instantaneous booking communication.',
                'solution' => 'Engineered a lightweight, mobile-first web reservation platform featuring detailed activity schedules, instant WhatsApp & online inquiry funnels, and interactive photo galleries. Developed an energetic sunny brand identity with warm Sinai golden tones and sea-blue accents.',
                'results' => 'Boosted direct digital customer inquiries by over 180%, established sub-second mobile page loading for resort visitors, and consolidated local market authority in Sharm El Sheikh excursion bookings.',
                'live_url' => 'https://kiko-sharm.com/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'portfolio_category_id' => $catModels['web']->id,
                'title' => 'Shakshak Tours - German Excursions & Booking Portal',
                'slug' => 'shakshak-tours-platform',
                'image' => 'assets/images/portfolio/shakshak.jpg',
                'client' => 'Shakshak Tours Hurghada',
                'year' => '2026',
                'services_provided' => 'Website Design & Development, Multilingual Content Architecture, Booking System Integration',
                'overview' => 'Comprehensive web design and digital platform development for Shakshak Tours — Hurghada\'s leading specialized German-language excursion provider, delivering premium snorkeling cruises, desert quad safaris, Luxor and Cairo cultural expeditions, and private transfers.',
                'challenges' => 'Shakshak Tours needed a high-performance, German-focused excursion portal offering seamless multi-device booking, transparent pricing, and instant communication channels for German-speaking travelers visiting the Red Sea.',
                'solution' => 'Engineered a bespoke, responsive web portal with categorized excursion guides, clear itinerary schedules, and integrated direct inquiry pipelines. Built high-speed mobile architecture optimized for holidaymakers browsing on local resort connections.',
                'results' => 'Achieved rapid online inquiry growth, sub-second page performance across mobile devices, and high search visibility for German-language Hurghada excursion searches.',
                'live_url' => 'https://shakshaktours.com/en/',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 4,
            ],
            [
                'portfolio_category_id' => $catModels['branding']->id,
                'title' => 'Brand Identity & Positioning',
                'slug' => 'brand-identity-positioning',
                'image' => 'assets/images/portfolio/p1.jpg',
                'client' => 'Vanguard Luxury Goods',
                'year' => '2026',
                'services_provided' => 'Brand Strategy, Visual Identity, Packaging',
                'overview' => 'Complete brand reimagining for an international luxury lifestyle label targeting the next generation of consumers.',
                'challenges' => 'The brand suffered from an outdated image that failed to connect with digitally native, design-conscious buyers.',
                'solution' => 'We developed a bold minimalist typography system, tactile eco-luxury packaging, and digital style guides.',
                'results' => '140% surge in millennial customer acquisition within the first quarter post-launch.',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'portfolio_category_id' => $catModels['social']->id,
                'title' => 'Social Growth Campaign',
                'slug' => 'social-growth-campaign',
                'image' => 'assets/images/portfolio/p2.jpg',
                'client' => 'Pulse Activewear',
                'year' => '2026',
                'services_provided' => 'TikTok & Instagram Strategy, Influencer Program',
                'overview' => 'An explosive organic and paid social media activation campaign celebrating high-performance athletes.',
                'challenges' => 'Standing out in a saturated athletic apparel market with rising customer acquisition costs.',
                'solution' => 'A dynamic creator-led video challenge combined with precise behavioral retargeting funnels.',
                'results' => 'Grew audience from 15K to 320K followers in under 6 months with 4.8x ROAS.',
                'card_height' => 380,
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'portfolio_category_id' => $catModels['digital']->id,
                'title' => 'SEO Performance Campaign',
                'slug' => 'seo-performance-campaign',
                'image' => 'assets/images/portfolio/p3.jpg',
                'client' => 'AeroFin Tech',
                'year' => '2026',
                'services_provided' => 'Technical SEO, Content Marketing, GEO Optimization',
                'overview' => 'Multi-tier organic dominance program for an enterprise B2B fintech platform.',
                'challenges' => 'Zero organic rankings for competitive high-intent enterprise financial keywords.',
                'solution' => 'Comprehensive code refactoring, schema architecture, and high-authority technical whitepapers.',
                'results' => '+320% organic traffic growth and 1st page rankings for 85 high-value search terms.',
                'card_height' => 300,
                'is_featured' => false,
                'sort_order' => 3,
            ],
            [
                'portfolio_category_id' => $catModels['web']->id,
                'title' => 'SaaS Platform Redesign',
                'slug' => 'saas-platform-redesign',
                'image' => 'assets/images/portfolio/p4.jpg',
                'client' => 'CloudMatrix Data',
                'year' => '2026',
                'services_provided' => 'UI/UX Design, Front-End Engineering, Design System',
                'overview' => 'End-to-end product interface architecture and high-converting marketing site redesign.',
                'challenges' => 'High signup drop-off rate due to complex user flows and sluggish loading speeds.',
                'solution' => 'Streamlined multi-step onboarding, unified component design system, and sub-second load times.',
                'results' => '58% lift in trial-to-paid conversion and 99.9% uptime satisfaction rating.',
                'card_height' => 300,
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'portfolio_category_id' => $catModels['branding']->id,
                'title' => 'Brand Refresh & Rebranding',
                'slug' => 'brand-refresh-rebranding',
                'image' => 'assets/images/portfolio/p5.jpg',
                'client' => 'Solaris Energy',
                'year' => '2026',
                'services_provided' => 'Brand Guidelines, Fleet Livery, Print Collateral',
                'overview' => 'Modern brand refresh for a renewable energy pioneer expanding into residential solar.',
                'challenges' => 'Fragmented visual identity across different corporate divisions and regional branches.',
                'solution' => 'Unified master branding hierarchy, clean iconography, and interactive digital brand center.',
                'results' => 'Consolidated brand perception and won Best Regional Rebrand 2026.',
                'card_height' => 300,
                'is_featured' => false,
                'sort_order' => 5,
            ],
        ];
        foreach ($projects as $proj) {
            PortfolioProject::create($proj);
        }

        // 9. Team Members
        $team = [
            [
                'name' => 'Michael Chen',
                'role' => 'Creative Director',
                'image' => 'assets/images/team/team-1.jpg',
                'bio' => 'Award-winning creative strategist with 14+ years directing global design and visual communication.',
                'linkedin_url' => 'https://linkedin.com',
                'twitter_url' => 'https://twitter.com',
                'sort_order' => 1,
            ],
            [
                'name' => 'Sarah Williams',
                'role' => 'Head of Strategy',
                'image' => 'assets/images/team/team-2.jpg',
                'bio' => 'Former tier-1 management consultant specializing in brand positioning and growth models.',
                'linkedin_url' => 'https://linkedin.com',
                'twitter_url' => 'https://twitter.com',
                'sort_order' => 2,
            ],
            [
                'name' => 'David Rodriguez',
                'role' => 'Lead Designer',
                'image' => 'assets/images/team/team-3.jpg',
                'bio' => 'Master of typography, micro-interactions, and high-impact digital experiences.',
                'dribbble_url' => 'https://dribbble.com',
                'twitter_url' => 'https://twitter.com',
                'sort_order' => 3,
            ],
            [
                'name' => 'Lisa Park',
                'role' => 'SEO Expert',
                'image' => 'assets/images/team/team-4.jpg',
                'bio' => 'Algorithmic search specialist pioneering Generative Engine Optimization (GEO) strategies.',
                'linkedin_url' => 'https://linkedin.com',
                'twitter_url' => 'https://twitter.com',
                'sort_order' => 4,
            ],
        ];
        foreach ($team as $tm) {
            TeamMember::create($tm);
        }

        // 10. Pricing Plans
        $plans = [
            [
                'name' => 'Starter',
                'currency' => '$',
                'monthly_price' => '299',
                'yearly_price' => '239',
                'period_label' => '/month',
                'description' => 'Perfect for small businesses ready to establish their digital presence and start growing.',
                'features' => [
                    ['text' => 'Digital Marketing Strategy', 'included' => true],
                    ['text' => 'SEO Audit & Basics', 'included' => true],
                    ['text' => 'Social Media (2 platforms)', 'included' => true],
                    ['text' => 'Monthly Analytics Reports', 'included' => true],
                    ['text' => '5 Blog Posts / Month', 'included' => true],
                    ['text' => 'PPC Campaign Management', 'included' => false],
                    ['text' => 'Custom Web Design', 'included' => false],
                    ['text' => 'Dedicated Account Manager', 'included' => false],
                ],
                'is_popular' => false,
                'button_text' => 'Get Started',
                'button_link' => '#contact',
                'sort_order' => 1,
            ],
            [
                'name' => 'Professional',
                'currency' => '$',
                'monthly_price' => '699',
                'yearly_price' => '559',
                'period_label' => '/month',
                'description' => 'For growing businesses that need a comprehensive digital marketing partner to scale.',
                'features' => [
                    ['text' => 'Full Digital Marketing Strategy', 'included' => true],
                    ['text' => 'Advanced SEO & Content', 'included' => true],
                    ['text' => 'Social Media (5 platforms)', 'included' => true],
                    ['text' => 'Weekly Reports & Analytics', 'included' => true],
                    ['text' => 'PPC Campaign Management', 'included' => true],
                    ['text' => '12 Blog Posts / Month', 'included' => true],
                    ['text' => 'Dedicated Account Manager', 'included' => true],
                    ['text' => 'Custom Web Design', 'included' => false],
                ],
                'is_popular' => true,
                'button_text' => 'Get Started',
                'button_link' => '#contact',
                'sort_order' => 2,
            ],
            [
                'name' => 'Enterprise',
                'currency' => '$',
                'monthly_price' => 'Custom',
                'yearly_price' => 'Custom',
                'period_label' => '',
                'description' => 'For large organizations needing a fully tailored, end-to-end digital marketing solution.',
                'features' => [
                    ['text' => 'Full-Service Digital Marketing', 'included' => true],
                    ['text' => 'Enterprise SEO & Strategy', 'included' => true],
                    ['text' => 'All Social Platforms', 'included' => true],
                    ['text' => 'Real-Time Analytics Dashboard', 'included' => true],
                    ['text' => 'Custom Web Design & Dev', 'included' => true],
                    ['text' => 'Unlimited Content Production', 'included' => true],
                    ['text' => 'Dedicated Team (5+ members)', 'included' => true],
                    ['text' => 'Priority SLA Support', 'included' => true],
                ],
                'is_popular' => false,
                'button_text' => 'Contact Sales',
                'button_link' => '#contact',
                'sort_order' => 3,
            ],
        ];
        foreach ($plans as $p) {
            PricingPlan::create($p);
        }

        // 11. Testimonials
        $testimonials = [
            [
                'author_name' => 'Alex Thompson',
                'author_title' => 'CEO, TechFlow Inc.',
                'author_image' => 'assets/images/testimonials/testimonial-1.jpg',
                'rating' => 5.0,
                'quote' => 'Astra completely transformed our digital presence. Their data-driven approach helped us achieve a 3x increase in enterprise traffic within just six months. Incredibly talented and deeply invested in our success.',
                'sort_order' => 1,
            ],
            [
                'author_name' => 'Priya Sharma',
                'author_title' => 'Founder, Blooma Wellness',
                'author_image' => 'assets/images/testimonials/testimonial-2.jpg',
                'rating' => 5.0,
                'quote' => 'Working with Astra on our brand relaunch was a game-changer. They truly understood our vision and engineered a digital identity that resonates perfectly with our market. Revenue doubled in the first year.',
                'sort_order' => 2,
            ],
            [
                'author_name' => 'Marcus Williams',
                'author_title' => 'CMO, SportEdge',
                'author_image' => 'assets/images/testimonials/testimonial-3.jpg',
                'rating' => 5.0,
                'quote' => 'The digital growth strategy Astra developed is exceptional. We scaled our user acquisition rapidly, and more importantly, our engagement and conversions have never been higher. Highly recommend.',
                'sort_order' => 3,
            ],
            [
                'author_name' => 'Rachel Kim',
                'author_title' => 'Director, NovaBuild',
                'author_image' => 'assets/images/testimonials/testimonial-4.jpg',
                'rating' => 5.0,
                'quote' => "From custom platform engineering to our new website, every deliverable from Astra exceeded expectations. Their attention to detail and strategic intelligence set them apart from every agency we've worked with before.",
                'sort_order' => 4,
            ],
        ];
        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }

        // 12. FAQs
        $faqs = [
            [
                'question' => 'How long does it take to see results from digital marketing?',
                'answer' => 'SEO typically shows meaningful results in 3–6 months, while PPC and social media campaigns can drive traffic and leads within days. We set realistic timelines based on your industry, competition, and goals from day one.',
                'sort_order' => 1,
            ],
            [
                'question' => 'What makes Astra different from other digital agencies?',
                'answer' => "We combine deep strategic thinking with creative excellence and technical expertise under one roof. Every campaign is backed by data, crafted with care, and optimized relentlessly. We don't just execute — we become a true extension of your team.",
                'sort_order' => 2,
            ],
            [
                'question' => 'Do you work with small businesses or only enterprises?',
                'answer' => 'We work with businesses of all sizes — from ambitious startups to Fortune 500 companies. Our tiered pricing and flexible packages are designed to grow alongside your business, ensuring maximum value at every stage.',
                'sort_order' => 3,
            ],
            [
                'question' => 'How do you measure and report on campaign performance?',
                'answer' => 'We provide transparent reporting through custom dashboards and regular reports (weekly or monthly based on your plan). We track KPIs that matter — traffic, leads, conversions, ROAS, and revenue impact — giving you a clear picture of ROI.',
                'sort_order' => 4,
            ],
            [
                'question' => 'Can we start with just one service and expand later?',
                'answer' => 'Absolutely. Many clients start with a single service — often SEO or social media — and expand as they see results. We design each engagement to be modular, so scaling up is seamless and strategic.',
                'sort_order' => 5,
            ],
            [
                'question' => 'What is your contract length and cancellation policy?',
                'answer' => 'We offer both month-to-month and annual contracts (with discounts for annual commitment). We believe in earning your business every month, so there are no long-term lock-ins for standard plans.',
                'sort_order' => 6,
            ],
        ];
        foreach ($faqs as $fq) {
            Faq::create($fq);
        }

        // 13. Articles
        $articles = [
            [
                'title' => '10 SEO Trends That Will Define Search Rankings in 2026',
                'slug' => '10-seo-trends-that-will-define-search-rankings-in-2026',
                'category' => 'SEO Strategy',
                'excerpt' => 'AI-driven search, E-E-A-T signals, and Core Web Vitals are reshaping how Google ranks content. Here is what you need to know.',
                'content' => '<p>AI-driven search engines, conversational query interfaces, and Google Search Generative Experience (SGE) are changing how customers find products and services online. In this deep dive, we explore how semantic entities and original author experience are becoming the defining ranking factors in 2026.</p>',
                'image' => 'assets/images/blog/blog-1.jpg',
                'author_name' => 'Lisa Park',
                'reading_time' => '5 min read',
                'published_at' => now()->subDays(3),
                'is_published' => true,
            ],
            [
                'title' => 'Why Brand Positioning Is the Foundation of Every Marketing Win',
                'slug' => 'why-brand-positioning-is-the-foundation-of-every-marketing-win',
                'category' => 'Brand Strategy',
                'excerpt' => 'Great marketing does not start with tactics — it starts with a clear, compelling position in the market. Learn how to build yours.',
                'content' => '<p>Before you spend a single dollar on ad networks or content campaigns, you need clarity on who you serve, why they should care, and what makes you irreplaceable. Brand positioning is the multiplier of all downstream marketing activity.</p>',
                'image' => 'assets/images/blog/blog-2.jpg',
                'author_name' => 'Sarah Williams',
                'reading_time' => '7 min read',
                'published_at' => now()->subDays(9),
                'is_published' => true,
            ],
            [
                'title' => 'The Social Media Algorithm Changes You Need to Know About',
                'slug' => 'the-social-media-algorithm-changes-you-need-to-know-about',
                'category' => 'Social Media',
                'excerpt' => 'Instagram, LinkedIn, and TikTok have all updated their algorithms recently. We break down what changed and how to adapt.',
                'content' => '<p>Social platforms are prioritizing creator saves, private DM shares, and watch time velocity above surface likes and passive impressions. Here is the updated playbook for organic social distribution.</p>',
                'image' => 'assets/images/blog/blog-3.jpg',
                'author_name' => 'Michael Chen',
                'reading_time' => '6 min read',
                'published_at' => now()->subDays(18),
                'is_published' => true,
            ],
        ];
        foreach ($articles as $a) {
            Article::create($a);
        }
    }
}
