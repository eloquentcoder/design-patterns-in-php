<?php

// interface segregation principle states that no code 
// should be forced to depend on methods it does not use
// In other words no class should be forced to implement 
// functions from an interface it does not need



// Incorrect

interface File {
    public function parse();
    public function htmlContent();
}

class JsonFile implements File {

    public function parse()
    {
        // parse a file
    }

    // the class JsonFile is forced to implement
    // htmlContent that it does not need
    public function htmlContent()
    {

    }
}


// Correct
interface FilesInterface {
    public function parse();
}

// abstract the htmlContent function
// to its own interface
interface HtmlInterface {
    public function content();
}

class Json implements FilesInterface {

    public function parse()
    {
        // parse a file
    }

   
}