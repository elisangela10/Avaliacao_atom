<?php

namespace Elisangela\Avaliacao_atom\Framework\;

/**
 * ==============================================================================================================
 *
 * File: Classe para manipular arquivos - upload
 *
 * ----------------------------------------------------
 *
* @author Elisangela Miranda dos Anjos <elisangela.miranda07@bol.com.br>
 * @copyright (c) 2019, Elisangela Miranda dos Anjos
 * @version 1.00
 * ==============================================================================================================
 */
class File
{
    protected $name;
    protected $tmp_name;
    protected $size;
    protected $type;
    protected $error;
    protected $key;
    protected $path;

    public function __contruct($key)
    {

        $this->key      = $key;
        $this->size     = $_FILES[$key]["size"];
        $this->name     = $_FILES[$key]["name"];
        $this->tmp_name = $_FILES[$key]["tmp_name"];
        $this->type     = $_FILES[$key]["type"];
        $this->error    = $_FILES[$key]["error"];
    }

    public function originalName()
    {
        return $this->name;
    }

    public function size()
    {
        return $this->size;
    }

    public function clientFileName()
    {
        return $this->tmp_name;
    }

    public function store($path, $name = null)
    {

        $name       = $name ?? $this->name;
        $this->path = $path;

        move_uploaded_file($this->tmp_name, $path.$name);
        unlink($this->tmp_name);
        return file_exists($path.$name);
    }

    public function delete()
    {
        if ($this->path && file_exists($this->path.$this->name)) {
            unlink($this->path.$this->name);
        }
        return file_exists($this->path.$this->name);
    }
}