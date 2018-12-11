<?php

namespace Sherlockode\ConfigurationBundle\Parameter;

class ParameterDefinition
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $label;

    /**
     * @var array
     */
    private $options;

    public function __construct($path, $type, array $config = [])
    {
        $this->path = $path;
        $this->type = $type;

        if (isset($config['label'])) {
            $this->label = $config['label'];
        } else {
            $this->label = $this->path;
        }
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $optionName
     * @param mixed  $default
     *
     * @return mixed
     */
    public function getOption($optionName, $default = null)
    {
        if (!isset($this->options[$optionName])) {
            return $default;
        }

        return $this->options[$optionName];
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }
}
