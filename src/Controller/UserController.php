<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractBaseController
{
    private $entityManager;
    private $encodePassword;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordEncoderInterface $userPasswordEncoderInterface)
    {
        $this->entityManager = $entityManager;
        $this->encodePassword = $userPasswordEncoderInterface;
    }

    /**
     * @Route("/add_user", name="add_user", methods={"POST"})
     */
    public function addUser(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $user = new User;
        $form = $this->createForm(UserType::class, $user);
        $form->submit($data);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($this->encodePassword->encodePassword($user, $user->getPassword()));
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            return $this->json(
                Response::HTTP_CREATED
            );
        } else {
            $errors = $this->getFormsErrors($form);
            return $this->json(
                $errors,
                Response::HTTP_BAD_REQUEST
            );
        }
    }
}
