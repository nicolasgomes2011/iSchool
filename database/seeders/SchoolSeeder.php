<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create schools
        $school1 = \App\Models\School::create([
            'name' => 'Springfield Elementary',
            'address' => '123 Main St, Springfield',
            'phone' => '555-0100',
            'email' => 'info@springfield.edu',
            'settings' => json_encode(['theme' => 'blue', 'timezone' => 'UTC']),
        ]);

        $school2 = \App\Models\School::create([
            'name' => 'Riverdale High School',
            'address' => '456 River Rd, Riverdale',
            'phone' => '555-0200',
            'email' => 'admin@riverdale.edu',
            'settings' => json_encode(['theme' => 'green', 'timezone' => 'UTC']),
        ]);

        // Create teachers
        $teacher1 = \App\Models\Teacher::create([
            'school_id' => $school1->id,
            'name' => 'John Smith',
            'email' => 'john.smith@springfield.edu',
            'phone' => '555-0101',
            'subject' => 'Mathematics',
        ]);

        $teacher2 = \App\Models\Teacher::create([
            'school_id' => $school1->id,
            'name' => 'Jane Doe',
            'email' => 'jane.doe@springfield.edu',
            'phone' => '555-0102',
            'subject' => 'English',
        ]);

        // Create students
        $student1 = \App\Models\Student::create([
            'school_id' => $school1->id,
            'name' => 'Alice Johnson',
            'email' => 'alice.j@example.com',
            'phone' => '555-0201',
            'date_of_birth' => '2010-05-15',
        ]);

        $student2 = \App\Models\Student::create([
            'school_id' => $school1->id,
            'name' => 'Bob Williams',
            'email' => 'bob.w@example.com',
            'phone' => '555-0202',
            'date_of_birth' => '2011-08-20',
        ]);

        // Create classes
        $class1 = \App\Models\Classes::create([
            'school_id' => $school1->id,
            'teacher_id' => $teacher1->id,
            'name' => 'Math 101',
            'grade_level' => '9th Grade',
            'description' => 'Introduction to Algebra',
        ]);

        $class2 = \App\Models\Classes::create([
            'school_id' => $school1->id,
            'teacher_id' => $teacher2->id,
            'name' => 'English Literature',
            'grade_level' => '10th Grade',
            'description' => 'Classic Literature Study',
        ]);

        // Enroll students in classes
        $class1->students()->attach([$student1->id, $student2->id]);
        $class2->students()->attach([$student1->id]);
    }
}
