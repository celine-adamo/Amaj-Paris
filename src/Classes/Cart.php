<?php 

namespace App\Classes;

use App\Entity\Blaster;
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
                $product_object=$this->entity->getRepository(Blaster::class)->findOneById($id);
                $cartComplete[]=[
                    'product'=>$product_object,
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

    public function get(){
        return $this->session->get('cart');
    }

}


?>