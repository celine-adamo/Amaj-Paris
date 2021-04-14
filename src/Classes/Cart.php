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
        $cartComplete = [];
        if ($this->get()){
            foreach($this->get() as $id=>$quantity){
                $product_object=$this->entity->getRepository(Products::class)->findOneById($id);
                $iconic_object = $this->entity->getRepository(Iconics::class)->findOneById($id);
                $cartComplete[]=[
                    'product'=>$product_object,
                    'iconics' => $iconic_object,
                    'quantity'=>$quantity,
                ];
            }
        }

        return $cartComplete;

    }

    public function add($id): void
    {
        $cart = $this->session->get('cart',[]);
        if (!empty($cart[$id])){
            $cart[$id]++ ;

        } else {
            $cart[$id]=1;
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