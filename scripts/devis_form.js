$(document).ready(function () {
    //choix type client
    $("#forParticulier").click(function () {
        $('.forPro').addClass('hide');
    });
    $("#forProfessionnel").click(function () {
        $('.forPro').removeClass('hide');
    });

    $('#prix_total').attr('data-total', '{}');


    //check civil
    $('input[name="user_type"]').change(function () {
        var user_type = $(this).val();
        updateTotal('user_type', user_type, false, false);
        if (user_type == 'Professionnel') {
            $('.forPro').removeClass('forPro-hide');
        } else {
            $('.forPro').addClass('forPro-hide');
        }
    });

    //check cities
    $('input[name="country"]').change(function () {

        resetForm('all', false);

        $('#logementType').removeClass('hide');

        var country = $(this).val();

        updateTotal('country', country, false, false);

    });

    //check cities
    // $("#controle_cp").keyup(function () {
    //     var cpControle = $(this).val();
    //     var country = $('input[name="country"]:checked').val();
    //     var zipOptions = $('datalist#zip');
    //     if (cpControle != '') {
    //         jQuery.ajax({
    //             url: "./forms/get_cities.php",
    //             data: {
    //                 cp: cpControle,
    //                 country: country,
    //             },
    //             dataType: "json",
    //             type: "POST",
    //             success: function (data) {
    //                 // WALLONIE CHECK
    //                 $('.wallonie-only').remove();
    //                 var objectTotal = getTotal();
    //                 if (data == false && objectTotal['country'] == 'BE') {
    //                     $('<span class="wallonie-only" style="color: red">Nous travaillons uniquement en Wallonie</span>').insertBefore(zipOptions);
    //                     $(this).parent().next().addClass('hide');
    //                     zipOptions.html('');

    //                 } else {
    //                     $('.wallonie-only').remove();
    //                     $(this).parent().next().removeClass('hide');
    //                     var options = '';

    //                     for (var i = 0; i < data.length; i++) {
    //                         options += '<option value="' + data[i]['city_cp'] + ' ' + data[i]['city_loca'].toLowerCase().capitalize() + '">' + data[i]['city_cp'] + ' <span>' + data[i]['city_loca'].toLowerCase().capitalize() + '</span></option>';
    //                     }

    //                     zipOptions.html(options);
    //                 }
    //             },
    //             error: function (data) {
    //             }
    //         });
    //     } else {
    //         // resetForm();
    //         // resetCalculDevis();
    //         $('#selectControleType').addClass('hide');

    //     }

    // });

    // $("#controle_cp").change(function () {
    //     // WALLONIE CHECK
    //     if ($('.wallonie-only').length <= 0) {

    //         var cpControle = $(this).val();
    //         var country = $('input[name="country"]:checked').val();

    //         if (cpControle != '') {
    //             $(this).parent().next().removeClass('hide');
    //             jQuery.ajax({
    //                 url: "./forms/get_regio.php",
    //                 data: {
    //                     cp: cpControle,
    //                     country: country,
    //                 },
    //                 type: "POST",
    //                 success: function (data) {
    //                     $('#controle_regio').val(data);
    //                     updateTotal('region', data, false, false);
    //                 },
    //                 error: function (data) {
    //                 }
    //             });

    //             $('#selectControleType').removeClass('hide');

    //         } else {
    //             $('#selectControleType').addClass('hide');
    //         }

    //         var zipcode = $(this).val();
    //         updateTotal('zipcode', zipcode, false, false);
    //         resetForm('zip_control', false);
    //         scrollIntoNextElement('selectControleType');
    //     }
    // });

    // Select "Contexte du controle"
    // $('#selectControleType input[name="context_control"]').on('change', function () {
    //     resetForm('context_control', false);

    //     if ($(this).val() == 'location') {
    //         $('.boxProd label.context_option:not(#produit_peb_label)').addClass('location-hide');
    //         $('.boxProd label.context_option:not(#produit_peb_label) input').attr('disabled', true);
    //     } else {
    //         $('.boxProd label.context_option:not(#produit_peb_label)').removeClass('location-hide');
    //         $('.boxProd label.context_option:not(#produit_peb_label) input').attr('disabled', false);
    //     }

    //     $('.boxProd').removeClass('hide');
    //     var context_control = $(this).val();
    //     updateTotal('context_control', context_control, false, false);
    //     scrollIntoNextElement('selectPrestations');
    // });

    // Select "Prestations"
    // $('.boxProd input').on('change', function () {
    //     var idParent = '#' + $(this).parent()[0].getAttribute('id');
    //     resetForm('prestation_control', idParent);
    //     var result = showPrestationSub($(this)[0], false);
    //     var prestations = $(this).attr('id');
    //     var total = getTotal();

    //     updateTotal('prestations;;' + prestations, '', true, false);
    //     var elementID = prestations.replace('produit_', 'choice_');
    //     scrollIntoNextElement(elementID);

    //     var notChecked = $('.boxProd input:not(:checked)');
    //     if ($('.boxProd input:checked').length > 0) {
    //         var total = getTotal();

    //         if (total['prestations']) {
    //             checkIfIsPrestationIsSelected(total, notChecked)
    //             var total = getTotal();
    //             if ('produit_peb' in total['prestations']) {
    //                 resetForm('peb', false);
    //             } else {
    //                 resetForm('no_peb', false);
    //             }
    //         } else {
    //             resetForm('no_prestation', false);
    //         }
    //     } else {
    //         resetForm('no_prestation', false);
    //         updateTotal('prestations;;' + prestations, '', false, true);
    //     }

    // });

    // INPUTS FROM PRESTATIONS
    // $('.choiceDevis:not(.choiceBien) .resetInput input').on('change', function () {
    //     resetForm('change_inputs_devis', false);
    //     var parent = $(this).closest('.choiceDevis');
    //     var parentId = parent.attr('id');
    //     var choice = parentId.replace('choice', 'produit');

    //     var obj = {};

    //     if (parentId == 'choice_elec') {
    //         var inputValue = $('#' + parentId + ' input[type="number"]');
    //         var value = inputValue[0].value;
    //         var currentId = inputValue[0].getAttribute('name');
    //     }

    //     if (parentId == 'choice_cit' || parentId == 'choice_gaz') {
    //         var inputValue = $('#' + parentId + ' input[type="number"]');
    //         var checked = $('#' + parentId + ' input:checked');
    //         if (checked[0]) {
    //             var currentId = checked.attr('id');
    //             var value = 0;
    //         }
    //         if (inputValue[0]) {
    //             var value = inputValue[0].value;
    //         }
    //     }
    //     if (typeof currentId != "undefined") {
    //         obj = {[currentId]: value};
    //     }

    //     updateTotal('prestations;;' + choice, obj, true, false);
    //     var total = getTotal();
    //     var missingFields = checkIfIsPrestationIsNotEmpty(total);
    //     var missingLogementChoices = checkIfIsTypeLogementIsNotEmpty(total);
    //     if (!missingFields && !missingLogementChoices) {
    //         resetForm('show_btn', false);
    //         scrollIntoNextElement('wrapBoxPrix');
    //     }

    // });

    // Select/Deselect "Type du logement"
    $('.classic label.logementType').on('click', function () {
        if ($(this).hasClass('active')) {

            // click on active type de bien -> unselect it
            updateTotal('bien_type', '', false, true);

            $(this).removeClass('active');
            $(this).find('input').attr('checked', false);
            resetForm('choice_type_bien', false);
        }
    });

    // Listen selection of types de biens
    $('.classic input[name="bien_type"]').on('change', function () {
        resetForm('choice_type_bien', false);

        // Type de la prestation
        // if ($('.boxProd input:checked').length > 0) {
        //     var prestations = $('.boxProd input:checked');
        //     for (var i = 0; i < prestations.length; i++) {
        //         var which = showPrestationSub(prestations[i], true, false);
        //         if (which != '') {
        //             $('#' + which + ' .choiceDevis').addClass('hide');
        //         }
        //         // Type de logement
        //         if ($('.classic > .btn-group-toggle input:checked').length > 0) {
        //             var type = $('.classic input:checked');
        //             var typeBuilding = type[0].getAttribute('data-id');
        //             if ($('#' + typeBuilding).length > 0) {
        //                 $('#' + typeBuilding).removeClass('hide');
        //             }
        //             if ($('#' + typeBuilding).length == 0) {
        //                 resetForm('show_btn', false);
        //             }
        //         }
        //     }
        // } else {
        //     resetForm('no_choice_type_bien', false);
        // }

        // Type de logement
        if ($('.classic > .btn-group-toggle input:checked').length > 0) {
            var type = $('.classic input:checked');
            var typeBuilding = type[0].getAttribute('data-id');
            if ($('#' + typeBuilding).length > 0) {
                $('#' + typeBuilding).removeClass('hide');
            }
            if ($('#' + typeBuilding).length == 0) {
                resetForm('show_btn', false);
            }
        }

        var bien_type = $(this).attr('data-id');

        updateTotal('bien_type', {[bien_type]: ''}, false, false);

    });

    // INPUTS FROM TYPE DE BIENS
    $('.choiceDevis.choiceBien .resetInput input').on('change', function () {
        var total = getTotal();
        var missingFields = checkIfIsPrestationIsNotEmpty(total);
        var missingLogementChoices = checkIfIsTypeLogementIsNotEmpty(total);
        if (!missingFields && !missingLogementChoices) {
            resetForm('show_btn', false);
        }

        var mainParent = $(this).closest('.choiceBien');

        var bien_type = mainParent.attr('id');
        var bien_type_value = $(this).attr('id');

        updateTotal('bien_type', {[bien_type]: bien_type_value}, false, false);
        scrollIntoNextElement('wrapBoxPrix');

    });

    $("label.resetPrice").on('click', function () {
        // resetCalculDevis();
    });
    $("input.resetPrice").blur(function () {
        // resetCalculDevis();
    });

    $('#runCalcul').on('click', function () {
        calculDevis();
        //scrollIntoNextElement('contactData');
    });
});

