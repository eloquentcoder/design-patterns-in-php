<?php


// A class should be open for extension 
// and closed for modification

// Tips To Follow
// - Create an interface which brings out the extensible behavior you want in your class
// - Flip the dependencies to the classes implementing that interface


interface Shape {
    public function area();
}

class Rectangle implements Shape {
    public float $length;
    public float $breadth;

    public function area()
    {
        return $this->length * $this->breadth;
    }

}

class Circle implements Shape {
    public float $radius;

    public function area()
    {
        return pi() * ($this->radius**2);
    }
}

class GetArea {

    public function calculate(Shape $shapes)
    {
        $area = [];

        foreach ($shapes as $shape) {
            $area[] = $shape->calculate();
        }

        return $area;
    }
}