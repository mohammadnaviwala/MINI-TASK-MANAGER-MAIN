import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
<script>
    // Auto-refresh CSRF token every 10 minutes (600000 ms)
    setInterval(function() {
        fetch("{{ route('refresh-csrf') }}")
            .then(response => response.json())
            .then(data => {
                if(data.token) {
                    // Update all CSRF tokens in forms
                    document.querySelectorAll('input[name="_token"]').forEach(function(input){
                        input.value = data.token;
                    });
                    // Optional: update X-CSRF-TOKEN header if using AJAX
                    if(window.axios) {
                        axios.defaults.headers.common['X-CSRF-TOKEN'] = data.token;
                    }
                }
            })
            .catch(err => console.error('CSRF refresh failed', err));
    }, 600000); // 10 minutes
</script>