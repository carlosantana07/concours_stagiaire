import AuthModel from "../models/AuthModel.js";

export default class AuthController {

    static initLogin() {

        const form = document.querySelector(".login-form");

        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            const telephone = form.querySelector('input[name="telephone"]').value;
            const mot_de_passe = form.querySelector('input[name="mot_de_passe"]').value;

            const data = {
                telephone,
                mot_de_passe
            };

            // console.log("DATA LOGIN :", data);

            try {

                const res = await AuthModel.login(data);

                // console.log("REPONSE LOGIN :", res.data);

                // TRÈS IMPORTANT
                const errorEl = document.getElementById("formError");

                errorEl.textContent = "";

                if (!res.ok) {

                    errorEl.textContent =
                        res.data.error || "Numéro ou mot de passe incorrect";

                    return;
                }

                // succès uniquement
                localStorage.setItem("token", res.data.token);

                // alert("Connexion réussie");
                errorEl.textContent = "";

                window.location.href = "accueil.php";

            } catch (err) {
                console.log(err);
                // alert("Erreur serveur");

            }

        });

    }

    static initForgotPassword() {

        const form = document.getElementById("forgotForm");

        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            const data = {
                email: form.email.value,
                telephone: form.telephone.value,
                choix: form.choix.value
            };

            try {

                const res = await AuthModel.forgotPassword(data);

                if (!res.ok) {
                    alert(res.data.error);
                    return;
                }

                alert("Code OTP envoyé");

                // STOCKER TOKEN
                sessionStorage.setItem("reset_token", res.data.token);

                window.location.href = "reset_mdp.php";

            } catch (err) {
                console.log(err);
                alert("Erreur serveur");
            }
        });
    }

    static initResetPassword() {

        const form = document.getElementById("resetForm");

        const token = sessionStorage.getItem("reset_token");

        if (!token) {
            alert("Session expirée");
            window.location.href = "mdp_oublie.php";
            return;
        }

        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            const data = {
                otp: form.otp.value,
                mot_de_passe: form.mot_de_passe.value
            };

            try {

                const res = await AuthModel.resetPassword(data, token);

                if (!res.ok) {
                    alert(res.data.error);
                    return;
                }

                alert("Mot de passe réinitialisé avec succès");

                // nettoyage
                sessionStorage.removeItem("reset_token");

                window.location.href = "connexion.php";

            } catch (err) {
                console.log(err);
                alert("Erreur serveur");
            }
        });
    }


    static initRegister() {

        const form = document.getElementById("registerForm");

        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());

            console.log("DATA ENVOYÉE :", data);

            // ===== VALIDATIONS =====
            if (!data.sexe) {
                alert("Veuillez sélectionner votre sexe");
                return;
            }

            if (!data.numero_cnib) {
                alert("Le CNIB est requis");
                return;
            }

            if (!data.mot_de_passe || data.mot_de_passe.length < 8) {
                alert("Mot de passe trop court (min 8 caractères)");
                return;
            }

            if (data.mot_de_passe !== data.mot_de_passe_confirm) {
                alert("Les mots de passe ne correspondent pas");
                return;
            }

            try {

                const res = await AuthModel.register(data);

                console.log("REPONSE API :", res.data);

                if (!res.ok) {
                    alert(res.data.error || "Erreur inscription");
                    return;
                }

                alert(res.data.message);

                sessionStorage.setItem("email", data.email);

                // stock token OTP
                sessionStorage.setItem("otp_token", res.data.candidat.token);

                // redirection OTP
                //window.location.href = "otp.php";
                // AFFICHER LE LOADER
                const loader = document.getElementById("pageLoader");

                loader.classList.remove("hidden");

                // REDIRECTION AVEC ANIMATION
                setTimeout(() => {

                    window.location.href = "otp.php";


                }, 1200);

            } catch (err) {
                console.log(err);
                alert("Erreur serveur");
            }

        });

    }

    static initOtp() {

        const inputs = document.querySelectorAll(".otp-input");
        const form = document.getElementById("otpForm");

        const token = sessionStorage.getItem("otp_token");

        if (!token) {
            alert("Session expirée");
            window.location.href = "inscription.php";
            return;
        }

        // =========================
        // INPUT LOGIC
        // =========================
        inputs.forEach((input, index) => {

            input.addEventListener("input", () => {

                input.value = input.value.replace(/[^0-9]/g, "");

                if (input.value && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }

                this.checkOTP(inputs, form);
            });

            input.addEventListener("keydown", (e) => {
                if (e.key === "Backspace" && !input.value && index > 0) {
                    inputs[index - 1].focus();
                }
            });

        });

        // =========================
        // SUBMIT
        // =========================
        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            let otp = "";
            inputs.forEach(i => otp += i.value);

            const data = { otp };

            try {

                const res = await AuthModel.verifyOtp(data, token);

                console.log("OTP RESPONSE:", res.data);

                if (!res.ok) {
                    alert(res.data.error || "Code OTP invalide");
                    return;
                }

                alert("Compte activé");

                sessionStorage.removeItem("otp_token");

                window.location.href = "connexion.php";

            } catch (err) {
                console.log(err);
                alert("Erreur serveur");
            }

        });

    }

    static checkOTP(inputs, form) {
        let otp = "";
        inputs.forEach(i => otp += i.value);

        if (otp.length === 6) {
            form.requestSubmit();
        }
    }

    static initResendOtp() {
        const btn = document.getElementById("resendBtn");
        const timerText = document.getElementById("resendTimer");

        let timeLeft = 30;
        btn.disabled = true;

        const startTimer = () => {
            timerText.innerText = `Renvoyer dans ${timeLeft}s`;

            const interval = setInterval(() => {
                timeLeft--;
                timerText.innerText = `Renvoyer dans ${timeLeft}s`;

                if (timeLeft <= 0) {
                    clearInterval(interval);
                    btn.disabled = false;
                    timerText.innerText = "";
                }
            }, 1000);
        };

        startTimer();

        btn.addEventListener("click", async () => {
            btn.disabled = true;

            try {
                const email = sessionStorage.getItem("email");

                const res = await AuthModel.resendOtp(email);

                console.log("RESEND OTP:", res.data);

                if (!res.ok) {
                    alert(res.data.error || "Erreur renvoi OTP");
                    btn.disabled = false;
                    return;
                }

                alert("Code OTP renvoyé");

                timeLeft = 30;
                startTimer();

            } catch (err) {
                console.log(err);
                alert("Erreur serveur");
                btn.disabled = false;
            }
        });
    }

    static initContact() {

        const form = document.getElementById("contactForm");

        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            const data = {
                nom: form.nom.value,
                email: form.email.value,
                message: form.message.value
            };

            // validation simple
            if (!data.nom || !data.message) {
                alert("Nom et message obligatoires");
                return;
            }

            try {

                const res = await AuthModel.contact(data);

                console.log("CONTACT:", res.data);

                if (!res.ok) {
                    alert(res.data.error || "Erreur envoi message");
                    return;
                }

                alert("Message envoyé avec succès");

                form.reset();

            } catch (err) {
                console.log(err);
                alert("Erreur serveur");
            }

        });
    }

}
