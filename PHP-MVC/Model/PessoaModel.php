<?php

namespace App\Model;

use App\DAO\PessoaDAO;

class PessoaModel
{
    public $id, $nome, $cpf, $data_nascimento;

    public $rows;


    public function save()
    {
        include 'DAO/PessoaDAO.php'; // Incluíndo o arquivo DAO

        $dao = new PessoaDAO(); 

        if(empty($this->id))
        {
            $dao->insert($this);

        } else {

            $dao->update($this); // Como existe um id, passando o model para ser atualizado.
        }        
    }

    public function getAllRows()
    {
        include 'DAO/PessoaDAO.php'; // Incluíndo o arquivo DAO
        
        $dao = new PessoaDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        include 'DAO/PessoaDAO.php'; // Incluíndo o arquivo DAO

        $dao = new PessoaDAO();

        $obj = $dao->selectById($id); // Obtendo um model preenchido da camada DAO

        return ($obj) ? $obj : new PessoaModel();

    }

    public function delete(int $id)
    {
        include 'DAO/PessoaDAO.php'; // Incluíndo o arquivo DAO

        $dao = new PessoaDAO();

        $dao->delete($id);
    }
}