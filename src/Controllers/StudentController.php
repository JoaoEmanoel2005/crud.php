<?php

require_once __DIR__ . '/../Models/Student.php';
require_once __DIR__ . '/../Utils/Response.php';

class StudentController
{
    private $student;

    public function __construct()
    {
        $this->student = new Student();
    }

    public function index()
    {
        Response::json($this->student->all());
    }

    public function show($id)
    {
        $student = $this->student->find($id);

        if (!$student) {
            Response::json(["error" => "Aluno não encontrado"], 404);
        }

        Response::json($student);
    }

    public function store()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data || empty($data['name']) || empty($data['email'])) {
            Response::json(['error' => "Dados inválidos"], 400);
        }

        $this->student->create($data);
        Response::json(["message" => "Aluno cadastrado com sucesso"], 201);

    }

    public function update($id)
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!$this->student->find($id)) {
            Response::json(["error" => "Aluno não encontrado"], 404);
        }

        $this->student->update($id, $data);
        Response::json(["message" => "Aluno Atualizado"]);

    }

    public function destroy($id)
    {
        if (!$this->student->find($id)) {
            Response::json(["error" => "Aluno não encontrado"], 404);
        }

        $this->student->delete($id);
        Response::json(["message" => "Aluno Removido com sucesso!"]);

    }
}