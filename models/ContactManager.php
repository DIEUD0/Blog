<?php

namespace OpenClassrooms\Projet4\Blog;

require_once("models/Manager.php");

class ContactManager extends Manager
{
    private $_db;
    private $_myMail;
    private $_status;

    public function __construct()
    {
        $this->_db = $this->dbConnect();
        global $CONTACTMAIL;
        $this->_myMail = $CONTACTMAIL;
    }

    public function setStatus($status)
    {
        $this->_status = $status;
    }

    public function getStatus()
    {
        return $this->_status;
    }

    public function sendMail($subject, $comment, $mail)
    {
        $headers = 'From: '.$mail."\r\n".
                    'Reply-To: '.$mail."\r\n";
        $send = mail($this->_myMail, $subject, $comment, $headers);
    }
}
