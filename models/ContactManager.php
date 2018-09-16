<?php

namespace OpenClassrooms\Projet4\Blog;

class ContactManager
{
	private $_myMail;
	private $_status;

	public function __construct()
	{
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
		$headers = 'Reply-To:' .$mail. "\r\n";
		$headers .= 'From:' .$mail. "\r\n";
		$send = mail($this->_myMail, $subject, $comment, $headers);
	}
}