Object.defineProperty(String.prototype, 'capitalize', {
    value: function () {
        return this.charAt(0).toUpperCase() + this.slice(1);
    },
    enumerable: false
});

function checkRevisit() {
    var datas = getTotal();
    datas.revisits = [];

    var checked = $('.revisit:checked');
    for (var i = 0; i < checked.length; i++) {
        if (checked[i].value == 'Oui') {
            datas.revisits.push(checked[i].getAttribute('name'));
        }
        setTotal(datas);
    }
}

function calculDevis() {
    checkRevisit();
    var datas = getTotal();
    var totalValues = '';
    var devisExists = false;
    var devisExistsCount = 0;

    $('.wrapBoxPrix .boxPrix').addClass('hide');
    $('.wrapBoxPrix .boxPrix').removeClass('border-boxPrix');
    $('.wrapBoxPrix .boxPrix').removeAttr('order');

    $('#contactData').removeClass('hide');

    $('#boxBtnPrix').addClass('hide');

    var defaultPrix = "Demande complexe : contactez-nous au <br><a href='tel:+32479392085'>+32 479 39 20 85</a>";
    var defaultPrixSingular = "Demande est complexe et ne peut être calculée en ligne. Contactez-nous au <a href='tel:+32479392085'>+32 479 39 20 85</a>";
    var defaultPrixPlural = "Demandes sont complexes et ne peuvent être calculées en ligne. Contactez-nous au <a href='tel:+32479392085'>+32 479 39 20 85</a>";
    // var defaultPrixPlural = "Demandes complexes : contactez-nous au <a href='tel:+32479392085'>+32 479 39 20 85</a>";
    var defaultPrixLux = "Contactez-nous au <br><a href='tel:+32479392085'>+32 479 39 20 85</a>";
    // var defaultPrixLuxSingular = "Contactez-nous au <a href='tel:+32479392085'>+32 479 39 20 85</a>";
    // var defaultPrixLuxPlural = "Contactez-nous au <a href='tel:+32479392085'>+32 479 39 20 85</a>";
    var defaultPrixLuxSingular = "Demande est complexe et ne peut être calculée en ligne. Contactez-nous au <a href='tel:+32479392085'>+32 479 39 20 85</a>";
    var defaultPrixLuxPlural = "Demandes sont complexes et ne peuvent être calculées en ligne. Contactez-nous au <a href='tel:+32479392085'>+32 479 39 20 85</a>";
    var aVenirPrix = "A venir";
    var qtyMissing = "Quantité non fournie";

    // country
    var country = datas['country'];
    if (country != 'BE') {
        defaultPrix = defaultPrixLux;
        // defaultPrixSingular = 'Demande : ' + defaultPrixLuxSingular;
        // defaultPrixPlural = 'Demandes : ' + defaultPrixLuxPlural;
        defaultPrixSingular = defaultPrixLuxSingular;
        defaultPrixPlural = defaultPrixLuxPlural;
    }
    totalValues += 'Pays : ' + country + '[[JUMP]]';
    // region
    var regio = datas['region'];
    totalValues += 'Région : ' + regio + '[[JUMP]]';

    // Type logement
    var logementType = Object.keys(datas['bien_type'])[0];
    var logementSubType = datas['bien_type'][logementType];
    var logementTypeInput = $('input[data-id="' + logementType + '"]').val();
    totalValues += 'Type de logement : ' + logementTypeInput + '[[JUMP]]';

    // Contexte
    var contextType = datas['context_control'];
    totalValues += 'Contexte de control : ' + contextType + '[[JUMP]]';


    var prices = {
        'vente': {
            'produit_peb': {
                'choice_maison': {
                    'maison_type_1': 220,
                    'maison_type_0': 250,
                    'maison_type_2': 250,
                    'maison_type_3': false,
                    'maison_type_4': false,
                },
                'choice_appart': {
                    'appart_type_4': 150,
                    'appart_type_1': 175,
                    'appart_type_2': 200,
                    'appart_type_3': 250,
                },
                'choice_immeuble': {
                    'rapport_partiel_1': 150,
                    'rapport_partiel_2': false,
                    'chaudiere_commune_1': false,
                    'chaudiere_commune_2': false,
                },
                'choice_other': false,
            },
            'produit_elec': {
                'choice_maison': {
                    'maison_type_1': {
                        'nbr_compteur': {
                            2: 163,
                            3: 145,
                        }
                    },
                    'maison_type_0': {
                        'nbr_compteur': {
                            2: 163,
                            3: 145,
                        }
                    },
                    'maison_type_2': {
                        'nbr_compteur': {
                            2: 163,
                            3: 145,
                        }
                    },
                    'maison_type_3': {
                        'nbr_compteur': {
                            2: 163,
                            3: 145,
                        }
                    },
                    'maison_type_4': {
                        'nbr_compteur': {
                            2: 163,
                            3: 145,
                        }
                    },
                },
                'choice_appart': {
                    'appart_type_4': {
                        'nbr_compteur': {
                            2: 163,
                            3: 145,
                        }
                    },
                    'appart_type_1': {
                        'nbr_compteur': {
                            2: 163,
                            3: 145,
                        }
                    },
                    'appart_type_2': {
                        'nbr_compteur': {
                            2: 163,
                            3: 145,
                        }
                    },
                    'appart_type_3': {
                        'nbr_compteur': {
                            2: 163,
                            3: 145,
                        }
                    },
                },
                'choice_immeuble': {
                    'nbr_compteur': {
                        2: 163,
                        3: 145,
                    }
                },
                'choice_other': {
                    'nbr_compteur': {
                        2: 163,
                        3: 145,
                    }
                },
            },
            'produit_cit': {
                'choice_maison': {
                    'maison_type_1': {
                        'cit_type_1': {
                            9999: 180,
                            10000: 224,
                        },
                        'cit_type_2': {
                            9999: 200,
                            10000: 250,
                        },
                    },
                    'maison_type_0': {
                        'cit_type_1': {
                            9999: 180,
                            10000: 224,
                        },
                        'cit_type_2': {
                            9999: 200,
                            10000: 250,
                        },
                    },
                    'maison_type_2': {
                        'cit_type_1': {
                            9999: 180,
                            10000: 224,
                        },
                        'cit_type_2': {
                            9999: 200,
                            10000: 250,
                        },
                    },
                    'maison_type_3': {
                        'cit_type_1': {
                            9999: 180,
                            10000: 224,
                        },
                        'cit_type_2': {
                            9999: 200,
                            10000: 250,
                        },
                    },
                    'maison_type_4': {
                        'cit_type_1': {
                            9999: 180,
                            10000: 224,
                        },
                        'cit_type_2': {
                            9999: 200,
                            10000: 250,
                        },
                    },
                },
                'choice_appart': {
                    'appart_type_4': {
                        'cit_type_1': {
                            9999: 180,
                            10000: 224,
                        },
                        'cit_type_2': {
                            9999: 200,
                            10000: 250,
                        },
                    },
                    'appart_type_1': {
                        'cit_type_1': {
                            9999: 180,
                            10000: 224,
                        },
                        'cit_type_2': {
                            9999: 200,
                            10000: 250,
                        },
                    },
                    'appart_type_2': {
                        'cit_type_1': {
                            9999: 180,
                            10000: 224,
                        },
                        'cit_type_2': {
                            9999: 200,
                            10000: 250,
                        },
                    },
                    'appart_type_3': {
                        'cit_type_1': {
                            9999: 180,
                            10000: 224,
                        },
                        'cit_type_2': {
                            9999: 200,
                            10000: 250,
                        },
                    },
                },
                'choice_immeuble': {
                    'cit_type_1': {
                        9999: 180,
                        10000: 224,
                    },
                    'cit_type_2': {
                        9999: 200,
                        10000: 250,
                    },
                },
                'choice_other': {
                    'cit_type_1': {
                        9999: 180,
                        10000: 224,
                    },
                    'cit_type_2': {
                        9999: 200,
                        10000: 250,
                    },
                },
            },
            'produit_gaz': {
                'choice_maison': false,
                'choice_appart': false,
                'choice_immeuble': false,
                'choice_other': false,
            },
        },
        'location': {
            'produit_peb': {
                'choice_maison': {
                    'maison_type_1': 220,
                    'maison_type_0': 250,
                    'maison_type_2': 250,
                    'maison_type_3': false,
                    'maison_type_4': false,
                },
                'choice_appart': {
                    'appart_type_4': 150,
                    'appart_type_1': 175,
                    'appart_type_2': 200,
                    'appart_type_3': 250,
                },
                'choice_immeuble': {
                    'rapport_partiel_1': 150,
                    'rapport_partiel_2': false,
                    'chaudiere_commune_1': false,
                    'chaudiere_commune_2': false,
                },
                'choice_other': false,
            },
        }
    };

    if (country == 'LU') {
        prices = {
            'vente': {
                'produit_peb': {
                    'choice_maison': {
                        'maison_type_1': 530,
                        'maison_type_0': 650,
                        'maison_type_2': false,
                    },
                    'choice_appart': {
                        'appart_type_4': 1000,
                        'appart_type_1': 1400,
                        'appart_type_2': false,
                    },
                },
            },
        };
    }

    var totalHTVA = 0;
    var totalTVAC = 0;

    if (datas['prestations']) {
        totalValues += '[[JUMP]][[JUMP]] Prestations : [[JUMP]][[JUMP]]';
    }
    var cpt = 0;
    // Calcul prestations
    for (var key in datas['prestations']) {
        var prestation = $('input[name="' + key + '"]').val();
        totalValues += '- ' + prestation + '[[JUMP]]';

        var $tvac = 0;

        if (contextType in prices) {
            if (key in prices[contextType]) {
                $tvac = prices[contextType][key][logementType][logementSubType];
            } else {
                $tvac = false;
            }
        } else {
            $tvac = false;
        }

        if (typeof $tvac == "undefined") {
            $tvac = prices[contextType][key][logementType];
        }
        if (typeof $tvac == 'object') {
            var keyType = Object.keys($tvac); // Keys in @var prices
            // keyType = keyType[0];
            var keyValue = datas['prestations'][key];
            var keyValueKey = Object.keys(keyValue)[0];
            keyType = keyValueKey;
            var value = keyValue[keyValueKey];
            var keySubType = Object.keys($tvac[keyValueKey]); // Subkeys of prestations-key in @var prices
            keyValue = value;

            var label = $('label[for="' + keyValueKey + '"] span').text();
            var labelValue = (key == 'produit_cit') ? keyValue + ' Litre(s)' : keyValue;
            totalValues += '&nbsp;* ' + label + ' : ' + labelValue + ' [[JUMP]]';


            // Compare value
            for (var i = 0; i < keySubType.length; i++) {
                if (parseFloat(keyValue) <= parseFloat(keySubType[i])) {
                    $tvac = $tvac[keyType][keySubType[i]];
                    break;
                }
                if (parseFloat(keyValue) > parseFloat(keySubType[i + 1])) {
                    $tvac = $tvac[keyType][keySubType[i + 1]];
                    break;
                }
            }

        }

        // if (country != 'BE' || regio != 'WAL') {
        //     $tvac = false;
        // }

        var isRevisit = false;
        var isRevisitString = '';
        if (country == 'BE') {

            var revisitPrices = {
                'gaz_visit': 135,
                'cit_visit': 100,
            };
            // datas.revisits[]

            var replacedkey = key.replace('produit_', '');
            replacedkey = replacedkey + '_visit';
            if (typeof datas.revisits != 'undefined') {
                if (replacedkey in revisitPrices) {
                    if (datas.revisits.includes(replacedkey)) {
                        $tvac = revisitPrices[replacedkey];
                        isRevisit = true;
                        var label = $('[name="' + replacedkey + '"]:checked');
                        if (label.length == 1) {
                            isRevisitString = isRevisitString + label.attr('data-label') + '[[JUMP]]';
                        }
                    }
                }
            }
        }

        if ($tvac == false) {
            devisExists = true;
            devisExistsCount++;
        }

        //Produits

        var idPrice = key.replace('produit', 'prix');
        var idWrapperPrice = key.replace('produit', 'boxPrix');
        if (!isNaN($tvac)) {

            if ($tvac != false) {

                if (country == 'BE') {
                    var $vat = 21;
                } else {
                    var $vat = 17;
                }
                var $vatCal = parseFloat('1.' + $vat);
                var $htva = ($tvac / $vatCal).toFixed(2);
                var $tvaPrice = $tvac - $tvaPrice;

                totalHTVA = (parseFloat(totalHTVA) + parseFloat($htva)).toFixed(2);
                totalTVAC = (parseFloat(totalTVAC) + parseFloat($tvac)).toFixed(2);

                $htva = $htva.replace('.', ',');

                totalValues += 'Prix ' + $tvac + '€ (soit ' + $htva + '€ HTVA) pour la presation ' + prestation + '[[JUMP]][[JUMP]]';

                var rowHTML = '<span id="cit_htva">' + $htva + '</span> € HTVA <br><span id="cit_tvac">' + $tvac + '</span> € TVAC';

                if (isRevisit) {
                    rowHTML = rowHTML + '<br> <small style="font-size: 10px">(Deuxième visite)</small>';
                }

                $('#' + idPrice).html(rowHTML);
            } else {
                $('#' + idPrice).html(defaultPrix);

            }
        } else {
            $('#' + idPrice).html(qtyMissing);

        }
        $('.' + idWrapperPrice).removeClass('hide');
        $('.' + idWrapperPrice).addClass('border-boxPrix');
        $('.' + idWrapperPrice).attr('order', cpt);
        cpt++;
    }


    //show box price
    $('.wrapBoxPrix').removeClass('hide');
    $('#wrapBoxPrix .labelGreen').removeClass('hide');
    $('#wrapBoxPrix #prix_total').removeClass('hide');

    var string = devisExistsCount > 1 ? 'Vos ' + devisExistsCount + ' ' + defaultPrixPlural.toLowerCase() : 'Votre ' + defaultPrixSingular.toLowerCase();

    var extraDevis = '<div id="extraDevis">' + ((devisExists) ? (string) : '') + '</div>';

    totalTVAC = (!totalTVAC) ? totalTVAC : totalTVAC.replace('.', ',');
    totalHTVA = (!totalHTVA) ? totalHTVA : totalHTVA.replace('.', ',');

    totalValues += isRevisitString + '[[JUMP]][[JUMP]]Prix total ' + totalTVAC + '€ (soit ' + totalHTVA + '€ HTVA) [[JUMP]]';
    $('#calculDevisTotal').val(totalValues);

    if (totalTVAC != 0) {
        $('#prix_total b').show();
        $('#prix_total #total_htva').text(totalHTVA);
        $('#prix_total #total_tvac').text(totalTVAC);
    } else {
        $('#prix_total b').hide();
    }

    if ($('#extraDevis').length) {
        $('#extraDevis').show();
        $('#extraDevis').html(extraDevis);
    } else {
        $('#prix_total').append(extraDevis);
    }
}

