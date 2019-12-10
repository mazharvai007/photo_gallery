<?php

//Inherit the class
class Comment extends DB_Object
{
    protected static $db_table = "comments";
    protected static $db_table_fields = array('id', 'photo_id', 'author', 'comment_body');
    public $id;
    public $photo_id;
    public $author;
    public $comment_body;

}

// Instantiate the Comment Class
$comment = new Comment();