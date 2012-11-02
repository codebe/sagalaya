<?php
namespace app\resources\repository;

class UserRepository extends \Doctrine\ORM\EntityRepository
{
    public function test() {
        echo "start test..<br/>";
    }

    public function testOne($one) {
        echo "{$one}<br />";
    }
    
    public function testTwo($one, $two) {
        echo "{$one}, {$two}<br />";
    }

    public function testThree($one, $two, $three) {
        echo "{$one}, {$two}, {$three}<br />";
    }

    public function testFour($one, $two, $three, $four) {
        echo "{$one}, {$two}, {$three}, {$four}<br />";
    }

    public function testFive($one, $two, $three, $four, $five) {
        echo "{$one}, {$two}, {$three}, {$four}, {$five}<br />";
    }
}
