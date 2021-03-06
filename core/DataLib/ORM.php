<?php

namespace core\DataLib;

abstract class ORM
{
    static protected function setup()
    {
        $db = new SQLBuilder();

        $table = get_called_class()::getNameInDatabase();
        $db->table($table);
        $db->className(get_called_class());
        return $db;
    }

    public function include($object)
    {

        if (!($object instanceof ORM))
            throw new Exception(get_class($object) . " don't extends ORM");

        $db = new SQLBuilder();
        $table = $object::getNameInDatabase();
        $db->table($table);
        $db->className(get_class($object));
        $nameClass = join('', array_slice(explode('\\', get_class($object)), -1));
        $nameField = lcfirst($nameClass);
        $nameFieldId = $nameField . "_Id";
        $field = $this->__get($nameFieldId);
        $db->where($field);
        $this->$nameField = $db->get();

        return $this;
    }

    public static function findId($id)
    {
        $db = self::setup();
        $res = $db->where($id)->get();
        return $res;
    }

    public static function takeAllCount()
    {
        $db = new SQLBuilder();
        $table = get_called_class()::getNameInDatabase();
        $res = $db->query("SELECT count(*)")->table($table)->exec();
        return $res;
    }

    public static function takeAll()
    {
        $db = self::setup();
        $res = $db->getAll();
        return $res;
    }

    public static function remove($currentObj)
    {
        if (!is_object($currentObj))
            return false;

        $keyField = key(get_class_vars(get_called_class()));
        $keyFieldValue = $currentObj->$keyField;

        if (empty($keyField))
            return false;
        $db = self::setup();

        $strCount = $db->delete(get_called_class()::getNameInDatabase(), $keyFieldValue);
        if ($strCount > 0)
            return true;

    }

    public static function create($currentObj)
    {
        if (!is_object($currentObj))
            return false;
        $db = self::setup();

        $keyField = key(get_class_vars(get_called_class()));

        $myArrayValue = array();
        foreach ($currentObj as $k => $v) {
            if ($k != $keyField)
                $myArrayValue[$k] = $v;
        }
        $db->insert($myArrayValue);
        return $currentObj;
    }

    public static function update($currentObj)
    {
        if (!is_object($currentObj))
            return false;

        $keyField = key(get_class_vars(get_called_class()));
        $keyFieldValue = $currentObj->$keyField;

        if (empty($keyField))
            return false;
        $db = self::setup();
        $myArrayValue = array();
        foreach ($currentObj as $k => $v) {
            if ($k != $keyField)
                $myArrayValue[$k] = $v;
        }
        return $db->update($myArrayValue, $keyFieldValue);
    }

    abstract static function getNameInDatabase();

}