<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use App\Models\Student;
use App\Models\Promotion;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Response;

class SearchController extends Controller
{
    //
    public function searchPromo(Request $request){
        if($request->ajax()){
            
            $query = $request->key;
            // dd($query);
                $output = ' ';
                $promotions = Promotion::where('name', 'like', '%' . $query . '%')->get();
                if($promotions){
                    foreach($promotions as $promotion){
                        $output.='<tr>'.
                        '<td>'.$promotion->name.'</td>'.
                        '<td>'.Student::where('students.promotion_id',$promotion->id)->count().'</td>'.
                        '<td> <a href="' .route('promotion.edit',$promotion->token ).'" class="edit"><i class="material-icons">&#xE254;</i></a>
                         <form method="post" action="'.route('promotion.destroy',$promotion->id ).'">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="'. csrf_token() .'">
                            <button type="submit" class="delete"><i class="material-icons">&#xE872;</i></button>
                        </form></td>'.
                        '</tr>';
                    }
                    return Response($output);
                }
            
            
        }
    }

    public function searchStudent(Request $request){
        if($request->ajax()){
            $key = $request->key;
            $token = $request->token;
                $output = ' ';
                $students = Student::where('promotion_id', $token)
                    ->whereRaw("concat(name, ' ', lastName) like '%".$key."%'")->get();
                // ->where(function($query)use ($key){
                //     $query->whereRaw(('name', 'lastName'), 'like', '%' . $key . '%')
                //         ->orWhere('lastName', 'like', '%' . $key . '%');
                //     })->get();
                if($students){
                    foreach($students as $student){
                        $output.='<div class="col-xl-3 col-sm-6" id="div">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a class="text-muted dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"><i class="bx bx-dots-horizontal-rounded"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="'.route('student.edit', $student->id).'"> Edit</a>
                                        <span class="dropdown-item"><form method="post" action="'.route('student.destroy',$student->id).'">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="_token" value="'. csrf_token() .'">
                                                <button type="submit" class="delete" style="background: unset;border: unset;padding: 0;"> Delete</button>
                                            </form>
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="img"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="avatar-md rounded-circle img-thumbnail" /></div>
                                    <div class="flex-1 ms-3">
                                    </div>
                                </div>
                                <div class="mt-3 pt-1 info">
                                    <p class="text-muted mb-0"><i class="fa-regular fa-user"></i> Nom: '.$student->name.'</p>
                                    <p class="text-muted mb-0 mt-2"><i class="fa-regular fa-user"></i> Prenom: '.$student->lastName.'</p>
                                    <p class="text-muted mb-0 mt-2"><i class="fa-regular fa-envelope"></i> '.$student->email.'</p>
                                </div>
                                <div class="d-flex gap-2 pt-4">
                                    <button type="button" class="btn btn-soft-primary btn-sm w-50"><i class="bx bx-user me-1"></i> Profile</button>
                                    <button type="button" class="btn btn-primary btn-sm w-50 contact"><i class="bx bx-message-square-dots me-1"></i> Contact</button>
                                </div>
                            </div>
                        </div>
                    </div>';
                    }
                    return Response($output);
                }
            
            
        }
    }



    public function searchBrief(Request $request){
        if($request->ajax()){
            
            $query = $request->key;
                $output = ' ';
                $briefs = Brief::where('name', 'like', '%' . $query . '%')->get();
                if($briefs){
                    foreach($briefs as $brief){
                        $output.='<tr>'.
                        '<td>'.$brief->name.'</td>'.
                        '<td>'.$brief->livraisonDate.'</td>'.
                        '<td>'.$brief->recuperationDate.'</td>'.
                        '<td> <a href="' .route('task.create', $brief->token).'">+ tâche</a></td>'.
                        '<td> <a href="' .route('assignement.show', $brief->token).'">affecter</a></td>'.
                        '<td> <a href="' .route('brief.edit',$brief->token ).'" class="edit"><i class="material-icons">&#xE254;</i></a>
                         <form method="post" action="'.route('brief.destroy',$brief->id ).'">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="'. csrf_token() .'">
                            <button type="submit" class="delete"><i class="material-icons">&#xE872;</i></button>
                        </form></td>'.
                        '</tr>';
                    }
                    return Response($output);
                }
            
            
        }
    }
}
