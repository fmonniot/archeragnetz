<?php
// src/FM/CalendarBundle/Form/Type/RegistrationFormType.php
namespace FM\CalendarBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('surname');
        $builder->add('firstname');
        $builder->add('mobile');
    }

    public function getName()
    {
        return 'fm_calendar_registration';
    }
}
