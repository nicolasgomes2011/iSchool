# iSchool - School Administration System

A comprehensive school administration system built with Laravel, Livewire, and Alpine.js.

## Features

### Core Entities
- **Schools**: Manage multiple schools with their own settings
- **Teachers**: Teacher management with school associations
- **Students**: Student management with school associations
- **Classes**: Class management with teacher and school relationships

### Academic Management
- **Content**: Manage class content and materials
- **Grades**: Track student grades per class
- **Assignments**: Create and manage class assignments
- **Exams**: Schedule and manage exams

### Key Capabilities
- Full CRUD operations for all entities
- Real-time search and filtering with Livewire
- School-specific settings management (theme, timezone, language, academic year)
- Relationship management (teachers/students belong to schools, classes have teachers and students)
- Responsive UI with Tailwind CSS
- Interactive UI elements with Alpine.js

## Technology Stack

- **Backend**: Laravel 12
- **Frontend**: Livewire 3, Alpine.js, Tailwind CSS 4
- **Database**: SQLite (configurable to MySQL/PostgreSQL)
- **Build Tool**: Vite

## Screenshots

### Schools Management
![Schools](https://github.com/user-attachments/assets/5865859a-4aca-4d7d-a350-9a3ac64dea7e)

### Teachers Management
![Teachers](https://github.com/user-attachments/assets/3a558d91-0708-4029-9fb4-29ab26405eaa)

### Create Teacher Form
![Create Teacher](https://github.com/user-attachments/assets/41d4af2a-ad0d-47e1-81d9-ec5b10fb2a48)

### Classes Management
![Classes](https://github.com/user-attachments/assets/32263459-18cf-4102-8d66-83e85d9eb416)

## Installation

1. Clone the repository
2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Install Node dependencies:
   ```bash
   npm install
   ```

4. Copy `.env.example` to `.env`:
   ```bash
   cp .env.example .env
   ```

5. Generate application key:
   ```bash
   php artisan key:generate
   ```

6. Run migrations:
   ```bash
   php artisan migrate
   ```

7. (Optional) Seed with sample data:
   ```bash
   php artisan db:seed --class=SchoolSeeder
   ```

8. Build assets:
   ```bash
   npm run build
   ```

9. Start the development server:
   ```bash
   php artisan serve
   ```

Visit `http://localhost:8000` to access the application.

## Development

For development with hot module replacement:
```bash
npm run dev
```

## Database Structure

The system uses a relational database with the following main tables:
- **schools**: School information and settings
- **teachers**: Teacher records (belongs to school)
- **students**: Student records (belongs to school)
- **classes**: Class records (belongs to school, has teacher)
- **class_student**: Pivot table for many-to-many student-class relationship
- **contents**: Learning content (belongs to class)
- **grades**: Student grades (belongs to student and class)
- **assignments**: Class assignments (belongs to class)
- **exams**: Exams (belongs to class)

## Routes

### Schools
- `GET /schools` - List schools
- `GET /schools/create` - Create school form
- `GET /schools/{id}/edit` - Edit school form
- `GET /schools/{id}/settings` - School settings management

### Teachers
- `GET /teachers` - List teachers
- `GET /teachers/create` - Create teacher form
- `GET /teachers/{id}/edit` - Edit teacher form

### Students
- `GET /students` - List students
- `GET /students/create` - Create student form
- `GET /students/{id}/edit` - Edit student form

### Classes
- `GET /classes` - List classes
- `GET /classes/create` - Create class form
- `GET /classes/{id}/edit` - Edit class form

### Content, Grades, Assignments, Exams
Similar route patterns for all entities

## Architecture

The application follows Laravel best practices:
- **Models**: Eloquent models with relationships
- **Livewire Components**: Full-page components for CRUD operations
- **Blade Templates**: View templates with Tailwind CSS styling
- **Alpine.js**: For interactive UI elements (modals, dropdowns, alerts)
- **SQLite Database**: Lightweight database for development (easily configurable for production)

## License

This project is open-sourced software.
