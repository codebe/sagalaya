<?php

namespace sagalaya\tests\mocks\extensions\data;

use sagalaya\extensions\data\Model;
use sagalaya\extensions\data\ModelValidator;

class MockModel extends Model
{

    public function save()
    {
        if (ModelValidator::isValid($this)) {
            return true;
        } else {
            return false;
        }
    }

}

?>