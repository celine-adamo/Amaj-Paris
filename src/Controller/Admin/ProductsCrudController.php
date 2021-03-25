<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Products::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            ImageField::new('img')
                ->setBasePath('assets/images/products/')
                ->setUploadDir('public/assets/images/products/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            ImageField::new('clothBack')
                ->setBasePath('assets/images/products/')
                ->setUploadDir('public/assets/images/products/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            ArrayField::new('size'),
            SlugField::new('slug')
                ->setTargetFieldName('name'),
        ];
    }
  
}
