<?php

namespace Sherlockode\ConfigurationBundle\FieldType;

use Sherlockode\ConfigurationBundle\Parameter\ParameterDefinition;
use Sherlockode\ConfigurationBundle\Transformer\CallbackTransformer;
use Sherlockode\ConfigurationBundle\Transformer\TransformerInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class CheckboxField extends AbstractField
{
    /**
     * @return string
     */
    public function getFormType()
    {
        return CheckboxType::class;
    }

    public function getFormOptions(ParameterDefinition $definition)
    {
        return [
            'required' => $definition->getOption('required', false),
        ];
    }

    public function getName()
    {
        return 'checkbox';
    }

    /**
     * @param ParameterDefinition $definition
     *
     * @return TransformerInterface
     */
    public function getModelTransformer(ParameterDefinition $definition)
    {
        return new CallbackTransformer(
            function ($data) {
                return (bool)$data;
            },
            function ($data) {
                return $data ? 1 : 0;
            }
        );
    }
}
