<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Newsletter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class NewsletterController extends AbstractController
{
	/**
	 * @Route("/api/newsletter", name="send_newsletter_email")
	 */
	public function sendMail(Request $request, MailerInterface $mailer): JsonResponse
	{
		// you can fetch the EntityManager via $this->getDoctrine()
		// or you can add an argument to the action: createPost(EntityManagerInterface $entityManager)
		$entityManager = $this->getDoctrine()->getManager();

		$data = json_decode($request->getContent(), true);

		$newNewsletterSubscription = new Newsletter();
		$newNewsletterSubscription->setFirstName($data['firstName']);
		$newNewsletterSubscription->setEmail($data['email']);

		$email = (new Email())
			->from('wiadernyandrzej96test2@gmail.com')
			->to($data['email'])
			->subject('Newsletter test Symfony + vue')
			->text('Sending emails is fun again!')
			->html('<p>See Twig integration for better HTML integration!</p>');

		$mailer->send($email);


		// tell Doctrine you want to (eventually) save the Post (no queries yet)
		$entityManager->persist($newNewsletterSubscription);

		// actually executes the queries (i.e. the INSERT query)
		$entityManager->flush();

		return new JsonResponse([
			'success' => true,
		]);
	}
}
