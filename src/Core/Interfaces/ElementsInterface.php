<?php

namespace Chargily\ChargilyPro\Core\Interfaces;

interface ElementsInterface
{

    /**
     * Magic Call
     *
     * @param string $name
     * @param array $arguments
     */
    public function __call($name, $arguments);
    /**
     * All ATrributes
     */
    public  function all();
    /**
     * All Methods
     */
    public  function methods();
    /**
     * Convert to Array
     */
    public  function toArray();
    /**
     * Convert to json
     */
    public  function toJson();
}
