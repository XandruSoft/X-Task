<?php

namespace Xandrusoft\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 *
 * @ORM\Table(name="xsf_task__task")
 * @ORM\Entity(repositoryClass="Xandrusoft\TaskBundle\Repository\TaskRepository")
 */
class Task
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expirationDate", type="datetime")
     */
    private $expirationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255)
     */
    private $state;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", mappedBy="task")
     */
    protected $tag;

    /**
     * @ORM\ManyToOne(targetEntity="TaskEvent", inversedBy="task")
     * @ORM\JoinColumn(name="task_event_id", referencedColumnName="id")
     */
    protected $taskEvent;

    /**
     * @ORM\OneToMany(targetEntity="Checklist", mappedBy="task")
     */
    protected $checklist;

    /**
     * @ORM\OneToMany(targetEntity="Commentary", mappedBy="task")
     */
    protected $commentary;

    /**
     * @ORM\ManyToOne(targetEntity="UserTask", inversedBy="task")
     * @ORM\JoinColumn(name="user_task_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\OneToMany(targetEntity="Attachment", mappedBy="task")
     */
    protected $attachment;

    /**
     * @ORM\ManyToOne(targetEntity="Board", inversedBy="task")
     * @ORM\JoinColumn(name="board_id", referencedColumnName="id")
     */
    protected $board;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Task
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Task
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set expirationDate
     *
     * @param \DateTime $expirationDate
     *
     * @return Task
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * Get expirationDate
     *
     * @return \DateTime
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Task
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tag = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add tag
     *
     * @param \Xandrusoft\TaskBundle\Entity\Tag $tag
     *
     * @return Task
     */
    public function addTag(\Xandrusoft\TaskBundle\Entity\Tag $tag)
    {
        $this->tag[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Xandrusoft\TaskBundle\Entity\Tag $tag
     */
    public function removeTag(\Xandrusoft\TaskBundle\Entity\Tag $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Task
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set taskEvent
     *
     * @param \Xandrusoft\TaskBundle\Entity\TaskEvent $taskEvent
     *
     * @return Task
     */
    public function setTaskEvent(\Xandrusoft\TaskBundle\Entity\TaskEvent $taskEvent = null)
    {
        $this->taskEvent = $taskEvent;

        return $this;
    }

    /**
     * Get taskEvent
     *
     * @return \Xandrusoft\TaskBundle\Entity\TaskEvent
     */
    public function getTaskEvent()
    {
        return $this->taskEvent;
    }

    /**
     * Add checklist
     *
     * @param \Xandrusoft\TaskBundle\Entity\checklist $checklist
     *
     * @return Task
     */
    public function addChecklist(\Xandrusoft\TaskBundle\Entity\checklist $checklist)
    {
        $this->checklist[] = $checklist;

        return $this;
    }

    /**
     * Remove checklist
     *
     * @param \Xandrusoft\TaskBundle\Entity\checklist $checklist
     */
    public function removeChecklist(\Xandrusoft\TaskBundle\Entity\checklist $checklist)
    {
        $this->checklist->removeElement($checklist);
    }

    /**
     * Get checklist
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChecklist()
    {
        return $this->checklist;
    }

    /**
     * Add commentary
     *
     * @param \Xandrusoft\TaskBundle\Entity\commentary $commentary
     *
     * @return Task
     */
    public function addCommentary(\Xandrusoft\TaskBundle\Entity\commentary $commentary)
    {
        $this->commentary[] = $commentary;

        return $this;
    }

    /**
     * Remove commentary
     *
     * @param \Xandrusoft\TaskBundle\Entity\commentary $commentary
     */
    public function removeCommentary(\Xandrusoft\TaskBundle\Entity\commentary $commentary)
    {
        $this->commentary->removeElement($commentary);
    }

    /**
     * Get commentary
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentary()
    {
        return $this->commentary;
    }

    /**
     * Set user
     *
     * @param \Xandrusoft\TaskBundle\Entity\UserTask $user
     *
     * @return Task
     */
    public function setUser(\Xandrusoft\TaskBundle\Entity\UserTask $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Xandrusoft\TaskBundle\Entity\UserTask
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add attachment
     *
     * @param \Xandrusoft\TaskBundle\Entity\Attachment $attachment
     *
     * @return Task
     */
    public function addAttachment(\Xandrusoft\TaskBundle\Entity\Attachment $attachment)
    {
        $this->attachment[] = $attachment;

        return $this;
    }

    /**
     * Remove attachment
     *
     * @param \Xandrusoft\TaskBundle\Entity\Attachment $attachment
     */
    public function removeAttachment(\Xandrusoft\TaskBundle\Entity\Attachment $attachment)
    {
        $this->attachment->removeElement($attachment);
    }

    /**
     * Get attachment
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * Set board
     *
     * @param \Xandrusoft\TaskBundle\Entity\Board $board
     *
     * @return Task
     */
    public function setBoard(\Xandrusoft\TaskBundle\Entity\Board $board = null)
    {
        $this->board = $board;

        return $this;
    }

    /**
     * Get board
     *
     * @return \Xandrusoft\TaskBundle\Entity\Board
     */
    public function getBoard()
    {
        return $this->board;
    }
}
