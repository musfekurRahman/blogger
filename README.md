# Blogger


![Version](https://img.shields.io/badge/version-1.0.0-blue)
![Issues](https://img.shields.io/github/issues/musfekurRahman/blogger)
![Forks](https://img.shields.io/github/forks/musfekurRahman/blogger)
![Stars](https://img.shields.io/github/stars/musfekurRahman/blogger)

Welcome to the Laravel Blog Project! This project is a personal blogging platform where you can write, edit, and share articles on various topics. Built with Laravel, this platform is designed to be user-friendly and feature-rich.

## Table of Contents

- [Features](#features)
- [Built With](#built-with)
- [Getting Started](#getting-started)
    - [Prerequisites](#prerequisites)
    - [Installation](#installation)
- [Usage](#usage)
- [Deployment](#deployment)
- [Contact](#contact)


## Features

- **✨ User Authentication:** Secure login and registration system.
- **📱 Responsive Design:** Optimized for both desktop and mobile devices.
- **📝 Markdown Support:** Write posts using Markdown.
- **💬 Comment System:** Engage with readers through comments.
- **🏷️ Tagging:** Organize posts with tags.
- **🔍 Search Functionality:** Easily find posts with the search feature.
- **🛠️ Admin Dashboard:** Manage posts, comments, and users.
- **📈 SEO Friendly:** Optimized for search engines.


## Built With

- [Laravel](https://laravel.com/) - PHP framework
- [Bootstrap](https://getbootstrap.com/) - Frontend framework
- [MySQL](https://www.mysql.com/) - Database
- [Composer](https://getcomposer.org/) - Dependency management

## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites

Ensure you have the following installed (Without Docker):
- [PHP](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/)
> __Note__:
> Note: If you are using Docker No need to install these.

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/musfekurRahman/blogger.git
   cd blogger
   ```
2. **Run the project**
   1. With Docker
        ```bash 
         docker compose up
       ```
   2. Without Docker
      ```bash
      php artisan serve
      compser install
       ```
       
3. **DB Migrate**
    1. With Docker
       ```bash 
       docker exec -it blogger bash
       php artisan migrate 
       ```
    2. Without Docker
       ```bash
        php artisan migrate
       ```
4. **DB Seed (Optional)**
    1. With Docker
       ```bash 
       docker exec -it blogger bash
       php artisan db:seed 
       ```
    2. Without Docker
       ```bash
        php artisan db:seed
       ```
## Usage

### Writing Posts
- Navigate to the "Create Post" section.
- Use the Markdown editor to write your post.
- Add tags to categorize your post.
- Publish the post to make it live.
### Managing Posts
- Edit: Navigate to your post and click "Edit" to update the content.
- Delete: Navigate to your post and click "Delete" to remove it.
### Comments
- Users can leave comments on posts.
- Admins can moderate comments through the dashboard.

## Deployment
To deploy the project, follow these steps:

1. Ensure all environment variables are set up for the production environment.
2. Build the project
 ```bash
npm run prod
 ```
Deploy the application to your hosting platform.

## Contact
> Email: **sajibma@gmail.com**
> 
> Project Link: https://github.com/musfekurRahman/blogger
