<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Assignment;
use App\Component;
use DB;
use App\Section;
use App\User;
use Carbon\Carbon;


class AssignmentController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
       $assignments = Assignment::with('site','section','course','components')->get();

       //dd($assignments);

       return view('assignment.index')->with('assignments', $assignments);
    }

    /**
     * Show the form for creating a new assignment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Section $section)
    {

       return view('partials.teacher.assignment.create')->with('section', $section);
    }

    /**
     * Save a newly created Assignment to the Database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Section $section)
    {

        //validate form
        $this->validate($request, [
        
        'title' => 'required',
        'date_due' => 'nullable|date_format:"m/d/y"'
        ]);

        //set and persist assignment information to database

        $assignment = New Assignment;
        $assignment->title = $request->input('title');
        $assignment->description = $request->input('description');
        $assignment->section_id = $section->id;
        $assignment->site_id = $section->site_id;
        $assignment->course_id = NULL;
        $assignment->is_active = true;
        $assignment->save();

        $component = New Component;
        
        $component->title = 'Final';
        
        $component->section_id = $section->id;
        $component->assignment_id = $assignment->id;
           
            //check if due date is set for simple component 

                if (is_null($request->input('date_due'))){

                    $component->date_due = NULL;
                    $component->save();

                    }
            
                else {

                     $date_due = Carbon::createFromFormat('m/d/y', $request->input('date_due'));

                     //set component time due
                     $date_due->hour = 23;
                     $date_due->minute = 59;
                     $date_due->second = 59;

                     //persisit component
                     $component->date_due = $date_due;
                     $component->save();

                     };
        
        flash('Your assignment was created successfully!', 'success');

        return redirect()->action( 'SectionController@show', $section->id);

        // return view('/home');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section, Assignment $assignment)
    {
        $sectionAssignments = Assignment::where('section_id', $section->id)->get();

        //dd($sectionAssignments);

        // $assignment = Assignment::with(['components' => function ($query) use ($assignment) {
        //               $query->where('assignment_id', $assignment->id)->orderBy('date_due');
        //               }])->findOrfail($assignment->id);
        
        //dd($assignment);
        //dd($section);
        
        // $checklist = DB::table('components')->leftjoin('artifacts', function ($join) use ($assignment) {

        //                 $join->on('components.id', '=', 'artifacts.component_id');            
                        
        //                 })

        //                 ->where('components.assignment_id', '=', $assignment->id)
        //                 ->orderBy('components.date_due', 'ASC')
        //                 ->select(
        //                  'artifacts.id AS artifactID',
        //                  'components.assignment_id AS assignmentID',
        //                  'components.id AS componentID', 
        //                  'components.title AS componentTitle',
        //                  'components.date_due AS componentDateDue',
        //                  'artifacts.artifact_thumb AS artifactThumb',
        //                  'artifacts.artifact_path AS artifactPath',
        //                  'artifacts.created_at AS artifactCreatedAt')->get();                         

        //                 dd($checklist);

        return view('partials.teacher.assignment.show')->with(['sectionAssignments' => $sectionAssignments,'activeAssignment' => $assignment, 'activeSection' => $section ]);
                                 //$assignment
                                 // 'artifacts' => $artifacts,
                                 //'students' => $students,
                                 //'checklist' => $checklist
                                 //'student_checklist' => $student_checklist
        }

    



    /**
     * Display the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function showStudent(Section $section, Assignment $assignment)
    {

        $checklist = DB::table('components')

            ->leftjoin('artifacts', function ($join) use ($assignment) {

            $join->on('components.id', '=', 'artifacts.component_id')
            ->where('artifacts.user_id', '=', Auth::User()->id); 
            // This eliminates matches, not records
            })

            ->where('components.assignment_id', '=', $assignment->id)

            ->orderBy('components.date_due', 'ASC')
            ->select(
                      'artifacts.id AS artifactID',
                      'components.section_id AS sectionID',
                      'components.assignment_id AS assignmentID',
                      'components.id AS componentID', 
                      'components.title AS componentTitle',
                      'components.date_due AS componentDateDue',
                      'artifacts.artifact_thumb AS artifactThumb',
                      'artifacts.artifact_path AS artifactPath',
                      'artifacts.created_at AS artifactCreatedAt')->get();                          
                       
                       //dd($checklist);

        return view('partials.student.assignment.show')->with(['currentSection' => $section,'currentAssignment' => $assignment, 'checklist' => $checklist]);
        }

     /**
     * Show the form for creating a new assignment.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Section $section, Assignment $assignment )
    {

        //dd($assignment);

       return view('partials.teacher.assignment.edit')->with(['section' => $section, 'assignment' => $assignment]);
    }

    /**
     *  Update an assignment.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section, Assignment $assignment )
    {

        //dd($request->input('active'));

        //validate form
        $this->validate($request, [
        
        'title' => 'required',
        'date_due' => 'nullable|date_format:"m-d-y"',
        'active' => 'required',
        'description' => 'required'
        ]);

        //set and persist assignment information to database

        $assignment->title = $request->input('title');
        $assignment->description = $request->input('description');
        $assignment->section_id = $section->id;
        $assignment->site_id = $section->site_id;
        $assignment->course_id = null;
        
        //Form has been submitted

        //Radio button has been set to "true"
        if ($request->input('active') == 'true') $assignment->is_active = TRUE;

        //Radio button has been set to "false" or a value was not selected
        else $assignment->is_active = FALSE;

        $assignment->save();

        flash('Your assignment was updated successfully!', 'success');


       return view('partials.teacher.assignment.show')->with(['activeSection' => $section, 'activeAssignment' => $assignment, 'sectionAssignments' => $section->assignments]);
    }

     public function gallery(Section $section, Assignment $assignment)
    {
        
        $sections =  Auth::User()->sections()->get()->pluck('label','id');

        $activeSection = $section;
        $activeAssignment = $assignment;
        $activeComponent = $activeAssignment->components->first();

        //dd($activeComponent);

        $sectionAssignments = Assignment::where('section_id', $section->id)->get();

        $components = Component::where('assignment_id', $assignment->id)->get()->pluck('title','id');
    
        $students = User::with(['artifacts' => function ($query) use($activeComponent) {
        $query->where('component_id', '=', $activeComponent->id);
        }])->whereHas('roles', function ($query) { 
        $query->where('name', 'like', 'student');
            })->whereHas('sections', function ( $query ) use($section) {
        $query->where('id', $section->id );
        })->get()->sortBy('firstName');

        //dd($students);

        return view('partials.teacher.assignment.gallery')
               ->with(compact('sections', 'activeSection', 'sectionAssignments', 'activeAssignment', 'components', 'activeComponent', 'students'));
     }

}
