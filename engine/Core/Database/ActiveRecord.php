<?php

namespace Engine\Core\Database;

use \ReflectionClass;
use \ReflectionProperty;

trait ActiveRecord
{
    /**
     * @var Connection
     */
    protected $db;

    /**
     * @var QueryBuilder
     */
    protected $queryBuilder;

    /**
     * ActiveRecord constructor.
     * @param int $id
     */
    public function __construct($id = 0)
    {
        global $di;

        $this->db           = $di->get('Database');
        $this->queryBuilder = new QueryBuilder();

        if ($id) {
            $this->setId($id);
        }
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     *  Save User
     */
    public function save() {
        $properties = $this->getIssetProperties();

        try {
            if (isset($this->id)) {
                    $this->queryBuilder->update($this->getTable())
                        ->set($properties)
                        ->where('id', $this->id)
                        ->sql();
            } else {
                    $this->queryBuilder->insert($this->getTable())
                        ->set($properties)
                        ->sql();
            }
            return $this->db->getLastID();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @return array
     */
    private function getIssetProperties()
    {
        $properties = [];

        foreach ($this->getProperties() as $key => $property) {
            if (isset($this->{$property->getName()})) {
                $properties[$property->getName()] = $this->{$property->getName()};
            }
        }

        return $properties;
    }

    /**
     * @return ReflectionProperty[]
     */
    private function getProperties()
    {
        $reflection = new ReflectionClass($this);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        return $properties;
    }
}