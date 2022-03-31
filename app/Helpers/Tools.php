<?php

class Tools {

    function asset(string $path = null): string
    {
        return url() . '/public/assets' . $path;
    }
    
}