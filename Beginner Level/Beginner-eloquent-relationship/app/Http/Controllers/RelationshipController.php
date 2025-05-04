<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Posts;
use App\Models\Student;
use App\Models\Course;
use App\Models\Profile;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class RelationshipController extends Controller
{
    public function getPerson($id){
        $person = Person::where('id','=',(int)$id)->first();
        if(is_null($person)){
            return response()->json(["message"=>"Person Not Found"],200);
        }
        $data['person_data']= $person;
        $data['person_posts'] = $person->posts;
        $data['test_function'] = $person->generalInfo();
        return response()->json($data);
    }

    public function allPersonsPost(){
        $persons = Person::with('posts')->get();
        return response()->json($persons);
    }

    public function postBelognsToPerson($id){
        $post = Posts::where('id','=',(int)$id)->first();
        if(is_null($post)){
            return response()->json(["message"=>"Post Not Found"],200);
        }

        $data['post'] = $post;
        $data['post_created_person'] = $post->person;

        return response()->json($data);
    }

    public function getAllPosts(){
        $posts = Posts::with('person')->get();
        return response()->json($posts);
    }

    public function students_with_course($id){
        $student = Student::find($id);
        $data['student'] = $student;
        $data['student_with_course'] = $student->courses;
        return response()->json($data);
    }

    public function getAllStudents(){
         $data['all_students'] = Student::all();
         $data['all_students_with_course'] = Student::with('courses')->get();
         return response()->json($data);
    }

    public function getAllCourse(){
        $data['all_courses']=Course::all();
        $data['all_course_with_students']=Course::with('students')->get();
        return response()->json($data);
    }

    public function courseEnrolledStudents($courseId){
        $course = Course::find($courseId);
        $data['course'] = $course;
        $data['course_enrolled_students']= $course->students;
        return response()->json($data);
    }


    public function getProfileWithPerson($profileId){
        $profile = Profile::find($profileId);
        $data['profile'] = $profile;
        $data['profile_with_person'] = $profile->person;
        return response()->json($data);
    }

    public function getAllPersonWithProfile(){
        $data['all_persons'] = Person::all();
        $data['all_persons_with_profile'] = Person::with('profile')->get();
        return response()->json($data);
    }

    public function getPersonProfile($personId){
        $person = Person::find($personId);
        $data['person']=$person;
        $data['person_profile']=$person->profile;
        return response()->json($data);
    }


    // N + 1  problem or Lazy Loading

    public function getAllCourseWithTeachers(){
        DB::enableQueryLog();
        $courses = Course::all(); // 1 query
        $data['course'] = $courses;
        $data['teachers']=[];
        foreach($courses as $course){
            foreach($course->teachers as $teacher){   // N query
                $data['teachers'][] = $teacher;
            }
        }

        $data['query_log'] = DB::getQueryLog();

        return response()->json($data);
    }

    // Eager Loading

    public function getAllTeacherWithCourses(){
        DB::enableQueryLog();
        $teachers =  Teacher::with('courses')->get(); // only one query
        $data['teachers_with_students']= $teachers;
        $data['courses']=[];
        foreach($teachers as $teacher){
            foreach($teacher->courses as $course){
                $data['courses'][] = $course;
            }
        }

        $data['query_log'] = DB::getQueryLog();
        return response()->json($data);
    }
}