function scrollIntoNextElement(id) {
    /* Scroll */
    // console.log('scroll id');
    // console.log(id);
    var element = document.querySelector('#' + id);
    if (document.querySelector('#' + id) != null) {
        var y = element.getBoundingClientRect().top + window.scrollY;
        y = y - 20;
        // console.log(y);
        window.scroll({
            top: y,
            behavior: 'smooth'
        });
    }
}


function showPrestationSub(element, needReturn) {
    var which = element.getAttribute('id').replace('produit', 'choice');
    if ($('#' + which).length > 0) {

        if (needReturn) {
            return which;
        } else {
            if ($('#' + which).hasClass('hide')) {
                $('#' + which).removeClass('hide');
            } else {
                $('#' + which).addClass('hide');
            }
        }
    } else {
        if (needReturn) {
            return '';
        }
    }
}

function resetForm(step, parent) {
    switch (step) {
        case 'hide_contact' :
            resetContactData();
            break;
        case 'show_btn' :
            resetBtnPrix();
            $('#wrapBoxPrix').removeClass('hide');
            resetPrices();
            resetContactData();
            resetExtraDevis();
            break;
        case 'change_inputs_devis' :
            resetBtnPrix();
            restePriceBox();
            resetContactData();
            break;
        case 'no_peb' :
            hideChauffageOptions();
            break;
        case 'peb' :
            showChauffageOptions();
            break;
        case 'reset_forms_data' :
            resetFormsData(false);
            resetContactData();
            resetExtraDevis();
            break;
        case 'reset_forms' :
            resetBtnPrix();
            resetContactData();
            resetFormsData(false);
            $('.choiceBien').addClass('hide');
            $('#wrapBoxPrix').removeClass('hide');
            resetExtraDevis();
            resetPrices();
            break;
        case 'reset_forms_' :
            resetBtnPrix();
            resetContactData();
            resetBienFormsData();
            resetPrices();
            resetExtraDevis();
            break;
        case 'no_choice_type_bien' :
            resetBtnPrix();
            resetWrapPrix();
            resetContactData();
            resetBienFormsData();
            restePriceBox();
            resetContactData();
            resetExtraDevis();
            // removeTotal('bien_type');
            break;
        case 'choice_type_bien' :
            resetBtnPrix();
            restePriceBox();
            resetContactData();
            resetBienFormsData();
            resetContactData();
            resetExtraDevis();
            break;
        case 'context_control' :
            resetClassicBox();
            resetPrestations();
            resetTypeLogement();
            restePriceBox();
            resetContactData();
            resetBtnPrix();
            resetWrapPrix();
            resetChoiceDevis();
            resetExtraDevis();
            removeTotal('bien_type');
            removeTotal('prestations');
            break;
        case 'zip_control' :
            resetClassicBox();
            resetContextControl();
            resetPrestations();
            resetTypeLogement();
            restePriceBox();
            resetContactData();
            resetBtnPrix();
            resetWrapPrix();
            resetChoiceDevis();
            resetExtraDevis();
            removeTotal('context_control');
            removeTotal('bien_type');
            removeTotal('prestations');
            break;
        case 'prestation_control' :
            showClassicBox();
            restePriceBox();
            resetContactData();
            resetBtnPrix();
            resetWrapPrix();
            resetExtraDevis();
            resetFormsData(parent);
            break;
        case 'no_prestation' :
            hideChauffageOptions();
            resetClassicBox();
            resetTypeLogement();
            restePriceBox();
            resetContactData();
            resetBtnPrix();
            resetWrapPrix();
            resetChoiceDevis();
            resetExtraDevis();
            removeTotal('bien_type');
            break;
        case 'all' :
            resetClassicBox();
            resetBtnPrix();
            resetWrapPrix();
            resetCodePostal();
            resetContextControl();
            resetPrestations();
            resetTypeLogement();
            restePriceBox();
            resetContactData();
            resetChoiceDevis();
            resetExtraDevis();
            removeTotal('country');
            removeTotal('region');
            removeTotal('zipcode');
            removeTotal('context_control');
            removeTotal('bien_type');
            removeTotal('prestations');
            break;
    }
}

