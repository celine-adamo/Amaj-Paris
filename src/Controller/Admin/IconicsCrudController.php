<?php

namespace App\Controller\Admin;

use App\Entity\Iconics;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class IconicsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Iconics::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
