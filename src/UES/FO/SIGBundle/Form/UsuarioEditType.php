<?php

namespace UES\FO\SIGBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioEditType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombres', 'text', array(
                'max_length' => 50
                ))
            ->add('apellidos', 'text', array(
                'max_length' => 50
                ))
            ->add('nivel', 'choice', array(
                'empty_value' => 'Asigne un nivel',
                'choices'     => array(
                    1 => 'Administrador del sistema',
                    2 => 'Táctico',
                    3 => 'Estratégico'
                )))
            ->add('enabled', 'checkbox', array(
                'label' => 'Habilitar el usuario',
                'attr' => array('align_with_widget' => true)
                ))
            ->add('locked', 'checkbox', array(
                'label' => 'Bloquear al usuario',
                'attr' => array('align_with_widget' => true)
                ))
            ->add('modificar', 'submit')
            ->add('limpiar', 'reset')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UES\FO\SIGBundle\Entity\Usuario'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'usuario';
    }
}
