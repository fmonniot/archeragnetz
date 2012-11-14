<?php
namespace FM\ArcherAgnetzBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Mopa\Bundle\BootstrapBundle\Navbar\AbstractNavbarMenuBuilder;

class NavbarMenuBuilder extends AbstractNavbarMenuBuilder
{
    protected $securityContext;
    protected $isLoggedIn;

    public function __construct(FactoryInterface $factory, SecurityContextInterface $securityContext)
    {
        parent::__construct($factory);

        $this->securityContext = $securityContext;
        $this->isLoggedIn = $this->securityContext->isGranted('IS_AUTHENTICATED_FULLY');
    }

    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav');

        $menu->addChild('Accueil', array('route' => 'fm_archer_agnetz_home'));
        $menu->addChild('Vie du club', array('route' => 'fm_archer_agnetz_clubLife'));
        $menu->addChild('Photos', array('route' => 'fm_archer_agnetz_photos'));
        $menu->addChild('Nous rejoindre', array('route' => 'fm_archer_agnetz_joinUs'));
        $menu->addChild('Contact', array('route' => 'fm_archer_agnetz_contact'));

        return $menu;
    }

    public function createRightSideDropdownMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-right');

        if ($this->isLoggedIn) {
            
            $profile = $this->createDropdownMenuItem($menu, '<i class="icon-user"></i> ' . $this->securityContext->getToken()->getUsername(),
                                                     true, array('icon'=>'caret'), array('extras' => array('safe_label'=>true)));
            
            $profile->addChild('Mon compte', array('route' => 'fos_user_profile_show'));
            $profile->addChild('Déconnexion', array('route' => 'fos_user_security_logout'));
        }


        return $menu;
    }
}