function resetExtraDevis() {
    if ($('#extraDevis').length) {
        $('#extraDevis').hide();
    }
}

function resetCodePostal() {
    // Reset "Code postal"
    $('input[name="controle_cp"]').val('');
}

function resetContextControl() {
    // Reset "Context conrole"
    $('#selectControleType label.active').removeClass('active');
    $('#selectControleType input:checked').removeAttr('checked');
}

function resetPrestations() {
    // Reset "Prestations"
    $('.boxProd').addClass('hide');
    $('.boxProd label.active').removeClass('active');
    $('.boxProd input:checked').removeAttr('checked');
}

function resetTypeLogement() {
    // Reset "Type logement"
    $('.classic').addClass('hide');
    $('.classic label.active').removeClass('active');
    $('.classic input:checked').removeAttr('checked');
}

function resetFormsData(parentElement) {
    // Reset "Forms data" from prestations inputs
    if (!parentElement) {
        parentElement = '';
    }

    if (parentElement) {
        parentElement = parentElement.replace('produit', 'choice');
        parentElement = parentElement.replace('_label', '');
        parentElement += ' ';
    }

    $(parentElement + '.resetInput label.active').removeClass('active');
    $(parentElement + '.resetInput input[type="radio"]:checked').removeAttr('checked');
    $(parentElement + '.resetInput input[type="number"]').val('');
    $(parentElement + '.resetInput input[type="text"]').val('');
}

