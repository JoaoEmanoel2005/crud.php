<?php

require_once __DIR__ . '/../Config/Database.php';

class Teacher
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function all()
    {
        return $this->db
            ->query('SELECT * FROM teachers ORDER BY id DESC')
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM teachers WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare(
            'INSERT INTO teachers (name, email, cpf, materia) VALUES (?,?,?,?)'
        );

        return $stmt->execute([
            $data['name'],
            $data['email'],
            $data['cpf'],
            $data['materia']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare(
            'UPDATE teachers SET name = ?, email = ?, cpf = ?, materia =? where id = ?'
        );

        return $stmt->execute([
            $data['name'],
            $data['email'],
            $data['cpf'],
            $data['materia'],
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare('DELETE FROM teachers WHERE id = ?');
        return $stmt->execute([$id]);
    }
}