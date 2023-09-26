<?php
 
namespace Apps\Models\IndirectEmissionsOwned\Electricity;

use Illuminate\Database\Eloquent\Model;

class nnn extends Model
{
    const TABLE_NAME = 'nnn';
    public function getTableName(): string
    {
        return self::TABLE_NAME;
    }
}