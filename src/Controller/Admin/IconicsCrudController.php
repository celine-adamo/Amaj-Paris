<?php

namespace App\Controller\Admin;

use App\Entity\Iconics;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IconicsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Iconics::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('img'),
            ImageField::new('pics')
                ->setBasePath('assets/images/iconics/')
                ->setUploadDir('public/assets/images/iconics/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            SlugField::new('slug')->setTargetFieldName('name'),
        ];
    }

}
