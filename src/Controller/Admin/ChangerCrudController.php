<?php

namespace App\Controller\Admin;

use App\Entity\Changer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ChangerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Changer::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            ImageField::new('img')
                ->setBasePath('assets/images/products/products-iconics/changer')
                ->setUploadDir('public/assets/images/products/products-iconics/changer')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            SlugField::new('slug')
                ->setTargetFieldName('name')
        ];
    }

}
