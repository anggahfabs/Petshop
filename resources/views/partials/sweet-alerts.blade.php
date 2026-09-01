<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const successMessage = @json(session('success') ?? session('success_newsletter') ?? session('status'));
        const errorMessage = @json(session('error'));
        const validationErrors = @json($errors->any() ? $errors->all() : []);

        if (successMessage) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: successMessage,
                confirmButtonColor: '#2563eb'
            });
        } else if (errorMessage) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: errorMessage,
                confirmButtonColor: '#dc2626'
            });
        } else if (validationErrors.length) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                html: validationErrors.join('<br>'),
                confirmButtonColor: '#dc2626'
            });
        }

        document.querySelectorAll('form').forEach((form) => {
            const methodInput = form.querySelector('input[name="_method"]');
            const isDeleteForm = methodInput && methodInput.value.toUpperCase() === 'DELETE';

            if (!isDeleteForm && !form.dataset.confirm) {
                return;
            }

            form.onsubmit = null;
            form.addEventListener('submit', (event) => {
                if (form.dataset.confirmed === 'true') {
                    return;
                }

                event.preventDefault();

                Swal.fire({
                    icon: 'warning',
                    title: 'Yakin hapus data ini?',
                    text: form.dataset.confirm || 'Data yang dihapus tidak bisa dikembalikan.',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#64748b'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.dataset.confirmed = 'true';
                        form.submit();
                    }
                });
            });
        });
    });
</script>
