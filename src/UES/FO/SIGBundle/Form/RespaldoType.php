<?php

namespace UES\FO\SIGBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RespaldoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipo', 'choice',
                array(
                    'label'   => 'Acción: ',
                    'choices' => array(
                        0 => 'Respaldar Base de Datos',
                        1 => 'Restaurar Base de Datos'
                )))
            ->add('actions', 'form_actions');
            
            $builder->get('actions')
            ->add('Realizar', 'submit', array(
                'attr' => array(
                    'data-loading-text' => 'Ejecutando...'
            )))
            ->add('limpiar', 'reset');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UES\FO\SIGBundle\Model\ParametrosAdmin'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'parametros';
    }
}
