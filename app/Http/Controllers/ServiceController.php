<?php

namespace App\Http\Controllers;

use App\Http\Requests\Service\CreateRequest;
use App\Http\Requests\Service\EditRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function addService()
    {
        return view('services.add');
    }

    public function editService(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function delete(Service $service)
    {
        $service->delete();

        session()->flash('success', 'Service deleted successfully!');
        return redirect()->route('services.list');
    }

    public function add(CreateRequest $request)
    {
        $data = $request->validated();
        $service = new Service($data);

        $service->save();

        session()->flash('success', 'Service added successfully!');
        return redirect()->route('services.list', ['service' => $service->id]);
    }

    public function edit(Service $service, EditRequest $request)
    {
        $data = $request->validated();
        $service->fill($data);
        $service->save();

        session()->flash('success', 'Service edited successfully!');

        return redirect()->route('services.list', ['service' => $service->id]);
    }

    public function list(Request $request)
    {
        $services = Service::query()->paginate(5);

        return view('services.list', ['services' => $services]);
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }
}