function resetBienFormsData() {
    // Reset "Forms data"
    $('.choiceBien').addClass('hide');
    $('.choiceBien .resetInput label.active').removeClass('active');
    $('.choiceBien .resetInput input[type="radio"]:checked').removeAttr('checked');
    $('.choiceBien .resetInput input[type="number"]').val('');
    $('.choiceBien .resetInput input[type="text"]').val('');
    $('.ifPEB').addClass('hide');
}

function restePriceBox() {
    // Reset "Prix"
    $('#wrapBoxPrix').addClass('hide');
    $('#wrapBoxPrix .labelGreen').addClass('hide');
    $('#wrapBoxPrix #prix_total').addClass('hide');
    resetPrices();
}

function resetPrices() {
    $('#wrapBoxPrix .labelGreen').addClass('hide');
    $('#wrapBoxPrix #prix_total').addClass('hide');
    $('.wrapBoxPrix .boxPrix').addClass('hide');
    $('.wrapBoxPrix .boxPrix').removeClass('border-boxPrix');
    $('.wrapBoxPrix .boxPrix').removeAttr('order');
    $('.wrapBoxPrix .boxPrix .cit_htva').text('0.00');
    $('.wrapBoxPrix .boxPrix .cit_tvac').text('0.00');
}

function resetChoiceDevis() {
    $('.choiceDevis').addClass('hide');
}

