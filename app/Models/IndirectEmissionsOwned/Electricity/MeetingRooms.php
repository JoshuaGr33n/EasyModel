<?php
 namespace Apps\Models\IndirectEmissionsOwned\Electricity;

use Illuminate\Database\Eloquent\Model;

class MeetingRooms extends Model
{
    const TABLE_NAME = 'meeting-rooms';
    public function getTableName(): string
    {
        return self::TABLE_NAME;
    }
}