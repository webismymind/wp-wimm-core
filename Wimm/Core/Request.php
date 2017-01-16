<?php

namespace Wimm\Core;

class Request
{

    public function getPost()
    {
        if (empty($_POST))
        {
            return false;
        } else
        {
            $post = new \stdClass();
            foreach ($_POST as $key => $value)
            {
                $post->$key = $value;
            }
            return $post;
        }
    }

    public function getUrlVar()
    {
        if (empty($_GET))
        {
            return false;
        } else
        {
            $post = new \stdClass();
            foreach ($_GET as $key => $value)
            {
                $post->$key = $value;
            }
            return $post;
        }
    }

    public function getSession()
    {
        if (empty($_SESSION))
        {
            return false;
        } else
        {
            $post = new \stdClass();
            foreach ($_SESSION as $key => $value)
            {
                $post->$key = $value;
            }
            return $post;
        }
    }

    public function getCookies()
    {
        if (empty($_COOKIE))
        {
            return false;
        } else
        {
            $post = new \stdClass();
            foreach ($_COOKIE as $key => $value)
            {
                $post->$key = $value;
            }
            return $post;
        }
    }

    public function getServer()
    {
        if (empty($_SERVER))
        {
            return false;
        } else
        {
            $post = new \stdClass();
            foreach ($_SERVER as $key => $value)
            {
                $post->$key = $value;
            }
            return $post;
        }
    }


}
