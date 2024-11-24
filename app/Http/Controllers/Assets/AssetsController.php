<?php

namespace App\Http\Controllers\Assets;

use App\Http\Controllers\Controller;
use App\Models\Assets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AssetsController extends Controller
{
    public function showIndex()
    {
        $assetsList = Assets::all();

        return view('pages.assets.index', compact('assetsList'));
    }

    public function addAssets(Request $request)
    {
        try {
            Log::debug('Received request to add assets.', ['request_data' => $request->all()]);

            $assets = Assets::create([
                'computer_name' => $request->input('computer_name'),
                'type' => $request->input('type'),
                'serial_number' => $request->input('serial_number'),
                'manufacturer' => $request->input('manufacturer'),
                'model' => $request->input('model'),
                'os' => $request->input('os'),
                'description' => $request->input('description'),
            ]);

            Log::debug('Assets added successfully.', ['assets' => $assets]);

            return response()->json([
                'status' => 200,
                'message' => 'Assets added successfully!',
                'assets' => $assets,
            ]);
        } catch (\Exception $e) {
            Log::error('Assets adding error: ' . $e->getMessage(), ['exception' => $e]);

            return response()->json([
                'status' => 400,
                'message' => 'Failed to add assets.',
            ]);
        }
    }

    public function getAssetsDetails($assets_id)
    {
        $assetsDetails = Assets::find($assets_id);

        if (!$assetsDetails) {
            return response()->json(['message' => 'Assets not found'], 404);
        }

        return response()->json($assetsDetails);
    }

    public function editAssetsDetails(Request $request, $assets_id)
    {
        try {
            $assets = Assets::findOrFail($assets_id);
            $assets->computer_name = $request->edit_computer_name;
            $assets->type = $request->edit_type;
            $assets->serial_number = $request->edit_serial_number;
            $assets->manufacturer = $request->edit_manufacturer;
            $assets->model = $request->edit_model;
            $assets->os = $request->edit_os;
            $assets->description = $request->edit_description;

            $assets->save();

            return response()->json(['success' => 200, 'message' => 'Assets updated successfully!'], 200);
        } catch (\Exception $e) {
            Log::error('Error updating assets: ' . $e->getMessage());
            return response()->json(['success' => 400, 'message' => 'Failed to update assets.'], 400);
        }
    }

    public function deleteAssets($assets_id)
    {
        $assets = Assets::find($assets_id);

        if (!$assets) {
            return response()->json(['error' => 'Asset not found!'], 404);
        }

        try {
            $assets->delete();
            return response()->json(['success' => 'Asset deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete asset!'], 500);
        }
    }
}
