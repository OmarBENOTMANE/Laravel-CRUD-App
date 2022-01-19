<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Auth;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::latest()->paginate(5);
    
        return view('employees.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    function dashboard(){
       $opportunity= Opportunity::all();
       
        $data =['LoggedUserInfo'=>Employee::where('id','=', session('LoggedUser'))->first()];
        return view('employees.dashboard', compact('opportunity'),$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('employees.create');
    }
public function login()
    {
        return view('employees.login');
    }
    public function register()
    {
        return view('employees.register');
    }
    function check(Request $request){
        //Validate requests
        $request->validate([
             'email'=>'required|email',
             'password'=>'required|min:4|max:8'
        ]);

        $userInfo = Employee::where('email','=', $request->email)->first();

        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){
          $request->session()->put('LoggedUser', $userInfo->id);
               
                return redirect()->route('employees.dashboard');
            }else{
                return back()->with('fail','Incorrect password');
            }
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            
        ]);
    
if ($request->hasFile('cv')) {
$data = $request—>input('cv');
$file = $request—>file('cv')->getClientOriginalName();
$destination = base_path().'/public/uploads';
$request—>file('cv')->move($destination, $file);
$input = $request—>all();
$input['cv'] =$file;
//vérification
Employee::create($input);
return redirect()->route('employees.index')
 ->with('success','Employee created successfully.');
 }
else
{
        //Employee::create($request->all());
        //+ $employee->password = Hash::make($request->password)
        return redirect()->route('employees.index')
                        ->with('message','file est obligatoires');
    }
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employees.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'cv'=> 'required',
        ]);
    
        $employee->update($request->all());
    
        return redirect()->route('employees.index')
                        ->with('success','Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
    
        return redirect()->route('employees.index')
                        ->with('success','Employee deleted successfully');
    }
}
