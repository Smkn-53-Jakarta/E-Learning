"use strict";

// Class definition
var KTUsersUpdatePermission = function () {
    // Shared variables
    const element = document.getElementById('kt_modal_update_permission');
    const form = element.querySelector('#kt_modal_update_permission_form');
    const modal = new bootstrap.Modal(element);

    // Init add schedule modal
    var initUpdatePermission = () => {


    }

    return {
        // Public functions
        init: function () {
            initUpdatePermission();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTUsersUpdatePermission.init();
});
