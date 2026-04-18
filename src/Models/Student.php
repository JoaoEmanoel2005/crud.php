<?php

require_once __DIR__ . '/../Config/Database.php';

class Student
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function all()
    {
        return $this->db
            ->query('SELECT * FROM students ORDER BY id DESC')
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM students WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare(
            'INSERT INTO students (name, email, cpf, birth_date) VALUES (?,?,?,?)'
        );

        return $stmt->execute([
            $data['name'],
            $data['email'],
            $data['cpf'],
            $data['birth_date']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare(
            'UPDATE students SET name = ?, email = ?, cpf = ?, birth_date =? where id = ?'
        );

        return $stmt->execute([
            $data['name'],
            $data['email'],
            $data['cpf'],
            $data['birth_date'],
            $id
        ]);
    }

    public function delete($id){
        $stmt = $this->db->prepare('DELETE FROM students WHERE id = ?');
        return $stmt->execute([$id]);
    }
}