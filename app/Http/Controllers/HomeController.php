<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $categories = DB::table('categories')->get();
        $category_data = DB::table('category_data')->get();
        $galleries = DB::table('the_flow')->where('category', '=', "Galleries")->orderBy('id', 'desc')->get();
        $my_pen = DB::table('the_flow')->where('category', '=', "My Pen & I")->orderBy('id', 'desc')->get();
        return view('index',['categories' => $categories,'category_data' => $category_data,'galleries' => $galleries,'my_pen' => $my_pen]);
    }

    public function stockists()
    {
        $categories = DB::table('categories')->get();
        $stockists_australia = DB::table('stockists')->where('country', '=', "Australia")->get();
        $stockists_new_zealand = DB::table('stockists')->where('country', '=', "New Zealand")->get();
        return view('stockists', [
            'categories' => $categories,
            'stockists_australia' => $stockists_australia,
            'stockists_new_zealand' => $stockists_new_zealand
        ]);
    }

    public function products()
    {
        $categories = DB::table('categories')->get();
        $category_data = DB::table('category_data')->get();
        return view('products',['categories' => $categories,'category_data' => $category_data]);
    }

    public function products_list()
    {
        $categories = DB::table('categories')->get();
        return view('products_list',['categories' => $categories]);
    }

    public function the_flow()
    {
        $pagination_count = 3;
        $categories = DB::table('categories')->get();
        $main_flow = DB::table('main_flow')->get();
        $the_flow = DB::table('the_flow')->orderBy('id', 'desc')->get();
        return view('the_flow',['categories' => $categories,'main_flow' => $main_flow,'the_flow' => $the_flow,'pagination_count' => $pagination_count]);
    }

    public function galleries()
    {
        $pagination_count = 3;
        $categories = DB::table('categories')->get();
        $main_flow = DB::table('main_flow')->where('category', '=', "Galleries")->get();
        $the_flow = DB::table('the_flow')->where('category', '=', "Galleries")->orderBy('id', 'desc')->get();
        return view('the_flow.galleries',['categories' => $categories,'main_flow' => $main_flow,'the_flow' => $the_flow,'pagination_count' => $pagination_count]);
    }

    public function my_pen()
    {
        $pagination_count = 3;
        $categories = DB::table('categories')->get();
        $main_flow = DB::table('main_flow')->where('category', '=', "My Pen & I")->get();
        $the_flow = DB::table('the_flow')->where('category', '=', "My Pen & I")->orderBy('id', 'desc')->get();
        return view('the_flow.my_pen',['categories' => $categories,'main_flow' => $main_flow,'the_flow' => $the_flow,'pagination_count' => $pagination_count]);
    }

    public function lessons()
    {
        $pagination_count = 3;
        $categories = DB::table('categories')->get();
        $main_flow = DB::table('main_flow')->where('category', '=', "Lessons")->get();
        $the_flow = DB::table('the_flow')->where('category', '=', "Lessons")->orderBy('id', 'desc')->get();
        return view('the_flow.lessons',['categories' => $categories,'main_flow' => $main_flow,'the_flow' => $the_flow,'pagination_count' => $pagination_count]);
    }

    public function videos()
    {
        $pagination_count = 3;
        $categories = DB::table('categories')->get();
        $main_flow = DB::table('main_flow')->where('category', '=', "Videos")->get();
        $the_flow = DB::table('the_flow')->where('category', '=', "Videos")->orderBy('id', 'desc')->get();
        return view('the_flow.videos',['categories' => $categories,'main_flow' => $main_flow,'the_flow' => $the_flow,'pagination_count' => $pagination_count]);
    }

    public function single_flow(Request $request)
    {
        $id = $request->input('id');
        $the_flow = DB::table('the_flow')->where('id', '=', "$id")->get();
        $all_flow = DB::table('the_flow')->get();
        $categories = DB::table('categories')->get();
        $category_data = DB::table('category_data')->get();
        return view('the_flow.single_flow',['categories' => $categories,'the_flow' => $the_flow,'category_data' => $category_data,'all_flow' => $all_flow]);
    }

    public function about_us()
    {
        $categories = DB::table('categories')->get();
        return view('about_us',['categories' => $categories]);
    }

    public function about()
    {
        $categories = DB::table('categories')->get();
        return view('about.about',['categories' => $categories]);
    }

    public function business_solutions()
    {
        $categories = DB::table('categories')->get();
        return view('about.business_solutions',['categories' => $categories]);
    }

    public function vip()
    {
        $categories = DB::table('categories')->get();
        return view('vip',['categories' => $categories]);
    }

    public function contact()
    {
        $categories = DB::table('categories')->get();
        return view('contact',['categories' => $categories]);
    }

    public function permanent_markers()
    {
        $categories = DB::table('categories')->get();
        $category_description = DB::table('categories')->where('category', '=', "PERMANENT MARKERS")->whereNull('sub_category')->get();
        $sub_categories = DB::table('sub_categories')->where('parent', '=', "PERMANENT MARKERS")->get();
        return view('products.permanent_markers',['categories' => $categories,'category_description' => $category_description,'sub_categories' => $sub_categories]);
    }

    public function highlighters()
    {
        $categories = DB::table('categories')->get();
        $category_description = DB::table('categories')->where('category', '=', "HIGHLIGHTERS")->whereNull('sub_category')->get();
        $sub_categories = DB::table('sub_categories')->where('parent', '=', "HIGHLIGHTERS")->get();
        return view('products.highlighters',['categories' => $categories,'category_description' => $category_description,'sub_categories' => $sub_categories]);
    }

    public function correction_tape()
    {
        $categories = DB::table('categories')->get();
        $category_description = DB::table('categories')->where('category', '=', "CORRECTION TAPE & FLUID")->whereNull('sub_category')->get();
        $sub_categories = DB::table('sub_categories')->where('parent', '=', "CORRECTION TAPE & FLUID")->get();
        return view('products.correction_tape',['categories' => $categories,'category_description' => $category_description,'sub_categories' => $sub_categories]);
    }

    public function whiteboard_markers()
    {
        $categories = DB::table('categories')->get();
        $category_description = DB::table('categories')->where('category', '=', "WHITEBOARD MARKERS")->whereNull('sub_category')->get();
        $sub_categories = DB::table('sub_categories')->where('parent', '=', "WHITEBOARD MARKERS")->get();
        return view('products.whiteboard_markers',['categories' => $categories,'category_description' => $category_description,'sub_categories' => $sub_categories]);
    }

    public function general_pens()
    {
        $categories = DB::table('categories')->get();
        $category_description = DB::table('categories')->where('category', '=', "General Pens")->whereNull('sub_category')->get();
        $sub_categories = DB::table('sub_categories')->where('parent', '=', "General Pens")->get();
        return view('products.general_pens',['categories' => $categories,'category_description' => $category_description,'sub_categories' => $sub_categories]);
    }

    public function fineliners()
    {
        $categories = DB::table('categories')->get();
        $category_description = DB::table('categories')->where('category', '=', "FINELINERS")->whereNull('sub_category')->get();
        $sub_categories = DB::table('sub_categories')->where('parent', '=', "FINELINERS")->get();
        return view('products.fineliners',['categories' => $categories,'category_description' => $category_description,'sub_categories' => $sub_categories]);
    }

    public function specialty_markers()
    {
        $categories = DB::table('categories')->get();
        $category_description = DB::table('categories')->where('category', '=', "SPECIALTY MARKERS")->whereNull('sub_category')->get();
        $sub_categories = DB::table('sub_categories')->where('parent', '=', "SPECIALTY MARKERS")->get();
        return view('products.specialty_markers',['categories' => $categories,'category_description' => $category_description,'sub_categories' => $sub_categories]);
    }

    public function artline_supreme()
    {
        $categories = DB::table('categories')->get();
        $category_description = DB::table('categories')->where('category', '=', "Artline Supreme")->whereNull('sub_category')->get();
        $sub_categories = DB::table('sub_categories')->where('parent', '=', "Artline Supreme")->get();
        return view('products.artline_supreme',['categories' => $categories,'category_description' => $category_description,'sub_categories' => $sub_categories]);
    }

    public function artline_signature()
    {
        $categories = DB::table('categories')->get();
        $category_description = DB::table('categories')->where('category', '=', "ARTLINE SIGNATURE")->whereNull('sub_category')->get();
        $sub_categories = DB::table('sub_categories')->where('parent', '=', "ARTLINE SIGNATURE")->get();
        return view('products.artline_signature',['categories' => $categories,'category_description' => $category_description,'sub_categories' => $sub_categories]);
    }

    public function permanent_markers_general_purpose()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "PERMANENT MARKERS/General Purpose")->get();
        return view('products.sub.permanent_markers_general_purpose',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function permanent_markers_various()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "PERMANENT MARKERS/Various")->get();
        return view('products.sub.permanent_markers_various',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function permanent_markers_eco()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "PERMANENT MARKERS/Eco")->get();
        return view('products.sub.permanent_markers_eco',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function highlighters_highlighters()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "HIGHLIGHTERS/HIGHLIGHTERS")->get();
        return view('products.sub.highlighters_highlighters',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function correction_tape_correction_tape()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "CORRECTION TAPE & FLUID/CORRECTION TAPE & FLUID")->get();
        return view('products.sub.correction_tape_correction_tape',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function whiteboard_markers_general_purpose()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "WHITEBOARD MARKERS/General Purpose")->get();
        return view('products.sub.whiteboard_markers_general_purpose',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function whiteboard_markers_specialty()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "WHITEBOARD MARKERS/Specialty")->get();
        return view('products.sub.whiteboard_markers_specialty',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function whiteboard_markers_eco()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "WHITEBOARD MARKERS/Eco")->get();
        return view('products.sub.whiteboard_markers_eco',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function general_pens_ballpoint_pens()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "General Pens/Ballpoint Pens")->get();
        return view('products.sub.general_pens_ballpoint_pens',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function general_pens_gel_pens()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "General Pens/Gel Pens")->get();
        return view('products.sub.general_pens_gel_pens',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function general_pens_rollerball_pens()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "General Pens/Rollerball Pens")->get();
        return view('products.sub.general_pens_rollerball_pens',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function general_pens_calligraphy_pens()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "General Pens/Calligraphy Pens")->get();
        return view('products.sub.general_pens_calligraphy_pens',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function general_pens_tech_drawing()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "General Pens/Tech Drawing Pens")->get();
        return view('products.sub.general_pens_tech_drawing',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function fineliners_fineline_pens()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "FINELINERS/Fineline Pens")->get();
        return view('products.sub.fineliners_fineline_pens',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function specialty_markers_various_specialty()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "SPECIALTY MARKERS/Various Specialty Markers")->get();
        return view('products.sub.specialty_markers_various_specialty',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function specialty_markers_industrial_markers()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "SPECIALTY MARKERS/Industrial Markers")->get();
        return view('products.sub.specialty_markers_industrial_markers',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function specialty_markers_signage()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "SPECIALTY MARKERS/Signage & Poster Markers")->get();
        return view('products.sub.specialty_markers_signage',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function specialty_markers_metallic_markers()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "SPECIALTY MARKERS/Metallic Markers")->get();
        return view('products.sub.specialty_markers_metallic_markers',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function specialty_markers_paint_markers()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "SPECIALTY MARKERS/Paint Markers")->get();
        return view('products.sub.specialty_markers_paint_markers',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function specialty_markers_flipchart_markers()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "SPECIALTY MARKERS/Flipchart Markers")->get();
        return view('products.sub.specialty_markers_flipchart_markers',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function specialty_markers_colouring_markers()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "SPECIALTY MARKERS/Colouring Markers For Kids")->get();
        return view('products.sub.specialty_markers_colouring_markers',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function artline_supreme_supreme_markers()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "Artline Supreme/Supreme Markers")->get();
        return view('products.sub.artline_supreme_supreme_markers',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function artline_supreme_supreme_pens()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "Artline Supreme/Supreme Pens")->get();
        return view('products.sub.artline_supreme_supreme_pens',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function artline_signature_rollerball_pens()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "ARTLINE SIGNATURE/Rollerball Pens")->get();
        return view('products.sub.artline_signature_rollerball_pens',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }

    public function artline_signature_fineline_pens()
    {
        $categories = DB::table('categories')->get();
        $stockists = DB::table('stockists')->get();
        $products = DB::table('products')->where('category', '=', "ARTLINE SIGNATURE/Fineline Pens")->get();
        return view('products.sub.artline_signature_fineline_pens',['categories' => $categories,'products' => $products,'stockists' => $stockists]);
    }
}
