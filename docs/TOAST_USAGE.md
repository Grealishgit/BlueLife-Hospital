# Toast Notification System

## Overview
The toast notification system provides beautiful, animated notifications for success, error, warning, and info messages throughout your application.

## File Location
- **Toast Component**: `components/toast.php`
- **Auto-included in**: All pages that include `app/Views/loginModal.php`

## Usage Examples

### Basic Usage
```javascript
// Success notification
showToast.success('Operation completed successfully!');

// Error notification  
showToast.error('Something went wrong. Please try again.');

// Warning notification
showToast.warning('Please check your input before proceeding.');

// Info notification
showToast.info('This is some helpful information.');
```

### Advanced Usage
```javascript
// Custom duration (in milliseconds)
showToast.success('Message', 3000); // Shows for 3 seconds
showToast.error('Error message', 10000); // Shows for 10 seconds

// Manual control
const toastId = toastManager.show('Custom message', 'success', 0); // 0 = no auto-remove
toastManager.remove(toastId); // Remove manually

// Clear all toasts
toastManager.clear();
```

## Integration in Other Components

### Step 1: Include the Toast Component
Add this line to the top of your PHP file:
```php
<?php include 'components/toast.php'; ?>
```

### Step 2: Use in JavaScript
```javascript
// In form submissions
fetch('your-endpoint.php', {
    method: 'POST',
    body: formData
})
.then(response => response.json())
.then(data => {
    if (data.success) {
        showToast.success(data.message);
    } else {
        showToast.error(data.message);
    }
})
.catch(error => {
    showToast.error('Network error occurred');
});

// In event handlers
document.getElementById('saveButton').addEventListener('click', () => {
    if (validateForm()) {
        showToast.success('Form saved successfully!');
    } else {
        showToast.error('Please fix the errors in the form.');
    }
});
```

## Toast Types

| Type | Color | Icon | Default Duration |
|------|-------|------|------------------|
| `success` | Green | Checkmark | 5 seconds |
| `error` | Red | X Mark | 7 seconds |
| `warning` | Yellow | Exclamation | 6 seconds |
| `info` | Blue | Info Circle | 5 seconds |

## Features

✅ **Auto-positioning**: Fixed to top-right corner  
✅ **Auto-stacking**: Multiple toasts stack vertically  
✅ **Auto-removal**: Configurable duration  
✅ **Manual dismiss**: Click X button to close  
✅ **Smooth animations**: Slide in/out transitions  
✅ **Responsive design**: Works on mobile and desktop  
✅ **Global access**: Available on all pages  

## Real-world Examples

### Login Success
```javascript
showToast.success('Welcome back! Redirecting to dashboard...');
setTimeout(() => window.location.href = 'admin.php', 2000);
```

### Form Validation
```javascript
if (!email.includes('@')) {
    showToast.error('Please enter a valid email address.');
    return false;
}
```

### API Responses
```javascript
.then(response => {
    if (response.ok) {
        showToast.success('Data saved successfully!');
    } else {
        showToast.error('Failed to save data. Server error.');
    }
});
```

### File Upload
```javascript
const fileInput = document.getElementById('fileUpload');
fileInput.addEventListener('change', () => {
    if (fileInput.files.length > 0) {
        showToast.info('File selected. Ready to upload.');
    }
});
```

## Customization

The toast system is fully customizable via the CSS classes and JavaScript configuration in `components/toast.php`. You can modify:

- Colors and styling
- Animation duration
- Position (currently top-right)
- Icons for each type
- Default durations

## Browser Support
- Chrome ✅
- Firefox ✅  
- Safari ✅
- Edge ✅
- IE11+ ✅
