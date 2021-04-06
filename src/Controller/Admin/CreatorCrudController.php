<?php

namespace App\Controller\Admin;

use App\Entity\Creator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CreatorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Creator::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            ImageField::new('img')
                ->setBasePath('assets/images/products/products-iconics/creator')
                ->setUploadDir('public/assets/images/products/products-iconics/creator')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            SlugField::new('slug')
                ->setTargetFieldName('name')
        ];
    }

}
