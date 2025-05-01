<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Lesson;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $categories = Category::all();
        return view('courses.index', compact('courses','categories'));
    }

    public function call(Request $request)
    {
        $query = Course::query();
        $categories = Category::all();
    
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('name_cotcher', 'LIKE', "%{$searchTerm}%");
            });
        }
    
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }
    
        $courses = $query->with('favorites')->get();
        $selectedCategory = $request->has('category') ? Category::find($request->category) : null;
    
        return view('courses', compact('courses', 'categories', 'selectedCategory'));
    }



    public function create()
    {
        $categories = Category::all();
        return view('courses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'name_cotcher' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|mimes:mp4,webm,ogg|max:20480',
        ]);
    
        $data = $request->except(['chapter', 'titles', 'lessons']); // Exclude chapter-related fields
        $data['user_id'] = Auth::id();
    
        // Handle file uploads
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/courses'), $imageName);
            $data['image'] = 'images/courses/' . $imageName;
        }
    
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = time() . '_video.' . $video->getClientOriginalExtension();
            $video->move(public_path('videos/courses'), $videoName);
            $data['video'] = 'videos/courses/' . $videoName;
        }
    
        // Create the course first
        $course = Course::create($data);
    
        // Handle chapters and lessons
        // Inside the store method, update the chapter creation part:
        if ($request->has('chapters')) {
            foreach ($request->chapters as $chapterIndex => $chapterData) {
                if (!isset($chapterData['title']) || empty($chapterData['title'])) {
                    continue;
                }
    
                $chapterAttributes = [
                    'title' => $chapterData['title'],
                    'course_id' => $course->id,
                    'order' => $chapterIndex
                ];
    
                // Handle chapter video upload
                if (isset($request->file('chapters')[$chapterIndex]['video'])) {
                    $video = $request->file('chapters')[$chapterIndex]['video'];
                    $videoName = time() . '_chapter_' . $chapterIndex . '.' . $video->getClientOriginalExtension();
                    $video->move(public_path('videos/chapters'), $videoName);
                    $chapterAttributes['video'] = 'videos/chapters/' . $videoName;
                }
    
                // Create chapter
                $chapter = Chapter::create($chapterAttributes);
              
                

                    
        
    
                          
                        
            }
        }

        $i = 0;
                
        while ($i<$request->titleIndex+1) {
            $y=0;
            
            while (isset($request->chapters[$i][$y])) {
                $lessonAttributes = [
                    'title' => $request->chapters[$i][$y],
                    'chapter_id' => $chapter->id+$i-1,
                    'order' => $y,
                    'start_time' => $request->time[$i][$y]
                ];
                $lesson = Lesson::create($lessonAttributes);
                $y++;

            }
            $i++;
        }
    
        return redirect()->route('courses.index')->with('success', 'Course created successfully'.$request->titleIndex);
    }




    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',  // Add this line
            'name_cotcher' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video' => 'nullable|mimes:mp4,webm,ogg|max:20480'
        ]);
    
        $course = Course::findOrFail($id);
        $data = $request->all();
    
        if ($request->hasFile('image')) {
            if ($course->image && file_exists(public_path($course->image))) {
                unlink(public_path($course->image));
            }
    
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/courses'), $imageName);
            $data['image'] = 'images/courses/' . $imageName;
        }
    
        if ($request->hasFile('video')) {
            if ($course->video && file_exists(public_path($course->video))) {
                unlink(public_path($course->video));
            }
    
            $video = $request->file('video');
            $videoName = time() . '_video.' . $video->getClientOriginalExtension();
            $video->move(public_path('videos/courses'), $videoName);
            $data['video'] = 'videos/courses/' . $videoName;
        }

        
        
    
        $course->update($data);
        return redirect()->route('courses.index')->with('success', 'Course updated successfully');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        
        if ($course->image && file_exists(public_path($course->image))) {
            unlink(public_path($course->image));
        }
    
        if ($course->video && file_exists(public_path($course->video))) {
            unlink(public_path($course->video));
        }
    
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
    }


    
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $categories = Category::all();
        return view('courses.edit', compact('course','categories'));
    }
    public function show($id)
    {
        $course = Course::findOrFail($id);
        $chapters = Chapter::where('course_id', $id)->get();
        $lessons = Lesson::all();
        return view('courses.show', compact('course',  'chapters', 'lessons'));
    }
    public function courseDetails($id)
    {
        $chapters = Chapter::where('course_id', $id)->get();
        $lessons = Lesson::all();
        $course = Course::findOrFail($id);
        $categories = Category::all();
        return view('coursedetails', compact('course', 'categories', 'chapters', 'lessons'));
    }
    public function checkout($id)
    {
        $course = Course::findOrFail($id);
        return view('checkout', compact('course'));
    }
}


