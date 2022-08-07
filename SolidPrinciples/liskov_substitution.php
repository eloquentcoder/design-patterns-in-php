<?php

// the Liskov Substitution Principle (LSP) 
// states that objects of a superclass should be 
// replaceable with objects of its subclasses without 
// breaking the application. In other words, what we want 
// is to have the objects of our subclasses behaving the same 
// way as the objects of our superclass.

// Tips to Follow
// - function arguments of children class must match function arguments of parent class
// - return types of children class must match return arguments of parent class
// - child pre-conditions cannot be greater than parent function preconditions
// - children post conditions cannot be greater than parents post conditions
// - Exceptions thrown by child methods must be the same as exceptions or inherit from 
// an exception thrown by parent exception


class ParentClass {
    public $id;

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}

class ChildClass {
    public $id;

    public function setId(int $id): void
    {
        $this->id = $id;
    }
}

// a situation breaking the liskov principle
class File 
{
    public function parse($file)
    {
        # parse file
    }
}

class JsonFile extends File
{
    public function parse($file)
    {
        // it has a pre-condition that is not available on the parent function
        if (pathinfo($file, PATHINFO_EXTENSION) !== 'json') {
            throw new \Exception();
        }

        // parse json file
    }
}

// a solution

interface FileInterface {
    public function __construct(string $file);
    public function parse(): void;
}

class JsonF implements FileInterface
{
    public $file;
    
    public function __construct(string $file)
    {
        // you can make sure the file is a json file here
        // or create another function for that
        $this->file = $file;
    }

    public function parse(): void
    {
        // parse the file here
    }
}

class HTMLF implements FileInterface
{
    public $file;
    
    public function __construct(string $file)
    {
        // you can make sure the file is a html file here
        // or create another function for that
        $this->file = $file;
    }

    public function parse(): void
    {
        // parse the file here
    }
}

function read_from(FileInterface $file)
{
    $file->parse();
}