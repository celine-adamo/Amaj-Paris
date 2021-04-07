<?php

namespace App\Controller;

use App\Classes\ProductsIconics;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DressingController extends AbstractController
{

    /**
     * @Route("/dressing", name="dressing")
     * @param ProductsIconics $products
     * @return Response
     */
    public function index(ProductsIconics $products): Response
    {
        return $this->render('dressing/index.html.twig', [
            'products' => $products->getAllProducts(),
        ]);
    }

    /**
     * @Route("/dressing/{slug}", name="one-dressing")
     * @param $slug
     * @param ProductsIconics $product
     * @return Response
     */
    public function one($slug, ProductsIconics $product): Response
    {
        $cloth = $product->getoneCloth($slug);

        if (!$cloth['product']) {
            return $this->redirectToRoute('dressing');
        }

        return $this->render('dressing/one.html.twig', [
            'product' => $cloth['product'],
            'iconics' => $cloth['iconics'],
        ]);
    }

    /**
     * @Route("/dressing/{slug}/{slugIconic}", name="product-iconic")
     * @param $slug
     * @param $slugIconic
     * @param ProductsIconics $product
     * @return Response
     */
    public function productIconic($slug, $slugIconic, ProductsIconics $product): Response
    {
        $cloth = $product->getProductIconics($slug, $slugIconic);

        return $this->render('dressing/one.html.twig', [
            'product' => $cloth['product'],
            'iconic' => $cloth['iconic'],
            'iconics' => $cloth['iconics'],
            'clothes' => $cloth['clothes']
        ]);
    }
}
