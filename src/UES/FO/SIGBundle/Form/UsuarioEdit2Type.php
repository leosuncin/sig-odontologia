<?php

namespace UES\FO\SIGBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioEdit2Type extends AbstractType
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
            ->add('actions', 'form_actions');
        $builder->get('actions')
            ->add('modificar', 'submit')
            ->add('revertir', 'reset')
            ->add('pwd', 'button', array(
                'label' => 'Cambiar contraseña',
                'attr' => array(
                    'data-toggle' => 'modal',
                    'data-target' => '#modal-confirm-pwd'
                )));
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
        return 'usuario_edit_simple';
    }
}
