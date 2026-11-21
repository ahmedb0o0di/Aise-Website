<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\HtmlString;

class ManagePortfolioPage extends Page
{
    protected string $view = 'filament.pages.manage-portfolio-page';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBriefcase;

    protected static string|\UnitEnum|null $navigationGroup = 'Pages Content';

    protected static ?string $navigationLabel = 'Work / Portfolio Page';

    protected static ?string $title = 'Work & Portfolio Page Banner Settings';

    protected static ?int $navigationSort = 3;

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
                Section::make('Work Page Banner / Hero Image')
                    ->description('Preview and customize the hero background banner image for the dedicated /portfolio (Work) page.')
                    ->components([
                        Placeholder::make('current_portfolio_hero_image_preview')
                            ->label('Current Active Banner')
                            ->content(function () {
                                $settings = SiteSetting::getSettings();
                                $url = $settings->portfolio_hero_image_url;
                                $isCustom = !empty($settings->portfolio_hero_image);

                                $badge = $isCustom
                                    ? '<span style="display:inline-flex;align-items:center;padding:4px 10px;border-radius:9999px;font-size:11px;font-weight:600;background:#10b981;color:#ffffff;box-shadow:0 1px 2px rgba(0,0,0,0.2);">Custom Uploaded Banner</span>'
                                    : '<span style="display:inline-flex;align-items:center;padding:4px 10px;border-radius:9999px;font-size:11px;font-weight:600;background:rgba(0,0,0,0.65);color:#f9fafb;backdrop-filter:blur(4px);border:1px solid rgba(255,255,255,0.2);">Default Template Banner</span>';

                                return new HtmlString('
                                    <div style="display:flex;flex-direction:column;gap:10px;">
                                        <div style="position:relative;width:100%;height:220px;border-radius:12px;overflow:hidden;border:1px solid rgba(156,163,175,0.3);box-shadow:0 2px 6px rgba(0,0,0,0.1);background:#0f172a;">
                                            <img src="' . e($url) . '" alt="Current Portfolio Hero" style="width:100%;height:100%;object-fit:cover;display:block;">
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

                        FileUpload::make('portfolio_hero_image')
                            ->label('Upload New Work Page Banner')
                            ->image()
                            ->directory('portfolio-hero')
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
            ->title('Work / Portfolio Page settings updated successfully.')
            ->success()
            ->send();
    }
}
