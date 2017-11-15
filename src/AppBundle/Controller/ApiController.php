<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Order;

class ApiController extends Controller {

    public function getProductsAction(Request $request) {
        $serializer = $this->get('jms_serializer');

        $repository = $this->getDoctrine()->getRepository('AppBundle:Product');
        $products = $repository->findBy(
                array(
            'isEnabled' => true
                ), array(
            'ordering' => 'ASC'
                )
        );

        $serializedProducts = array();
        foreach ($products as $product) {
            $serializedProducts[] = $serializer->serialize($product, 'json');
        }

        $response = new JsonResponse();
        $response->setData(array(
            'data' => $serializedProducts
        ));

        return $response;
    }

    public function getCategoriesAction(Request $request) {
        $serializer = $this->get('jms_serializer');

        $repository = $this->getDoctrine()->getRepository('AppBundle:Category');
        $categories = $repository->findBy(
                array(
            'isEnabled' => true
                ), array(
            'ordering' => 'ASC'
                )
        );

        $serializedCategories = array();
        foreach ($categories as $category) {
            $serializedCategories[] = $serializer->serialize($category, 'json');
        }

        $response = new JsonResponse();
        $response->setData(array(
            'data' => $serializedCategories
        ));

        return $response;
    }

    public function getOrdersAction(Request $request) {
        $serializer = $this->get('jms_serializer');
        $success = false;
        $params = array();
        $serializedOrders = array();

        $content = $request->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true); // 2nd param to get as array
        }
        //$params['api_token'] = "55oqD~CM3I]GYKB.PRiNF8WAsWSo5>";
        //$params['customer_token'] = "Tu8mwbbPIbeRpp3EJ7midOCnEAXMHWBQ";

        if (isset($params['api_token'])) {
            $apiToken = $params['api_token'];

            if ($apiToken == $this->getParameter('secret') && isset($params['customer_token'])) {
                $customerToken = $params['customer_token'];

                $repository = $this->getDoctrine()->getRepository('AppBundle:Customer');
                $customer = $repository->findOneBy(array(
                    'token' => $customerToken
                ));

                if ($customer) {
                    $repository = $this->getDoctrine()->getRepository('AppBundle:Order');
                    $orders = $repository->findBy(array(
                        'customer' => $customer
                    ));

                    foreach ($orders as $order) {
                        $serializedOrders[] = $serializer->serialize($order, 'json');
                    }

                    $success = true;
                }
            }
        }

        $response = new JsonResponse();
        $response->setData(array(
            'success' => $success,
            'data' => $serializedOrders
        ));

        return $response;
    }

    public function checkLoginAction(Request $request) {
        $success = false;
        $token = null;
        $params = array();

        $content = $request->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true); // 2nd param to get as array
        }

        if (isset($params['api_token'])) {
            $apiToken = $params['api_token'];

            if ($apiToken == $this->getParameter('secret') && isset($params['auth_token'])) {
                $authToken = $params['auth_token'];

                $repository = $this->getDoctrine()->getRepository('AppBundle:Customer');
                $customer = $repository->findOneBy(
                    array(
                        'token' => $authToken,
                        'closedAt' => NULL
                    )
                );

                if ($customer) {
                    $success = true;
                    $token = $authToken;
                }
            }
        }

        $response = new JsonResponse();
        $response->setData(array(
            'success' => $success,
            'token' => $token
        ));

        return $response;
    }

    public function buyProductAction(Request $request) {
        $success = false;
        $params = array();
        $message = "";

        $content = $request->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true); // 2nd param to get as array
        }

        if (isset($params['api_token'])) {
            $apiToken = $params['api_token'];

            if ($apiToken == $this->getParameter('secret') && isset($params['customer_token'])) {
                $customerToken = $params['customer_token'];

                $repository = $this->getDoctrine()->getRepository('AppBundle:Customer');
                $customer = $repository->findOneBy(array(
                    'token' => $customerToken
                ));

                if ($customer) {
                    if ($customer->getClosedAt() == null) {
                        if (isset($params['prod_id']) && isset($params['sp_details']) && isset($params['amount']) && isset($params['notice'])) {

                            $productId = $params['prod_id'];
                            $smartPhoneDetails = $params['sp_details'];
                            $browser = $smartPhoneDetails['browser'];
                            $os = $smartPhoneDetails['os'];
                            $amount = $params['amount'];
                            $notice = $params['notice'];

                            $product = $this->getDoctrine()->getRepository('AppBundle:Product')->findOneBy(array(
                                'id' => $productId
                            ));

                            if ($product) {
                                $em = $this->getDoctrine()->getManager();

                                $order = new Order();
                                $order->setCustomer($customer);
                                $order->setProduct($product);
                                $order->setNotice($notice);
                                $order->setAmount($amount);
                                $order->setBrowser($browser['name'] . " v" . $browser['version']);
                                $order->setOperatingSystem($os['name'] . " v" . $os['version']);

                                $em->persist($order);
                                $em->flush();

                                $success = true;
                            } else {
                                $message = "Das Produkt gibt es nicht.";
                            }
                        }
                    } else {
                        $message = "Der Tisch Code ist bereits abgelaufen.";
                    }
                } else {
                    $message = "Der Tisch Code existiert nicht.";
                }
            }
        }

        $response = new JsonResponse();
        $response->setData(array(
            'success' => $success,
            'message' => $message
        ));

        return $response;
    }

}
