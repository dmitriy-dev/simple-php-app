<?php
/**
 * User: dmitriy
 * Date: 9/26/19
 * Time: 7:48 AM
 */

namespace App\Core;


use App\Models\User;
use PDO;

abstract class AbstractModel
{
    protected static $table = '';
    protected $values = [];
    protected $attributes = [];

    public function __construct(array $attr = null)
    {
        if (is_array($attr) && key_exists('id', $attr)) {
            $this->values['id'] = $attr['id'];
        }

        foreach ($this->attributes as $attribute) {
            $this->values[$attribute] = $attr[$attribute];
        }
    }

    /**
     * @return array
     */
    public static function all(): array
    {
        if (empty(static::$table)) {
            throw new \DomainException('Attribute "$table" was not set');
        }

        $rows = DB::gi()->query('SELECT * FROM `' . static::$table . '`');

        $result = [];
        foreach ($rows as $row) {
            $result[] = new static($row);
        }

        return $result;
    }

    /**
     * @param int $id
     * @return AbstractModel
     */
    public static function find(int $id): AbstractModel
    {
        if (empty(static::$table)) {
            throw new \DomainException('Attribute "$table" was not set');
        }

        $rows = DB::gi()->query('SELECT * FROM `' . static::$table . '` WHERE `id`=' . $id . ' LIMIT 1');

        foreach ($rows as $row) {
            return new static($row);
        }
    }

    public function save(): AbstractModel
    {
        if (empty($this->id)) {
            return $this->create();
        } else {
            return $this->update();
        }
    }

    private function create(): AbstractModel
    {
        $fields = [];

        $this->values['created_at'] = date('Y-m-d H:i:s');

        foreach ($this->attributes as $attribute) {
            if (null !== $this->$attribute) {
                $fields[] = "`$attribute`='{$this->$attribute}'";
            }
        }

        $row = DB::gi()->insert(static::$table, $fields);
        return new static($row);
    }

    private function update(): AbstractModel
    {

    }

    public function __set($name, $value)
    {
        if (in_array($name, $this->attributes)) {
            $this->values[$name] = $value;
        }
    }

    public function __get($name)
    {
        return $this->values[$name];
    }
}