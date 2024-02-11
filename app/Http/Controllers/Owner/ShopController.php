<?php
namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\HTTP\Requests\UploadImageRequest;
use App\Services\ImageService;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function($request, $next){
            $id = $request->route()->parameter('shop'); //shopのid取得
            if(!is_null($id)){
                $shopsOwnerId = Shop::findOrFail($id)->owner->id;
                $shopId = (int)$shopsOwnerId;
                //現在ログインしているユーザー(owner)のID
                $ownerId = Auth::id();
                if($shopId !== $ownerId){
                    abort(404);
                }
            }
            return $next($request);
        });
    }

    public function index() {
        $shops = Shop::where('owner_id', Auth::id())->get();
        // dd($shops);
        return view('owner.shops.index', compact('shops'));
    }

    public function edit($id) {
        $shop = Shop::findOrFail($id);
        return view('owner.shops.edit', compact('shop'));
        // dd(Shop::findOrFail($id));
    }

    public function update(UploadImageRequest $request, $id){
        $request->validate([
            'name' => 'required|string|max:50',
            'information' =>'required|string|max:1000',
            'is_selling' => 'required'
        ]);

        $imageFile = $request->image;
        if(!is_null($imageFile) && $imageFile->isValid()) {
            $fileNameToStore = ImageService::upload($imageFile, 'shops');
        }

        $shop = Shop::findOrFail($id);

        $shop->name = $request->name;
        $shop->information = $request->information;
        $shop->is_selling = $request->is_selling;
        if(!is_null($imageFile) && $imageFile->isValid()) {
            $shop->filename = $fileNameToStore;
        }
        $shop->save();


        return redirect()
        ->route('owner.shops.index')
        ->with([
            'message' => '店舗情報を更新しました',
            'status' => 'info'
        ]);
    }
}
