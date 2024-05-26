<?php
namespace App\Http\Controllers;
use App\Models\Device;
use Illuminate\Http\Request;
class DeviceController extends Controller
{

public function index()
{
return Device::all();
}

public function store(Request $request)
{
    $device = new Device;
    $device ->devices_name = $request ->devices_name;
    $device ->value = $request ->value;
    $device ->status = $request ->status;
    $device ->useraction = $request ->useraction;
    $device ->save();
    return response() ->json([
    "message" => "Device telah ditambahkan."
    ], 201);
}

public function show(string $id)
{
    return Device::find($id);
}

public function update(Request $request, string $id)
{
    if (Device ::where('id', $id) >exists()) {
        $device = Device::find($id);
        $device ->devices_name = is_null($request ->devices_name) ? $device ->devices_name : $request ->devices_name;
        $device ->value = is_null($request ->value) ?  $device ->value : $request ->value;
        $device ->status = is_null($request ->status) ? $device ->status : $request ->status;
        $device ->useraction = is_null($request ->useraction) ?
        $device ->useraction : $request ->useraction;
        $device ->save();
        return response() ->json([
        "message" => "Device telah diupdate."
        ], 201);

    } else {
        return response() >json([
        "message" > "Device tidak ditemukan."
        ], 404);
        }
    }
public function destroy(string $id)
    {
    if (Device::where('id', $id) ->exists()) {
        $device = Device::find($id);
        $device ->delete();
        return response() >json([
        "message" => "Device telah dihapus."
        ], 201);
    } else {
        return response() >json([
        "message" => "Device tidak ditemukan."
        ], 404);
        }
    }
}