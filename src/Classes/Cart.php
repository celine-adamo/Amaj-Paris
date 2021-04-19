<?php 

namespace App\Classes;

use App\Entity\Blaster;
use App\Entity\Changer;
use App\Entity\Creator;
use App\Entity\Iconics;
use App\Entity\Products;
use App\Entity\Sider;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Cart {

    private SessionInterface $session;
    private EntityManagerInterface $entity;

    public function __construct(SessionInterface $session, EntityManagerInterface $entity)
    {
        $this->session = $session;
        $this->entity = $entity;
    }

    public function getFull(): array
    {
        $products = $this->get();
        $cartComplete = [];
        $quantity = 0;

        if ($products) {
            $quantity++;
            $productsLength = count($products);
            for ($i = 0; $i <= $productsLength - 1; $i++) {
                if ($products[$i]) {
                    $product_object = $this->entity->getRepository(Products::class)->findOneById($products[$i][0]);
                    $iconic_object = $this->entity->getRepository(Iconics::class)->findOneById($products[$i][1]);
                    $cartComplete[] = [
                        'produit' => $product_object,
                        'iconic' => $iconic_object,
                        'quantity' => $quantity
                    ];
                }
            }
        }
        return $cartComplete;
    }

    public function add($product): void
    {
        $cart = $this->session->get('cart',[]);
        $ArrayProduct = ['produit' => $product[0], 'icônique' => $product[1]];
        if (!empty($ArrayProduct['produit']) && !empty($ArrayProduct['icônique'])) {
            $cart[] = [
                $ArrayProduct['produit']++,
                $ArrayProduct['icônique']++
            ];
        } else {
            $cart[] = [
                $ArrayProduct['produit'] = 1,
                $ArrayProduct['icônique'] = 1
            ];
        }
        $this->session->set('cart', $cart);
    }

    public function delete($id)
    {
        $cart = $this->session->get('cart', []);
        unset($cart[$id]);
        return $this->session->set('cart', $cart);
    }

    public function deleteAll()
    {
        return $this->session->remove('cart');
    }

    public function takeOf($id)
    {
        $cart = $this->session->get('cart', []);

        if ($cart[$id] > 1) {
            $cart[$id]--;
        } else {
            unset($cart[$id]);
        }

        return $this->session->set('cart', $cart);
    }

    public function get(){
        return $this->session->get('cart');
    }

}


?>