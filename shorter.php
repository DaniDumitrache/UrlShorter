<?php

/** 
 * Dani Dumitrache
 * 
 * 
 * @class       CreateLinkShorter
 * @author      Dani Dumitrache 
 * @link        https://danid.rf.gd/ 
 */

class CreateLinkShorter
{
    public function Db()
    {
        global $db;

        $db = mysqli_connect('localhost', 'root', '', 'shorterlink');
        $this->db = $db;
    }

    public function UrlRedirect()
    {
        $db = mysqli_connect('localhost', 'root', '', 'shorterlink');
        $this->db = $db;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (!empty($id)) {
                $sql = "SELECT * FROM link WHERE id='$id'";
                $ExecuteSql = mysqli_query($db, $sql);

                if (mysqli_num_rows($ExecuteSql) > 0) {
                    $GetLink = mysqli_fetch_array($ExecuteSql);

                    header("location: " . $GetLink['url']);
                } else {
                    header("location: /");
                }
            }
        } else {
            header("location: /");
        }
    }


    public function __construct($url)
    {
        $this->db();
        $db = $this->db;
        $id = uniqid();
        if (!empty($url)) {
            $sql = "INSERT INTO link (id, url) VALUE ('$id', '$url')";
            $ExecuteSql = mysqli_query($db, $sql);
            $result = true;
        }

        $path = $_SERVER['HTTP_HOST'] . '/id/?id=' . $id;

        echo $url = $path;

        $this->url = $url;
    }
}

if (isset($_POST['url'])) {
    $JsUrl = $_POST['url'];

    new CreateLinkShorter($JsUrl);
}
