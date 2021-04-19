<?php

namespace App\Controller;

use App\Classes\Cart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     */
    public function index(Cart $cart): Response
    {
        return $this->render('cart/index.html.twig', [
            'cart' => $cart->getFull()
        ]);
    }

    /**
     * @Route("/cart/add/{id}/{idIconic}", name="add_to_cart")
     */
    public function add(Cart $cart, $id, $idIconic): Response
    {
        $product = [$id, $idIconic];
        $cart->add($product);
        return $this->redirectToRoute('cart');
    }

    /**
     * @Route("/cart/delete", name="delete_all_cart")
     */
    public function delete(Cart $cart): Response
    {
        $cart->deleteAll();
        return $this->redirectToRoute('cart');
    }

    /**
     * @Route("/cart/take-of/{id}", name="take_of_to_cart")
     */
    public function takeOf(Cart $cart, $id) {
        $cart->takeOf($id);
        return $this->redirectToRoute('cart');
    }
}