# Master Fungsi Setup Guide

This document provides complete setup instructions for the Master Fungsi functionality and all related components in the SIMELA Gen2 system.

## 📋 Overview

The Master Fungsi system provides a complete CRUD (Create, Read, Update, Delete) interface for managing government functions with the following features:

- ✅ **Full CRUD Operations**: Create, read, update, delete fungsi records
- ✅ **AJAX-powered Editing**: Modal-based editing with dynamic form population
- ✅ **Status Management**: Toggle between Aktif/Tidak Aktif status
- ✅ **Data Validation**: Server-side validation with user feedback
- ✅ **Flash Messages**: User-friendly success/error notifications
- ✅ **Maximize/Minimize Cards**: Full-screen capability with localStorage state
- ✅ **Responsive Design**: Works on all screen sizes
- ✅ **Hierarchical Data**: Supports relationships with Urusan and Program

## 🗂️ File Structure

```
application/
├── config/
│   └── routes.php                          # Updated with master_fungsi routes
├── controllers/
│   └── AdmData.php                         # Updated with CRUD methods
├── models/
│   └── Master_fungsi_model.php             # New model for fungsi operations
├── helpers/
│   └── flash_helper.php                    # Updated with flash message functions
└── views/
    └── administrator/
        ├── admdata.php                     # Main view (loads all components)
        └── admdata/
            ├── master_fungsi.php           # Updated fungsi card component
            ├── master_urusan.php           # Updated urusan card component
            ├── master_program.php          # Updated program card component
            ├── periode_rpjmd.php           # Updated periode card component
            ├── tujuan_rpjmd.php            # Updated tujuan card component
            ├── sasaran_rpjmd.php           # Updated sasaran card component
            ├── indikator_tujuan_rpjmd.php  # Updated indikator tujuan card
            ├── indikator_sasaran_rpjmd.php # Updated indikator sasaran card
            ├── master_periode_anggaran.php # Updated periode anggaran card
            ├── master_grouping_periode.php # Updated grouping periode card
            └── master_branding.php         # Updated branding card

database/
└── master_fungsi_table.sql                 # Complete database structure
```

## 🚀 Installation Steps

### 1. Database Setup

Execute the SQL file to create all required tables:

```sql
-- Run this file in your MySQL database
source database/master_fungsi_table.sql;
```

Or manually execute the SQL commands from `database/master_fungsi_table.sql`.

### 2. Verify Routes

The following routes have been added to `application/config/routes.php`:

```php
// Master Fungsi CRUD routes
$route['admdata/save_master_fungsi'] = 'admData/save_master_fungsi';
$route['admdata/fungsiById/(:num)'] = 'admData/fungsiById/$1';
$route['admdata/setStatus_fungsi/(:num)'] = 'admData/setStatus_fungsi/$1';
$route['admdata/delete_fungsi/(:num)'] = 'admData/delete_fungsi/$1';

// Plus routes for all other master data components...
```

### 3. Controller Methods

The `AdmData` controller now includes:

- `save_master_fungsi()` - Create/Update fungsi
- `fungsiById($id)` - Get fungsi by ID (AJAX)
- `setStatus_fungsi($id)` - Toggle fungsi status
- `delete_fungsi($id)` - Delete fungsi
- `init_database()` - Initialize tables and sample data

### 4. Model Features

The `Master_fungsi_model` provides:

- Complete CRUD operations
- Data validation and duplicate checking
- Status management
- Statistics and search functionality
- Relationship checking before deletion
- Sample data insertion

## 🎯 Usage Instructions

### Accessing the Interface

1. Navigate to: `http://yoursite.com/admdata`
2. The Master Fungsi card will be visible in the first row
3. Click the `[  ]` button to maximize the card to full screen
4. Click the `+` button to expand/collapse the card

### Adding New Fungsi

1. Fill in the "Nama Fungsi" field (required)
2. Optionally add a description
3. Set the order number (urut)
4. Click "Simpan" to save

### Editing Fungsi

1. Click "Tindakan" dropdown on any fungsi row
2. Select "Edit"
3. Modal will open with current data pre-filled
4. Make changes and click "Simpan"

### Changing Status

1. Click "Tindakan" dropdown on any fungsi row
2. Select "Ubah Status"
3. Confirm the action
4. Status will toggle between "Aktif" and "Tidak Aktif"

## 🔧 Technical Features

### localStorage State Management

Each card remembers its state between page visits:

```javascript
// Card collapse/expand state
localStorage.getItem('card-master-fungsi-state')

// Card maximize/restore state  
localStorage.getItem('card-master-fungsi-maximize')
```

