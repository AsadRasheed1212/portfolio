<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Work;
use App\Models\Service;
use App\Models\Credential;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Work::insert([
            ['title'=>'E-Commerce Platform','category'=>'Laravel','description'=>'Full-stack e-commerce with payment gateway, inventory management, and real-time notifications.','tech_stack'=>json_encode(['Laravel','MySQL','Vue.js','Stripe']),'featured'=>true,'created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Portfolio CMS','category'=>'Laravel','description'=>'Custom CMS for managing portfolio projects, blog posts, and client work with admin panel.','tech_stack'=>json_encode(['Laravel','Livewire','Tailwind CSS']),'featured'=>true,'created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Real Estate App','category'=>'Web','description'=>'Property listing platform with advanced search, map integration, and agent dashboard.','tech_stack'=>json_encode(['Laravel','MySQL','Google Maps API']),'featured'=>false,'created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Restaurant Dashboard','category'=>'UI/UX','description'=>'Admin dashboard for restaurant management with order tracking and analytics charts.','tech_stack'=>json_encode(['Blade','Chart.js','GSAP','Tailwind']),'featured'=>true,'created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Metro Gala — Kitchen & Household Store','category'=>'Web','description'=>'A fully functional e-commerce website built during my Advanced Diploma at Aptech Garden Center. Metro Gala is a kitchen and household products store featuring 6 product categories — Crockery, Cutlery, Kitchen Utensils, Storage Containers, Bakeware, and Pots & Pans — with individual product pages, Add to Cart flow, gallery, contact, and login pages. Built as a complete front-end e-commerce project.','tech_stack'=>json_encode(['HTML','CSS','Bootstrap','JavaScript']),'featured'=>true,'thumbnail'=>'works/metro-gala.png','url'=>'https://asadrasheed1212.github.io/laravel/index.html','created_at'=>now(),'updated_at'=>now()],
        ]);

        Service::insert([
            ['title'=>'Data Entry & MS Excel','description'=>'Accurate, fast data entry with advanced MS Excel reports, spreadsheets, and data organization.','icon'=>'📊','sort_order'=>1,'created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Laravel Development','description'=>'PHP Laravel website management — content updates, structure maintenance, and MySQL backend.','icon'=>'⚡','sort_order'=>2,'created_at'=>now(),'updated_at'=>now()],
            ['title'=>'WordPress Management','description'=>'Managing pages, posts, and content updates on WordPress CMS websites.','icon'=>'📝','sort_order'=>3,'created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Video Editing','description'=>'Reels, social ads, intros, and full video edits with motion graphics and color grading.','icon'=>'🎬','sort_order'=>4,'created_at'=>now(),'updated_at'=>now()],
            ['title'=>'E-Commerce Operations','description'=>'Product listing, online store management, and structured catalog organization.','icon'=>'🛒','sort_order'=>5,'created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Database Design','description'=>'Efficient MySQL schema design and structured data management for web applications.','icon'=>'🗄️','sort_order'=>6,'created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Administrative Support','description'=>'Email communication, internet research, and reliable office administration tasks.','icon'=>'💼','sort_order'=>7,'created_at'=>now(),'updated_at'=>now()],
            ['title'=>'Performance Tuning','description'=>'Speed optimization and server configuration for blazing-fast load times.','icon'=>'🚀','sort_order'=>8,'created_at'=>now(),'updated_at'=>now()],
        ]);

        Credential::insert([
            ['type'=>'experience','title'=>'WordPress & Laravel Website Management','organization'=>'Freelance / Self-Managed Projects','year'=>'2023 – Present','description'=>'Managed pages, posts, and content updates on WordPress sites. Updated and maintained Laravel website content, structure, and data organization for web applications.','created_at'=>now(),'updated_at'=>now()],
            ['type'=>'education','title'=>'Bachelor of Science in Economics','organization'=>'University','year'=>'2022 – 2025','description'=>'Undergraduate degree in Economics, alongside ongoing self-development in web development and data management.','created_at'=>now(),'updated_at'=>now()],
            ['type'=>'education','title'=>'Advanced Diploma in Software Engineering','organization'=>'Aptech Garden Center','year'=>'2021 – 2023','description'=>'Completed Advanced Diploma in Software Engineering with a Credit grade, covering web development, databases, and software engineering fundamentals.','created_at'=>now(),'updated_at'=>now()],
            ['type'=>'education','title'=>'Intermediate / Commerce','organization'=>'Sirajuddaula Commerce College','year'=>'2019 – 2021','description'=>'Completed commerce studies, building a foundation in business and administrative concepts.','created_at'=>now(),'updated_at'=>now()],
        ]);
    }
}