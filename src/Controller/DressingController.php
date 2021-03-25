<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Products;

class DressingController extends AbstractController

{
    private EntityManagerInterface $entity;

    public function __construct(EntityManagerInterface $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @Route("/dressing", name="dressing")
     */
    public function index(): Response
    {
        $products = $this->entity->getRepository(Products::class)->findAll();



        return $this->render('dressing/index.html.twig', [
            'products' => $products,
        ]);
    }

    /**
     * @Route("/dressing/{slug}", name="one-dressing")
     */
    public function one($slug): Response
    {
        $product = $this->entity->getRepository(Products::class)->findOneBySlug($slug);
       /*  dd($product); */
        return $this->render('dressing/one.html.twig', [
            'product' => $product,
        ]);
    }
}
