# CRUD DE ESTUDANTES E PROFESSORES
> **API RESTful**

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![XAMPP](https://img.shields.io/badge/XAMPP-FB8C00?style=for-the-badge&logo=xampp&logoColor=white)](https://www.apachefriends.org/)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)

---

## 1. Visão Geral
Este projeto foi desenvolvido a fim de aprofundar os meus conhecimentos tanto em API RESTful quanto em PHP, com isso estruturei uma simples API realizando CRUD (create, read, update e delete) das entidades students e teachers.

---

## 2. Stack Tecnológica & Arquitetura
O projeto adota uma arquitetura **MVC**, mas por conta de ser um estudo sobre back-end, optei por deixar o view de lado, sendo assim estas foram as tecnologias usadas:

* **Linguagem:** **PHP** para desenvolvimento integro.
* **Ambiente:** **XAMPP** para gerenciamento do servidor local (Apache) e banco de dados.*.
* **Banco de Dados:** **MySQL** (Relacional).
* **Testes:** **Postman** para teste do funcionamento das rotas.

---

## 3. Arquitetura e Endpoints
O sistema é composto por duas entidades principais (atores) que representam o corpo acadêmico. Abaixo, detalho as definições e os endpoints disponíveis para interação com cada uma.

### Atores
* **Students:** Entidade responsável pelo armazenamento de dados dos alunos, incluindo nome, e-mail, CPF e data de nascimento.
* **Teachers:** Entidade responsável pelo corpo docente, incluindo nome, e-mail, CPF e a matéria lecionada.

### Referência da API
Abaixo estão listadas as rotas disponíveis para manipulação das entidades (Padrão RESTful):

| Método | Endpoint | Descrição |
| :--- | :--- | :--- |
| `GET` | `/students` | Lista todos os estudantes |
| `POST` | `/students` | Cria um novo estudante |
| `GET` | `/students/{id}` | Busca um estudante específico por ID |
| `PUT` | `/students/{id}` | Atualiza um estudante existente |
| `DELETE` | `/students/{id}` | Remove um estudante do banco |
| `GET` | `/teachers` | Lista todos os professores |
| `POST` | `/teachers` | Cria um novo professor |
| `GET` | `/teachers/{id}` | Busca um professor específico por ID |
| `PUT` | `/teachers/{id}` | Atualiza um professor existente |
| `DELETE` | `/teachers/{id}` | Remove um professor do banco |

### Exemplos de cadastro (JSON)
Para realizar requisições do tipo `POST`, envie o seguinte corpo JSON no corpo da requisição:

**Exemplo para estudantes (students):**
```json
{
  "name": "João Silva",
  "email": "joao.silva@email.com",
  "cpf": "123.456.789-00",
  "birth_date": "2000-05-15"
}
```

**Exemplo para Professores (teachers):**
```json
{
  "name": "Edna Silva",
  "email": "Edna.Silva@email.com",
  "cpf": "987.654.321-99",
  "materia": "Desenvolvimento Web"
}
```

---

## 4. Segurança
Desenvolvido sob princípios de *Segurança Ofensiva e Defensiva*:
* **Prevenção contra SQL Injection:** Uso de **Prepared Statements ($stmt)** com **PDO** para garantir a sanitização automática de entradas e evitar a execução de queries maliciosas..
* **Validação de Dados:** Implementação de filtros de sanitização (Filter Input) e validação rigorosa de tipos para garantir a integridade dos dados recebidos via POST/GET.

---

## Como Rodar o Projeto (Windowns)

Este guia descreve os passos necessários para configurar o ambiente de desenvolvimento local e executar a API.

### Pré-requisitos
* **Xampp:** Para o servidor Apache e MySQL.
* **Git:** Para clonar o repositorio (opcional).
* **Composer:** Para gerenciar as dependências do projeto.

### 1. Clone o repositório
Abra o seu terminal na pasta `htdocs` do XAMPP:
```bash
cd c:/xampp/htdocs
git clone https://github.com/JoaoEmanoel2005/crud.php.git
cd crud.php
composer install
```

### 2. Inicie o servidor
```bash
Abra o XAMPP Control Panel
Inicie os módulos Apache e MySQL.
```

### 3. Configuração do banco de dados
```bash
No seu navegador, acesse http://localhost/phpmyadmin/
Crie um novo banco de dados com o nome "restful"
```
Dentro da aba **SQL** cole o seguinte script:
```Bash
CREATE TABLE Teachers (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    materia VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Students (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    birth_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 4. Acessar API

Após realizar todo processo, podera realizar o acesso pelas rotas:
```Bash
Para estudantes
http://localhost/crud.php/students

Para professores
http://localhost/crud.php/teachers
```

* **Desenvolvido por Joao Emanoel - Conecte-se comigo no [LinkedIn](https://www.linkedin.com/in/jo%C3%A3o-emanoell-6b2b66268/)**
