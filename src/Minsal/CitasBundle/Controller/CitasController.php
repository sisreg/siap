<?php

namespace Minsal\CitasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MinsalCitasBundle:Default:index.html.twig', array('name' => $name));
    }
}
