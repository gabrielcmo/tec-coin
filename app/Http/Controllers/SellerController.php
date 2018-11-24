<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Order;
use App\Seller;
use App\Buyer;
use App\OrderStatus;
use App\Product;

class SellerController extends Controller
{
    public function type_id_userProduct($id){
        if($id == 3){

            $sellerID = 1;
        }elseif($id == 4){

            $sellerID = 2;
        }elseif($id == 5){

            $sellerID = 3;
        }else{
            return false;
        }

        return $sellerID;
    }

    public function products()
    {
        $id = Auth::user()->user_type_id;
        $listproducts = Product::where("type_id", SellerController::type_id_userProduct($id))->get();

        return view('seller.listproduct')->with(compact('listproducts'));
    }

    public function editProduct()
    {
        //Chamar a view de produtos
        return view ('editproduct');
    }

    public function updateProduct(Request $r , $id)
    {
        // Atualizar dados de um produto
        Product::where('id', $id)->update(['name' => $r['name']]);
        Product::where('id', $id)->update(['value' => $r['value']]);
        Product::where('id', $id)->update(['description' => $r['description']]);
        Product::where('id', $id)->update(['image' => $r['image']]);
        //Alterar o tipo de Produto?
        Product::where('id', $id)->update(['type_id' => $r['type']]);
        return view('home');
    }

    public function destroyProduct($id)
    {
        // Excluir produto
        Product::where('id', $id)->delete();
        return view('home');
    }

    public function createProduct()
    {
        // Devolver form de cadastro de produtos
        return view('seller.productregister');
    }

    public function storeProduct(Request $r)
    {
        // Receber dados do form de cadastro de produtos
        $product = new Product;
        $product->name = $r['name'];
        $product->value = $r['value'];
        $product->description = $r['description'];
        $product->type_id = $r['type_id'];
        $file = $r->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('images', $filename);
        $product->image = $filename;
        $product->save();
        
        return view('home');
    }

    public function pendingOrders($id)
    {
        // Buscar todos os pedidos pendentes do tipo do vendedor logado
        $idseller = User::where('id', $id)->value('id')->get();
        $all_idproduct_in_order = Order::where('idseller', $idseller)->value('product_id')->get();
        $all_order = Order::where('idseller', $idselle)->get();
        //Não sei se isso vai funcionar...
        $all_products = Product::whereIn('id', $all_idproduct_in_order)->get();
        // Exibir a tela de listagem de pedidos pendentes
        return view('listorder')->compact('all_order','all_products');
    }

    public function acceptOrder($id)
    {
        // Aprovar um pedido
        Order::where('seller_id',$id)->update(['status_id' => 2]);
        return view('home');
    }

    public function denyOrder($id)
    {
        // Recusar um pedido
        Order::where('seller_id',$id)->update(['status_id' => 3]);
    }
}
