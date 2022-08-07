<?php


// This pattern particular deals with when and how we create
// an object. 
// Object A should create Object B if;
// Object A contains Object B
// Object A saves Object B to a database or file
// Object A uses Object B
// Object A has all data needed to instantiate Object B

// we instantiate a bike class that has wheels and frames. 
// since the bike contains wheels and a frame, we create those
// objects inside the bike class

class Wheel {
    // we are using constructor property promotion
    public function __construct(public int $wheelWidth) {}
}

class Frame {
    public function __construct(public int $frameLength) {
        
    }
}

class Bike {
    public Wheel $theWheel;
    public Frame $theFrame;

    // since the wheel and the frame are used in Bike, we instantiate
    // them in the Bike constructor. This is a good example of the creator
    // pattern
    public function __construct(int $wheelWidth, int $frameLength)
    {
        $this->theWheel = new Wheel($wheelWidth);
        $this->theFrame = new Frame($frameLength);
    }
}

$bike = new Bike(25, 10);

// Note that if classes are similar. i.e have similar methods 
// they should implement an abstract class or an interface. Also a 
// creator class should implement getters and setters. 