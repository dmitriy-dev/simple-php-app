<?php
/**
 * User: dmitriy
 * Date: 9/26/19
 * Time: 7:48 AM
 */

namespace App\Core;


abstract class AbstractModel
{
    protected static $table = '';
    protected $values = [];
    protected $attributes = [
        'created_at',
        'updated_at',
    ];

    public function __construct(array $attr = null)
    {
        if (is_array($attr) && key_exists('id', $attr)) {
            $this->id = $attr['id'];
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

        $rows = DB::gi()->query('SELECT * FROM `' . static::$table . '` WHERE `id`=:id LIMIT 1', ['id'=>$id]);

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
        $this->created_at = date('Y-m-d H:i:s');

        $row = DB::gi()->insert(static::$table, $this->values);
        return new static($row);
    }

    private function update(): AbstractModel
    {
        //TODO update method
    }

    public function __set($name, $value)
    {
        if (in_array($name, $this->attributes)) {
            $this->values[$name] = $value;
        }
    }

    public function __get($name)
    {
        return $this->values[$name] ?? null;
    }
}