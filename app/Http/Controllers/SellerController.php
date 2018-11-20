<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{

    public function products()
    {
        // Buscar todos os produtos do tipo de vendedor logado
        // e chamar a view de listagem de produtos (passandos esses produtos)
    }
    
    public function editProduct()
    {
        // Chamar a view de edição de produtos
    }

    public function updateProduct()
    {
        // Atualizar dados de um produto
    }

    public function destroyProduct($id)
    {
        // Excluir produto
    }

    public function createProduct()
    {
        // Devolver form de cadastro de produtos
    }

    public function storeProduct()
    {
        // Receber dados do form de cadastro de produtos
    }

    public function pendingOrders()
    {
        // Buscar todos os pedidos pendentes do tipo do vendedor logado

        // Exibir a tela de listagem de pedidos pendentes

    }

    public function acceptOrder($id)
    {
        // Aprovar um pedido
    }

    public function denyOrder($id)
    {
        // Recusar um pedido
    }
}
