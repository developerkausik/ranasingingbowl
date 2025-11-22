<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\URL;

class ProductsController extends Controller
{
    public function index()
    {

        /* $result = Product::with('category')->orderBy('id', 'desc')->get();
        $result->map(function ($item) {
            $item->category_name = $item->category ? $item->category->title : '';
            return $item;
        }); */
        $searchValue = session('search_value', '');
        return view('admin/products/product/list', compact('searchValue'));
    }

    public function deleteSearch(Request $request)
    {
        // Clear the search value from the session
        $request->session()->forget('search_value');

        // Return a success response
        return response()->json(['message' => 'Search value deleted successfully.']);
    }

    public function productList(Request $request)
    {
        $params = $request->all();
        if (!empty($params['search']['value'])) {
            // Store search value in session
            $request->session()->put('search_value', $params['search']['value']);
        }else{
            $params['search']['value'] = $request->session()->get('search_value');
        }

        //$params = $request;

        //ptint_r($params);
        $start = $params['start'];
        $limit = $params['length'];
        /* PAGINATION DATA */
        $query = Product::with('category');
        if (!empty($params['search']['value'])) {
            $value = $params['search']['value'];
            $query->where('title', 'like', '%' . $value . '%');
            $query->orWhereHas('category', function ($q) use ($value) {
                $q->where('title', 'like', '%' . $value . '%');
            });
        }

        $query->offset($start);
        $query->limit($limit);
        $query->orderBy('id', 'desc');
        $item = $query->get();
        $item->map(function ($singleItem) {
            $singleItem->category_name = $singleItem->category ? $singleItem->category->title : '';
            return $singleItem;
        });

        /* TOTAL ROW COUNT */
        $queryCount = Product::with('category');
        if (!empty($params['search']['value'])) {
            $value = $params['search']['value'];
            $queryCount->where('title', 'like', '%' . $value . '%');
            $queryCount->orWhereHas('category', function ($q) use ($value) {
                $q->where('title', 'like', '%' . $value . '%');
            });
        }
        $itemCount = $queryCount->count();

        $returnData = [];
        $i = 1 + $start;
        if (isset($item) && count($item) > 0) {
            foreach ($item as $key => $val) {
                $returnData[$key] = array(
                    $i,
                    $val->created_at->format('d-m-Y \<\/\b\r\> H:i:s'),
                    $val->updated_at->format('d-m-Y \<\/\b\r\> H:i:s'),
                    $val->category_name,
                    $val->title,
                    '<img src="' . URL::asset($val->image) . '" alt="Product Image">',
                    '<input type="number" class="form-control form-control-sm sortOrder" data-id="' . $val->id . '" name="sort_order[' . $val->id . ']" value="' . $val->sort_order . '" min="0" style="width: 60px;">',
                    ($val->status == 1) ? '<label class="badge badge-success">Active</label>' : '<label class="badge badge-danger">Inactive</label>',
                    '<button class="btn-sm btn-outline-dark dropdown-toggle" type="button"
                        id="dropdownMenuSizeButton2" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Action</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2"> <a
                            href="' . route('adminProductImage', Crypt::encryptString($val->id)) . '"
                            class="btn btn-outline text-primary"> <i class="icon-image"></i>
                            Upload Image </a>
                        <div class="dropdown-divider"></div> <a
                            href="' . route('adminProductVariant', Crypt::encryptString($val->id)) . '"
                            class="btn btn-outline text-success"> <i
                                class="icon-upload"></i> Upload Variants </a>
                        <div class="dropdown-divider"></div> <a
                            href="' . route('adminProductSound', Crypt::encryptString($val->id)) . '"
                            class="btn btn-outline text-warning"> <i class="icon-play"></i>
                            Upload Sound </a>
                        <div class="dropdown-divider"></div> <a
                            href="' . route('adminProductUpdate', Crypt::encryptString($val->id)) . '"
                            class="btn btn-outline text-info"> <i class="icon-pencil"></i>
                            Edit </a>
                        <div class="dropdown-divider"></div> <a href="JavaScript:void(0)"
                            class="btn btn-outline-delete text-danger delete"
                            data-id="' . Crypt::encryptString($val->id) . '"> <i
                                class="icon-trash"></i> Delete </a>
                    </div>'
                );
                $i++;
            }
        }

        $json_data = array(
            "draw"            => intval($params['draw']),
            "recordsTotal"    => intval(count($item)),
            "recordsFiltered" => intval($itemCount),
            "data"            => $returnData   // total data array
        );

        echo json_encode($json_data);  // send data as json format
    }

    public function sortOrderSave(Request $request)
    {
        $sortOrder = $request->sort_order;
        $id = $request->id;
        $product = Product::findOrFail($id);
        $product->sort_order = $sortOrder;
        $product->save();
        $response['message'] = 'Sort order successfully updated.';
        return response()->json($response, 200);
    }

    public function create()
    {
        $category = ProductCategory::all();
        return view('admin/products/product/create', compact('category'));
    }

    public function update($id)
    {
        $decryptId = Crypt::decryptString($id);

        $result = Product::findOrFail($decryptId);
        $category = ProductCategory::all();

        return view('admin/products/product/create', compact('result', 'category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        if (isset($request->id) && $request->id > 0) {
            $product = Product::findOrFail($request->id);
        } else {
            $product = new Product();
        }

        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->sort_order = $request->sort_order ?? 0;
        $product->slug = createProductSlug($request->title, $request->category_id);

        $file = $request->file('image');
        if (isset($file) && $file != '') {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/uploads/products/products/', $fileName);
            $product->image = 'uploads/products/products/' . $fileName;
        }

        $product->save();

        $response['message'] = 'Record data successfully saved.';
        return response()->json($response, 200);
    }

    public function delete(Request $request)
    {
        $decryptId = Crypt::decryptString($request->id);

        $result = Product::where('id', $decryptId)->first();

        if (isset($result->id) && $result->id > 0) {
            $result->delete();
            $response['message'] = 'result data successfully deleted.';
            return response()->json($response, 200);
        } else {
            $response['message'] = 'result data not found.';
            return response()->json($response, 401);
        }
    }
}
