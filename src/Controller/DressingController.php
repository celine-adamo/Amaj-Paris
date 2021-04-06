<?php

namespace App\Controller;

use App\Entity\Blaster;
use App\Entity\Changer;
use App\Entity\Creator;
use App\Entity\Iconics;
use App\Entity\Sider;
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

    /**
     * @Route("/dressing/{slug}/{slugIconic}/{productIconic}", name="product-iconic")
     * @param $slug
     * @param $slugIconic
     * @param $productIconic
     * @return Response
     */
    public function productIconic($slug, $slugIconic, $productIconic): Response
    {
        $product = $this->entity->getRepository(Products::class)->findOneBySlug($slug);
        $iconic = $this->entity->getRepository(Iconics::class)->findOneBySlug($slugIconic);
        $iconics = $this->entity->getRepository(Iconics::class)->findAll();
        $clothes = '';

        switch ($product->getSlug()) {
            case 'blaster':
                $clothes = $this->getBlasterIconic($product->getSlug(), $iconic->getSlug());
                break;
            case 'changer':
                $clothes = $this->getChangerIconic($product->getSlug(), $iconic->getSlug());
                break;
            case 'creator':
                $clothes = $this->getCreatorIconic($product->getSlug(), $iconic->getSlug());
                break;
            case 'sider':
                $clothes = $this->getSiderIconic($product->getSlug(), $iconic->getSlug());
                break;
            default:
                break;
        }

        return $this->render('dressing/one.html.twig', [
            'product' => $product,
            'iconic' => $iconic,
            'iconics' => $iconics,
            'clothes' => $clothes
        ]);
    }

    public function getBlasterIconic($product, $iconic): ?string
    {
        $slug = $product . '-' . $iconic;
        return $this->entity->getRepository(Blaster::class)->findOneBySlug($slug);
    }

    public function getChangerIconic($product, $iconic)
    {
        $slug = $product . '-' . $iconic;
        return $this->entity->getRepository(Changer::class)->findOneBySlug($slug);
    }

    public function getCreatorIconic($product, $iconic): ?string
    {
        $slug = $product . '-' . $iconic;
        return $this->entity->getRepository(Creator::class)->findOneBySlug($slug);
    }

    public function getSiderIconic($product, $iconic): ?string
    {
        $slug = $product . '-' . $iconic;
        return $this->entity->getRepository(Sider::class)->findOneBySlug($slug);
    }
}