### AJAX Edit Functionality

```javascript
function editModalFungsi(id) {
    $.ajax({
        url: 'admdata/fungsiById/' + id,
        success: function (res) {
            // Populate modal with data
            // Show modal for editing
        }
    });
}
```

### Flash Message System

```php
// Set flash message
set_flash_message('form_masterfungsi', 'success', 'Data berhasil disimpan');

// Display flash message in view
<?= widget_flash('form_masterfungsi') ?>
```

## 🗃️ Database Schema

### master_fungsi Table

```sql
CREATE TABLE `master_fungsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namafungsi` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `urut` int(11) DEFAULT 1,
  `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
  `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_namafungsi` (`namafungsi`)
);
```

### Relationships

- `master_urusan.fungsi_id` → `master_fungsi.id`
- `master_program.urusan_id` → `master_urusan.id`
- And so on for the complete hierarchy

## 🧪 Testing

### Initialize Sample Data

Visit: `http://yoursite.com/admdata/init_database`

This will:
- Create all required tables
- Insert sample fungsi data
- Set up relationships between tables

### Verify Functionality

1. **Create**: Add a new fungsi and verify it appears in the table
2. **Read**: Check that data loads correctly on page refresh
3. **Update**: Edit an existing fungsi and verify changes are saved
4. **Delete**: Try to delete a fungsi (should fail if used by urusan)
5. **Status**: Toggle status and verify the change
6. **AJAX**: Test the edit modal functionality
7. **localStorage**: Maximize a card, refresh page, verify it stays maximized

## 🔍 API Endpoints

### REST-like Endpoints

```
GET    /admdata                           # Main interface
POST   /admdata/save_master_fungsi        # Create/Update fungsi
GET    /admdata/fungsiById/{id}           # Get fungsi by ID (AJAX)
GET    /admdata/setStatus_fungsi/{id}     # Toggle status
GET    /admdata/delete_fungsi/{id}        # Delete fungsi
GET    /admdata/init_database             # Initialize database
GET    /admdata/get_statistics            # Get statistics (AJAX)
```

## 🎨 UI Components

### Card Features

- **Collapsible**: Click `+`/`-` to expand/collapse
- **Maximizable**: Click `[  ]` to maximize to full screen
- **Responsive**: Adapts to all screen sizes
- **State Persistent**: Remembers position between visits

### Form Features

- **Validation**: Client and server-side validation
- **Auto-population**: Edit forms pre-filled with current data
- **Flash Messages**: Success/error feedback
- **CSRF Protection**: Built-in CodeIgniter CSRF protection

## 🔒 Security Features

- **Input Validation**: All inputs validated and sanitized
- **SQL Injection Protection**: Using CodeIgniter's Active Record
- **XSS Protection**: All outputs properly escaped
- **CSRF Protection**: Form tokens for security
- **Access Control**: Admin role checking

## 📊 Performance Features

- **Efficient Queries**: Optimized database queries with proper indexing
- **AJAX Loading**: Modal data loaded on-demand
- **Caching**: localStorage for UI state management
- **Minimal DOM**: Only necessary elements loaded

## 🐛 Troubleshooting

### Common Issues

1. **Flash messages not showing**
   - Ensure `flash_helper.php` is loaded
   - Check that `widget_flash()` is called in the view

2. **AJAX edit not working**
   - Verify routes are properly configured
   - Check browser console for JavaScript errors
   - Ensure jQuery is loaded

3. **Database errors**
   - Run the SQL file to create tables
   - Check database connection settings
   - Verify user permissions

4. **localStorage not working**
   - Check browser compatibility
   - Verify JavaScript is enabled
   - Clear browser cache if needed

### Debug Mode

Enable CodeIgniter debug mode in `application/config/config.php`:

```php
$config['log_threshold'] = 4; // Enable all logging
```

## 📈 Future Enhancements

Potential improvements for the system:

1. **Bulk Operations**: Select multiple records for bulk actions
2. **Import/Export**: CSV/Excel import/export functionality
3. **Audit Trail**: Track all changes with timestamps and user info
4. **Advanced Search**: Filter and search across multiple fields
5. **Drag & Drop Ordering**: Visual reordering of items
6. **API Integration**: RESTful API for external integrations

## 🤝 Contributing

When adding new features:

1. Follow the established patterns in existing code
2. Add proper validation and error handling
3. Include flash message feedback
4. Update routes and documentation
5. Test all CRUD operations thoroughly

---

**✅ Setup Complete!** 

Your Master Fungsi system is now fully functional with all CRUD operations, AJAX editing, localStorage state management, and a complete hierarchical data structure.
