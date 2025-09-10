<!-- Toast Container -->
<div id="toastContainer" class="fixed top-10 right-4 w-80 z-90 space-y-1"></div>

<style>
.toast {
    transform: translateX(100%);
    transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
    opacity: 1;
}

.toast.show {
    transform: translateX(0);
}

.toast.hide {
    transform: translateX(100%);
    opacity: 0;
}
</style>

<script>
class ToastManager {
    constructor() {
        this.container = document.getElementById('toastContainer');
        this.toastCount = 0;
    }

    show(message, type = 'info', duration = 5000) {
        const toastId = `toast-${++this.toastCount}`;
        const toast = this.createToast(toastId, message, type);

        this.container.appendChild(toast);

        // Trigger show animation
        setTimeout(() => {
            toast.classList.add('show');
        }, 10);

        // Auto remove after duration
        if (duration > 0) {
            setTimeout(() => {
                this.remove(toastId);
            }, duration);
        }

        return toastId;
    }

    createToast(id, message, type) {
        const toast = document.createElement('div');
        toast.id = id;
        toast.className =
            `toast max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5`;

        const config = this.getTypeConfig(type);

        toast.innerHTML = `
            <div class="p-3">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-6 h-6 ${config.iconBg} rounded-full flex items-center justify-center">
                            ${config.icon}
                        </div>
                    </div>
                    <div class="ml-3 w-0 flex-1">
                        <p class="text-sm font-medium text-gray-900">
                            ${config.title}
                        </p>
                        <p class="mt-1 text-sm text-gray-500">
                            ${message}
                        </p>
                    </div>
                    <div class="ml-4 flex-shrink-0 flex">
                        <button onclick="toastManager.remove('${id}')" 
                                class="inline-flex text-gray-400 hover:text-red-500 cursor-pointer ">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        `;

        return toast;
    }

    getTypeConfig(type) {
        const configs = {
            success: {
                title: 'Success!',
                iconBg: 'bg-green-100',
                icon: `<svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                       </svg>`
            },
            error: {
                title: 'Error!',
                iconBg: 'bg-red-100',
                icon: `<svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                       </svg>`
            },
            warning: {
                title: 'Warning!',
                iconBg: 'bg-yellow-100',
                icon: `<svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                       </svg>`
            },
            info: {
                title: 'Info',
                iconBg: 'bg-blue-100',
                icon: `<svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                       </svg>`
            }
        };

        return configs[type] || configs.info;
    }

    remove(toastId) {
        const toast = document.getElementById(toastId);
        if (toast) {
            toast.classList.add('hide');
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
            }, 300);
        }
    }

    // Convenience methods
    success(message, duration = 5000) {
        return this.show(message, 'success', duration);
    }

    error(message, duration = 7000) {
        return this.show(message, 'error', duration);
    }

    warning(message, duration = 6000) {
        return this.show(message, 'warning', duration);
    }

    info(message, duration = 5000) {
        return this.show(message, 'info', duration);
    }

    // Clear all toasts
    clear() {
        const toasts = this.container.querySelectorAll('.toast');
        toasts.forEach(toast => {
            this.remove(toast.id);
        });
    }
}

// Initialize global toast manager
const toastManager = new ToastManager();

// Make it globally available
window.toastManager = toastManager;
window.showToast = {
    success: (message, duration) => toastManager.success(message, duration),
    error: (message, duration) => toastManager.error(message, duration),
    warning: (message, duration) => toastManager.warning(message, duration),
    info: (message, duration) => toastManager.info(message, duration)
};
</script>