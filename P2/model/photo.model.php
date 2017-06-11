<?php

class PhotoModel
{
    /*
     * We define the attributes of the Photo model.
     * Since they're public, we can access them using e.g. $photo->url directly
     */
    public $id;
    public $post_id;
    public $url;

    /*
     * Constructor of the model.
     */
    public function __construct($id, $post_id, $url)
    {
        $this->id = $id;
        $this->post_id = $post_id;
        $this->url = $url;
    }

    public static function getPhotosOfUserById($id)
    {
        $list = [];
        $db = Database::getInstance();

        // Make sure $id is an integer
        $id = intval($id);

        $req = $db->prepare('SELECT * FROM photos WHERE USER_ID = :id');

        // The query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        // We create a list of PostModel objects from the database results
        foreach ($req->fetchAll() as $post) {
            $list[] = new PhotoModel($post['ID'], $post['ID'], $post['URL']);
        }

        return $list;
    }

    public static function getPhotoByPostId($id)
    {
        $db = Database::getInstance();
        // Make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare(
            'SELECT photos.ID, photos.POST_ID, photos.URL FROM photos WHERE POST_ID = :id');
        // The query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));
        $user = $req->fetch();

        if (!empty($user)) {
            return new PhotoModel($user['ID'], $user['POST_ID'], $user['URL']);
        } else {
            return null;
        }
    }
}