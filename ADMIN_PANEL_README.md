# Genesis Accommodation Admin Panel

A comprehensive admin panel for managing the Genesis Accommodation website with full CRUD operations and SEO optimization.

## 🚀 Features

### Core Modules
- **Blogs** - Create, edit, and manage blog posts with SEO optimization
- **About Us** - Manage company information and mission/vision
- **Services** - Manage accommodation services with pricing
- **Accommodations** - Property listings with location data
- **Room Types** - Detailed room specifications and pricing
- **Testimonials** - Customer reviews and ratings
- **Settings** - Website configuration (footer, contact, social media)

### SEO Optimization
Every content type includes comprehensive SEO meta fields:
- Meta title, description, keywords
- Open Graph (Facebook) meta tags
- Twitter Card meta tags
- Meta images for social sharing

### Admin Features
- Modern responsive UI with Tailwind CSS
- Professional sidebar navigation
- Dashboard with statistics and quick actions
- File upload handling for images
- Bulk settings management
- Search and pagination

## 📁 File Structure

```
app/
├── Http/Controllers/Admin/
│   ├── BlogController.php
│   ├── AboutUsController.php
│   ├── ServiceController.php
│   ├── AccommodationController.php
│   ├── RoomTypeController.php
│   ├── TestimonialController.php
│   └── SettingController.php
├── Models/
│   ├── Blog.php
│   ├── AboutUs.php
│   ├── Service.php
│   ├── Accommodation.php
│   ├── RoomType.php
│   ├── Testimonial.php
│   └── Setting.php
└── Http/Middleware/
    └── AdminMiddleware.php

resources/views/admin/
├── layouts/
│   └── app.blade.php
├── dashboard/
│   └── index.blade.php
├── blogs/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── show.blade.php
├── settings/
│   └── index.blade.php
└── auth/
    └── login.blade.php

routes/
└── admin.php

database/migrations/
├── create_blogs_table.php
├── create_about_us_table.php
├── create_services_table.php
├── create_accommodations_table.php
├── create_room_types_table.php
├── create_testimonials_table.php
└── create_settings_table.php
```

## 🛣️ Routes

### Admin Routes
```
/admin                    → Redirects to /admin/dashboard
/admin/dashboard          → Admin dashboard
/admin/login              → Admin login page

// Blogs
/admin/blogs              → List all blogs
/admin/blogs/create       → Create new blog
/admin/blogs/{id}         → View blog
/admin/blogs/{id}/edit    → Edit blog

// About Us
/admin/about-us           → Manage about us content

// Services
/admin/services           → Manage services

// Accommodations
/admin/accommodations     → Manage accommodations

// Room Types
/admin/room-types         → Manage room types

// Testimonials
/admin/testimonials       → Manage testimonials

// Settings
/admin/settings           → Manage website settings
/admin/settings/bulk-update → Bulk update settings
```

## 🗄️ Database Tables

### Blogs Table
- `id`, `title`, `slug`, `content`, `excerpt`
- `featured_image`, `status`, `sort_order`
- SEO fields: `meta_title`, `meta_description`, `meta_keywords`, `meta_image`
- Social fields: `og_title`, `og_description`, `og_image`, `twitter_title`, `twitter_description`, `twitter_image`

### About Us Table
- `id`, `title`, `content`, `image`
- `mission`, `vision`, `values`, `status`
- Full SEO meta fields

### Services Table
- `id`, `title`, `slug`, `description`, `icon`, `image`
- `features` (JSON), `price`, `status`, `sort_order`
- Full SEO meta fields

### Accommodations Table
- `id`, `name`, `slug`, `description`
- Location: `address`, `city`, `state`, `country`, `postal_code`
- Contact: `phone`, `email`, `website`
- Coordinates: `latitude`, `longitude`
- Media: `featured_image`, `gallery` (JSON), `amenities` (JSON)
- Full SEO meta fields

### Room Types Table
- `id`, `name`, `slug`, `description`
- Pricing: `price_per_night`
- Capacity: `capacity`, `bedrooms`, `bathrooms`, `size`
- Media: `featured_image`, `gallery` (JSON), `amenities` (JSON)
- Full SEO meta fields

### Testimonials Table
- `id`, `name`, `position`, `company`, `testimonial`
- `rating`, `image`, `status`, `sort_order`
- Full SEO meta fields

### Settings Table
- `id`, `key`, `value`, `type`, `group`, `description`
- Supports: text, textarea, image, select, url, email

## 🔧 Installation & Setup

1. **Run Migrations**
   ```bash
   php artisan migrate
   ```

2. **Seed Default Settings**
   ```bash
   php artisan db:seed --class=SettingsSeeder
   ```

3. **Create Storage Link**
   ```bash
   php artisan storage:link
   ```

4. **Access Admin Panel**
   - Visit: `http://your-domain.com/admin`
   - Or directly: `http://your-domain.com/admin/dashboard`

## 🎨 Customization

### Adding New Settings
1. Add to `SettingsSeeder.php`
2. Run: `php artisan db:seed --class=SettingsSeeder`

### Adding New Content Types
1. Create migration: `php artisan make:model NewModel -m`
2. Create controller: `php artisan make:controller Admin/NewModelController --resource`
3. Add routes to `routes/admin.php`
4. Create views in `resources/views/admin/new-model/`

### Styling
- Uses Tailwind CSS via CDN
- Font Awesome icons
- Alpine.js for interactivity
- Responsive design

## 🔐 Security

### Admin Middleware
- Located: `app/Http/Middleware/AdminMiddleware.php`
- Currently allows all requests (for development)
- Add authentication logic as needed

### File Upload Security
- Image validation: `jpeg,png,jpg,gif`
- Max file size: 2MB
- Stored in `storage/app/public/`

## 📊 Dashboard Features

### Statistics Cards
- Total blogs count
- Total accommodations count
- Total room types count
- Total testimonials count

### Quick Actions
- Create new blog
- Add accommodation
- Add room type
- Add testimonial
- Add service
- Manage settings

### Recent Activity
- Recent blogs
- Recent accommodations
- Quick edit links

## 🚀 Usage Examples

### Creating a Blog Post
1. Go to `/admin/blogs/create`
2. Fill in title, content, excerpt
3. Upload featured image
4. Set SEO meta fields
5. Choose status (draft/published)
6. Save

### Managing Settings
1. Go to `/admin/settings`
2. Edit values in grouped sections
3. Upload images for logos/favicons
4. Click "Save All Settings"

### Adding Accommodation
1. Go to `/admin/accommodations/create`
2. Fill in property details
3. Add location coordinates
4. Upload images
5. Set amenities (JSON array)
6. Configure SEO fields

## 🔧 Development

### Adding Authentication
1. Uncomment authentication logic in `AdminMiddleware.php`
2. Create admin users table
3. Implement login/logout functionality

### Adding More Features
- Follow the existing pattern for new modules
- Use the same SEO field structure
- Maintain consistent UI/UX

## 📝 Notes

- All images are stored in `storage/app/public/`
- SEO fields are optional but recommended
- Settings are grouped for better organization
- Bulk operations available for settings
- Responsive design works on all devices

## 🆘 Support

For issues or questions:
1. Check the Laravel logs
2. Verify database migrations
3. Ensure storage link is created
4. Check file permissions for uploads 
