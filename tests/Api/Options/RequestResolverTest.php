<?php

namespace Ekyna\Component\Payum\Monetico\Api;

use Ekyna\Component\Payum\Monetico\Api\Options\RequestResolver;
use PHPUnit\Framework\TestCase;

/**
 * Class ApiTest
 * @package Ekyna\Component\Payum\Monetico
 * @author  Etienne Dauvergne <contact@ekyna.com>
 */
class RequestResolverTest extends TestCase
{

    public function test_request_resolver()
    {
        $requestResolver = new RequestResolver();
        $data = [
            'date' => '17/03/2018:10:40:10',
            'amount' => '24.80',
            'currency' => 'EUR',
            'reference' => '100008783',
            'comment' => 'Commande 100008783',
            'locale' => 'FR',
            'email' => 'test@example.org',
            'success_url' => 'http://example.org',
            'failure_url' => 'http://example.org',
            'protocole' => '3xcb',
            'desactivemoyenpaiement' => '3xcb,4xcb',
            'context' => [
                'billing' => [
                    'addressLine1' => '1st some road',
                    'city' => 'some city',
                    'postalCode' => '12345',
                    'country' => 'US',
                    'stateOrProvince' => 'US-CA',
                ],
            ],
        ];
        $array = $requestResolver->resolve($data);
        $this->assertIsArray($array);
    }
    public function test_request_resolver_invalid()
    {
        $requestResolver = new RequestResolver();
        $data = [
            'date' => '17/03/2018:10:40:10',
            'amount' => '24.80',
            'currency' => 'EUR',
            'reference' => '100008783',
            'comment' => 'Commande 100008783',
            'locale' => 'FR',
            'email' => 'test@example.org',
            'success_url' => 'http://example.org',
            'failure_url' => 'http://example.org',
            'protocole' => '3xcb',
            'desactivemoyenpaiement' => '3cb',
            'context' => [
                'billing' => [
                    'addressLine1' => '1st some road',
                    'city' => 'some city',
                    'postalCode' => '12345',
                    'country' => 'US',
                    'stateOrProvince' => 'US-CA',
                ],
            ],
        ];
        $array = $requestResolver->resolve($data);
        $this->assertIsArray($array);
    }

}
