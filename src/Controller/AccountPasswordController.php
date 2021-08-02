<?php

namespace App\Controller;

use App\Form\ChangePasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AccountPasswordController extends AbstractController
{
    private $entityManager;
    public function __construct( EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
    }

    /**
     * @Route("/conta/alterar-a-minha-palvra-passe", name="account_password")
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $notification=null;
        $user=$this->getUser();
        $form=$this->createForm(ChangePasswordType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $old_password=$form->get('old_password')->getData();
            if ($encoder->isPasswordValid($user, $old_password))
            {
                $new_pwd=$form->get('new_password')->getData();
                $password=$encoder->encodePassword($user, $new_pwd);
                $user->setPassword($password);
                $this->entityManager->flush();
                return $this->redirectToRoute("account");
            }else{
                $notification="A tua palavra passe atual nao esta correta";
            }
        }
        return $this->render('account/password.html.twig', [
            'form'=>$form->createView(),
            'notification'=>$notification
        ]);
    }
}
