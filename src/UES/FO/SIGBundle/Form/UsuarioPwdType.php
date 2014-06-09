<?php

namespace UES\FO\SIGBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioPwdType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('old_password', 'password', array(
                'label'       => 'Contraseña actual',
                'max_length'  => 16,
                'attr'        => array('placeholder' => 'Escriba su contraseña actual')
                ))
            ->add('new_password', 'repeated', array(
                'type'            => 'password',
                'invalid_message' => 'Debe repetir la nueva contraseña para confirmar',
                'max_length'      => 16,
                'required'        => true,
                'first_options'   => array(
                    'label' => 'Nueva contraseña',
                    'attr'  => array('placeholder' => 'Escriba su nueva contraseña')),
                'second_options'  => array(
                    'label' => 'Confirmar nueva contraseña',
                    'attr'  => array('placeholder' => 'Repita su nueva contraseña'))
                ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UES\FO\SIGBundle\Model\PasswordUpdate'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'usuario_pwd';
    }
}
