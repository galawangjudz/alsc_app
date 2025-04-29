<?php
require_once(__DIR__ . '/../config/Connection.php');
require_once 'Answer.php';

class AnswersDAO
{
    private $conn;
    private Answer $answer;

    public function __construct()
    {
        $this->conn = Connection::getInstance()->getConnection();
        $this->answer = new Answer();
    }

    public function getAnswersByQuestionId($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM answers WHERE questionId = $id");
        $stmt->execute();
        $answers = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $ansr = new Answer();
            $ansr->setId($row['answerId']);
            $ansr->setContent($row['answerContent']);
            $ansr->setIsCorrect($row['isCorrect']);
            array_push($answers, $ansr);
        }
        return $answers;
    }


    /**
     * Get the value of answer
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set the value of answer
     *
     * @return  self
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }
}
