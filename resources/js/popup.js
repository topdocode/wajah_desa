
const modalEl = document.getElementById('info-popup');

if (modalEl) {
    const privacyModal = new Modal(modalEl, {
        placement: 'center'
    });

    privacyModal.show();

    const closeModalEl = document.getElementById('close-modal');
    closeModalEl.addEventListener('click', function () {
        privacyModal.hide();
    });
}

