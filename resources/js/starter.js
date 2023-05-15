let event;
let height;

$.fn.hasAttr = function (name) {
    return this.attr(name) !== undefined;
};

const starter = {
    _var: {},

    _const: {},

    init: function () {
        starter.onClicks();
        starter.onChanges();
        starter.onInputs();
        starter.modal();
        starter.formStyled();

        console.log('STARTER');

    },

    onChanges: function () {
        $(document).on("change", ".select", function () {
            $(this).find('option[value=""]:checked').parent().addClass("empty");
            $(this)
                .find('option:not([value=""]):checked')
                .parent()
                .removeClass("empty");
        });

        $(document).on("change", ".checkbox", function (e) {
            e.target.checked === true ? $(this).addClass("valid").removeClass("invalid") : $(this).removeClass("valid");
        });

        $(document).on('change', '.input, .textarea, .checkbox', function () {
            console.log('onChange');
            const item = $(this);
            const value = $(this).val().trim();
            const name = $(this).attr('name');

            const valid = () => {
                switch (name) {
                    case 'firstname':
                        return starter.validator.isName(value, 'Imię');
                    case 'lastname':
                        return starter.validator.isName(value, 'Nazwisko');
                    case 'email':
                        return starter.validator.isEmail(value, 'Adres e-mail');
                    case 'phone':
                        return starter.validator.isPhone(value, 'Telefon');
                    case 'address':
                        return starter.validator.isAddress(value, 'Adres');
                    case 'city':
                        return starter.validator.isCity(value, 'Miasto');
                    case 'zip':
                        return starter.validator.isZip(value, 'Kod pocztowy');
                    case 'voivodeship':
                        return starter.validator.isVoivodeship(value, 'Województwo');
                    case 'product':
                        return starter.validator.isProduct(value, 'Zakupiony produkt');
                    case 'shop':
                        return starter.validator.isShop(value, 'Rodzaj sklepu');
                    case 'free':
                        return starter.validator.isFree(value, 'Gratis');
                    case 'where':
                        return starter.validator.isWhere(value, 'Skąd wiesz o promocji');
                    case 'receipt_number':
                        return starter.validator.isReceiptNumber(value, 'Numer dowodu zakupu');
                    case 'legal_1':
                        return starter.validator.isLegal(item);
                    case 'legal_2':
                        return starter.validator.isLegal(item);
                    case 'just_for_you_id':
                        return starter.validator.isNumber(value, 'Numer zgłoszenia');
                    case 'url':
                        return starter.validator.isURL(value, 'Link do opinii');
                    case 'content':
                        return starter.validator.isContent(value, 'Treść opinii');
                        return;
                }
            }

            if (valid() !== true) {
                $(`.error-${name}`).text(valid());
            } else {
                $(`.error-${name}`).text('');
            }

        });

        $(document).on("change", ".upload-file", function () {
            const file = this.files[0];
            const fieldId = $(this).attr('id');

            $(`#${fieldId}_error`).text('');

            if (file) {
                if (file.size <= 4 * 1024 * 1024) {
                    const extension = file.name.split('.').pop().toLowerCase();
                    if (['jpg', 'jpeg', 'png'].indexOf(extension) !== -1) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $(`#${fieldId}_thumb`).attr('src', event.target.result);
                        }
                        reader.readAsDataURL(file);
                    } else {
                        // Wyświetlenie komunikatu o błędzie
                        $(`.error-${fieldId}`).text('Można wybrać tylko pliki graficzne JPG, JPEG lub PNG');
                        // Wyczyszczenie pola wyboru pliku
                        $(this).val('');
                    }
                } else {
                    // Wyświetlenie komunikatu o błędzie
                    $(`.error-${fieldId}`).text('Rozmiar pliku nie może przekraczać 4 MB');
                    // Wyczyszczenie pola wyboru pliku
                    $(this).val('');
                }
            }
        });
    },

    onInputs: function () {
        $(document).on("input", ".input", function (e) {
            e.target.value !== "" ? $(this).addClass("valid").removeClass("invalid") : $(this).removeClass("valid");
        });

        $(document).on("input", ".textarea", function (e) {
            e.target.value !== "" ? $(this).addClass("valid").removeClass("invalid") : $(this).removeClass("valid");
        });
    },

    onClicks: function () {
        $(document).on("click", "button.submit", function () {
            const fields = starter.getFields($(this).closest('form'));
            const url = $(this).closest('form').attr('action');

            axios({
                method: 'post',
                url: url,
                headers: {
                    'content-type': 'multipart/form-data',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: fields,
            }).then(function (response) {
                window.location = response.data.results.url;
            }).catch(function (error) {
                $(`.error`).text('');
                if (error.response) {
                    console.log('error.response');
                    // The request was made and the server responded with a status code
                    // that falls out of the range of 2xx
                    // console.log(error.response.data);
                    // console.log(error.response.status);
                    // console.log(error.response.headers);

                    Object.keys(error.response.data.errors).map((item) => {
                        $(`.error-${item}`).text(error.response.data.errors[item][0]);
                    });
                } else if (error.request) {
                    console.log('error.request');
                    // The request was made but no response was received
                    // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                    // http.ClientRequest in node.js
                    console.log(error.request);
                } else {
                    // Something happened in setting up the request that triggered an Error
                    console.log('Error', error.message);
                }
            });

            return false;
        });

        $(document).on("click", "button.button-uploads", function () {
            $(this).prev().find("input[type=file]").trigger("click");
        });
    },

    getFields: function ($form) {
        const inputs = $form.find('.input');
        const textareas = $form.find('.textarea');
        const checkboxes = $form.find('.checkbox');
        const files = $form.find('.file');

        const fields = {};

        $.each(inputs, function (index, item) {
            fields[$(item).attr('name')] = $(item).val();
        });

        $.each(textareas, function (index, item) {
            fields[$(item).attr('name')] = $(item).val();
        });

        $.each(checkboxes, function (index, item) {
            if ($(item).prop('checked')) {
                fields[$(item).attr('name')] = $(item).val();
            }
        });

        $.each(files, function (index, item) {
            if (item.files[0]) {
                fields[$(item).attr('name')] = item.files[0];
            }
        })

        fields['_token'] = $form.find('input[name=_token]').val();

        return fields;
    },

    modal: function () {
        const modal = document.getElementById('modal')

        modal?.addEventListener('show.bs.modal', (e) => {
            var recipient = $(e.relatedTarget).data("product");

            var $modal = $('#modal');

            $modal.find(".modal-body .logos > div").remove();

            $.getJSON("/json/product.json", function (data) {
                $.each(data[recipient], function (index, value) {
                    $modal
                        .find(".modal-body .logos")
                        .append(
                            '<div class="col-12 col-sm-6"><a href="' +
                            value +
                            '" title="Kup teraz" class="logo" target="_blank" rel="noopener noreferrer" data-fbpa="true"></a></div>'
                        );
                });
            });
        })
    },

    formStyled: function () {
        $(".input")
            .find("~ .error:not(:empty)")
            .siblings(".input")
            .addClass("invalid");

        $('.input:not(.select):not([value=""])').addClass("valid");

        $(".textarea")
            .find("~ .error:not(:empty)")
            .siblings(".textarea")
            .addClass("invalid");
        $(".textarea:not(:empty)").addClass("valid");

        $(".checkbox")
            .parent()
            .find("~ .error:not(:empty)")
            .siblings(".label")
            .find(".checkbox")
            .addClass("invalid");

        $(".select").find('option[value=""]:checked').parent().addClass("empty");

        $("#buy_at").datepicker({
            minDate: new Date(2021, 9, 18),
            maxDate: new Date(2022, 0, 31),
            dateFormat: "dd-mm-yy",
            onSelect: function (value, date) {
                $(this).removeClass("invalid").addClass("valid");
            },
        });
    },

    validator: {
        isName: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (value.length < 3 || value.length > 128) {
                return `Pole ${name} musi mieć od 3 do 128 znaków.`;
            } else if (!/^[\p{L}\s-]+$/u.test(value)) {
                return `Pole ${name} może zawierać tylko litery.`;
            } else {
                return true;
            }
        },
        isAddress: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (value.length > 255) {
                return `Pole ${name} może mieć maksymalnie 255 znaków.`;
            } else {
                return true;
            }
        },
        isCity: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (value.length < 2 || value.length > 64) {
                return `Pole ${name} musi mieć od 2 do 64 znaków.`;
            } else {
                return true;
            }
        },
        isZip: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (!/^[0-9]{2}-[0-9]{3}$/.test(value)) {
                return 'Wprowadź poprawny kod pocztowy.';
            } else {
                return true;
            }
        },
        isVoivodeship: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (isNaN(value) || parseInt(value) < 1 || parseInt(value) > 16) {
                return 'Wybierz województwo.';
            } else {
                return true;
            }
        },
        isPhone: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (!/^\+48(\s)?([1-9]\d{8}|[1-9]\d{2}\s\d{3}\s\d{3}|[1-9]\d{1}\s\d{3}\s\d{2}\s\d{2}|[1-9]\d{1}\s\d{2}\s\d{3}\s\d{2}|[1-9]\d{1}\s\d{2}\s\d{2}\s\d{3}|[1-9]\d{1}\s\d{4}\s\d{2}|[1-9]\d{2}\s\d{2}\s\d{2}\s\d{2}|[1-9]\d{2}\s\d{3}\s\d{2}|[1-9]\d{2}\s\d{4})$/.test(value)) {
                return 'Wprowadź poprawny numer telefonu.';
            } else {
                return true;
            }
        },
        isEmail: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (value.length > 255) {
                return `Pole ${name} może mieć maksymalnie 255 znaków.`;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                return 'Wprowadź poprawny adres email.';
            } else {
                return true;
            }
        },
        isProduct: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (isNaN(value) || parseInt(value) < 1 || parseInt(value) > 42) {
                return 'Wybierz produkt.';
            } else {
                return true;
            }
        },
        isShop: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (isNaN(value) || parseInt(value) < 1 || parseInt(value) > 2) {
                return 'Wybierz rodzaj sklepu.';
            } else {
                return true;
            }
        },
        isReceiptNumber: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (value.length < 1 || value.length > 128) {
                return `Pole ${name} musi mieć od 1 do 128 znaków.`;
            } else {
                return true;
            }
        },
        isFree: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (isNaN(value) || parseInt(value) < 1 || parseInt(value) > 3) {
                return 'Wybierz gratis.';
            } else {
                return true;
            }
        },
        isWhere: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (isNaN(value) || parseInt(value) < 1 || parseInt(value) > 8) {
                return 'Wybierz opcje.';
            } else {
                return true;
            }
        },
        isLegal: (item, name) => {
            if (item.val() === "") {
                return `Pole jest wymagane.`;
            } else if (!item.prop('checked')) {
                return `Pole jest wymagane.`;
            } else {
                return true;
            }
        },
        isNumber: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (!/^\d{1,8}$/.test(value)) {
                return 'Wprowadź poprawną wartość.';
            } else {
                return true;
            }
        },
        isURL: (value, name) => {
            const urlPattern = /^(https?:\/\/)?([\w.-]+)\.([a-z]{2,})(\/\S*)?$/i;
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (!urlPattern.test(value)) {
                return 'Wprowadź poprawny adres URL.';
            } else {
                return true;
            }
        },
        isContent: (value, name) => {
            if (value === "") {
                return `Pole ${name} jest wymagane.`;
            } else if (value.length < 3 || value.length > 2048) {
                return `Pole ${name} musi mieć od 3 do 2048 znaków.`;
            } else {
                return true;
            }
        },
    },
};

$(window).on("load", function (e) {
    event = e || window.event;

    starter.init();
});
