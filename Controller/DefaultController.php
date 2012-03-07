<?php

namespace Nelmio\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        $conn = $this->get('doctrine.dbal.default_connection');

        $sql = 'SELECT CONCAT("Hello ", ?)';
        $hello = $conn->fetchColumn($sql, array($name));

        return array('hello' => $hello);
    }
}
