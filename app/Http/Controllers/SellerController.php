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
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function type_id_userProduct($id){
        if($id == 3){

        }

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
        return view ('seller.editproduct');
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

    public function pendingOrders()
    {
        $arrayIdProduct = array();
        $idseller = Seller::where('user_id', Auth::user()->id)->value('id');
        // Buscar todos os pedidos pendentes do tipo do vendedor logado
        // Pegando o ID de todos os produtos
        $all_idproduct_in_order = Order::select('product_id as id')->where('seller_id', $idseller)->where('status_id', 1)->get();
        foreach($all_idproduct_in_order as $id) {
            $arrayIdProduct[] = $id['id'];
        }
        $result = array_unique($arrayIdProduct);
        $all_order = Order::where('seller_id', $idseller)->where('status_id', 1)->get();
        //Não sei se isso vai funcionar...
        $all_products = Product::whereIn('id', $all_idproduct_in_order)->get();
        // Exibir a tela de listagem de pedidos pendentes
        return view('seller.listorder', compact('all_order','all_products'));
    }

    public function acceptOrder()
    {
        $id = Seller::where('user_id', Auth::user()->id)->value('id');
        // Aprovar um pedido
        Order::where('seller_id',$id)->update(['status_id' => 2]);
        return view('home');
    }

    public function denyOrder()
    {
        $id = Seller::where('user_id', Auth::user()->id)->value('id');
        // Recusar um pedido
        Order::where('seller_id',$id)->update(['status_id' => 3]);
    }
}
