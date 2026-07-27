<?php

namespace App\Providers\Filament;

use App\Filament\Student\Widgets\ActiveCources;
use App\Filament\Student\Widgets\AllCources;
use App\Filament\Student\Widgets\CalendarS;
use App\Models\Option;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use SolutionForest\FilamentSimpleLightBox\SimpleLightBoxPlugin;

//use Daikazu\FilamentLightbox\LightBoxPlugin;

//use SolutionForest\FilamentSimpleLightbox\SimpleLightBoxPlugin;
class StudentPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('student')
            ->path('student')
            ->breadcrumbs(false)
            ->homeUrl(config("app.url") . "/student")
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->login()
            ->discoverResources(in: app_path('Filament/Student/Resources'), for: 'App\Filament\Student\Resources')
            ->discoverPages(in: app_path('Filament/Student/Pages'), for: 'App\Filament\Student\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Student/Widgets'), for: 'App\Filament\Student\Widgets')
            ->widgets([

                ActiveCources::class,
                AllCources::class,
                CalendarS::class
                //AccountWidget::class,
                //FilamentInfoWidget::class,

            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->plugin(SimpleLightBoxPlugin::make())
            ->plugins([
                BreezyCore::make()
                    ->myProfile()
                    ->enableBrowserSessions(condition: true)
//                    ->customMyProfilePage(AccountSettingsPage::class)
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
        // ->plugin(SimpleLightBoxPlugin::make());
//            ->plugin(LightBoxPlugin::make());
    }
}
