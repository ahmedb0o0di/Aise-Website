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

class ManageAbout extends Page
{
    protected string $view = 'filament.pages.manage-about';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserGroup;

    protected static string|\UnitEnum|null $navigationGroup = 'Pages Content';

    protected static ?string $navigationLabel = 'About Us';

    protected static ?string $title = 'About Us Page & Section Settings';

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
                Section::make('About Overview & Headlines')
                    ->description('Headlines and storytelling text displayed on both the homepage About section and dedicated /about page.')
                    ->components([
                        TextInput::make('about_badge')
                            ->label('Section Badge')
                            ->placeholder('e.g. About Astra Intelligence')
                            ->required(),

                        TextInput::make('about_title')
                            ->label('About Title')
                            ->placeholder("e.g. Pioneering Next-Gen Digital Intelligence")
                            ->required(),

                        Textarea::make('about_description_1')
                            ->label('Primary Description (Paragraph 1)')
                            ->rows(4)
                            ->columnSpanFull()
                            ->required(),

                        Textarea::make('about_description_2')
                            ->label('Secondary Description (Paragraph 2)')
                            ->rows(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Experience & Metrics')
                    ->description('Key badges and social proof counters displayed over the about imagery.')
                    ->components([
                        TextInput::make('about_experience_years')
                            ->label('Foundation Year / Experience')
                            ->placeholder('2025')
                            ->helperText('e.g. 2025 or Est. 2025')
                            ->required(),

                        TextInput::make('about_clients_count')
                            ->label('Enterprise Clients Count')
                            ->placeholder('50+')
                            ->required(),

                        TextInput::make('about_satisfaction_rate')
                            ->label('Client Satisfaction Rate')
                            ->placeholder('99%')
                            ->required(),
                    ])
                    ->columns(3),

                Section::make('About Showcase Image')
                    ->description('Preview the current about photograph and upload a replacement image.')
                    ->components([
                        Placeholder::make('current_about_image_preview')
                            ->label('Current Active Photograph')
                            ->content(function () {
                                $settings = SiteSetting::getSettings();
                                $url = $settings->about_image_url;
                                $isCustom = !empty($settings->about_image);

                                $badge = $isCustom
                                    ? '<span style="display:inline-flex;align-items:center;padding:4px 10px;border-radius:9999px;font-size:11px;font-weight:600;background:#10b981;color:#ffffff;box-shadow:0 1px 2px rgba(0,0,0,0.2);">Custom Uploaded Image</span>'
                                    : '<span style="display:inline-flex;align-items:center;padding:4px 10px;border-radius:9999px;font-size:11px;font-weight:600;background:rgba(0,0,0,0.65);color:#f9fafb;backdrop-filter:blur(4px);border:1px solid rgba(255,255,255,0.2);">Default Template Image (about-img.jpg)</span>';

                                return new HtmlString('
                                    <div style="display:flex;flex-direction:column;gap:10px;">
                                        <div style="position:relative;width:100%;height:230px;border-radius:12px;overflow:hidden;border:1px solid rgba(156,163,175,0.3);box-shadow:0 2px 6px rgba(0,0,0,0.1);background:#0f172a;">
                                            <img src="' . e($url) . '" alt="Current About Image" style="width:100%;height:100%;object-fit:cover;display:block;">
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

                        FileUpload::make('about_image')
                            ->label('Upload New / Replace Photograph')
                            ->image()
                            ->directory('about')
                            ->visibility('public')
                            ->openable()
                            ->downloadable()
                            ->helperText('Upload a high-resolution team or studio photograph. If removed, the default template image will be restored.')
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
            ->title('About Us settings updated successfully.')
            ->success()
            ->send();
    }
}
