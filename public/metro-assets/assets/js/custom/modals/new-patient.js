"use strict";
var KTModalNewPatient = (function () {
    var t, e, n, o, i, r;
    return {
        init: function () {
            (r = document.querySelector("#kt_modal_new_patient")) &&
                ((i = new bootstrap.Modal(r)),
                (o = document.querySelector("#kt_modal_new_patient_form")),
                (t = document.getElementById("kt_modal_new_patient_submit")),
                (e = document.getElementById("kt_modal_new_patient_cancel")),
                $(a.querySelector('[name="patient_sex"]')).on(
                    "change",
                    function () {
                        n.revalidateField("patient_sex");
                    }
                ),
                (n = FormValidation.formValidation(o, {
                    fields: {
                        patient_first_name: {
                            validators: {
                                notEmpty: { message: "First name is required" },
                            },
                        },
                        patient_last_name: {
                            validators: {
                                notEmpty: { message: "Last name is required" },
                            },
                        },
                        patient_sex: {
                            validators: {
                                notEmpty: { message: "Sex is required" },
                            },
                        },
                        patient_age: {
                            validators: {
                                notEmpty: { message: "Age is required" },
                            },
                        },
                        patient_contact: {
                            validators: {
                                notEmpty: { message: "Contact is required" },
                            },
                        },
                        patient_address: {
                            validators: {
                                notEmpty: { message: "Address is required" },
                            },
                        },
                        state: {
                            validators: {
                                notEmpty: { message: "State is required" },
                            },
                        },
                        postcode: {
                            validators: {
                                notEmpty: { message: "Postcode is required" },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: "",
                        }),
                    },
                })),
                t.addEventListener("click", function (e) {
                    e.preventDefault(),
                        n &&
                            n.validate().then(function (e) {
                                console.log("validated!"),
                                    "Valid" == e
                                        ? (t.setAttribute(
                                              "data-kt-indicator",
                                              "on"
                                          ),
                                          (t.disabled = !0),
                                          setTimeout(function () {
                                              t.removeAttribute(
                                                  "data-kt-indicator"
                                              ),
                                                  (t.disabled = !1),
                                                  Swal.fire({
                                                      text: "Data has been successfully submitted!",
                                                      icon: "success",
                                                      buttonsStyling: !1,
                                                      confirmButtonText:
                                                          "Ok, got it!",
                                                      customClass: {
                                                          confirmButton:
                                                              "btn btn-primary",
                                                      },
                                                  }).then(function (t) {
                                                      t.isConfirmed && i.hide();
                                                  });
                                          }, 2e3))
                                        : Swal.fire({
                                              text: "Sorry, looks like there are some errors detected, please try again.",
                                              icon: "error",
                                              buttonsStyling: !1,
                                              confirmButtonText: "Ok, got it!",
                                              customClass: {
                                                  confirmButton:
                                                      "btn btn-primary",
                                              },
                                          });
                            });
                }),
                e.addEventListener("click", function (t) {
                    t.preventDefault(),
                        Swal.fire({
                            text: "Are you sure you would like to cancel?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Yes, cancel it!",
                            cancelButtonText: "No, return",
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-active-light",
                            },
                        }).then(function (t) {
                            t.value
                                ? (o.reset(), i.hide())
                                : "cancel" === t.dismiss &&
                                  Swal.fire({
                                      text: "Your form has not been cancelled!.",
                                      icon: "error",
                                      buttonsStyling: !1,
                                      confirmButtonText: "Ok, got it!",
                                      customClass: {
                                          confirmButton: "btn btn-primary",
                                      },
                                  });
                        });
                }));
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTModalNewAddress.init();
});
