<?php
require '../shorter.php';

class RedirectToUrl extends CreateLinkShorter
{
    public function __construct()
    {
        $this->UrlRedirect();
    }
}

new RedirectToUrl;
