<?php
namespace App;
use PDO;

class Paciente extends Pessoa {
    public $convenio;
    public $observacao;
    
    public $criado_em;
    public $atualizado_em;

    public function cadastrar(){
        $db = new DataBase('paciente');
        $this->id = $db->insert([
            'nome' => $this->nome,
            'cpf'  => $this->cpf,
            'data_nascimento' => $this->data_nascimento,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'endereco' => $this->endereco,
            'convenio' => $this->convenio,
            'observacao' => $this->observacao
        ]);    
    }

    public function alterar(){
        $db = new DataBase('paciente');
        return $db->update([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'data_nascimento' => $this->data_nascimento,
            'email' => $this->email,
            'endereco' => $this->endereco,
            'convenio' => $this->convenio,
            'observacao' => $this->observacao
        ], 'id = '.$this->id);
    }

    public function excluir(){
        $db = new DataBase('paciente');
        return $db->excluir('id = '.$this->id);
    }

    public static function listar($where = null, $order = null, $limit = null, $fields = '*'){
        $db = new DataBase('paciente');
        return $db->select($where, $order, $limit, $fields)->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}