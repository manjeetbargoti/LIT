<?php

namespace App\Http\Controllers;

use Gate;
use App\City;
use App\State;
use App\Country;
use App\SocialInitiative;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SocialInitiativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // abort_if(Gate::denies('social_initiative_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $socialInitiative = SocialInitiative::where('initiative_name', 'LIKE', "%$keyword%")
                ->orWhere('initiative_description', 'LIKE', "%$keyword%")
                ->orWhere('beneficiaries', 'LIKE', "%$keyword%")
                ->orWhere('duration', 'LIKE', "%$keyword%")
                ->orWhere('budget', 'LIKE', "%$keyword%")
                ->orWhere('region', 'LIKE', "%$keyword%")
                ->orWhere('country', 'LIKE', "%$keyword%")
                ->orWhere('state', 'LIKE', "%$keyword%")
                ->orWhere('city', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $socialInitiative = SocialInitiative::latest()->paginate($perPage);
        }

        return view('admin.social_initiative.index', compact('socialInitiative'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // abort_if(Gate::denies('social_initiative_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $country = Country::orderBy('name', 'asc')->get();

        return view('admin.social_initiative.create', compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // abort_if(Gate::denies('social_initiative_add'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $requestData = $request->all();

        // dd($requestData);
        
        socialInitiative::create($requestData);

        $notification = array(
            'message' => 'Initiative added successfully!',
            'alert-type' => 'success',
        );

        return redirect('admin/social-impact/initiatives')->with($notification);
    }

}
