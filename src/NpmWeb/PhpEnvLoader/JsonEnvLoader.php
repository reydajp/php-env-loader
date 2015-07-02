<?php namespace NpmWeb\PhpEnvLoader;

class JsonEnvLoader implements EnvLoader {

    protected $jsonFile;

    public function __construct( $jsonFile ) {
        $this->jsonFile = $jsonFile;
    }

    public function load() {
        $envFromJson = (array)json_decode(file_get_contents($this->jsonFile));
        if( !empty($envFromJson) ) {
            foreach( $envFromJson as $key => $value ) {
                putenv($key.'='.$value);
            }
        }

    }

}
