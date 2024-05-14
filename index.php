<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./styles/css/styles.css" rel="stylesheet">
    <link href="./styles/css/custom.css" rel="stylesheet">
</head>

<body>


    <div class="container-fluid">
        <div class="row">

            <!-- <?php include('inc/test_connexion.php'); ?> -->

            <div class="col-lg-12 cmdForm">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- FORM -->

                            <form action="./forms/form_devis.php" method="POST">

                                <div class="form-group">
                                    <p class="labelGreen">Vous êtes :</p>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-secondary rounded" id="forParticulier">
                                            <input type="radio" name="user_type" id="user_type_1" value="Particulier" autocomplete="off"> Particulier
                                        </label>
                                        <label class="btn btn-secondary rounded" id="forProfessionnel">
                                            <input type="radio" name="user_type" id="user_type_2" value="Professionnel" autocomplete="off"> Professionnel
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <p class="labelGreen">Pays :</p>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-secondary rounded" id="belgique">
                                            <input type="radio" name="country" id="belgique" value="BE" autocomplete="off">
                                            Belgique
                                        </label>

                                        <!-- <label class="btn btn-secondary rounded" id="luxembourg">
                                            <input type="radio" name="country" id="luxembourg" value="LU" autocomplete="off"> Luxembourg
                                        </label> -->
                                    </div>
                                </div>

                                <!-- <div class="form-group hide" id="selectZip">
                                    <label class="labelGreen">Code postal du logement à contrôler :</label>
                                    <input type="text" list="zip" class="form-control col-lg-3 col-md-3 col-sm-6" id="controle_cp" name="controle_cp" required>
                                    <datalist id="zip">

                                    </datalist>
                                    <input type="hidden" class="form-control col-lg-3 col-md-3 col-sm-6" id="controle_regio" name="controle_regio">
                                </div> -->

                                <div class="form-group hide" id="selectControleType">
                                    <p class="labelGreen">Contexte du contrôle :</p>
                                    <div class="btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-secondary context" id="context_control_vente">
                                            <input type="radio" autocomplete="off" name="context_control" id="context_control_1" value="vente"> Vente
                                        </label>
                                        <label class="btn btn-secondary context" id="context_control_loca">
                                            <input type="radio" autocomplete="off" name="context_control" id="context_control_2" value="location"> Location
                                        </label>
                                        <!-- <label class="btn btn-secondary context" id="context_control_new">
                                            <input type="radio" autocomplete="off" name="context_control" id="context_control_3" value="nouvelle construction">Nouvelle construction
                                        </label> -->
                                    </div>
                                </div>

                                <div class="form-group boxProd hide" id="selectPrestations">
                                    <p class="labelGreen">Quelle(s) prestation(s) souhaitez-vous effectuer ?</p>
                                    <div class="btn-group-toggle d-flex flex-wrap" data-toggle="buttons">

                                        <label class=" btn btn-secondary-ico context_vente_option context_loca_option context_new_option context_option" id="produit_peb_label">
                                            <input type="checkbox" autocomplete="off" name="produit_peb" id="produit_peb" value="Contrôle PEB"><i class="icosvg s_peb"></i> <span class="peb--label">Contrôle PEB</span> <span class="peb--other-label">Passeport énergétique</span>
                                        </label>

                                        <label class=" btn btn-secondary-ico context_loca_option context_new_option context_option hide" id="produit_etat_label">
                                            <input type="checkbox" autocomplete="off" name="produit_etat" id="produit_etat" value="Etat des lieux"><i class="icosvg s_etat"></i> Etat des lieux
                                        </label>

                                        <label class=" btn btn-secondary-ico context_vente_option context_option" id="produit_elec_label">
                                            <input type="checkbox" autocomplete="off" name="produit_elec" id="produit_elec" value="Contrôle électrique"><i class="icosvg s_elec"></i> Contrôle
                                            électrique
                                        </label>

                                        <label class=" btn btn-secondary-ico context_vente_option context_new_option context_option" id="produit_cit_label">
                                            <input type="checkbox" autocomplete="off" name="produit_cit" id="produit_cit" value="Contrôle citerne mazout"><i class="icosvg s_cit"></i> Contrôle
                                            citerne mazout
                                        </label>

                                        <label class=" btn btn-secondary-ico context_vente_option context_new_option context_option" id="produit_gaz_label">
                                            <input type="checkbox" autocomplete="off" name="produit_gaz" id="produit_gaz" value="Contrôle gaz"><i class="icosvg s_gaz"></i> Contrôle gaz
                                        </label>

                                        <!--                                    <label class=" btn btn-secondary-ico context_new_option context_option hide"-->
                                        <!--                                           id="produit_blower_label">-->
                                        <!--                                        <input type="checkbox" autocomplete="off" name="produit_blower"-->
                                        <!--                                               id="produit_blower" value="Test blower door"><i-->
                                        <!--                                            class="icosvg s_blower"></i> Test blower door-->
                                        <!--                                    </label>-->

                                        <!--                                    <label class=" btn btn-secondary-ico context_vente_option context_new_option context_option"-->
                                        <!--                                           id="produit_drone_label">-->
                                        <!--                                        <input type="checkbox" autocomplete="off" name="produit_drone"-->
                                        <!--                                               id="produit_drone" value="Plan drône"><i class="icosvg s_drone"></i> Plan-->
                                        <!--                                        drône-->
                                        <!--                                    </label>-->

                                        <!--label class=" btn btn-secondary-ico context_vente_option context_loca_option context_option" id="produit_2d_label">
                                      <input type="checkbox" autocomplete="off" name="produit_2d" id="produit_2d" value="Plan 2d"><i class="icosvg s_2d"></i> Plan 2D
                                    </label-->

                                        <!--label class=" btn btn-secondary-ico context_vente_option context_loca_option context_option" id="produit_3d_label">
                                      <input type="checkbox" autocomplete="off" name="produit_3d" id="produit_3d" value="Plan 3d"><i class="icosvg s_3d"></i> Plan 3D
                                    </label-->

                                        <!--label class=" btn btn-secondary-ico context_new_option context_option" id="produit_certimazout_label">
                                      <input type="checkbox" autocomplete="off" name="produit_certimazout" id="produit_certimazout" value="Certification mazout"><i class="icosvg s_cit"></i> Certification mazout
                                    </label>

                                    <label class=" btn btn-secondary-ico context_new_option context_option" id="produit_certigaz_label">
                                      <input type="checkbox" autocomplete="off" name="produit_certigaz" id="produit_certigaz" value="Certification gaz"><i class="icosvg s_gaz"></i> Certification gaz
                                    </label-->

                                        <label class=" btn btn-secondary-ico context_new_option context_option hide" id="produit_geo_label">
                                            <input type="checkbox" autocomplete="off" name="produit_geo" id="produit_geo" value="Géomètre"><i class="icosvg s_geo"></i> Géomètre
                                        </label>

                                        <label class=" btn btn-secondary-ico context_new_option context_option hide" id="produit_secu_label">
                                            <input type="checkbox" autocomplete="off" name="produit_secu" id="produit_secu" value="Coordinateur sécurité"><i class="icosvg s_secu"></i> Coordinateur
                                            sécurité
                                        </label>

                                        <label class=" btn btn-secondary-ico context_new_option context_option hide" id="produit_certibeau_label">
                                            <input type="checkbox" autocomplete="off" name="produit_certibeau" id="produit_certibeau" value="CertIBEau"><i class="icosvg s_certibeau"></i> CertIBEau
                                        </label>

                                    </div>
                                </div>

                                <div class="choiceDevis resetForm hide" id="choice_peb">
                                    <p class="labelGrey">Vous souhaitez un <span class="peb--label">contrôle PEB</span> <span class="peb--other-label">passeport énergétique</span></p>

                                    <div class="form-group form-inline resetInput">
                                        <input type="hidden" class="form-control resetPrice" name="control_peb" id="control_peb" value="1">
                                    </div>

                                    <div class="form-group hide other">
                                        <div class="btn-group-vertical btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-secondary rounded text-left resetPrice">
                                                <input type="radio" name="peb_type" id="peb_type_1" value="Travaux de rénovation simple" autocomplete="off"> <b>Travaux
                                                    de rénovation simple</b><br>Rénovation simple de nature à influencer le
                                                résultat PEB - moins de 25% de surface de déperdition de l'enveloppe
                                            </label>
                                            <label class="btn btn-secondary rounded text-left resetPrice">
                                                <input type="radio" name="peb_type" id="peb_type_2" value="Travaux de rénovation importante" autocomplete="off"> <b>Travaux
                                                    de rénovation importante</b><br>Rénovation, extension, démolition de
                                                plus de 25% de surfaces de déperdition de l'enveloppe existante
                                            </label>
                                            <label class="btn btn-secondary rounded text-left resetPrice">
                                                <input type="radio" name="peb_type" id="peb_type_3" value="Changement de destination" autocomplete="off"> <b>Changement
                                                    de destination</b><br>Modification de la destination de l’unité PEB
                                            </label>
                                            <label class="btn btn-secondary rounded text-left resetPrice">
                                                <input type="radio" name="peb_type" id="peb_type_4" value="Travaux de nouvelle construction ou assimilés à du neuf" autocomplete="off"> <b>Travaux de nouvelle construction ou
                                                    assimilés à du neuf</b><br>Nouvelle construction ou reconstruction
                                                partielle ou extension qui vise à créer un volume chauffé de plus de
                                                800m3 ou doubler le volume chauffé existant ou remplacer 100 % des
                                                installations et remplacer 75 % de l’enveloppe du bâtiment
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="choiceDevis resetForm hide" id="choice_elec">
                                    <p class="labelGrey">Donnez-nous plus d’infos sur votre contrôle électrique</p>
                                    <div class="form-group form-inline resetInput">
                                        <label class="infoField" for="nbr_compteur"><span>Nombre de compteur(s)</span> :</label>
                                        <input type="number" class="form-control resetPrice" name="nbr_compteur" id="nbr_compteur">
                                    </div>
                                </div>

                                <div class="choiceDevis resetForm hide" id="choice_cit">
                                    <p class="labelGrey">Donnez-nous plus d’infos sur votre contrôle citerne à mazout</p>
                                    <div class="form-inline resetInput">
                                        <label class="infoField">Type de citerne : </label>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-secondary rounded resetPrice" for="cit_type_1">
                                                <input type="radio" name="cit_type" id="cit_type_1" value="Citerne enterrée" autocomplete="off"><span> Citerne enterrée</span>
                                            </label>
                                            <label class="btn btn-secondary rounded resetPrice" for="cit_type_2">
                                                <input type="radio" name="cit_type" id="cit_type_2" value="Citerne aérienne" autocomplete="off"><span> Citerne aérienne</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline resetInput">
                                        <label class="infoField" for="cit_capacite">Capacité de la citerne :</label>
                                        <input type="number" class="form-control resetPrice" name="cit_capacite" id="cit_capacite"> litres
                                    </div>
                                    <div class="form-inline resetInput revisitWrapper">
                                        <label class="infoField">S'agit-il d'une deuxième visite ? </label>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="cit_visit" class="revisit" id="cit_capacite_revisit" value="Oui" data-label="Deuxième visite pour contrôle citerne" autocomplete="off"> Oui
                                            </label>
                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="cit_visit" class="revisit" id="cit_capacite_new" value="Non" data-label="Première visite pour contrôle citerne" autocomplete="off"> Non
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="choiceDevis resetForm hide" id="choice_gaz">
                                    <p class="labelGrey">Donnez-nous plus d’infos sur votre contrôle gaz</p>
                                    <div class="form-inline resetInput">
                                        <label class="infoField">Type de compteur : </label>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="gaz_type" id="gaz_type_1" value="Cuve enterrée" autocomplete="off"> Cuve enterrée
                                            </label>
                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="gaz_type" id="gaz_type_2" value="Cuve aérienne" autocomplete="off"> Cuve aérienne
                                            </label>
                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="gaz_type" id="gaz_type_3" value="Canalisation" autocomplete="off"> Canalisation
                                            </label>
                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="gaz_type" id="3" value="Compteur" autocomplete="off"> Compteur
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group form-inline resetInput">
                                        <label class="infoField" for="nbr_compteur_gaz">Nombre de compteur(s) :</label>
                                        <input type="number" class="form-control resetPrice" name="nbr_compteur_gaz" id="nbr_compteur_gaz">
                                    </div>
                                    <div class="form-inline resetInput revisitWrapper">
                                        <label class="infoField">S'agit-il d'une deuxième visite ? </label>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="gaz_visit" class="revisit" id="gaz_revisit" value="Oui" data-label="Deuxième visite pour contrôle gaz" autocomplete="off"> Oui
                                            </label>
                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="gaz_visit" class="revisit" id="gaz_new" value="Non" data-label="Première visite pour contrôle gaz" autocomplete="off"> Non
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group hide classic" id="logementType">
                                    <p class="labelGreen">Type de logement :</p>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-secondary-ico rounded resetPrice logementType" id="b_maison_label">
                                            <input type="radio" name="bien_type" id="bien_type_1" data-id="choice_maison" value="Maison" autocomplete="off"><i class="icosvg b_maison"></i> Maison
                                        </label>
                                        <label class="btn btn-secondary-ico rounded resetPrice logementType" id="b_appart_label">
                                            <input type="radio" name="bien_type" id="bien_type_2" data-id="choice_appart" value="Appartement" autocomplete="off"><i class="icosvg b_appart"></i> <span class="appart--label hide">Appartement</span> <span class="appart--other-label">Résidentiel</span>
                                        </label>

                                        <label class="btn btn-secondary-ico rounded resetPrice logementType" id="b_immeuble_label">
                                            <input type="radio" name="bien_type" id="bien_type_3" data-id="choice_immeuble" value="Immeuble de rapport" autocomplete="off"><i class="icosvg b_immeuble"></i> Immeuble de rapport
                                        </label>

                                        <!-- <label class="btn btn-secondary-ico rounded resetPrice logementType" id="b_commerce_label">
                                            <input type="radio" name="bien_type" id="bien_type_4" data-id="choice_other" value="Commerce, garage, entrepôt" autocomplete="off"><i class="icosvg b_commerce"></i> Commerce, garage, entrepôt
                                        </label> -->
                                    </div>
                                </div>

                                <div class="choiceDevis choiceBien hide" id="choice_maison">
                                    <p class="labelGrey">Maison</p>

                                    <div class="form-inline resetInput">
                                        <label class="infoField">Type de maison : </label>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="maison_type" class="option-BE" id="maison_type_1--BE" value="1 à 3 façades de 1 à 3 chambres" autocomplete="off"> 1 à 3 façades de 1 à 3 chambres </input>
                                            </label>

                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="maison_type" class="option-LU" id="maison_type_1--LU" value="Maison < 250m²" autocomplete="off"> Maison 250m² </input>
                                            </label>

                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="maison_type" class="option-BE" id="maison_type_0--BE" value="1 à 3 façades de 4 à 6 chambres" autocomplete="off"> 1 à 3 façades de 4 à 6 chambres </input>
                                            </label>

                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="maison_type" class="option-LU" id="maison_type_0--LU" value="Maison > 250m² < 500m²" autocomplete="off"> Maison > 250m² < 500m² </input>
                                            </label>

                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="maison_type" class="option-BE" id="maison_type_2--BE" value="4 façades, ferme, gîte" autocomplete="off"> 4 façades, ferme, gîte </input>
                                            </label>

                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="maison_type" class="option-LU" id="maison_type_2--LU" value="Maison > 500m²" autocomplete="off"> Maison > 500m² </input>
                                            </label>

                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="maison_type" class="option-BE" id="maison_type_3" value="Maison de maître" autocomplete="off"> Maison de maître </input>
                                            </label>

                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="maison_type" class="option-BE" id="maison_type_4" value="Bien exceptionnel" autocomplete="off"> Bien exceptionnel </input>
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="choiceDevis choiceBien hide" id="choice_appart">
                                    <p class="labelGrey">Appartement</p>

                                    <div class="form-inline resetInput">
                                        <label class="infoField">Type d'appartement : </label>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-secondary-ico rounded resetPrice">
                                                <input type="radio" name="appart_type" class="option-BE" id="appart_type_4--BE" value="Studio/Kot" autocomplete="off"><i class="icosvg a_simple"></i> Studio/Kot
                                            </label>
                                            <label class="btn btn-secondary-ico rounded resetPrice">
                                                <input type="radio" name="appart_type" class="option-LU" id="appart_type_4--LU" value="Studio/Kot" autocomplete="off">
                                                < 5 unités </label>
                                                    <label class="btn btn-secondary-ico rounded resetPrice">
                                                        <input type="radio" name="appart_type" class="option-BE" id="appart_type_1--BE" value="Appartement simple" autocomplete="off"><i class="icosvg a_simple"></i> Appartement simple
                                                    </label>
                                                    <label class="btn btn-secondary-ico rounded resetPrice">
                                                        <input type="radio" name="appart_type" class="option-LU" id="appart_type_1--LU" value="Appartement simple" autocomplete="off"> de 5 à 12 unités
                                                    </label>
                                                    <label class="btn btn-secondary-ico rounded resetPrice">
                                                        <input type="radio" name="appart_type" class="option-BE" id="appart_type_2--BE" value="Duplex" autocomplete="off"><i class="icosvg a_duplex"></i> Duplex
                                                    </label>
                                                    <label class="btn btn-secondary-ico rounded resetPrice">
                                                        <input type="radio" name="appart_type" class="option-LU" id="appart_type_2--LU" value="Duplex" autocomplete="off"> > 12 unités
                                                    </label>
                                                    <label class="btn btn-secondary-ico rounded resetPrice">
                                                        <input type="radio" name="appart_type" class="option-BE" id="appart_type_3" value="Triplex" autocomplete="off"><i class="icosvg a_triplex"></i> Triplex
                                                    </label>


                                        </div>
                                    </div>

                                </div>

                                <div class="choiceDevis choiceBien hide" id="choice_immeuble">
                                    <p class="labelGrey">Immeuble de rapport</p>

                                    <div class="form-group form-inline resetInput">
                                        <label class="infoField" for="nbr_logement">Nombre de logement :</label>
                                        <input type="text" class="form-control resetPrice" id="nbr_logement" name="nbr_logement" placeholder="">
                                    </div>
                                    <div class="form-inline resetInput" id="check_rapport">
                                        <label class="infoField">Chaudière commune : </label>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="chaudiere_commune" id="chaudiere_commune_1" value="Oui" autocomplete="off"> Oui
                                            </label>
                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="chaudiere_commune" id="chaudiere_commune_2" value="Non" autocomplete="off"> Non
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-inline ifPEB resetInput hide">
                                        <label class="infoField">Faut-il effectuer un rapport partiel ? </label>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="rapport_partiel" id="rapport_partiel_1" value="Oui" autocomplete="off"> Oui
                                            </label>
                                            <label class="btn btn-secondary rounded resetPrice">
                                                <input type="radio" name="rapport_partiel" id="rapport_partiel_2" value="Non" autocomplete="off"> Non
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- previous here types immo -->

                                <div class="form-group hide" id="wrapBoxPrix">
                                    <label class="labelGreen">Nos tarifs par prestation :</label>
                                    <div id="devisPreview">
                                        <div id="boxBtnPrix">
                                            <p class="text-center">
                                                <button type="button" class="btn btnLink" id="runCalcul">
                                                    Calculer mon devis
                                                </button>
                                            </p>
                                        </div>
                                        <div class="wrapBoxPrix">
                                            <div class="boxPrix hide boxPrix_peb">
                                                <p>
                                                    <i class="icosvg s_peb"></i>
                                                    <b>Contrôle<br>PEB</b><br>
                                                    <span id="prix_peb">
                                                        <span id="peb_htva">0.00</span> € HTVA <br>
                                                        <span id="peb_tvac">0.00</span> € TVAC</span>
                                                </p>
                                            </div>
                                            <div class="boxPrix hide boxPrix_elec">
                                                <p>
                                                    <i class="icosvg s_elec"></i>
                                                    <b>Contrôle<br>électrique</b><br>
                                                    <span id="prix_elec">
                                                        <span id="elec_htva">0.00</span> € HTVA <br>
                                                        <span id="elec_tvac">0.00</span> € TVAC</span>
                                                </p>
                                            </div>
                                            <div class="boxPrix  hide boxPrix_cit">
                                                <p>
                                                    <i class="icosvg s_cit"></i>
                                                    <b>Contrôle<br>citerne mazout</b><br>
                                                    <span id="prix_cit">
                                                        <span id="cit_htva">0.00</span> € HTVA <br>
                                                        <span id="cit_tvac">0.00</span> € TVAC</span>
                                                </p>
                                            </div>
                                            <div class="boxPrix  hide boxPrix_gaz">
                                                <p>
                                                    <i class="icosvg s_gaz"></i>
                                                    <b>Contrôle<br>gaz</b><br>
                                                    <span id="prix_gaz">
                                                        <span id="gaz_htva">0.00</span> € HTVA <br>
                                                        <span id="gaz_tvac">0.00</span> € TVAC</span>
                                                </p>
                                            </div>


                                            <!--                                        <div class="boxPrix  hide boxPrix_drone">-->
                                            <!--                                            <p>-->
                                            <!--                                                <i class="icosvg s_drone"></i>-->
                                            <!--                                                <b>Plan<br>drône</b><br>-->
                                            <!--                                                <span id="prix_drone">-->
                                            <!--                        <span id="drone_htva">0.00</span> € HTVA <br>-->
                                            <!--                        <span id="drone_tvac">0.00</span> € TVAC</span>-->
                                            <!--                                            </p>-->
                                            <!--                                        </div>-->
                                            <div class="boxPrix  hide boxPrix_2d">
                                                <p>
                                                    <b>Plan<br>2D</b><br>
                                                    <span id="prix_2d">
                                                        <span id="2d_htva">0.00</span> € HTVA <br>
                                                        <span id="2d_tvac">0.00</span> € TVAC</span>
                                                </p>
                                            </div>
                                            <div class="boxPrix  hide boxPrix_3d">
                                                <p>
                                                    <b>Plan<br>3D</b><br>
                                                    <span id="prix_3d">
                                                        <span id="3d_htva">0.00</span> € HTVA <br>
                                                        <span id="3d_tvac">0.00</span> € TVAC</span>
                                                </p>
                                            </div>
                                            <div class="boxPrix hide  boxPrix_etat">
                                                <p>
                                                    <b>Etat<br>des lieux</b><br>
                                                    <span id="prix_etat">
                                                        <span id="etat_htva">0.00</span> € HTVA <br>
                                                        <span id="etat_tvac">0.00</span> € TVAC</span>
                                                </p>
                                            </div>


                                            <!--
                                        <div class= "boxPrix boxPrix_certimazout">
                                          <p>
                                            <b>Certification <br>mazout</b><br>
                                            <span id="prix_certimazout">
                                            <span id="certimazout_htva">0.00</span> € HTVA <br>
                                            <span id="certimazout_tvac">0.00</span> € TVAC</span>
                                          </p>
                                        </div>
                                        <div class= "boxPrix boxPrix_certigaz">
                                          <p>
                                            <b>Certification<br>gaz</b><br>
                                            <span id="prix_certigaz">
                                            <span id="certigaz_htva">0.00</span> € HTVA <br>
                                            <span id="certigaz_tvac">0.00</span> € TVAC</span>
                                          </p>
                                        </div>
                                        -->

                                            <div class="boxPrix hide boxPrix_blower">
                                                <p>
                                                    <b>Test<br>Blower Door</b><br>
                                                    <span id="prix_blower">
                                                        <span id="blower_htva">0.00</span> € HTVA <br>
                                                        <span id="blower_tvac">0.00</span> € TVAC</span>
                                                </p>
                                            </div>
                                            <div class="boxPrix hide boxPrix_geo">
                                                <p>
                                                    <b>Géomètre<br></b><br>
                                                    <span id="prix_geo">
                                                        <span id="geo_htva">0.00</span> € HTVA <br>
                                                        <span id="geo_tvac">0.00</span> € TVAC</span>
                                                </p>
                                            </div>
                                            <div class="boxPrix hide boxPrix_secu">
                                                <p>
                                                    <b>Coordinateur<br>sécurité</b><br>
                                                    <span id="prix_secu">
                                                        <span id="secu_htva">0.00</span> € HTVA <br>
                                                        <span id="secu_tvac">0.00</span> € TVAC</span>
                                                </p>
                                            </div>

                                            <div class="boxPrix hide boxPrix_certibeau">
                                                <p>
                                                    <b>CertIBEau</b><br>
                                                    <span id="prix_certibeau">
                                                        <span id="certibeau_htva">0.00</span> € HTVA <br>
                                                        <span id="certibeau_tvac">0.00</span> € TVAC</span>
                                                </p>
                                            </div>

                                        </div>

                                        <p class="labelGreen">Total de votre demande :</p>
                                        <p class="text-bold" id="prix_total"><b>
                                                <span id="total_htva">0.00</span>€ HTVA /
                                                <span id="total_tvac">0.00</span>€ TVAC</b>
                                        </p>

                                    </div>
                                </div>

                                <div class="hide" id="contactData">
                                    <h3>Notre devis vous intéresse ?</h3>
                                    <p class="labelGreen">Laissez-nous vos coordonnées ci-dessous :</p>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6 p-lg-0">
                                                <div class="form-group form-inline">
                                                    <label class="infoField_w" for="client_name">Nom</label>
                                                    <input type="text" class="form-control" id="client_name" name="client_name" placeholder="" required>
                                                </div>
                                                <div class="form-group form-inline">
                                                    <label class="infoField_w" for="client_prenom">Prénom</label>
                                                    <input type="text" class="form-control" id="client_prenom" name="client_prenom" placeholder="" required>
                                                </div>
                                                <div class="form-group form-inline">
                                                    <label class="infoField_w" for="client_rue">Rue</label>
                                                    <input type="text" class="form-control" id="client_rue" name="client_rue" placeholder="" required>
                                                </div>
                                                <div class="form-group form-inline">
                                                    <label class="infoField_w" for="client_nr">Numéro</label>
                                                    <input type="text" class="form-control" id="client_nr" name="client_nr" placeholder="" required>
                                                </div>
                                                <div class="form-group form-inline">
                                                    <label class="infoField_w" for="client_cp">Code postal</label>
                                                    <input type="text" class="form-control" id="client_cp" name="client_cp" placeholder="" required>
                                                </div>
                                                <div class="form-group form-inline">
                                                    <label class="infoField_w" for="client_localite">Localité</label>
                                                    <input type="text" class="form-control" id="client_localite" name="client_localite" placeholder="" required>
                                                </div>
                                                <div class="form-group form-inline">
                                                    <label class="infoField_w" for="client_country">Pays</label>
                                                    <input type="text" class="form-control" id="client_country" name="client_country" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group form-inline">
                                                    <label class="infoField_w" for="client_tel">Téléphone</label>
                                                    <input type="text" class="form-control" id="client_tel" name="client_tel" placeholder="" required>
                                                </div>
                                                <div class="form-group form-inline">
                                                    <label class="infoField_w" for="client_mail">E-mail</label>
                                                    <input type="email" class="form-control" id="client_mail" name="client_mail" placeholder="" required>
                                                </div>

                                                <div class="form-group form-inline forPro">
                                                    <label class="infoField_w" for="client_tva">N° de TVA</label>
                                                    <input type="text" class="form-control" id="client_tva" name="client_tva" placeholder="">
                                                </div>

                                                <div class="form-inline forPro">
                                                    <label class="infoField_w">Assujetti à la TVA : </label>
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-secondary rounded">
                                                            <input type="radio" name="client_assujetti" id="client_assujetti_1" value="Oui" autocomplete="off">
                                                            Oui
                                                        </label>
                                                        <label class="btn btn-secondary rounded">
                                                            <input type="radio" name="client_assujetti" id="client_assujetti_2" value="Non" autocomplete="off">
                                                            Non
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <p class="labelGreen">Le jour du contrôle</p>
                                    <div class="form-group form-inline">
                                        <label class="infoField" for="contact_nom">Personne de contact</label>
                                        <input type="text" class="form-control" id="contact_nom" name="contact_nom" placeholder="" required>
                                    </div>
                                    <br>
                                    <p><b>Sélectionnez un jour et un moment de la journée pour effectuer votre(vos)
                                            contrôle(s), nous vous recontacterons de toute façon :</b></p>

                                    <div class="form-group form-inline">
                                        <label class="infoField" for="controle_date">Jour de préférence</label>
                                        <input type="date" class="form-control" id="controle_date" name="controle_date" placeholder="" required>
                                    </div>


                                    <div class="form-group form-inline">
                                        <label class="infoField" for="controle_moment">Moment de la journée</label>
                                        <select class="form-control" id="controle_moment" name="controle_moment" required>
                                            <option>Sélectionnez un moment de la journée</option>
                                            <option value="Avant-midi">Avant-midi</option>
                                            <option value="Après-midi">Après-midi</option>
                                            <option value="Soirée">Soirée</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <textarea name="devis_comment" id="devis_comment" class="form-control" placeholder="Remarques"></textarea>
                                    </div>

                                    <input type="hidden" name="calculDevisTotal" id="calculDevisTotal" value="">

                                    <div class="form-group">
                                        <p class="text-right">
                                            <label>
                                                <input type="checkbox" value="J’ai lu et j’accepte les conditions générales et la charte vie privée" id="rgpd_check" name="rgpd_check" required>
                                                J’ai lu et j’accepte les conditions générales et la charte vie privée
                                            </label>
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <div class="float-right">
                                            <div class="g-recaptcha" data-sitekey="||trad_recaptcha_public||"></div>
                                        </div>
                                        <br style="clear:both;"><br>
                                    </div>

                                    <div class="wrapBtn"><input class="btnLink" type="submit" value="Envoyer ces informations"></div>
                                </div>

                            </form>

                            <!-- END FORM -->

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="./scripts/devis_form.js"></script>
</body>

</html>