function resetBtnPrix() {
    $('#boxBtnPrix').removeClass('hide');

    $('#prix_total #total_htva').text('0.00');
    $('#prix_total #total_tvac').text('0.00');
}

function resetWrapPrix() {
    $('.wrapBoxPrix').addClass('hide');
}

function resetClassicBox() {
    $('.classic').addClass('hide');
}

function showClassicBox() {
    $('.classic').removeClass('hide');
}

function resetContactData() {
    $('#contactData').addClass('hide');
}

function showChauffageOptions() {
    $('#choice_immeuble #check_rapport input').addClass('peb_selected');
    $('#choice_immeuble #check_rapport input.peb_selected').on('change', function () {
        if ($(this).val() == 'Oui') {
            $('.ifPEB').removeClass('hide');
        } else {
            $('.ifPEB').addClass('hide');
        }
    });
}

function hideChauffageOptions() {
    $('#choice_immeuble #check_rapport input.peb_selected').removeClass('peb_selected');
    $('.ifPEB').addClass('hide');
    $('#choice_immeuble #check_rapport input').on('change', function () {
        $('.ifPEB').addClass('hide');
    });
}

function getTotal() {
    var objectTotal = $('#prix_total').attr('data-total');
    objectTotal = JSON.parse(objectTotal);
    return objectTotal;
}

