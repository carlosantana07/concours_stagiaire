<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <title>Finaliser l'inscription</title>
    <link rel="stylesheet" href="globals.css">
    <link rel="stylesheet" href="styleguide.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="container">
        <div class="div">
            <!-- Page Header -->
            <header class="div-2">
                <div class="heading">
                    <h1 class="text-wrapper">Finaliser l'inscription</h1>
                </div>
                <div class="paragraph">
                    <p class="p">Choisissez votre méthode de paiement sécurisée</p>
                </div>
            </header>
            <!-- Main Content Area -->
            <div class="div-3">
                <!-- Left Panel: Payment Form -->
                <section class="div-4" aria-label="Moyen de paiement">
                    <!-- Payment Method Heading -->
                    <div class="heading-2">
                        <div class="frame">
                            <img class="vector" src="img/vector-7.svg" alt="" aria-hidden="true" />
                            <img class="img" src="img/vector.svg" alt="" aria-hidden="true" />
                        </div>
                        <h2 class="text-wrapper-2">Moyen de paiement</h2>
                    </div>
                    <!-- Payment Method Options (card images) -->
                    <img class="img-2" src="img/container.svg" alt="Options de paiement: Orange Money, Moov Money, carte bancaire, Visa" />
                    <!-- Payment Form -->
                    <form class="form" novalidate>
                        <div class="container-wrapper">
                            <div class="div-5">
                                <!-- Phone Number Label -->
                                <label class="label" for="phone-number">
                                    <span class="text-wrapper-3">Numéro de téléphone</span>
                                    <span class="text"></span>
                                </label>
                                <!-- Phone Number Input -->
                                <div class="div-wrapper">
                                    <div class="span-wrapper">
                                        <div class="span">
                                            <input
                                                id="phone-number"
                                                class="text-wrapper-4"
                                                type="tel"
                                                placeholder="+226 xx xx xx xx"
                                                aria-describedby="phone-hint"
                                                autocomplete="tel" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Helper Text -->
                                <div class="paragraph-2" id="phone-hint">
                                    <p class="text-wrapper-5">Vous recevrez une demande de confirmation sur ce numéro.</p>
                                    <span class="text-2"></span>
                                    <span class="text-wrapper-6">.</span>
                                </div>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <button class="button" type="submit" aria-label="Payer 800 FCFA">
                            <div class="frame-2" aria-hidden="true">
                                <img class="vector-2" src="img/vector-2.svg" alt="" />
                                <img class="vector-3" src="img/vector-5.svg" alt="" />
                            </div>
                            <span class="text-wrapper-7">Payer 800 FCFA</span>
                        </button>
                        <!-- Security Note -->
                        <div class="paragraph-3">
                            <div class="frame-3" aria-hidden="true">
                                <img class="vector-4" src="img/vector-3.svg" alt="" />
                                <img class="vector-5" src="img/vector-4.svg" alt="" />
                            </div>
                            <p class="text-wrapper-8">Paiement 100% sécurisé et chiffré</p>
                        </div>
                    </form>
                </section>
                <!-- Right Panel: Order Summary -->
                <aside class="div-6" aria-label="Récapitulatif du concours">
                    <div class="heading-3">
                        <h2 class="text-wrapper-9">Récapitulatif du concours</h2>
                    </div>
                    <div class="div-7">
                        <div class="container-wrapper-2">
                            <div class="container-wrapper-2">
                                <div class="div-8">
                                    <!-- Contest Name -->
                                    <div class="concours-inspecteur-wrapper">
                                        <p class="concours-inspecteur">
                                            <span class="text-wrapper-10">Concours:</span>
                                            <span class="text-wrapper-11">&nbsp;&nbsp;&nbsp;&nbsp; </span>
                                            <span class="text-wrapper-12">I</span>
                                            <span class="text-wrapper-13">nspecteur des douanes</span>
                                        </p>
                                    </div>
                                    <!-- Contest Fee -->
                                    <p class="frais-du-concours">
                                        <span class="text-wrapper-10">Frais du concours:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                                        <span class="text-wrapper-14">800 FCFA</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Total Label -->
                        <div class="span-wrapper-2">
                            <div class="span-2">
                                <span class="text-wrapper-15">Total</span>
                            </div>
                        </div>
                    </div>
                    <!-- Total Amount -->
                    <div class="text-wrapper-16">800 FCFA</div>
                    <!-- Security Info Box -->
                    <div class="container-wrapper-3">
                        <div class="div-9">
                            <div class="frame-4" aria-hidden="true">
                                <img class="vector-6" src="img/vector-6.svg" alt="" />
                                <img class="vector-7" src="img/image.svg" alt="" />
                            </div>
                            <div class="paragraph-4">
                                <p class="text-wrapper-17">Vos informations de</p>
                                <p class="text-wrapper-18">paiement sont traitées de</p>
                                <p class="text-wrapper-19">manière sécurisée. Nous ne</p>
                                <p class="text-wrapper-20">stockons pas les détails de</p>
                                <p class="text-wrapper-21">votre carte ou compte.</p>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </main>
</body>

</html>