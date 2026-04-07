<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->profile(isSimple: false)
            ->brandName('ODOT ERP')
            ->brandLogo(asset('images/logo.png'))
            ->brandLogoHeight('5rem')
            ->colors([
                'primary' => Color::Indigo,
                'gray' => Color::Slate,
            ])
            ->font('Inter')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                // Default widgets removed
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
            ->authMiddleware([
                Authenticate::class,
            ])
            ->renderHook(
                'panels::head.done',
                fn () => new \Illuminate\Support\HtmlString('
                    <style>
                        /* Premium Logo Transformation */
                        .fi-logo {
                            filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1));
                            max-height: 120px !important;
                            height: auto !important;
                            width: auto;
                            display: block;
                            margin: 1.5rem auto !important;
                            padding: 12px;
                            background: linear-gradient(135deg, #ffffff 0%, #f8faff 100%) !important;
                            border-radius: 20px;
                            border: 2px solid rgba(255, 255, 255, 0.8);
                            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                        }
                        .fi-logo:hover {
                            transform: scale(1.08) rotate(1deg);
                        }
                        .fi-main { background: #f8fafc !important; }
                        .dark .fi-main { background: #020617 !important; }
                    </style>
                ')
            )
            ->renderHook(
                'panels::user-menu.before',
                fn () => new \Illuminate\Support\HtmlString('
                    <div class="hidden md:flex items-center gap-4 px-4 py-1.5 mr-2 bg-gray-50/50 dark:bg-white/5 rounded-full border border-gray-200 dark:border-white/10 shadow-sm">
                        <div class="flex flex-col items-end leading-tight text-right">
                            <span id="topbar-clock" class="text-sm font-black tabular-nums tracking-wider text-indigo-600 dark:text-indigo-400">
                                00:00:00
                            </span>
                            <span class="text-[9px] font-bold uppercase tracking-widest text-gray-500 dark:text-gray-400 opacity-80">
                                ' . now()->translatedFormat('d M Y') . '
                            </span>
                        </div>
                        <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                        <script>
                            function updateTopbarClock() {
                                const clock = document.getElementById("topbar-clock");
                                if (!clock) return;
                                const now = new Date();
                                clock.innerText = now.getHours().toString().padStart(2, "0") + ":" + 
                                                 now.getMinutes().toString().padStart(2, "0") + ":" + 
                                                 now.getSeconds().toString().padStart(2, "0");
                            }
                            setInterval(updateTopbarClock, 1000);
                            updateTopbarClock();
                        </script>
                    </div>
                ')
            );
    }
}
