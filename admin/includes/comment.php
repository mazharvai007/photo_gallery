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

    // Self instantiate the comment class in the create comment method
    public static function create_comment($photo_id, $author, $comment_body)
    {
        if (!empty($photo_id) && !empty($author) && !empty($comment_body)) {

            // Instantiate the Comment Class
            $comment = new Comment();

            $comment->photo_id = (int)$photo_id;
            $comment->author = $author;
            $comment->comment_body = $comment_body;

            return $comment;
        } else {
            return false;
        }
    }

}