function checkIfIsPrestationIsSelected(total, notChecked) {
    for (var key in total['prestations']) {
        var temp = total['prestations'][key];
        for (var k = 0; k < notChecked.length; k++) {
            var id = notChecked[k].getAttribute('id');
            if (id == key) {
                if (id in total['prestations']) {
                    updateTotal('prestations;;' + id, '', false, true);
                }
            }
        }
    }
}

function checkIfIsPrestationIsNotEmpty(total) {
    var fieldsMissing = false;
    for (var key in total['prestations']) {
        var id = '#' + key.replace('produit', 'choice');
        if (typeof total['prestations'][key] == 'object' && !('length' in total['prestations'][key])) { // Means object

            var subKey = Object.keys(total['prestations'][key])[0];
            var subValue = parseInt(total['prestations'][key][subKey]);
            if (subValue > 0 && !isNaN(subValue)) {
                $(id).removeClass('missing');
            } else {
                fieldsMissing = true;
                $(id).addClass('missing');
            }
        }
        if (typeof total['prestations'][key] == 'object' && ('length' in total['prestations'][key])) { // Means array
            if (total['prestations'][key].length == 0 && key != 'produit_peb') {
                fieldsMissing = true;
                $(id).addClass('missing');
            } else {
                $(id).removeClass('missing');
            }
        }
    }
    return fieldsMissing;
}

