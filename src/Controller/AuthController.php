<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegistrationType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class AuthController extends AbstractController
{
    /**
     * @Route("/inscription",name="registration")
     */
    public function RegistrationAction(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {

        // or add an optional message - seen by developers
        //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $sessionReg = $request->request->get('registration');
            if (!empty($user->getPhoto())) {
                $file = new UploadedFile($user->getPhoto(), "test");

                $fileName = md5(uniqid()) . '.' . $file->guessExtension();

                // Move the file to the directory where images are stored
                try {
                    $file->move(
                        $this->getParameter('image_content_dir') . "users/",
                        $fileName
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'image' property to store the img file name
                // instead of its contents
                $user->setPhoto($fileName);
                //update other property of enty user
                $user->setCreatedAt(new \DateTime());
                $user->setRePassword(null);
                //encode password
                $user->setPassword($encoder->encodePassword($user, $user->getPassword()));
                $user->setRoles($sessionReg['Roles']);
                //persister
                $manager->persist($user);

            } else {
                //empty image in form
                //return default image "Default_User_picture.png"
                $user->setPhoto('DefaultUserPic.png');
                //update other property of entity user
                $user->setCreatedAt(new \DateTime());
                $user->setRePassword(null);
                //encode password
                $user->setPassword($encoder->encodePassword($user, $user->getPassword()));
                $user->setRoles($sessionReg['Roles']);
                $manager->persist($user);

            }
            $manager->flush();
            $request->request->set("id", $user->getId());
            $this->addFlash("notice_user", "Votre compte a été crée avec succes");
            return $this->redirectToRoute('registrationComplete', ['id' => $request->request->get('id')]);


        }
        return $this->render('auth/Inscription.html.twig', ['formView' => $form->createView()]);
    }

    /**
     * @Route("/inscription/succes",name="registrationComplete",)
     *
     */
    public function registrationCompleteAction(Request $request, ObjectManager $manager)
    {

        if ($request->query->has("id")) {

            $user = $manager->find(User::class, $request->query->get('id'));
            return $this->render('auth/registrationComplete.html.twig', ['user' => $user, 'isImgBlank' => empty($user->getPhoto())]);
        } else {

            //return $this->redirectToRoute('registration');
            return $this->render('default/index.html.twig', ['controller_name' => 'test', 'ip' => '127.0.0.1']);
        }


    }


    /**
     * @Route("/profile",name="profile",)
     *
     */
    public function profileAction(Request $request, ObjectManager $manager)
    {
        $user =  $this->getUser();
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('auth/profile.html.twig',["user" => $user]);
    }

    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
    {

        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $loginForm = $this->createForm('App\Form\LoginFormType');
        $loginForm->handleRequest($request);
        if ($loginForm->isSubmitted())
            dump($loginForm);


        return $this->render('auth/login.html.twig', ['last_username' => $lastUsername, 'error' => $error, 'formLogin' => $loginForm->createView()]);
    }


}
