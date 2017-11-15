<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Table;
use AppBundle\Entity\Customer;

class AdminController extends Controller {

    public function indexAction(Request $request) {
        return $this->render('AppBundle:admin:index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR
        ]);
    }

    public function generateCustomerAction(Request $request, Table $table) {
        $em = $this->getDoctrine()->getManager();
        
        $customer = new Customer();

        $token = $this->get('app.generator')
                ->generateRandomString(32);
        
        $customer->setToken($token);
        $customer->setTable($table);
        
        $table->setIsOpen(false);
        
        $em->persist($table);
        $em->persist($customer);
        $em->flush();

        return $this->render('AppBundle:admin:index.html.twig', [
        ]);
    }

}
