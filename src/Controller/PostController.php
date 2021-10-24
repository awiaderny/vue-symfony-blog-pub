<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class PostController extends AbstractController
{
	/**
	 * @Route("/api/post/create", name="create_single_post")
	 */
	public function createPost(Request $request): JsonResponse
	{
		// you can fetch the EntityManager via $this->getDoctrine()
		// or you can add an argument to the action: createPost(EntityManagerInterface $entityManager)
		$entityManager = $this->getDoctrine()->getManager();

		$data = json_decode($request->getContent(), true);

		$newPost = new Post();
		$newPost->setTitle($data['title']);
		$newPost->setBody($data['content']);
		$newPost->setSlug($data['slug']);
		$newPost->setComment($data['comment']);
		$newPost->setTimestamp(new \DateTime("now"));

		// tell Doctrine you want to (eventually) save the Post (no queries yet)
		$entityManager->persist($newPost);

		// actually executes the queries (i.e. the INSERT query)
		$entityManager->flush();

		return new JsonResponse([
			'success' => true,
		]);
	}
	/**
	 * @Route("/api/post/{id}", name="show_single_post")
	 */
	public function showSinglePost(int $id): Response
	{
		$post = $this->getDoctrine()
			->getRepository(Post::class)
			->find($id);

		if (!$post) {
			throw $this->createNotFoundException(
				'No post found for id ' . $id
			);
		}

		$serializer = $this->container->get('serializer');

		$jsonContent = $serializer->serialize($post, 'json');

		return new Response($jsonContent);
	}
	/**
	 * @Route("/api/posts", name="show_all_posts")
	 */
	public function showAllPosts(): Response
	{
		$posts = $this->getDoctrine()
			->getRepository(Post::class)
			->findAll();

		if (!$posts) {
			throw $this->createNotFoundException(
				'No posts found'
			);
		}

		$serializer = $this->container->get('serializer');

		$jsonContent = $serializer->serialize($posts, 'json');

		return new Response($jsonContent);
	}
}
