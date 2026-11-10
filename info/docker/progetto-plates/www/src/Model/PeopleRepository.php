<?php
namespace Model;
class PeopleRepository {
    static function getPeople() : array {
        return [

        ];
    }

    static function  getPeopleByID(int $id) : array
    {
        $persone = self::getPeople();
        return $persone[$id];
    }
}

?>