<?php namespace NpmWeb\PhpEnvLoader\Laravel;

use NpmWeb\PhpEnvLoader\JsonEnvLoader;

class EnvLoaderManager extends \Illuminate\Support\Manager {

    static $packageName = 'php-env-loader';

    /**
     * Create a new driver instance.
     *
     * @param  string  $driver
     * @return mixed
     */
    protected function createDriver($driver)
    {
        $envLoader = parent::createDriver($driver);

        // any other setup needed

        return $envLoader;
    }

    /**
     * Create an instance of the database driver.
     *
     * @return \Illuminate\Auth\Guard
     */
    public function createJsonDriver()
    {
        return new JsonEnvLoader(base_path($this->app['config']->get(self::$packageName.'::file')));
    }

    /**
     * Get the default authentication driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        $driver = $this->app['config']->get(self::$packageName.'::driver');
        return $driver;
    }

    /**
     * Set the default authentication driver name.
     *
     * @param  string  $name
     * @return void
     */
    public function setDefaultDriver($name)
    {
        $this->app['config']->set(self::$packageName.'::driver', $name);
    }

}
