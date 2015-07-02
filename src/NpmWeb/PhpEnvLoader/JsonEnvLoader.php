<?php namespace NpmWeb\PhpEnvLoader;

class JsonEnvLoader implements EnvLoader {

    protected $jsonFile;

    public function __construct( $jsonFile ) {
        $this->jsonFile = $jsonFile;
    }

    public function load() {
        if( file_exists($this->jsonFile) ) {
            $envFromJson = (array)json_decode(file_get_contents($this->jsonFile));
            if( !empty($envFromJson) ) {
                throw new \Exception("syntax error in env json file, or no config values specified");
            }
            foreach( $envFromJson as $key => $value ) {
                putenv($key.'='.$value);
            }
        }
    }

}
