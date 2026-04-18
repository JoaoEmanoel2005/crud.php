<?php

require_once __DIR__ . '/../Models/Teacher.php';
require_once __DIR__ . '/../Utils/Response.php';

class TeacherController
{
    private $teacher;

    public function __construct()
    {
        $this->teacher = new Teacher();
    }

    public function index()
    {
        Response::json($this->teacher->all());
    }

    public function show($id)
    {
        $teacher = $this->teacher->find($id);

        if (!$teacher) {
            Response::json(["error" => "Professor não encontrado"], 404);
        }

        Response::json($teacher);
    }

    public function store()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data || empty($data['name']) || empty($data['email'])) {
            Response::json(['error' => "Dados inválidos"], 400);
        }

        $this->teacher->create($data);
        Response::json(["message" => "Professor cadastrado com sucesso"], 201);

    }

    public function update($id)
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!$this->teacher->find($id)) {
            Response::json(["error" => "Professor não encontrado"], 404);
        }

        $this->teacher->update($id, $data);
        Response::json(["message" => "Professor Atualizado"]);

    }

    public function destroy($id)
    {
        if (!$this->teacher->find($id)) {
            Response::json(["error" => "Professor não encontrado"], 404);
        }

        $this->teacher->delete($id);
        Response::json(["message" => "Professor Removido com sucesso!"]);

    }
}