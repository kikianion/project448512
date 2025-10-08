# Master Urusan Setup Guide

This document provides setup instructions for the Master Urusan functionality in SIMELA2.

## Overview

The Master Urusan module has been updated to match the functionality and visual design of Master Fungsi, with the following improvements:

- **Enhanced Model**: Complete CRUD operations with validation and relationship handling
- **Updated Controller**: Full integration with AdmData controller
- **Improved View**: Consistent styling and functionality with Master Fungsi
- **Active Fungsi Selection**: Only active fungsi are shown in the dropdown

## Files Modified/Created

### New Files
- `application/models/Master_urusan_model.php` - Complete model with CRUD operations
- `database/master_urusan_table.sql` - Database table creation script
- `MASTER_URUSAN_SETUP.md` - This setup guide

### Modified Files
- `application/controllers/AdmData.php` - Added Master_urusan_model loading and CRUD methods
- `application/views/administrator/admdata/master_urusan.php` - Updated view with improved functionality
- `application/config/routes.php` - Routes already existed and are working

## Database Setup

1. **Run the SQL script to create the table:**
   ```sql
   source database/master_urusan_table.sql;
   ```

2. **Or manually execute the table creation:**
   ```sql
   CREATE TABLE IF NOT EXISTS `master_urusan` (
       `id` int(11) NOT NULL AUTO_INCREMENT,
       `namaurusan` varchar(100) NOT NULL,
       `kode` varchar(20) DEFAULT NULL,
       `fungsi_id` int(11) DEFAULT NULL,
       `status` enum('Aktif','Tidak Aktif') DEFAULT 'Aktif',
       `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
       `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
       PRIMARY KEY (`id`),
       UNIQUE KEY `unique_namaurusan` (`namaurusan`),
       UNIQUE KEY `unique_kode` (`kode`),
       KEY `idx_status` (`status`),
       KEY `idx_fungsi_id` (`fungsi_id`),
       CONSTRAINT `fk_urusan_fungsi` FOREIGN KEY (`fungsi_id`) REFERENCES `fungsi` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
   ```

## Features

### Model Features (`Master_urusan_model.php`)
- **Complete CRUD operations** (Create, Read, Update, Delete)
- **Data validation** with duplicate checking for name and code
- **Status management** (Aktif/Tidak Aktif)
- **Relationship handling** with fungsi table
- **Search functionality** by name, code, or fungsi
- **Statistics generation** for dashboard
- **Sample data insertion** method

### Controller Features (`AdmData.php`)
- **save_master_urusan()** - Create/Update urusan with validation
- **urusanById($id)** - AJAX endpoint to get urusan data for editing
- **setStatus_urusan($id)** - Toggle urusan status
- **delete_urusan($id)** - Delete urusan (with usage checking)

### View Features (`master_urusan.php`)
- **Consistent styling** matching Master Fungsi design
- **Active fungsi selection** - Only shows active fungsi in dropdown
- **Improved form validation** with proper maxlength attributes
- **Enhanced table display** with proper null handling
- **Card state management** with localStorage persistence
- **Modal editing** functionality

## Usage

### Adding New Urusan
1. Navigate to AdmData page
2. Expand the Master Urusan card
3. Fill in:
   - **Nama Urusan** (required, max 100 chars)
   - **Kode** (optional, max 20 chars, must be unique)
   - **Fungsi** (select from active fungsi only)
4. Click "Simpan"

### Editing Urusan
1. Click "Tindakan" dropdown on any urusan row
2. Select "Edit"
3. Modify data in the modal
4. Click "Simpan"

### Changing Status
1. Click "Tindakan" dropdown on any urusan row
2. Select "Ubah Status"
3. Confirm the action

## API Endpoints

All endpoints follow the pattern: `admdata/[action]`

- **POST** `admdata/save_master_urusan` - Create/Update urusan
- **GET** `admdata/urusanById/{id}` - Get urusan data (AJAX)
- **GET** `admdata/setStatus_urusan/{id}` - Toggle status
- **GET** `admdata/delete_urusan/{id}` - Delete urusan

## Validation Rules

- **namaurusan**: Required, max 100 characters, must be unique
- **kode**: Optional, max 20 characters, must be unique if provided
- **fungsi_id**: Optional, must be valid fungsi ID

## Dependencies

- **Master Fungsi**: Must be set up first as urusan references fungsi
- **CodeIgniter 3.x**: Framework requirements
- **MySQL/MariaDB**: Database with InnoDB support for foreign keys

## Troubleshooting

### Common Issues

1. **Foreign key constraint fails**
   - Ensure fungsi table exists and has data
   - Check that fungsi_id references valid fungsi records

2. **Duplicate entry errors**
   - Check for existing urusan with same name or code
   - Use unique names and codes

3. **Modal not showing**
   - Ensure jQuery and Bootstrap are loaded
   - Check browser console for JavaScript errors

4. **Fungsi dropdown empty**
   - Verify fungsi table has records with status 'Aktif'
   - Check Master_fungsi_model is loaded in controller

## Testing

To test the functionality:

1. **Create Test Data**:
   ```php
   // In controller or via database
   $this->Master_urusan_model->insert_sample_data();
   ```

2. **Verify CRUD Operations**:
   - Create new urusan
   - Edit existing urusan
   - Toggle status
   - Delete urusan (ensure no dependencies)

3. **Test Validation**:
   - Try duplicate names/codes
   - Test required field validation
   - Test maxlength constraints

## Future Enhancements

Potential improvements:
- Bulk operations (import/export)
- Advanced search and filtering
- Audit trail for changes
- Integration with other modules (programs, activities)
- API versioning for mobile apps
