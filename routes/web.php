<?php

use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use Illuminate\Support\Facades\Route;

// // Main Page Route
// Route::get('/', [Analytics::class, 'index'])->name('dashboard-analytics');

// // layout
// Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
// Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
// Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');
// Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
// Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');

// // pages
// Route::get('/pages/account-settings-account', [AccountSettingsAccount::class, 'index'])->name('pages-account-settings-account');
// Route::get('/pages/account-settings-notifications', [AccountSettingsNotifications::class, 'index'])->name('pages-account-settings-notifications');
// Route::get('/pages/account-settings-connections', [AccountSettingsConnections::class, 'index'])->name('pages-account-settings-connections');
// Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');
// Route::get('/pages/misc-under-maintenance', [MiscUnderMaintenance::class, 'index'])->name('pages-misc-under-maintenance');

// authentication
Route::get('/', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/copybflash', [RegisterBasic::class, 'index'])->name('auth-register-basic');
// Route::get('/auth/forgot-password-basic', [ForgotPasswordBasic::class, 'index'])->name('auth-reset-password-basic');

// // cards
// Route::get('/cards/basic', [CardBasic::class, 'index'])->name('cards-basic');

// // User Interface
// Route::get('/ui/accordion', [Accordion::class, 'index'])->name('ui-accordion');
// Route::get('/ui/alerts', [Alerts::class, 'index'])->name('ui-alerts');
// Route::get('/ui/badges', [Badges::class, 'index'])->name('ui-badges');
// Route::get('/ui/buttons', [Buttons::class, 'index'])->name('ui-buttons');
// Route::get('/ui/carousel', [Carousel::class, 'index'])->name('ui-carousel');
// Route::get('/ui/collapse', [Collapse::class, 'index'])->name('ui-collapse');
// Route::get('/ui/dropdowns', [Dropdowns::class, 'index'])->name('ui-dropdowns');
// Route::get('/ui/footer', [Footer::class, 'index'])->name('ui-footer');
// Route::get('/ui/list-groups', [ListGroups::class, 'index'])->name('ui-list-groups');
// Route::get('/ui/modals', [Modals::class, 'index'])->name('ui-modals');
// Route::get('/ui/navbar', [Navbar::class, 'index'])->name('ui-navbar');
// Route::get('/ui/offcanvas', [Offcanvas::class, 'index'])->name('ui-offcanvas');
// Route::get('/ui/pagination-breadcrumbs', [PaginationBreadcrumbs::class, 'index'])->name('ui-pagination-breadcrumbs');
// Route::get('/ui/progress', [Progress::class, 'index'])->name('ui-progress');
// Route::get('/ui/spinners', [Spinners::class, 'index'])->name('ui-spinners');
// Route::get('/ui/tabs-pills', [TabsPills::class, 'index'])->name('ui-tabs-pills');
// Route::get('/ui/toasts', [Toasts::class, 'index'])->name('ui-toasts');
// Route::get('/ui/tooltips-popovers', [TooltipsPopovers::class, 'index'])->name('ui-tooltips-popovers');
// Route::get('/ui/typography', [Typography::class, 'index'])->name('ui-typography');

// // extended ui
// Route::get('/extended/ui-perfect-scrollbar', [PerfectScrollbar::class, 'index'])->name('extended-ui-perfect-scrollbar');
// Route::get('/extended/ui-text-divider', [TextDivider::class, 'index'])->name('extended-ui-text-divider');

// // icons
// Route::get('/icons/boxicons', [Boxicons::class, 'index'])->name('icons-boxicons');

// // form elements
// Route::get('/forms/basic-inputs', [BasicInput::class, 'index'])->name('forms-basic-inputs');
// Route::get('/forms/input-groups', [InputGroups::class, 'index'])->name('forms-input-groups');

// // form layouts
// Route::get('/form/layouts-vertical', [VerticalForm::class, 'index'])->name('form-layouts-vertical');
// Route::get('/form/layouts-horizontal', [HorizontalForm::class, 'index'])->name('form-layouts-horizontal');

// // tables
// Route::get('/tables/basic', [TablesBasic::class, 'index'])->name('tables-basic');
