<?php


namespace App\EventListener;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;

class CustomLogout extends AbstractController implements LogoutSuccessHandlerInterface
{
    /*
     * {@inheritdoc]
     */
    public function onLogoutSuccess(Request $request)
    {
        // TODO: Implement onLogoutSuccess() method.
        $request->getSession()->getFlashBag()->add('success', 'Vous êtes maintenant déconnecté');
        return $this->redirectToRoute('home_page');
    }
}