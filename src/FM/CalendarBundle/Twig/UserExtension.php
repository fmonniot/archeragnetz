<?php
// src/FM/CalendarBundle/Twig/UserExtension.php

namespace FM\CalendarBundle\Twig;

use Twig_Extension;
use Twig_Filter_Method;
use Twig_Function_Method;

class UserExtension extends Twig_Extension 
{
    public function getName()
    {
        return 'fm_calendar_user_extension';
    }
    
    public function getFilters()
    {
        return array(
            'phone'=> new Twig_Filter_Method($this, 'phoneFilter'),
        );
    }
    
    /**
     * $number must be in international format
     */
    public function phoneFilter($number, $format='inter')
    {
        if($format=='fr')
            $replacement = '0$2 $3 $4 $5 $6';
        else //default: international format
            $replacement = '$0';
            
        return preg_replace('/^(\+[0-9]{2})([1-7]{1})([0-9]{2})([0-9]{2})([0-9]{2})([0-9]{2})$/',$replacement, $number);
    }
}
