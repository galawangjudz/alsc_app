<?php
require_once 'Question.php';

class Answer
{
    private $id;
    private $content;
    private $isCorrect;
    private Question $question;

    public function __construct()
    {
        $this->question = new Question();
    }

    

    /**
     * Get the value of question
     */ 
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set the value of question
     *
     * @return  self
     */ 
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get the value of isCorrect
     */ 
    public function getIsCorrect()
    {
        return $this->isCorrect;
    }

    /**
     * Set the value of isCorrect
     *
     * @return  self
     */ 
    public function setIsCorrect($isCorrect)
    {
        $this->isCorrect = $isCorrect;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
