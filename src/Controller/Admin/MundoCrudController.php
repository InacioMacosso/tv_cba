<?php

namespace App\Controller\Admin;

use App\Entity\Mundo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MundoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Mundo::class;
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
