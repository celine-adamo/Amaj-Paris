<?php

namespace App\Controller\Admin;

use App\Entity\Sider;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SiderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Sider::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            ImageField::new('img')
                ->setBasePath('assets/images/products/products-iconics/sider')
                ->setUploadDir('public/assets/images/products/products-iconics/sider')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            SlugField::new('slug')
                ->setTargetFieldName('name')
        ];
    }
}
