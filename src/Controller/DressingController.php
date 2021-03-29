<?php

namespace App\Controller;

use App\Entity\Iconics;
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
     * @param $slug
     * @return Response
     */
    public function one($slug): Response
    {
        $product = $this->entity->getRepository(Products::class)->findOneBySlug($slug);
        $iconics = $this->entity->getRepository(Iconics::class)->findAll();

        if (!$product) {
            return $this->redirectToRoute('dressing');
        }

        return $this->render('dressing/one.html.twig', [
            'product' => $product,
            'iconics' => $iconics,
        ]);
    }

    /**
     * @Route("/dressing/{slug}/{slugIconic}", name="img-on-clothes")
     * @param $slug
     * @param $slugIconic
     * @return Response
     */
    public function iconicOnClothes($slug, $slugIconic): Response {
        $product = $this->entity->getRepository(Products::class)->findOneBySlug($slug);
        $iconics = $this->entity->getRepository(Iconics::class)->findAll();
        $iconic = $this->entity->getRepository(Iconics::class)->findOneBySlug($slugIconic);

        if (!$product || !$iconic) {
            return $this->redirectToRoute('dressing');
        }

        return $this->render('dressing/one.html.twig', [
            'product' => $product,
            'iconics' => $iconics,
            'iconic' => $iconic
        ]);
    }
}
