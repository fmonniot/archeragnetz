<?php

namespace FM\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use FM\UserBundle\Form\DataTransformer\InvitationToCodeTransformer;

class InvitationFormType extends AbstractType
{
    protected $invitationTransformer;

    public function __construct(InvitationToCodeTransformer $invitationTransformer)
    {
        $this->invitationTransformer = $invitationTransformer;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->prependClientTransformer($this->invitationTransformer);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'class' => 'FM\UserBundle\Entity\Invitation',
            'required' => true,
        ));
    }

    public function getParent()
    {
        return 'text';
    }

    public function getName()
    {
        return 'fm_user_invitation_type';
    }
}
