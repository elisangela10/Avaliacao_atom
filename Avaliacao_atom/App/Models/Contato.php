<?php

namespace App\Models;

use Elisangela\Avaliacao_atom\Framework\Model;
use Elisangela\Avaliacao_atom\Framework\Conexao;

/**
 * ==============================================================================================================
 *
 * Contato: Classe para criar modelo do aplicativo exemplo
 *
 * ----------------------------------------------------
 *
 * @author Elisangela Miranda dos Anjos <elisangela.miranda07@bol.com.br>
 * @copyright (c) 2019, Elisangela Miranda dos Anjos
 * @version 1.00
 * ==============================================================================================================
 */
class Contato extends Model
{
    protected $logTimestamp = FALSE;
    protected $table        = "contatos";

    public static function listarRecentes(int $dias = 10)
    {
        return self::all("created_at >= '".date('Y-m-d h:m:i', strtotime("-{$dias} days"))."'");
    }

    public static function numTotal()
    {
        return self::count();
    }
}