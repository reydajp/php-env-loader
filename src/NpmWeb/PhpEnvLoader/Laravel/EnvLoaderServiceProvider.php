<?php namespace NpmWeb\PhpEnvLoader\Laravel;

use Illuminate\Support\ServiceProvider;

class EnvLoaderServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // @see https://coderwall.com/p/svocrg
        $this->package('npmweb/php-env-loader', null, __DIR__.'/../../../');

        $this->loadEnv();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // do nothing
    }

    protected function loadEnv() {
        $envLoader = new EnvLoaderManager($this->app);
        $envLoader->load();
    }

}
