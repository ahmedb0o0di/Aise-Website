<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\HtmlString;

class ManageContact extends Page
{
    protected string $view = 'filament.pages.manage-contact';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhone;

    protected static string|\UnitEnum|null $navigationGroup = 'General Settings';

    protected static ?string $navigationLabel = 'Contact Details';

    protected static ?string $title = 'Contact Information & Office Details';

    protected static ?int $navigationSort = 2;

    public ?array $data = [];

    public function mount(): void
    {
        $settings = SiteSetting::getSettings();
        $this->form->fill($settings->attributesToArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Email Addresses & Communications')
                    ->description('Contact email addresses displayed across the topbar, contact page, and footer.')
                    ->components([
                        TextInput::make('contact_email')
                            ->label('Primary Email')
                            ->email()
                            ->placeholder('hello@astra.com')
                            ->helperText('Main inquiry email address.')
                            ->required(),

                        TextInput::make('contact_email_secondary')
                            ->label('Secondary / Projects Email')
                            ->email()
                            ->placeholder('projects@astra.com')
                            ->helperText('Alternate department or project inquiries email.'),
                    ])
                    ->columns(2),

                Section::make('Telephone Numbers')
                    ->description('Phone numbers for direct calls and client consultations.')
                    ->components([
                        TextInput::make('contact_phone')
                            ->label('Primary Phone')
                            ->tel()
                            ->placeholder('+1 (555) 123-4567')
                            ->helperText('Primary hotline shown in the header topbar.')
                            ->required(),

                        TextInput::make('contact_phone_secondary')
                            ->label('Secondary / Support Phone')
                            ->tel()
                            ->placeholder('+1 (555) 987-6543')
                            ->helperText('Alternative phone number for urgent support.'),
                    ])
                    ->columns(2),

                Section::make('Location & Working Hours')
                    ->description('Physical headquarters address, operational schedule, and Google Maps integration.')
                    ->components([
                        TextInput::make('contact_address')
                            ->label('Physical Office Address')
                            ->placeholder('Oasis C21, El Ahiaa, Hurghada, Red Sea')
                            ->helperText('Full corporate address shown on contact cards and footer.')
                            ->columnSpanFull()
                            ->required(),

                        TextInput::make('business_hours')
                            ->label('Business / Working Hours')
                            ->placeholder('Sunday - Thursday from 10:00 am - 07:00 pm')
                            ->helperText('Weekly office and consultation operating schedule.')
                            ->columnSpanFull()
                            ->required(),

                        TextInput::make('google_map_link')
                            ->label('Google Maps Direct Link')
                            ->url()
                            ->placeholder('https://maps.app.goo.gl/JpUVm3qvSJLryCnj8')
                            ->helperText('Direct shareable link to open the office location in Google Maps.')
                            ->columnSpanFull(),

                        Textarea::make('google_map_embed')
                            ->label('Google Maps Embed URL or iFrame')
                            ->placeholder('https://maps.google.com/maps?q=27.3211575,33.6996941&hl=en&z=15&output=embed')
                            ->helperText('Embed link or coordinates to render interactive map on the contact page.')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),

                Section::make('Contact Page Banner / Hero Image')
                    ->description('Preview and upload a dynamic hero background banner image for the Contact Us page.')
                    ->components([
                        Placeholder::make('current_contact_hero_image_preview')
                            ->label('Current Banner Image')
                            ->content(function () {
                                $settings = SiteSetting::getSettings();
                                $url = $settings->contact_hero_image_url;
                                $isCustom = !empty($settings->contact_hero_image);

                                $badge = $isCustom
                                    ? '<span style="display:inline-flex;align-items:center;padding:4px 10px;border-radius:9999px;font-size:11px;font-weight:600;background:#10b981;color:#ffffff;box-shadow:0 1px 2px rgba(0,0,0,0.2);">Custom Uploaded Banner</span>'
                                    : '<span style="display:inline-flex;align-items:center;padding:4px 10px;border-radius:9999px;font-size:11px;font-weight:600;background:rgba(0,0,0,0.65);color:#f9fafb;backdrop-filter:blur(4px);border:1px solid rgba(255,255,255,0.2);">Default Template Banner</span>';

                                return new HtmlString('
                                    <div style="display:flex;flex-direction:column;gap:10px;">
                                        <div style="position:relative;width:100%;height:200px;border-radius:12px;overflow:hidden;border:1px solid rgba(156,163,175,0.3);box-shadow:0 2px 6px rgba(0,0,0,0.1);background:#0f172a;">
                                            <img src="' . e($url) . '" alt="Current Banner" style="width:100%;height:100%;object-fit:cover;display:block;">
                                            <div style="position:absolute;top:12px;left:12px;">' . $badge . '</div>
                                        </div>
                                        <div style="font-size:13px;">
                                            <a href="' . e($url) . '" target="_blank" style="color:#ff5225;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:4px;">
                                                <span>Open Full Resolution</span>
                                                <svg style="width:14px;height:14px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                            </a>
                                        </div>
                                    </div>
                                ');
                            })
                            ->columnSpan(1),

                        FileUpload::make('contact_hero_image')
                            ->label('Upload New Contact Banner')
                            ->image()
                            ->directory('contact-hero')
                            ->visibility('public')
                            ->openable()
                            ->downloadable()
                            ->helperText('Recommended size: 1920x800px. Leave empty to use the default banner.')
                            ->columnSpan(1),
                    ])
                    ->columns(2),
            ])
            ->statePath('data')
            ->model(SiteSetting::class);
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $settings = SiteSetting::getSettings();
        $settings->update($data);

        Notification::make()
            ->title('Contact information updated successfully.')
            ->success()
            ->send();
    }
}
