<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use BackedEnum;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

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
