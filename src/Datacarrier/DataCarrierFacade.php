<?php
namespace Unisharp\Datacarrier;

use Illuminate\Support\Facades\Facade;

class DataCarrierFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'DataCarrier';
    }
}
