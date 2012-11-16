<?php
// src/FM/UserBundle/Form/Type/RegistrationFormType.php
namespace FM\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

class ProfileFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('surname', null, array('label' => 'Nom :', 'translation_domain' => 'FMUserBundle'));
        $builder->add('firstname', null, array('label' => 'Prénom :', 'translation_domain' => 'FMUserBundle'));
        $builder->add('mobile', null, array('label' => 'Téléphone :', 'translation_domain' => 'FMUserBundle'));

        $builder->setAttribute('show_legend', true);
    }

    public function getName()
    {
        return 'fm_user_profile';
    }
}
