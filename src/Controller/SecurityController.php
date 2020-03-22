<?php


namespace App\Controller;


use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Twig\Environment;
use App\Entity\User;
use App\Form\InscriptionType;


class SecurityController extends AbstractController
{



<<<<<<< HEAD
public function inscription (Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder, \Swift_Mailer $mailer) {
=======
public function inscription (Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder)
{
>>>>>>> f425b9abfff5b7280b4daa9ac89cca547892fbd7
    $user = new User();

    $form = $this->createForm(InscriptionType::class, $user);

    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()){
        $hash=$encoder->encodePassword($user,$user->getPassword());
        $user->setPassword($hash);
        $manager->persist($user);
        $manager->flush();
<<<<<<< HEAD
        $message = (new \Swift_Message('Inscription confirmation'))
            ->setFrom('marketplace12344@gmail.com')
            ->setTo($user->getMail())
            ->setBody(
                $this->renderView(
                // templates/mail/mail_inscription.html.twig
                    'mail/mail_inscription.html.twig'
                ),
                'text/html'
            )
        ;

        $mailer->send($message);
=======
        //$this->forward('app.mailer_inscription_controller:mail_inscription', array ($user->getMail()));

        return $this->redirectToRoute('connexion');
>>>>>>> f425b9abfff5b7280b4daa9ac89cca547892fbd7
    }
    return $this->render('security/inscription.html.twig', [
        'form' => $form->createView()
    ]);
}

    public function connexion ()
    {
        return $this->render('security/connexion.html.twig');
    }

    public function logout ()
    {

    }
}