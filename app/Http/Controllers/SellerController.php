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
    
    public function products()
    {
        $productype = Seller::where('user_id', Auth::user()->id)->value('product_type_id');
        $listproducts = Product::where("type_id", $productype)->get();
        return view('seller.listproduct')->with(compact('listproducts'));
    }

    public function editProduct()
    {
        //Chamar a view de produtos
        return view ('seller.editproduct');
    }

    public function updateProduct(Request $r)
    {
        $id = $r["id"];

        // Atualizar dados de um produto
        Product::where('id', $id)->update(['name' => $r['name']]);
        Product::where('id', $id)->update(['value' => $r['value']]);
        Product::where('id', $id)->update(['description' => $r['description']]);
        $file = $r->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('images', $filename);
        Product::where('id', $id)->update(['image' => $filename]);
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
        return view('seller.productregister');
    }

    public function storeProduct(Request $r)
    {
        // Receber dados do form de cadastro de produtos
        $product = new Product();
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
        $idseller = Seller::where('user_id', Auth::user()->id)->value('id');
        $orders = Order::where('seller_id', $idseller)->where('status_id', 1)->get();
        return view('seller.pendingorders', compact('orders'));
    }

    public function historic(){
        $seller = Seller::where('user_id', Auth::user()->id)->first();
        $approvedOrders = Order::where([['seller_id', '=' , $seller->id],])->get();
        //dd($approvedOrders[0]->product);
        return view('seller.historic')->with(compact('approvedOrders'));
    }

    public function acceptOrder($id)
    {
        $selectedOrder = Order::find($id);
        $idOrderStatus = $selectedOrder->id_order_status;
        $orderstatus = OrderStatus::find($idOrderStatus);
        $selectedOrder->update(['status_id' => OrderStatus::$ACCEPTED]);
        return redirect()->action('SellerController@pendingOrders');
    }

    public function cancelOrder($id)
    {
        $selectedOrder = Order::find($id);
        $selectedOrder->update(['status_id' => OrderStatus::$CANCELED]);
        return redirect()->action('SellerController@pendingOrders');
    }
}
