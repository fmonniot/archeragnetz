<?php

namespace FM\CalendarBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*
        "attr", "block_name", "by_reference", "cascade_validation", "compound", "constraints", "csrf_field_name", "csrf_protection", "csrf_provider", "data", "data_class", "disabled", "empty_data", "error_bubbling", "error_delay", "error_mapping", "error_type", "extra_fields_message", "help_block", "help_inline", "help_label", "intention", "invalid_message", "label", "label_attr", "label_render", "mapped", "max_length", "ommit_collection_item", "pattern", "post_max_size_message", "property_path", "read_only", "render_fieldset", "render_optional_text", "render_required_asterisk", "required", "show_child_legend", "show_legend", "translation_domain", "trim", "validation_constraint", "validation_groups", "value", "virtual", "widget_add_btn", "widget_addon", "widget_control_group", "widget_control_group_attr", "widget_controls", "widget_controls_attr", "widget_prefix", "widget_remove_btn", "widget_suffix", "widget_type"
        */

        $builder
            ->add('dtstart',null,array('render_optional_text'=>false))
            ->add('dtend',null,array('render_optional_text'=>false))
            ->add('wholeDay',null,array('render_optional_text'=>false))
            ->add('location',null,array('render_optional_text'=>false))
            ->add('description',null,array('render_optional_text'=>false))
            ->add('url',null,array('render_optional_text'=>false))
            ->add('calendar','entity', array(
                    'class' => 'FM\CalendarBundle\Entity\Calendar',
                    'property' => 'nameDescription',
                    'expanded' => true,
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FM\CalendarBundle\Entity\Event'
        ));
    }

    public function getName()
    {
        return 'fm_calendar_event_form_type';
    }
}
