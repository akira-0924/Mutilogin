<?php
namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Shop;
use InterventionImage as Image;;

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

    public function update(Request $request, $id){
        $imageFile = $request->image;
        if(!is_null($imageFile) && $imageFile->isValid()) {
            $resizedImage = Image::make($imageFile)->resize(1920, 1080)->encode();
            dd($$resizedImage);
            $fileName = uniqid(rand().'_');
            $extension = $imageFile->extension(); $fileNameToStore = $fileName. ‘.’ . $extension;
            Storage::put('public/shops/' . $fileNameToStore, $resizedImage );
            // Storage::putFile('public/shops', $imageFile);
        }

        return redirect()->route('owner.shops.index');
    }
}
