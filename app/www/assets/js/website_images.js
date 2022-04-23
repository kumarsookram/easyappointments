
/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) 2013 - 2020, Alex Tselegidis
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        http://easyappointments.org
 * @since       v1.0.0
 * ---------------------------------------------------------------------------- */

(function () {

    'use strict';

    /**
     * Class WebsiteImages
     *
     * Contains the website images functionality. The website images DOM elements must be same
     * in every page this class is used.
     *
     * @class WorkingPlan
     */
    var WebsiteImages = function () {
        /**
         * This flag is used when trying to cancel row editing. It is
         * true only whenever the user presses the cancel button.
         *
         * @type {Boolean}
         */
        this.enableCancel = false;

        /**
         * This flag determines whether the jeditables are allowed to submit. It is
         * true only whenever the user presses the save button.
         *
         * @type {Boolean}
         */
        this.enableSubmit = false;
    };

    /**
     * Setup the dom elements of a given working plan.
     *
     * @param {Object} websiteImages Contains the images for the website
     */
    WebsiteImages.prototype.setup = function (websiteImages) {

        $('.website-images tbody').empty();

        $.each(websiteImages, function (index, websiteImage) {

            $('<tr/>', {
                'html': [
                    $('<td/>', {
                        'html': [
                            $('<input/>', {
                                'id': index + '-website-image',
                                'type': "text",
                                'class': 'website-image-url form-control form-control-sm editable',
                                'disabled': true
                            })
                        ]
                    }),
                    $('<td/>', {
                        'html': [
                          $('<img/>', {
                            'class': 'website-image-img',
                            'height': '60px',
                            'src': websiteImage
                          })
                        ]
                    }),
                    $('<td/>', {
                        'html': [
                            $('<button/>', {
                                'type': 'button',
                                'class': 'btn btn-outline-secondary btn-sm edit-website-image',
                                'title': EALang.edit,
                                'html': [
                                    $('<span/>', {
                                        'class': 'fas fa-edit'
                                    })
                                ]
                            }),
                            $('<button/>', {
                                'type': 'button',
                                'class': 'btn btn-outline-secondary btn-sm delete-website-image',
                                'title': EALang.delete,
                                'html': [
                                    $('<span/>', {
                                        'class': 'fas fa-trash-alt'
                                    })
                                ]
                            }),
                            $('<button/>', {
                                'type': 'button',
                                'class': 'btn btn-outline-secondary btn-sm reset-website-image d-none',
                                'title': EALang.undo,
                                'html': [
                                    $('<span/>', {
                                        'class': 'fas fa-undo'
                                    })
                                ]
                            }),
                            $('<button/>', {
                                'type': 'button',
                                'class': 'btn btn-outline-secondary btn-sm save-website-image d-none',
                                'title': EALang.save,
                                'html': [
                                    $('<span/>', {
                                        'class': 'fas fa-check-circle'
                                    })
                                ]
                            }),
                            $('<button/>', {
                                'type': 'button',
                                'class': 'btn btn-outline-secondary btn-sm cancel-website-image d-none',
                                'title': EALang.cancel,
                                'html': [
                                    $('<span/>', {
                                        'class': 'fas fa-ban'
                                    })
                                ]
                            })
                        ]
                    })
                ]
            })
                .appendTo('.website-images tbody');

            $('#' + index + '-website-image').val(websiteImage);

        }.bind(this));
    };

    /**
     * Binds the event handlers for the working plan dom elements.
     */
    WebsiteImages.prototype.bindEventHandlers = function () {

        /**
         * Event: Add Website Image Button "Click"
         *
         * A new row is added on the table and the user can enter the new break
         * data. After that he can either press the save or cancel button.
         */
        $('.add-website-image').on('click', function () {

            var $newWebsiteImage = $('<tr/>', {
                'html': [
                    $('<td/>', {
                        'html': [
                            $('<input/>', {
                                'id': $('.website-images tbody tr').length + '-start',
                                'class': 'website-image-url form-control form-control-sm editable',
                                'disabled': false
                            })
                        ]
                    }),
                    $('<td/>', {
                        'html': [
                          $('<img/>', {
                            'class': 'website-image-img',
                            'height': '60px',
                            'src': ''
                          })
                        ]
                    }),
                    $('<td/>', {
                        'html': [
                            $('<button/>', {
                                'type': 'button',
                                'class': 'btn btn-outline-secondary btn-sm edit-website-image',
                                'title': EALang.edit,
                                'html': [
                                    $('<span/>', {
                                        'class': 'fas fa-edit'
                                    })
                                ]
                            }),
                            $('<button/>', {
                                'type': 'button',
                                'class': 'btn btn-outline-secondary btn-sm delete-website-image',
                                'title': EALang.delete,
                                'html': [
                                    $('<span/>', {
                                        'class': 'fas fa-trash-alt'
                                    })
                                ]
                            }),
                            $('<button/>', {
                                'type': 'button',
                                'class': 'btn btn-outline-secondary btn-sm reset-website-image d-none',
                                'title': EALang.undo,
                                'html': [
                                    $('<span/>', {
                                        'class': 'fas fa-undo'
                                    })
                                ]
                            }),
                            $('<button/>', {
                                'type': 'button',
                                'class': 'btn btn-outline-secondary btn-sm save-website-image d-none',
                                'title': EALang.save,
                                'html': [
                                    $('<span/>', {
                                        'class': 'fas fa-check-circle'
                                    })
                                ]
                            }),
                            $('<button/>', {
                                'type': 'button',
                                'class': 'btn btn-outline-secondary btn-sm cancel-website-image d-none',
                                'title': EALang.cancel,
                                'html': [
                                    $('<span/>', {
                                        'class': 'fas fa-ban'
                                    })
                                ]
                            })
                        ]
                    })
                ]
            })
                .appendTo('.website-images tbody');
            $newWebsiteImage.find('.edit-website-image').trigger('click');
        }.bind(this));

        /**
         * Event: Edit Website Image Button "Click"
         *
         * Enables the row editing for the "WebsiteImages" table rows.
         */
        $(document).on('click', '.edit-website-image', function () {
            // Reset previous editable table cells.
            var $previousEdits = $(this).closest('table').find('.editable');

            $previousEdits.each(function (index, editable) {
                if (editable.reset) {
                    editable.reset();
                }
            });

            // Make all cells in current row editable.
            $(this).parent().parent().children().trigger('edit');
            $(this).parent().parent().find('.website-image-url').prop('disabled', false);
            $(this).parent().parent().find('.website-image-url').focus();

            // Show save - cancel buttons.
            var $tr = $(this).closest('tr');
            $tr.find('.edit-website-image, .delete-website-image').addClass('d-none');
            $tr.find('.reset-website-image, .save-website-image, .cancel-website-image').removeClass('d-none');
            $tr.find('select,input:text').addClass('form-control form-control-sm')
        });

        /**
         * Event: Delete Website Image Button "Click"
         *
         * Removes the current line from the "WebsiteImages" table.
         */
        $(document).on('click', '.delete-website-image', function () {
            $(this).parent().parent().remove();
        });

        /**
         * Event: Reset/Undo Website Image Button "Click"
         *
         * Removes the editable values.
         *
         * @param {jQuery.Event} e
         */
        $(document).on('click', '.reset-website-image', function (event) {
            var element = event.target;
            var $modifiedRow = $(element).closest('tr');
            $modifiedRow.find('.website-image-url').val("");
        }.bind(this));

        /**
         * Event: Cancel Website Image Button "Click"
         *
         * Bring the ".website-images" table back to its initial state.
         *
         * @param {jQuery.Event} event
         */
        $(document).on('click', '.cancel-website-image', function (event) {
            var element = event.target;
            var $modifiedRow = $(element).closest('tr');
            this.enableCancel = true;
            $modifiedRow.find('.cancel-editable').trigger('click');
            this.enableCancel = false;

            $modifiedRow.find('.edit-website-image, .delete-website-image').removeClass('d-none');
            $modifiedRow.find('.reset-website-image, .save-website-image, .cancel-website-image').addClass('d-none');
        }.bind(this));

        /**
         * Event: Save Website Image Button "Click"
         *
         * Save the editable values and restore the table to its initial state.
         *
         * @param {jQuery.Event} e
         */
        $(document).on('click', '.save-website-image', function (event) {
            var element = event.target;
            var $modifiedRow = $(element).closest('tr');

            this.enableSubmit = true;
            $modifiedRow.find('.editable .submit-editable').trigger('click');
            this.enableSubmit = false;

            $modifiedRow.find('.reset-website-image, .save-website-image, .cancel-website-image').addClass('d-none');
            $modifiedRow.find('.edit-website-image, .delete-website-image').removeClass('d-none');

            $modifiedRow.find('.website-image-img').prop('src', $modifiedRow.find('.website-image-url').val());
            $modifiedRow.find('.website-image-url').prop('disabled', true);
        }.bind(this));
    };

    /**
     * Get the Website Images settings.
     *
     * @return {Object} Returns the website images settings object.
     */
    WebsiteImages.prototype.get = function () {
        var websiteImages = {};

        $('.website-images tbody tr').each(function (index, tr) {
            var $tr = $(tr);
            websiteImages[index] = $tr.find('.website-image-url').val();
        }.bind(this));

        return websiteImages;
    };

    /**
     * Reset the current plan back to the company's default website images.
     */
    WebsiteImages.prototype.reset = function () {

    };

    window.WebsiteImages = WebsiteImages;

})();
