<?php
class TablesModel
{					
    private $id;
    private $table_number;
    private $capacity;
    private $status;
    private $created_at;
    private $updated_at;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setTable_number($table_number) {
        $this->table_number = $table_number;
    }

    public function getTable_number() {
        return $this->table_number;
    }

    public function setCapacity($capacity) {
        $this->capacity = $capacity;
    }

    public function getCapacity() {
        return $this->capacity;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }

    public function getCreated_at() {
        return $this->created_at;
    }

    public function setUpdated_at($updated_at) {
        $this->updated_at = $updated_at;
    }

    public function getUpdated_at() {
        return $this->updated_at;
    }

    public function toArray() {
        return [
            "id" => $this->getId(),
            "table_number" => $this->getTable_number(),
            "capacity" => $this->getCapacity(),
            "status" => $this->getStatus(),
            "created_at" => $this->getCreated_at(),
            "updated_at" => $this->getUpdated_at()
        ];
    }
}
