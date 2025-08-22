# Laravel Project Setup

This README will guide you through setting up and running the Laravel project locally.

## Prerequisites

Ensure the following tools are installed on your system:
🔧 Tech Stack:

-   PHP >= 8.4
-   Laravel = 12
-   Composer
-   Node.js >= 24.x
-   NPM >= 8.x
-   MySQL or any supported database

## Installation & Setup

Follow the steps below to get started:

```bash
# Clone the repository
git clone https://github.com/shayanahmad1999/laravel-scout.git
cd laravel-scout

# Install PHP dependencies
composer install

# Initialize and install Node.js dependencies
npm install

# Build frontend assets
npm run build

# Run the development server (optional during setup)
npm run dev

# Copy and set up the environment configuration
cp .env.example .env

# Create the Typesense Cloud Account and Generate API key and past below
SCOUT_DRIVER=typesense

TYPESENSE_PROTOCOL=https
TYPESENSE_HOST=Nodes
TYPESENSE_PORT=Nodes_Https
TYPESENSE_API_KEY=Admin_API_Key
TYPESENSE_PATH=

# Generate application key
php artisan key:generate

# Run database migrations
php artisan migrate --seed

# Run the development server again
php artisan serve
npm run dev

```

# Install the Scout with Typesense From Scratch

Laravel Scout provides a simple, driver-based solution for adding full-text search to your Eloquent models. Using model observers, Scout will automatically keep your search indexes in sync with your Eloquent records.

---

## 📦 Prerequisites

-   PHP & Composer installed
-   A Laravel project (for package installation)
-   Create Account of Typesense Cloud

---

## 🚀 1) Create the Account of Typesense Cloud

1. Open **https://typesense.org/**
2. Click **Typesense Cloud** → **Signup**.
3. **Generate the Api keys**.

the Token Look like that
=== Typesense Cloud: i8mqrdoev6fbt7lpp ===

Admin API Key:
37******************************m

Search Only API Key:
Xb*************************VG

Nodes:
i8**************************et [https:2*8]

---

## 🧩 2) Install in Your Laravel Project

Run these in your project root:

```bash
# Install the package Scout
composer require laravel/scout

# Publish the Scout File
php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"

# Define the Searchable Class in Model

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Movie extends Model
{
    use Searchable;
}

# Define Method in Model
public function toSearchableArray(): array
{
    return array_merge($this->toArray(), [
        'id' => (string) $this->id,
        'title' => $this->title,
        'description' => $this->description,
        'author' => $this->author,
        'release_year' => (string) $this->release_year,
        'created_at' => $this->created_at->timestamp,
    ]);
}

# Install the package Typesense
composer require typesense/typesense-php

# update .env file past the aapi key here below
SCOUT_DRIVER=typesense

TYPESENSE_PROTOCOL=https
TYPESENSE_HOST=Nodes
TYPESENSE_PORT=Nodes_Https
TYPESENSE_API_KEY=Admin_API_Key
TYPESENSE_PATH=

# add some code of Searchable in Scout.php file in the model-settings section
Movie::class => [
    'collection-schema' => [
        'fields' => [
            [
                'name' => 'id',
                'type' => 'string',
            ],
            [
                'name' => 'title',
                'type' => 'string',
            ],
            [
                'name' => 'description',
                'type' => 'string',
            ],
            [
                'name' => 'author',
                'type' => 'string',
            ],
            [
                'name' => 'release_year',
                'type' => 'string',
            ],
            [
                'name' => 'created_at',
                'type' => 'int64',
            ],
        ],
        'default_sorting_field' => 'created_at',
    ],
    'search-parameters' => [
        'query_by' => 'title'
    ],
],

# import the model
php artisan scout:import "App\Models\Movie"

# Add search input in the view file
<div class="d-flex justify-content-between align-items-center mb-4">
    <form action="" method="GET">
        <label for="">Search using Scout Package</label>
        <input type="text" name="search" class="form-control" placeholder="🔍 Search movies...">
    </form>
</div>

# Logic Code in Controller
public function index(Request $request)
    {
        $search = $request->search;

        $movies = Movie::search($search)->paginate(9) ?? Movie::latest()->paginate(9);

        return view('movies.index', compact('movies'));
    }

```

---

Happy Laravel Scout with Typesense! 🎉