function checkIfIsTypeLogementIsNotEmpty(total) {
    if (total['bien_type']) {
        if (Object.keys(total['bien_type']).length > 0) {
            return false;
        }
    }
    return true;
}

function checkCountry() {
    // CHECK LUXEMBOURG PEB WORDING + SELECT TYPE BIEN
    var objectTotal = getTotal();
    if (objectTotal['country'] === 'LU') {
        $('#b_immeuble_label').addClass('hide');
        $('#b_commerce_label').addClass('hide');
        $('.revisitWrapper').each(function () {
            $(this).addClass('hide');
        });
        $('.peb--label').each(function () {
            $(this).addClass('hide');
        });
        $('.peb--other-label').each(function () {
            $(this).removeClass('hide');
        });
        $('.appart--label').addClass('hide');
        $('.appart--other-label').removeClass('hide');
        var options = $('.option-LU');
        options.each(function () {
            var idElement = $(this).attr('id');
            if (idElement.includes('--LU')) {
                var newId = idElement.replace('--LU', '');
                $(this).attr('id', newId);
            }
            $(this).parent().removeClass('hide');
        });
        var options = $('.option-BE');
        options.each(function () {
            var idElement = $(this).attr('id');
            if (!idElement.includes('--BE')) {
                var newId = idElement + '--BE';
                $(this).attr('id', newId);
            }
            $(this).parent().addClass('hide');
        });
    } else {
        $('#b_immeuble_label').removeClass('hide');
        $('#b_commerce_label').removeClass('hide');

        $('.revisitWrapper').each(function () {
            $(this).removeClass('hide');
        });
        $('.peb--label').each(function () {
            $(this).removeClass('hide');
        });
        $('.peb--other-label').each(function () {
            $(this).addClass('hide');
        });
        $('.appart--label').removeClass('hide');
        $('.appart--other-label').addClass('hide');
        var options = $('.option-BE');
        options.each(function () {
            var idElement = $(this).attr('id');
            if (idElement.includes('--BE')) {
                var newId = idElement.replace('--BE', '');
                $(this).attr('id', newId);
            }
            $(this).parent().removeClass('hide');
        });
        var options = $('.option-LU');
        options.each(function () {
            var idElement = $(this).attr('id');
            if (!idElement.includes('--LU')) {
                var newId = idElement + '--LU';
                $(this).attr('id', newId);
            }
            $(this).parent().addClass('hide');
        });
    }
}

function updateTotal(key, value, add, remove) {
    checkCountry();
    var objectTotal = getTotal();
    if (add) {

        if (key.match(';;')) {
            var split = key.split(';;');
            var keyT = split[0];
            var subKey = (split[1]) ? split[1] : 'default';

            if (typeof objectTotal[keyT] == 'undefined') {
                objectTotal[keyT] = {};
            }
            if (subKey != 'default' && objectTotal[keyT]) {
                if (objectTotal[keyT][subKey]) {
                    if (value != '') {
                        if (typeof value == 'object' && !('length' in value)) {
                            objectTotal[keyT][subKey] = value;
                        } else {
                            objectTotal[keyT][subKey].push(value[0]);
                        }
                    } else {
                        if (typeof value == 'object') {
                            if ('length' in value && value.length == 0) {
                                objectTotal[keyT][subKey] = value;
                            }
                        }
                    }
                } else {

                    objectTotal[keyT][subKey] = [];
                    if (value != '') {
                        if (typeof value == 'object' && !('length' in value)) {
                            objectTotal[keyT][subKey].push(value[0]);
                        } else {
                            objectTotal[keyT][subKey] = value;
                        }
                    }
                }
            }
        } else {
            if (objectTotal[key]) {
                objectTotal[key].push(value);
            } else {
                objectTotal[key] = [value];
            }
        }
    } else {

        if (remove) {
            if (key.match(';;')) {
                var split = key.split(';;');
                var keyT = split[0];
                var subKey = (split[1]) ? split[1] : 'default';

                if (typeof objectTotal[keyT] != 'undefined' && subKey == 'default') {
                    delete objectTotal[keyT];
                }
                if (typeof objectTotal[keyT][subKey] != 'undefined') {
                    delete objectTotal[keyT][subKey]
                }
            } else {

                if (objectTotal[key]) {
                    delete objectTotal[key];
                }
            }
        } else {
            objectTotal[key] = value;
        }

    }
    setTotal(objectTotal);

}

function setTotal(objectTotal) {
    var finalObjectTotal = JSON.stringify(objectTotal);
    $('#prix_total').attr('data-total', finalObjectTotal);
}

function removeTotal(keyToRemove) {
    var total = getTotal();
    if (typeof total[keyToRemove] != "undefined") {
        delete total[keyToRemove];
    }
    setTotal(total);
}
