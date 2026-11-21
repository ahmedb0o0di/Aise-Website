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

class ManageHero extends Page
{
    protected string $view = 'filament.pages.manage-hero';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static string|\UnitEnum|null $navigationGroup = 'Homepage Sections';

    protected static ?string $navigationLabel = 'Hero Section';

    protected static ?string $title = 'Hero Section Settings';

    protected static ?int $navigationSort = 1;

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
                Section::make('Hero Headline & Content')
                    ->description('Configure the main text, badge, and video displayed in the homepage hero header.')
                    ->components([
                        TextInput::make('hero_badge')
                            ->label('Hero Badge')
                            ->placeholder('e.g. Award-Winning Digital Agency')
                            ->helperText('Small pill text displayed directly above the main title.')
                            ->required(),

                        TextInput::make('hero_title')
                            ->label('Hero Main Title')
                            ->helperText('Supports HTML formatting (e.g. <span class="hl">Accent</span> for orange highlights, and <br> for line breaks).')
                            ->required(),

                        Textarea::make('hero_description')
                            ->label('Hero Description')
                            ->placeholder('Introduce your agency and mission...')
                            ->rows(4)
                            ->columnSpanFull(),

                        TextInput::make('hero_video_url')
                            ->label('Video Popup URL')
                            ->url()
                            ->placeholder('https://www.youtube.com/watch?v=...')
                            ->helperText('YouTube or Vimeo link that plays when clicking "Watch Our Story".')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Hero Background Image')
                    ->description('Preview the current hero background image and upload a replacement image.')
                    ->components([
                        Placeholder::make('current_hero_image_preview')
                            ->label('Current Background Image')
                            ->content(function () {
                                $settings = SiteSetting::getSettings();
                                $url = $settings->hero_image_url;
                                $isCustom = !empty($settings->hero_image);

                                $badge = $isCustom
                                    ? '<span style="display:inline-flex;align-items:center;padding:4px 10px;border-radius:9999px;font-size:11px;font-weight:600;background:#10b981;color:#ffffff;box-shadow:0 1px 2px rgba(0,0,0,0.2);">Custom Uploaded Image</span>'
                                    : '<span style="display:inline-flex;align-items:center;padding:4px 10px;border-radius:9999px;font-size:11px;font-weight:600;background:rgba(0,0,0,0.65);color:#f9fafb;backdrop-filter:blur(4px);border:1px solid rgba(255,255,255,0.2);">Default Template Image (hero-bg.jpg)</span>';

                                return new HtmlString('
                                    <div style="display:flex;flex-direction:column;gap:10px;">
                                        <div style="position:relative;width:100%;height:230px;border-radius:12px;overflow:hidden;border:1px solid rgba(156,163,175,0.3);box-shadow:0 2px 6px rgba(0,0,0,0.1);background:#0f172a;">
                                            <img src="' . e($url) . '" alt="Current Hero Image" style="width:100%;height:100%;object-fit:cover;display:block;">
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

                        FileUpload::make('hero_image')
                            ->label('Upload New / Replace Background')
                            ->image()
                            ->directory('hero')
                            ->visibility('public')
                            ->openable()
                            ->downloadable()
                            ->helperText('Upload a 1920x1080px or higher image. To revert back to the default template image, simply delete the uploaded file and click Save.')
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
            ->title('Hero section updated successfully.')
            ->success()
            ->send();
    }
}
