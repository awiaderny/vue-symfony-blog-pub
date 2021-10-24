<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $Title;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $Body;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $slug;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $comment;

	/**
	 * @ORM\Column(type="datetime")
	 */
	private $Timestamp;

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getTitle(): ?string
	{
		return $this->Title;
	}

	public function setTitle(string $Title): self
	{
		$this->Title = $Title;

		return $this;
	}

	public function getBody(): ?string
	{
		return $this->Body;
	}

	public function setBody(string $Body): self
	{
		$this->Body = $Body;

		return $this;
	}

	public function getSlug(): ?string
	{
		return $this->slug;
	}

	public function setSlug(string $slug): self
	{
		$this->slug = $slug;

		return $this;
	}

	public function getComment(): ?string
	{
		return $this->comment;
	}

	public function setComment(string $comment): self
	{
		$this->comment = $comment;

		return $this;
	}

	public function getTimestamp(): ?\DateTimeInterface
	{
		return $this->Timestamp;
	}

	public function setTimestamp(\DateTimeInterface $Timestamp): self
	{
		$this->Timestamp = $Timestamp;

		return $this;
	}
}
