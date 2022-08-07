<?php


// A highly coupled class is a class that is dependent 
// on so many classes which makes it not reusable, hard to 
// grasp and easily broken if other classes change

class Animal {

    public function __construct(public string $name) {}
}

class Monkey extends Animal {
    public function __construct(string $name) {
        parent::__construct($name);
    }
}

class Lion extends Animal {
    public function __construct(string $name) {
        parent::__construct($name);
    }
}

// An example of a highly coupled class. As we can see it depends on
// the many classes so it makes it not reusable
class ListAnimal2 {
    private Monkey $theMonkey;

    private Lion $theLion;

    public function __construct(Monkey $monkey, Lion $lion) {
        $this->theMonkey = $monkey;
        $this->theLion = $lion;
    }


    public function displayAnimals() {

        print($this->theMonkey);
        print($this->theLion);
    }
}

// a loosely coupled class with no unnecessary tight coupling
// with other classes
class ListAnimal {
    public function __construct(public array $list) {}

    public function add(Animal $animal)
    {
        $this->list[] = $animal;
    }

}