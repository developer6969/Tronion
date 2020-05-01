<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function active()
    {
        // T3|C13 :  $this will automatically get category object
        $this->active = true;
        $this->save();
    }

    public function inactive()
    {
        $this->active = false;
        $this->save();
    }
}
