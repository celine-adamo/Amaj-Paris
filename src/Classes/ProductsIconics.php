<?php


namespace App\Classes;


use App\Entity\Blaster;
use App\Entity\Changer;
use App\Entity\Creator;
use App\Entity\Iconics;
use App\Entity\Products;
use App\Entity\Sider;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ProductsIconics extends AbstractController
{
    private EntityManagerInterface $entity;

    public function __construct(EntityManagerInterface $entity)
    {
        $this->entity = $entity;
    }

    public function getAllProducts()
    {
        return $this->entity->getRepository(Products::class)->findAll();
    }

    public function getOneCloth($slug): array
    {
        $product = $this->entity->getRepository(Products::class)->findOneBySlug($slug);
        $iconics = $this->entity->getRepository(Iconics::class)->findAll();

        return [
            'product' => $product,
            'iconics' => $iconics
        ];
    }

    public function getProductIconics($slug, $slugIconic): array
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

        return [
            'product' => $product,
            'iconics' => $iconics,
            'iconic' => $iconic,
            'clothes' => $clothes
        ];
    }

    public function getBlasterIconic($product, $iconic): Blaster
    {
        $slug = $product . '-' . $iconic;
        return $this->entity->getRepository(Blaster::class)->findOneBySlug($slug);
    }

    public function getChangerIconic($product, $iconic): Changer
    {
        $slug = $product . '-' . $iconic;
        return $this->entity->getRepository(Changer::class)->findOneBySlug($slug);
    }

    public function getCreatorIconic($product, $iconic): Creator
    {
        $slug = $product . '-' . $iconic;
        return $this->entity->getRepository(Creator::class)->findOneBySlug($slug);
    }

    public function getSiderIconic($product, $iconic): Sider
    {
        $slug = $product . '-' . $iconic;
        return $this->entity->getRepository(Sider::class)->findOneBySlug($slug);
    }
}