<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $this->middleware('auth');
        return view('admin_panel.home');
    }

    public function admin()
    {
        $categories = DB::table('categories')->get();
        return view('admin_panel.admin', ['categories' => $categories]);
    }

    public function admin_products()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->get();
        return view('admin_panel.admin_products', ['categories' => $categories,'stockists' => $stockists,'products' => $products]);
    }

    public function add_category(Request $request)
    {
        $category = $request->input('category_new');
        $sub_category = $request->input('sub_category');
        $description = $request->input('description');
        if(empty($category)){
            $category = $request->input('category');
        }
        if($category){
            DB::table('categories')->insert([
                ['category' => $category,'sub_category' => $sub_category,'description' => $description]
            ]);
        }
        return redirect('admin');
    }

    public function update_categories(Request $request)
    {
        $category_id = $request->input('category_id');
        $category = $request->input('category_new');
        $sub_category = $request->input('sub_category');
        $description = $request->input('description');
        if(empty($category)){
            $category = $request->input('category');
        }
        if($category){
            DB::table('categories')
                ->where('id', '=', $category_id)
                ->update([
                    'category' => $category,
                    'sub_category' => $sub_category,
                    'description' => $description
                ]);
        }
        return redirect('admin');
    }

    public function delete_category(Request $request)
    {
        $category_id = $request->input('category_id');
        if($category_id){
            DB::table('categories')->where('id', '=', $category_id)->delete();
        }
        return redirect('admin');
    }

    public function admin_stockists()
    {
        $stockists = DB::table('stockists')->get();
        return view('admin_panel.admin_stockists', ['stockists' => $stockists]);
    }

    public function category_data()
    {
        $categories = DB::table('categories')->get();
        $category_data = DB::table('category_data')->get();
        return view('admin_panel.category_data', ['categories' => $categories,'category_data' => $category_data]);
    }

    public function category_main(Request $request)
    {
        $category = $request->input('category');
        $file = $request->file('image');
        $description = $request->input('description');
        $img_name = uniqid().$file->getClientOriginalName();

        if($category && $img_name && $description){
            $destinationPath = "images/categories";
            $upload = $file->move($destinationPath,$img_name);
            if($upload){
                DB::table('category_data')->insert([
                    ['category' => $category,'img_name' => $img_name,'description' => $description]
                ]);
            }
        }
        return redirect("category_data");
    }

    public function update_category_data(Request $request)
    {
        $category_id = $request->input('category_id');
        $category = $request->input('category');
        $file = $request->file('image');
        $description = $request->input('description');

        $category_data = DB::table('category_data')->where('id', '=', $category_id)->get();
        $img_name1 = $category_data[0]->img_name;
        if($file){
            $img_name = uniqid().$file->getClientOriginalName();
            $destinationPath = "images/categories/";

            $myFile = $destinationPath.$img_name1;
            if (File::exists($myFile)) {
                unlink($myFile);
            }
            $file->move($destinationPath,$img_name);
        }else{
            $img_name = $img_name1;
        }

        DB::table('category_data')
            ->where('id', '=', $category_id)
            ->update([
                'category' => $category,
                'img_name' => $img_name,
                'description' => $description
            ]);

        return redirect("category_data");
    }

    public function delete_category_data(Request $request)
    {
        $category_id = $request->input('category_id');
        $category_data = DB::table('category_data')->where('id', '=', $category_id)->get();
        $img_name1 = $category_data[0]->img_name;
        $destinationPath = "images/categories/";

        $myFile = $destinationPath.$img_name1;
        if (File::exists($myFile)) {
            unlink($myFile);
        }

        DB::table('category_data')->where('id', '=', $category_id)->delete();

        return redirect("category_data");
    }

    public function sub_categories()
    {
        $categories = DB::table('categories')->get();
        $sub_categories = DB::table('sub_categories')->get();
        return view('admin_panel.sub_categories', ['categories' => $categories,'sub_categories' => $sub_categories]);
    }

    public function category_sub_main(Request $request)
    {
        $category = $request->input('category');
        $file = $request->file('image');
        $description = $request->input('description');
        $img_name = uniqid().$file->getClientOriginalName();

        $parent = explode("/",$category);
        if($category){
            $destinationPath = "images/categories/sub";
            $upload = $file->move($destinationPath,$img_name);
            if($upload){
                DB::table('sub_categories')->insert([
                    ['category' => $category,'img_name' => $img_name,'description' => $description,"parent" => $parent]
                ]);
            }
        }
        return redirect("sub_categories");
    }

    public function update_sub_category_data(Request $request)
    {
        $category_id = $request->input('category_id');
        $category = $request->input('category');
        $file = $request->file('image');
        $description = $request->input('description');

        $parent = explode("/",$category);
        $category_data = DB::table('sub_categories')->where('id', '=', $category_id)->get();
        $img_name1 = $category_data[0]->img_name;
        if($file){
            $img_name = uniqid().$file->getClientOriginalName();
            $destinationPath = "images/categories/sub/";

            $myFile = $destinationPath.$img_name1;
            if (File::exists($myFile)) {
                unlink($myFile);
            }
            $file->move($destinationPath,$img_name);
        }else{
            $img_name = $img_name1;
        }

        DB::table('sub_categories')
            ->where('id', '=', $category_id)
            ->update([
                'category' => $category,
                'img_name' => $img_name,
                'description' => $description,
                "parent" => $parent[0]
            ]);

        return redirect("sub_categories");
    }

    public function delete_sub_category_data(Request $request)
    {
        $category_id = $request->input('category_id');
        $category_data = DB::table('sub_categories')->where('id', '=', $category_id)->get();
        $img_name1 = $category_data[0]->img_name;
        $destinationPath = "images/categories/sub/";

        $myFile = $destinationPath.$img_name1;
        if (File::exists($myFile)) {
            unlink($myFile);
        }

        DB::table('sub_categories')->where('id', '=', $category_id)->delete();

        return redirect("sub_categories");
    }

    public function add_stockists(Request $request)
    {
        $name = $request->input('name');
        $link = $request->input('link');
        $file = $request->file('logo');
        $country = $request->input('country');
        $img_name = $file->getClientOriginalName();

        if($country == "Australia"){
            $path = "/australia";
        }elseif($country == "New Zealand"){
            $path = "/new_zealand";
        }

        if($name && $link && $img_name && $country){
            $destinationPath = "images/stockists$path";
            $upload = $file->move($destinationPath,$img_name);
            if($upload){
                DB::table('stockists')->insert([
                    ['name' => $name,'link' => $link,'img_name' => $img_name,'country' => $country]
                ]);
            }
        }
        return redirect('admin_stockists');
    }

    public function update_stockists(Request $request)
    {
        $stockists_id = $request->input('stockists_id');
        $name = $request->input('name');
        $link = $request->input('link');
        $file = $request->file('logo');
        $country = $request->input('country');

        if($country == "Australia"){
            $path = "/australia";
        }elseif($country == "New Zealand"){
            $path = "/new_zealand";
        }

        $stockists = DB::table('stockists')->where('id', '=', $stockists_id)->get();
        $country1 = $stockists[0]->country;
        $img_name1 = $stockists[0]->img_name;

        if($file){
            $img_name = $file->getClientOriginalName();

            if($country1 == "Australia"){
                $path1 = "/australia";
            }elseif($country1 == "New Zealand"){
                $path1 = "/new_zealand";
            }
            $destinationPath1 = "images/stockists$path1/";

            $myFile = $destinationPath1.$img_name1;
            if (File::exists($myFile)) {
                unlink($myFile);
            }

            $destinationPath = "images/stockists$path";
            $file->move($destinationPath,$img_name);

        }else{
            $img_name = $stockists[0]->img_name;
        }

        DB::table('stockists')
            ->where('id', $stockists_id)
            ->update([
                'name' => $name,
                'link' => $link,
                'img_name' => $img_name,
                'country' => $country
            ]);
        return redirect('admin_stockists');
    }

    public function delete_stockists(Request $request)
    {
        $stockists_id = $request->input('stockists_id');
        if($stockists_id){
            $stockists = DB::table('stockists')->where('id', '=', $stockists_id)->get();
            $country = $stockists[0]->country;
            $img_name = $stockists[0]->img_name;
            if($country == "Australia"){
                $path = "/australia";
            }elseif($country == "New Zealand"){
                $path = "/new_zealand";
            }
            $destinationPath = "images/stockists$path/";

            $myFile = $destinationPath.$img_name;
            if (File::exists($myFile)) {
                unlink($myFile);
            }
            DB::table('stockists')->where('id', '=', $stockists_id)->delete();
        }
        return redirect('admin_stockists');
    }

    public function add_products(Request $request)
    {
        $this->middleware('auth');
        $name = $request->input('name');
        $category = $request->input('category');
        $nib_type = $request->input('nib_type');
        $line_width = $request->input('line_width');
        $colors = $request->input('colors');
        $product_img = $request->file('product_img');
        $style_img = $request->file('style_img');
        $where_to_buy = $request->input('where_to_buy');
        $description = $request->input('description');

        $product_img_name = $product_img->getClientOriginalName();
        $style_img_name = $style_img->getClientOriginalName();

        if($name && $category && $nib_type && $line_width && $colors && $where_to_buy && $description && $product_img_name && $style_img_name){
            $product_img_path = "images/products/images_products";
            $style_img_path = "images/products/products_style";
            $upload_img_product = $product_img->move($product_img_path,$product_img_name);
            $upload_style_img = $style_img->move($style_img_path,$style_img_name);
            DB::table('products')->insert([
                [
                    'name' => $name,
                    'category' => $category,
                    'nib_type' => $nib_type,
                    'line_width' => $line_width,
                    'colors' => $colors,
                    'product_img' => $product_img_name,
                    'style_img' => $style_img_name,
                    'where_to_buy' => $where_to_buy,
                    'description' => $description
                ]
            ]);
        }
        return redirect('admin_products');
    }

    public function delete_products(Request $request)
    {
        $products_id = $request->input('products_id');
        if($products_id){
            $products = DB::table('products')->where('id', '=', $products_id)->get();
            $product_img = $products[0]->product_img;
            $style_img = $products[0]->style_img;
            $product_img_path = "images/products/images_products/";
            $style_img_path = "images/products/products_style/";

            $product_img_file = $product_img_path.$product_img;
            $style_img_file = $style_img_path.$style_img;
            if (File::exists($product_img_file)) {
                unlink($product_img_file);
            }
            if (File::exists($style_img_file)) {
                unlink($style_img_file);
            }

            DB::table('products')->where('id', '=', $products_id)->delete();
        }
        return redirect('admin_products');
    }


    public function update_products(Request $request)
    {
        $products_id = $request->input('products_id');

        $name = $request->input('name');
        $category = $request->input('category');
        $nib_type = $request->input('nib_type');
        $line_width = $request->input('line_width');
        $colors = $request->input('colors');
        $product_img = $request->file('product_img');
        $style_img = $request->file('style_img');
        $where_to_buy = $request->input('where_to_buy');
        $description = $request->input('description');

        $products = DB::table('products')->where('id', '=', $products_id)->get();
        $product_img_path = "images/products/images_products/";
        $style_img_path = "images/products/products_style/";

        if($product_img){
            $product_img_name = $product_img->getClientOriginalName();
            $product_img_file = $product_img_path.$product_img_name;
            if (File::exists($product_img_file)) {
                unlink($product_img_file);
            }
            $product_img->move($product_img_path,$product_img_name);
        }else{
            $product_img_name = $products[0]->product_img;
        }

        if($style_img){
            $style_img_name = $style_img->getClientOriginalName();
            $style_img_file = $style_img_path.$style_img_name;
            if (File::exists($style_img_file)) {
                unlink($style_img_file);
            }
            $style_img->move($style_img_path,$style_img_name);
        }else{
            $style_img_name = $products[0]->style_img;
        }

        DB::table('products')
            ->where('id', $products_id)
            ->update([
                'name' => $name,
                'category' => $category,
                'nib_type' => $nib_type,
                'line_width' => $line_width,
                'colors' => $colors,
                'product_img' => $product_img_name,
                'style_img' => $style_img_name,
                'where_to_buy' => $where_to_buy,
                'description' => $description
            ]);
        return redirect('admin_products');
    }

    public function admin_the_flow()
    {
        $the_flow = DB::table('the_flow')->get();
        $category_data = DB::table('category_data')->get();
        return view('admin_panel.admin_the_flow', ['the_flow' => $the_flow,'category_data' => $category_data]);
    }

    public function add_flow(Request $request)
    {
        $name = $request->input('name');
        $category = $request->input('category');
        $image = $request->file('image');
        $url = $request->input('url');
        $description = $request->input('description');
        $artist_uses = $request->input('artist_uses');


        if($url){
            $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
            $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
            if (preg_match($longUrlRegex, $url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }
            if (preg_match($shortUrlRegex, $url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }
            $iframe_src = 'https://www.youtube.com/embed/' . $youtube_id ;
        }else{
            $iframe_src = null;
        }

        if($category == "Galleries"){
            $path = "galleries";
        }elseif($category == "My Pen & I"){
            $path = "my_pen";
        }elseif($category == "Lessons"){
            $path = "lessons";
        }elseif($category == "Videos"){
            $path = "videos";
        }

        if($name && $category && $description && $image && $path){
            $flow_img_name = uniqid().$image->getClientOriginalName();
            $flow_img_path = "images/the_flow/$path";
            $upload = $image->move($flow_img_path,$flow_img_name);
            DB::table('the_flow')->insert([
                [
                    'name' => $name,
                    'image' => $flow_img_name,
                    'image_path' => $path,
                    'url' => $iframe_src,
                    'description' => $description,
                    'artist_uses' => $artist_uses,
                    'category' => $category
                ]
            ]);
        }

        return redirect('admin_the_flow');
    }

    public function update_flow(Request $request)
    {
        $flow_id = $request->input('flow_id');
        $name = $request->input('name');
        $category = $request->input('category');
        $image = $request->file('image');
        $url = $request->input('url');
        $description = $request->input('description');
        $artist_uses = $request->input('artist_uses');

        if($category == "Galleries"){
            $path = "galleries";
        }elseif($category == "My Pen & I"){
            $path = "my_pen";
        }elseif($category == "Lessons"){
            $path = "lessons";
        }elseif($category == "Videos"){
            $path = "videos";
        }
        $the_flow = DB::table('the_flow')->where('id', '=', $flow_id)->get();
        $flow_img_path = "images/the_flow/$path/";
        $flow_old_img_name = $the_flow[0]->image;

        if($image){
            $flow_img_name = uniqid().$image->getClientOriginalName();
            $flow_img_file = $flow_img_path.$flow_old_img_name;
            if (File::exists($flow_img_file)) {
                unlink($flow_img_file);
            }
            $image->move($flow_img_path,$flow_img_name);
        }else{
            $flow_img_name = $the_flow[0]->image;
        }

        if($url){
            $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
            $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
            if (preg_match($longUrlRegex, $url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }
            if (preg_match($shortUrlRegex, $url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }
            $iframe_src = 'https://www.youtube.com/embed/' . $youtube_id ;
        }else{
            $iframe_src = null;
        }

        DB::table('the_flow')
            ->where('id', $flow_id)
            ->update([
                'name' => $name,
                'image' => $flow_img_name,
                'image_path' => $path,
                'url' => $iframe_src,
                'description' => $description,
                'artist_uses' => $artist_uses,
                'category' => $category
            ]);

        return redirect('admin_the_flow');
    }

    public function delete_flow(Request $request)
    {
        $flow_id = $request->input('flow_id');

        if($flow_id){
            $the_flow = DB::table('the_flow')->where('id', '=', $flow_id)->get();
            $path = $the_flow[0]->image_path;
            $flow_img = $the_flow[0]->image;
            $flow_img_path = "images/the_flow/$path/";

            $flow_img_file = $flow_img_path.$flow_img;
            if (File::exists($flow_img_file)) {
                unlink($flow_img_file);
            }

            DB::table('the_flow')->where('id', '=', $flow_id)->delete();
        }
        return redirect('admin_the_flow');
    }

    public function flow_categories()
    {
        $flow_categories = DB::table('main_flow')->get();
        return view('admin_panel.flow_categories', ['flow_categories' => $flow_categories]);
    }

    public function add_main_flow(Request $request)
    {
        $name = $request->input('name');
        $category = $request->input('category');
        $image = $request->file('image');
        $description = $request->input('description');

        if($category == "Galleries"){
            $path = "galleries";
        }elseif($category == "My Pen & I"){
            $path = "my_pen";
        }elseif($category == "Lessons"){
            $path = "lessons";
        }elseif($category == "Videos"){
            $path = "videos";
        }

        if($name && $category && $description && $image && $path){
            $flow_img_name = uniqid().$image->getClientOriginalName();
            $flow_img_path = "images/the_flow/$path";
            $upload = $image->move($flow_img_path,$flow_img_name);
            DB::table('main_flow')->insert([
                [
                    'name' => $name,
                    'image' => $flow_img_name,
                    'image_path' => $path,
                    'description' => $description,
                    'category' => $category
                ]
            ]);
        }

        return redirect('flow_categories');

    }

    public function update_flow_category(Request $request)
    {
        $flow_id = $request->input('flow_category_id');

        $name = $request->input('name');
        $category = $request->input('category');
        $image = $request->file('image');
        $description = $request->input('description');

        if($category == "Galleries"){
            $path = "galleries";
        }elseif($category == "My Pen & I"){
            $path = "my_pen";
        }elseif($category == "Lessons"){
            $path = "lessons";
        }elseif($category == "Videos"){
            $path = "videos";
        }
        $the_flow = DB::table('main_flow')->where('id', '=', $flow_id)->get();
        $flow_img_path = "images/the_flow/$path/";
        $flow_old_img_name = $the_flow[0]->image;

        if($image){
            $flow_img_name = uniqid().$image->getClientOriginalName();
            $flow_img_file = $flow_img_path.$flow_old_img_name;
            if (File::exists($flow_img_file)) {
                unlink($flow_img_file);
            }
            $image->move($flow_img_path,$flow_img_name);
        }else{
            $flow_img_name = $the_flow[0]->image;
        }

        DB::table('main_flow')
            ->where('id', $flow_id)
            ->update([
                'name' => $name,
                'image' => $flow_img_name,
                'image_path' => $path,
                'description' => $description,
                'category' => $category
            ]);

        return redirect('flow_categories');
    }

    public function delete_flow_category(Request $request)
    {
        $flow_id = $request->input('flow_category_id');

        if($flow_id){
            $the_flow = DB::table('main_flow')->where('id', '=', $flow_id)->get();
            $path = $the_flow[0]->image_path;
            $flow_img = $the_flow[0]->image;
            $flow_img_path = "images/the_flow/$path/";

            $flow_img_file = $flow_img_path.$flow_img;
            if (File::exists($flow_img_file)) {
                unlink($flow_img_file);
            }

            DB::table('main_flow')->where('id', '=', $flow_id)->delete();
        }
        return redirect('flow_categories');
    }
}
