<?php

namespace App\Http\Controllers;

use App\WebSite;
use Illuminate\Http\Request;

class WebSiteController extends Controller
{
    

    protected $model;
    protected $file ;
    protected $item ;
    protected $route;

	public function __construct()
    {
        $this->model='App\WebSite';
        $this->file='website';
        $this->route ='websites';
        $this->item='website';

    }
    public function index()
    {


        if (\Request::ajax())
        {
            $items=$this->model::All();
            return $items;
        }
        return view($this->file.'.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ($this->file.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->model::Create($request->all());

        if (!\Request::ajax())
            return $this->redirecToPage('index');


    }

    public function redirecToPage($pageName='show',$id=0)
    {

        if($pageName == 'index')
            return redirect()->route('index');


        return redirect()->route($this->route.'.'.$pageName,['id'=>$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->item;

        $$item=$this->model::find($id);

        return view ($this->file.'.edit',compact($item));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item=$this->model::find($id);
        $item->Update($request->all());


        if (!\Request::ajax())
            return $this->redirecToPage('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model::find($id)->delete();
        
        if (!\Request::ajax())
            return redirect()->route($this->file.'.index');

    }
}
