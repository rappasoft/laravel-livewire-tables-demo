<?php

namespace Tests\Browser;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Illuminate\Support\Collection;
use Laravel\Dusk\Browser;
use Laravel\Dusk\TestCase as BaseTestCase;
use Tests\CreatesApplication;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Register the base URL with Dusk.
     */
    protected function setUp(): void
    {
        parent::setUp();

        Browser::$storeScreenshotsAt = __DIR__.'/Web/screenshots';

        Browser::$storeConsoleLogAt = __DIR__.'/Web/console';
    }

    /**
     * Define routes setup.
     *
     * @param  \Illuminate\Routing\Router  $router
     *
     * @return void
     */
    protected function defineRoutes($router)
    {
        Route::get('/tailwind', function () {
            return view('users.tw');
        })->name('tw');
        
        Route::get('/tailwind-slidedown', function () {
            return view('users.tw', ['displayStyle' => 'slide-down']);
        })->name('tw-slidedown');
        
    }

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     */
    public static function prepare(): void
    {
        if (! static::runningInSail()) {
           static::startChromeDriver();
       }
    }

    /**
     * Create the RemoteWebDriver instance.
     */
    protected function driver(): RemoteWebDriver
    {
        $options = (new ChromeOptions)->addArguments(collect([
            $this->shouldStartMaximized() ? '--start-maximized' : '--window-size=1920,1080',
        ])->unless($this->hasHeadlessDisabled(), function (Collection $items) {
            return $items->merge([
                '--disable-gpu',
                '--headless=new',
            ]);
        })->all());

        return RemoteWebDriver::create(
            $_ENV['DUSK_DRIVER_URL'] ?? 'http://localhost:9515',
            DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY,
                $options
            )
        );
    }

    /**
     * Determine whether the Dusk command has disabled headless mode.
     */
    protected function hasHeadlessDisabled(): bool
    {
        return isset($_SERVER['DUSK_HEADLESS_DISABLED']) ||
               isset($_ENV['DUSK_HEADLESS_DISABLED']);
    }

    /**
     * Determine if the browser window should start maximized.
     */
    protected function shouldStartMaximized(): bool
    {
        return isset($_SERVER['DUSK_START_MAXIMIZED']) ||
               isset($_ENV['DUSK_START_MAXIMIZED']);
    }
}
