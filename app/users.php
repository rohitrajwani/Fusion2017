<?php

use Zizaco\Entrust\Traits\EntrustUserTrait;

class users extends Eloquent
{
    use EntrustUserTrait; // add this trait to your user model

}