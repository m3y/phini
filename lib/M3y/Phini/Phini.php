<?php

namespace M3y\Phini;

class Phini
{
    /**
     * @var stdClass
     */
    private $container;

    /**
     * Constructor.
     *
     * @param string $iniFilepath
     * @param bool $processSections
     */
    public function __construct($iniFilepath, $processSections = false)
    {
        if (!is_readable($iniFilepath)) {
            throw new \RuntimeException("No such readable file: $filepath");
        }

        $config = parse_ini_file($iniFilepath, $processSections);
        $this->container = $this->castHashToObject($config);
    }

    /**
     * Get ini value.
     *
     * @param mixed $key
     * @return mixed $value
     */
    public function __get($key)
    {
        if (!isset($this->container->$key)) {
            return null;
        }

        return $this->container->$key;
    }

    /**
     * Cast hash to object.
     *
     * @param array $data
     * @return stdClass
     */
    private function castHashToObject(array $data)
    {
        $object = new \stdClass();
        foreach ($data as $key => $value) {
            $object->$key = $this->isHash($value) ? $this->castHashToObject($value) : $value;
        }

        return $object;
    }

    /**
     * Is hash?
     *
     * @param mixed $mixed
     * @return bool
     */
    private function isHash($mixed)
    {
        if (!is_array($mixed)) {
            return false;
        }

        $i = 0;
        foreach ($mixed as $k => $value) {
            if ($k !== $i++) {
                return true;
            }
        }

        return false;

    }
}
